<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ExamController extends Controller
{
    public function manageExam()
    {
        return view('admin.exam.manage_exam');
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
    public function editExam($id)
    {
        return view('admin.exam.edit_exam', compact('id'));
    }
}
