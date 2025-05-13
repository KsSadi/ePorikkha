<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Question;
use App\Models\QuestionOption;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ExamController extends Controller
{
    public function manageExam(Request $request)
    {
        // Start with a base query
        $query = Exam::query();

        // Handle search
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $searchTerm . '%')
                    ->orWhere('subject_area', 'like', '%' . $searchTerm . '%');
            });
        }

        // Handle filter
        $filter = $request->filter ?? 'all';
        $currentDate = Carbon::now();

        switch ($filter) {
            case 'upcoming':
                $query->where('exam_date', '>', $currentDate->format('Y-m-d'))
                    ->where('status', 'published');
                break;
            case 'active':
                $query->where('exam_date', '=', $currentDate->format('Y-m-d'))
                    ->where('start_time', '<=', $currentDate->format('H:i:s'))
                    ->where(function($q) use ($currentDate) {
                        $q->whereRaw('ADDTIME(start_time, SEC_TO_TIME(duration * 60)) > ?', [$currentDate->format('H:i:s')]);
                    })
                    ->where('status', 'published');
                break;
            case 'completed':
                $query->where(function($q) use ($currentDate) {
                    $q->where('exam_date', '<', $currentDate->format('Y-m-d'))
                        ->orWhere(function($q2) use ($currentDate) {
                            $q2->where('exam_date', '=', $currentDate->format('Y-m-d'))
                                ->whereRaw('ADDTIME(start_time, SEC_TO_TIME(duration * 60)) <= ?', [$currentDate->format('H:i:s')]);
                        });
                })
                    ->where('status', 'published');
                break;
            case 'draft':
                $query->where('status', 'draft');
                break;
            default:
                // All exams, no additional filter
                break;
        }

        // Get featured exam (most recent upcoming exam with highest total marks)
        $featuredExam = Exam::where('status', 'published')
            ->where('exam_date', '>=', $currentDate->format('Y-m-d'))
            ->orderBy('exam_date', 'asc')
            ->orderBy('total_marks', 'desc')
            ->first();

        // Get exams with pagination
        $exams = $query->orderBy('created_at', 'desc')->paginate(9);

        // Count students enrolled in each exam
    /*    foreach ($exams as $exam) {
            $exam->student_count = $exam->students()->count();
            $exam->question_count = $exam->questions()->count();
        }*/

     /*   if ($featuredExam) {
            $featuredExam->student_count = $featuredExam->students()->count();
            $featuredExam->question_count = $featuredExam->questions()->count();
        }*/

        return view('admin.exam.manage_exam', compact('exams', 'featuredExam', 'filter'));

    }

    public function createExam()
    {
        return view('admin.exam.create_exam');
    }
    public function store(Request $request)
    {

        // Validate the exam details
        $request->validate([
            'title' => 'required|string|max:255',
            'subject_area' => 'required|string|max:100',
            'description' => 'nullable|string',
            'exam_date' => 'required|date',
            'start_time' => 'required|string',
            'duration' => 'required|integer|min:1',
            'passing_score' => 'required|integer|min:0|max:100',
            'total_marks' => 'required|integer|min:1',
        ]);


        // Start a database transaction
        DB::beginTransaction();

        try {
            // Determine exam status based on action button
            $status = 'draft';
            if ($request->has('actionBtn')) {
                $status = $request->input('actionBtn') === 'publish' ? 'published' : 'draft';
            }

            // Create the exam
            $exam = Exam::create([
                'title' => $request->title,
                'subject_area' => $request->subject_area,
                'description' => $request->description,
                'exam_date' => $request->exam_date,
                'start_time' => $request->start_time,
                'duration' => $request->duration,
                'passing_score' => $request->passing_score,
                'total_marks' => $request->total_marks,
                'status' => $status,
                'created_by' => auth()->id(),

                // Exam configuration
                'randomize_questions' => $request->has('randomize_questions'),
                'show_results' => $request->has('show_results'),
                'prevent_backtracking' => $request->has('prevent_backtracking'),
                'enable_proctoring' => $request->has('enable_proctoring'),

                // Settings
                'access_control' => $request->input('access_control', 'open'),
                'password' => $request->input('password'),
                'question_settings' => $request->input('question_settings', 'one_by_one'),
                'time_tracking' => $request->input('time_tracking', 'question_wise'),

                // Proctoring settings
                'disable_copy_paste' => $request->has('disable_copy_paste'),
                'disable_right_click' => $request->has('disable_right_click'),
            ]);

            // Process questions if they exist
            if ($request->has('questions') && is_array($request->questions)) {
                foreach ($request->questions as $index => $questionData) {
                    // Validate question data
                    if (empty($questionData['question_title']) || empty($questionData['question_text'])) {
                        continue; // Skip invalid questions
                    }

                    // Create the question
                    $question = $exam->questions()->create([
                        'question_title' => $questionData['question_title'],
                        'question_text' => $questionData['question_text'],
                        'question_type' => $questionData['question_type'] ?? 'mcq',
                        'answer_format' => $questionData['answer_format'] ?? 'text',
                        'marks' => $questionData['marks'] ?? 1,
                        'time_limit' => $questionData['time_limit'] ?? null,
                        'sort_order' => $index,
                    ]);

                    // If it's MCQ type, save the options
                    if (($questionData['question_type'] ?? 'mcq') === 'mcq' &&
                        isset($questionData['options']) &&
                        is_array($questionData['options'])) {

                        $correctOptionIndex = isset($questionData['correct_option']) ?
                            (int) $questionData['correct_option'] : 0;

                        foreach ($questionData['options'] as $optionIndex => $optionText) {
                            if (empty($optionText)) {
                                continue; // Skip empty options
                            }

                            $question->options()->create([
                                'option_text' => $optionText,
                                'is_correct' => ($optionIndex === $correctOptionIndex),
                                'sort_order' => $optionIndex,
                            ]);
                        }
                    }
                }
            }

            // Commit the transaction
            DB::commit();

            // Redirect based on the action
            if ($status === 'published') {
                return redirect()->route('admin.manage.exam')
                    ->with('success', 'Exam has been published successfully!');
            } else {
                return redirect()->route('admin.exam.edit', $exam)
                    ->with('success', 'Exam has been saved as draft.');
            }
        } catch (\Exception $e) {
            dd($e);

            // Roll back the transaction in case of an error
            DB::rollBack();

            // Log the error
            Log::error('Failed to create exam: ' . $e->getMessage());

            // Redirect back with error message
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create exam. Please try again.');
        }
    }
    public function edit(Exam $exam)
    {
        // Load related questions with their options
        $exam->load(['questions', 'questions.options']);

        return view('admin.exam.edit_exam', compact('exam'));

    }

    public function show(Exam $exam)
    {
        // Explicitly load all nested relationships
        $exam->load(['questions', 'questions.options', 'creator']);

        // We're skipping the student counting as requested

        return view('admin.exam.show', compact('exam'));
    }

    /**
     * Update the specified exam in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Exam $exam)
    {
        // Validate the exam details
        $request->validate([
            'title' => 'required|string|max:255',
            'subject_area' => 'required|string|max:100',
            'description' => 'nullable|string',
            'exam_date' => 'required|date',
            'start_time' => 'required|string',
            'duration' => 'required|integer|min:1',
            'passing_score' => 'required|integer|min:0|max:100',
            'total_marks' => 'required|integer|min:1',
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {
            // Determine exam status based on action button
            $status = $exam->status;
            if ($request->has('actionBtn')) {
                $status = $request->input('actionBtn') === 'published' ? 'published' : 'draft';
            }

            // Update the exam
            $exam->update([
                'title' => $request->title,
                'subject_area' => $request->subject_area,
                'description' => $request->description,
                'exam_date' => $request->exam_date,
                'start_time' => $request->start_time,
                'duration' => $request->duration,
                'passing_score' => $request->passing_score,
                'total_marks' => $request->total_marks,
                'status' => $status,

                // Exam configuration
                'randomize_questions' => $request->has('randomize_questions'),
                'show_results' => $request->has('show_results'),
                'prevent_backtracking' => $request->has('prevent_backtracking'),
                'enable_proctoring' => $request->has('enable_proctoring'),

                // Settings
                'access_control' => $request->input('access_control', 'open'),
                'password' => $request->input('password'),
                'question_settings' => $request->input('question_settings', 'one_by_one'),
                'time_tracking' => $request->input('time_tracking', 'question_wise'),

                // Proctoring settings
                'disable_copy_paste' => $request->has('disable_copy_paste'),
                'disable_right_click' => $request->has('disable_right_click'),
            ]);

            // Handle deleted questions
            if ($request->has('delete_questions') && is_array($request->delete_questions)) {
                Question::whereIn('id', $request->delete_questions)->delete();
            }

            // Handle deleted options
            if ($request->has('delete_options') && is_array($request->delete_options)) {
                QuestionOption::whereIn('id', $request->delete_options)->delete();
            }

            // Process questions if they exist
            if ($request->has('questions') && is_array($request->questions)) {
                foreach ($request->questions as $index => $questionData) {
                    // Validate question data
                    if (empty($questionData['question_title']) || empty($questionData['question_text'])) {
                        continue; // Skip invalid questions
                    }

                    // Check if the question already exists
                    if (isset($questionData['id'])) {
                        // Update existing question
                        $question = Question::find($questionData['id']);

                        if ($question) {
                            $question->update([
                                'question_title' => $questionData['question_title'],
                                'question_text' => $questionData['question_text'],
                                'question_type' => $questionData['question_type'] ?? 'mcq',
                                'answer_format' => $questionData['answer_format'] ?? 'text',
                                'marks' => $questionData['marks'] ?? 1,
                                'time_limit' => $questionData['time_limit'] ?? null,
                                'sort_order' => $index,
                            ]);
                        }
                    } else {
                        // Create a new question
                        $question = $exam->questions()->create([
                            'question_title' => $questionData['question_title'],
                            'question_text' => $questionData['question_text'],
                            'question_type' => $questionData['question_type'] ?? 'mcq',
                            'answer_format' => $questionData['answer_format'] ?? 'text',
                            'marks' => $questionData['marks'] ?? 1,
                            'time_limit' => $questionData['time_limit'] ?? null,
                            'sort_order' => $index,
                        ]);
                    }

                    // If it's MCQ type, save the options
                    if (($questionData['question_type'] ?? 'mcq') === 'mcq' &&
                        isset($questionData['options']) &&
                        is_array($questionData['options'])) {

                        $correctOptionIndex = isset($questionData['correct_option']) ?
                            (int) $questionData['correct_option'] : 0;

                        foreach ($questionData['options'] as $optionIndex => $optionText) {
                            if (empty($optionText)) {
                                continue; // Skip empty options
                            }

                            // Check if the option already exists
                            $optionId = $questionData['option_ids'][$optionIndex] ?? null;

                            if ($optionId) {
                                // Update existing option
                                $option = QuestionOption::find($optionId);
                                if ($option) {
                                    $option->update([
                                        'option_text' => $optionText,
                                        'is_correct' => ($optionIndex === $correctOptionIndex),
                                        'sort_order' => $optionIndex,
                                    ]);
                                }
                            } else {
                                // Create new option
                                $question->options()->create([
                                    'option_text' => $optionText,
                                    'is_correct' => ($optionIndex === $correctOptionIndex),
                                    'sort_order' => $optionIndex,
                                ]);
                            }
                        }
                    }
                }
            }

            // Commit the transaction
            DB::commit();

            // Redirect based on the action
            if ($status === 'published') {

                return redirect()->route('admin.manage.exam')
                    ->with('success', 'Exam has been updated and published successfully!');
            } else {
                return redirect()->route('admin.exam.edit', $exam)
                    ->with('success', 'Exam has been updated as draft.');
            }
        } catch (\Exception $e) {
            // Roll back the transaction in case of an error
            DB::rollBack();

            // Log the error
            Log::error('Failed to update exam: ' . $e->getMessage());

            // Redirect back with error message
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update exam. Please try again. Error: ' . $e->getMessage());
        }
    }

    public function destroy(Exam $exam)
    {
        // Start a database transaction
        DB::beginTransaction();

        try {
            // Delete the exam and its related questions and options
            $exam->questions()->each(function ($question) {
                $question->options()->delete();
                $question->delete();
            });
            $exam->delete();

            // Commit the transaction
            DB::commit();

            return redirect()->route('admin.manage.exam')
                ->with('success', 'Exam deleted successfully!');
        } catch (\Exception $e) {
            // Roll back the transaction in case of an error
            DB::rollBack();

            Log::error('Failed to delete exam: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Failed to delete exam. Please try again.');
        }
    }

    public function updatePublished(Request $request, Exam $exam)
    {
        // Validate the request
        $request->validate([
            'publish' => 'required|boolean',
        ]);

        // Update the exam's published status
        $exam->update(['status' => $request->publish ? 'published' : 'draft']);

        return redirect()->route('admin.manage.exam')
            ->with('success', 'Exam status updated successfully!');
    }

}
