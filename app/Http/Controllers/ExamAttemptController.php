<?php

namespace App\Http\Controllers;

use App\Models\AnswerUpload;
use App\Models\Exam;
use App\Models\ExamAttempt;
use App\Models\Question;
use App\Models\StudentAnswer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ExamAttemptController extends Controller
{
    /**
     * Show exam overview for student before/during the attempt
     */
    public function showExam(Exam $exam)
    {
        // Check if the exam is published and available
        if (!$exam->isPublished()) {
            return redirect()->route('user.dashboard')->with('error', 'This exam is not available.');
        }
        // Get or create exam attempt
        $attempt = $this->getOrCreateAttempt($exam);

        // If the attempt is null, it means the exam is completed
        if ($attempt === null) {
            return redirect()->route('user.dashboard')
                ->with('info', 'You have already completed this exam.');
        }

        // Check if the attempt is locked
        if ($attempt->access_control == '0' && $exam->access_control == 'password') {

            return view('user.exam.password', compact('exam', 'attempt'));
        }


        // Get questions with their status (available, locked, completed)
        $questions = $this->getQuestionsWithStatus($exam, $attempt);

        // Calculate remaining time
        $remainingTime = $this->calculateRemainingTime($attempt);


        // Get count of completed questions
        $completedCount = $attempt->answers()->where('status', 1)->count();
        // Get count of available questions
        $availableCount = $attempt->answers()->where('status', -1)->count();

        // Total questions - completed - available = locked
        $lockedCount = $questions->count() - $completedCount - $availableCount;




        return view('user.exam.index', compact(
            'exam',
            'attempt',
            'questions',
            'remainingTime',
            'completedCount',
            'availableCount',
            'lockedCount'
        ));
    }
    /**
     * Get existing attempt or create a new one
     */
    private function getOrCreateAttempt(Exam $exam)
    {
        $user = Auth::user();

        // Check for completed attempt
        $completedAttempt = ExamAttempt::where('user_id', $user->id)
            ->where('exam_id', $exam->id)
            ->where('status', 'completed')
            ->first();

        if ($completedAttempt) {
            return null; // signal redirect needed
        }

        // Check for in-progress or not-started attempt
        $attempt = ExamAttempt::where('user_id', $user->id)
            ->where('exam_id', $exam->id)
            ->where(function ($query) {
                $query->where('status', 'not_started')
                    ->orWhere('status', 'in_progress');
            })
            ->first();

        if (!$attempt) {
            $attempt = ExamAttempt::create([
                'user_id' => $user->id,
                'exam_id' => $exam->id,
                'start_time' => Carbon::now(),
                'status' => 'in_progress',
                'ip_address' => request()->ip(),
                'device_info' => request()->userAgent(),
            ]);
        }

        return $attempt;
    }

    /**
     * Get device information for proctoring
     */
    private function getDeviceInfo()
    {
        $userAgent = request()->header('User-Agent');
        return [
            'user_agent' => $userAgent,
            'browser' => $this->getBrowserInfo($userAgent),
            'platform' => $this->getPlatformInfo($userAgent)
        ];
    }

    /**
     * Extract browser info from user agent
     */
    private function getBrowserInfo($userAgent)
    {
        // Basic browser detection - can be enhanced
        if (strpos($userAgent, 'Chrome') !== false) {
            return 'Chrome';
        } elseif (strpos($userAgent, 'Firefox') !== false) {
            return 'Firefox';
        } elseif (strpos($userAgent, 'Safari') !== false) {
            return 'Safari';
        } elseif (strpos($userAgent, 'Edge') !== false) {
            return 'Edge';
        } else {
            return 'Unknown';
        }
    }

    /**
     * Extract platform info from user agent
     */
    private function getPlatformInfo($userAgent)
    {
        // Basic platform detection - can be enhanced
        if (strpos($userAgent, 'Windows') !== false) {
            return 'Windows';
        } elseif (strpos($userAgent, 'Mac') !== false) {
            return 'Mac';
        } elseif (strpos($userAgent, 'Linux') !== false) {
            return 'Linux';
        } elseif (strpos($userAgent, 'iPhone') !== false) {
            return 'iOS';
        } elseif (strpos($userAgent, 'Android') !== false) {
            return 'Android';
        } else {
            return 'Unknown';
        }
    }

    /**
     * Get questions with availability status
     */
    private function getQuestionsWithStatus(Exam $exam, ExamAttempt $attempt)
    {
        $questions = $exam->questions()->orderBy('sort_order')->get();
        $answers = $attempt->answers()->get()->keyBy('question_id');

        // In a sequential exam, only the first unanswered question is available

        $foundFirstAvailable = false;

        foreach ($questions as $index => $question) {
            $questionId = $question->id;
            $status = 0; // default: locked

            if (isset($answers[$questionId])) {
                $status = $answers[$questionId]->status;
            } elseif (!$foundFirstAvailable && $index === 0) {
                // First question always available if unanswered
                $status = -1;
            }

            // Assign human-readable status for UI use
            if ($status === 1) {
                $question->status = 'completed';
            } elseif ($status === -1) {
                $question->status = 'available';
                $question->route = route('student.question', ['exam' => $exam->id, 'question' => $questionId]);
                $foundFirstAvailable = true;
            } else {
                $question->status = 'locked';
            }
        }


        return $questions;
    }

    /**
     * Calculate remaining time for the exam
     */
    private function calculateRemainingTime(ExamAttempt $attempt)
    {
        $exam = $attempt->exam;
        $endTime = Carbon::parse($attempt->start_time)->addMinutes($exam->duration);
        $now = Carbon::now();

        if ($now >= $endTime) {
            // Time's up - mark the attempt as timed out if not already completed
            if ($attempt->status !== 'completed') {
                $attempt->update([
                    'status' => 'timed_out',
                    'end_time' => $now
                ]);
            }
            return '00:00:00';
        }

        $remainingSeconds = $now->diffInSeconds($endTime);

        // Format as HH:MM:SS
        $hours = floor($remainingSeconds / 3600);
        $minutes = floor(($remainingSeconds % 3600) / 60);
        $seconds = $remainingSeconds % 60;

        return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
    }

    /**
     * Show a specific question in the exam
     */
    /**
     * Show a specific question in the exam
     */
    /**
     * Show a specific question in the exam
     */
    public function showQuestion(Exam $exam, Question $question)
    {

        // Check if user has an active attempt for this exam
        $attempt = ExamAttempt::where('user_id', Auth::id())
            ->where('exam_id', $exam->id)
            ->whereIn('status', ['not_started', 'in_progress'])
            ->first();

        if (!$attempt) {
            // Create a new attempt if none exists
            $attempt = ExamAttempt::create([
                'user_id' => Auth::id(),
                'exam_id' => $exam->id,
                'start_time' => Carbon::now(),
                'status' => 'in_progress',
                'ip_address' => request()->ip(),
                'device_info' => json_encode([
                    'user_agent' => request()->header('User-Agent'),
                ]),
            ]);
        }

        // Check if the attempt is locked
        if ($attempt->access_control == '0' && $exam->access_control == 'password') {

            return view('user.exam.password', compact('exam', 'attempt'));
        }


        // Get all questions to determine progress
        $questions = $exam->questions()->orderBy('sort_order')->get();
        $currentIndex = $questions->search(function($item) use ($question) {
            return $item->id === $question->id;
        });

        // If question not found or index is -1
        if ($currentIndex === false) {
            return redirect()->route('student.exam', $exam->id)
                ->with('error', 'Question not found.');
        }

        // Calculate progress
        $totalQuestions = $questions->count();
        $currentNumber = $currentIndex + 1;
        $progressPercentage = ($currentNumber / $totalQuestions) * 100;

        // Get or create answer entry
        $answer = StudentAnswer::firstOrCreate([
            'exam_attempt_id' => $attempt->id,
            'question_id' => $question->id,
        ]);

        //update $answer status to -1 if not already set
        if ($answer->status == 0) {
            $answer->update(['status' => -1]);
        }

        // Calculate exam time spent
        $startTime = Carbon::parse($attempt->start_time);
        $now = Carbon::now();
        $timeSpentSeconds = $startTime->diffInSeconds($now);
        $hours = floor($timeSpentSeconds / 3600);
        $minutes = floor(($timeSpentSeconds % 3600) / 60);
        $seconds = $timeSpentSeconds % 60;
        $timeSpent = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);

        // Get options for MCQ questions
        $options = $question->options()->orderBy('sort_order')->get();


        // Get existing upload for this answer if any
        $upload = AnswerUpload::where('student_answer_id', $answer->id)->first();

        return view('user.exam.question', compact(
            'exam',
            'attempt',
            'question',
            'answer',
            'upload',
            'options',
            'currentNumber',
            'totalQuestions',
            'progressPercentage',
            'timeSpent'
        ));
    }


    /**
     * Submit an answer for a question
     */
    /**
     * Submit an answer for a question
     */
    public function submitAnswer(Request $request, Exam $exam, Question $question)
    {
        // Get the current attempt
        $attempt = ExamAttempt::where('user_id', Auth::id())
            ->where('exam_id', $exam->id)
            ->where('status', 'in_progress')
            ->firstOrFail();

        // Get or create the answer entry
        $answer = StudentAnswer::where('exam_attempt_id', $attempt->id)
            ->where('question_id', $question->id)
            ->firstOrFail();

        // Validate based on question type
        if ($question->isMcq()) {
            $validated = $request->validate([
                'selected_option_id' => 'required|exists:question_options,id',
            ]);

            // Update the answer
            $answer->update([
                'selected_option_id' => $validated['selected_option_id'],
                'time_spent' => Carbon::parse($attempt->created_at)->diffInSeconds(Carbon::now(), false),
                'status' => 1,
            ]);

            // Check correctness for MCQ
            $answer->checkCorrectness();
        } else {
            // Handle file upload for descriptive questions
            $request->validate([
                'answer_file' => 'required|file|max:10240', // 10MB limit
            ]);

            if ($request->hasFile('answer_file')) {
                try {
                    $file = $request->file('answer_file');

                    // Create a unique filename
                    $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9.]/', '_', $file->getClientOriginalName());

                    // Get uploaded file content directly
                    $fileContent = file_get_contents($file->getRealPath());

                    // Make sure uploads directory exists
                    $uploadsDir = public_path('uploads');
                    if (!file_exists($uploadsDir)) {
                        mkdir($uploadsDir, 0755, true);
                    }

                    // Write file directly using file_put_contents
                    $success = file_put_contents($uploadsDir . '/' . $filename, $fileContent);

                    if ($success) {
                        // Save to database
                        AnswerUpload::updateOrCreate(
                            ['student_answer_id' => $answer->id],
                            [
                                'filename' => $filename,
                                'original_filename' => $file->getClientOriginalName(),
                                'file_path' => 'uploads/' . $filename,
                                'file_type' => $file->getMimeType(),
                                'file_size' => $file->getSize(),
                            ]
                        );

                        // Update the answer
                        $answer->update([
                            'time_spent' => Carbon::parse($attempt->created_at)->diffInSeconds(Carbon::now(), false),
                            'status' => 1,
                        ]);

                    } else {
                        return back()->with('error', 'Failed to save file content');
                    }
                } catch (\Exception $e) {
                    return back()->with('error', 'File upload failed: ' . $e->getMessage());
                }
            }

        }

        // Find the next question
        $nextQuestion = $exam->questions()
            ->where('sort_order', '>', $question->sort_order)
            ->orderBy('sort_order')
            ->first();

        // If there's a next question, go to it
        if ($nextQuestion) {
            return redirect()->route('student.question', [
                'exam' => $exam->id,
                'question' => $nextQuestion->id
            ])->with('success', 'Answer submitted successfully');
        }

        // Otherwise, complete the exam
        $attempt->update([
            'status' => 'completed',
            'end_time' => Carbon::now(),
            'time_spent' => Carbon::parse($attempt->created_at)->diffInSeconds(Carbon::now(), false),
        ]);

        // Calculate results
        $attempt->calculateResult();

        return redirect()->route('student.exam.result', $attempt->id)
            ->with('success', 'Exam completed successfully');
    }


    /**
     * Show exam results after completion
     */
    public function showResult(ExamAttempt $attempt)
    {
        // Ensure the attempt belongs to the authenticated user
        if ($attempt->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Ensure the attempt is completed
        if (!in_array($attempt->status, ['completed', 'timed_out'])) {
            return redirect()->route('student.exam', $attempt->exam_id)
                ->with('error', 'The exam is not completed yet.');
        }

        $exam = $attempt->exam;
        $answers = $attempt->answers()->with('question')->get();

        return view('exams.student.result', compact('attempt', 'exam', 'answers'));
    }

    /**
     * Submit the entire exam
     */
    public function submitExam(Exam $exam)
    {
        $attempt = ExamAttempt::where('user_id', Auth::id())
            ->where('exam_id', $exam->id)
            ->where('status', 'in_progress')
            ->firstOrFail();

        $attempt->update([
            'status' => 'completed',
            'end_time' => Carbon::now(),
        ]);


        // Get questions with their status (available, locked, completed)
        $questions = $this->getQuestionsWithStatus($exam, $attempt);
        //total questions
        $totalQuestions = $questions->count();
        // Get count of completed questions
        $completedCount = $attempt->answers()->where('status', 1)->count();


        $start = Carbon::parse($attempt->start_time);
        $end = $attempt->end_time ? Carbon::parse($attempt->end_time) : Carbon::now();

        $totalSeconds = $start->diffInSeconds($end);

// Convert total seconds to hours, minutes, and seconds
        $hours = floor($totalSeconds / 3600);
        $minutes = floor(($totalSeconds % 3600) / 60);
        $seconds = $totalSeconds % 60;

        $timeSpent = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);

        // 🔹 Average Time per Question (HH:MM:SS)
        $avgSeconds = $completedCount > 0 ? $totalSeconds / $completedCount : 0;

        $avgHours = floor($avgSeconds / 3600);
        $avgMinutes = floor(($avgSeconds % 3600) / 60);
        $avgSecondsRemainder = $avgSeconds % 60;

        $avgTimePerQuestion = sprintf('%02d:%02d:%02d', $avgHours, $avgMinutes, $avgSecondsRemainder);



        return view('user.exam.complete', compact('totalQuestions', 'completedCount','timeSpent','avgTimePerQuestion'));
    }

    /**
     * Handle exam timeout
     */
    public function handleTimeout(Exam $exam)
    {
        $attempt = ExamAttempt::where('user_id', Auth::id())
            ->where('exam_id', $exam->id)
            ->where('status', 'in_progress')
            ->first();

        if ($attempt) {
            $attempt->update([
                'status' => 'timed_out',
                'end_time' => Carbon::now(),
            ]);

            // Calculate the final result
            $attempt->calculateResult();
        }

        return redirect()->route('student.exam.result', $attempt->id)
            ->with('info', 'Your exam time has expired. The exam has been automatically submitted.');
    }

    /**
     * Log proctoring violations
     */
    public function logViolation(Request $request, ExamAttempt $attempt)
    {
        // Ensure the attempt belongs to the authenticated user
        if ($attempt->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // Validate the violation data
        $validated = $request->validate([
            'violation_type' => 'required|string',
            'details' => 'nullable|string',
        ]);

        // Get current proctoring flags or create new array
        $proctoringFlags = $attempt->proctoring_flags ?? [];

        // Add new violation
        $proctoringFlags[] = [
            'type' => $validated['violation_type'],
            'details' => $validated['details'] ?? null,
            'timestamp' => Carbon::now()->toDateTimeString(),
        ];

        // Update the attempt
        $attempt->update([
            'proctoring_flags' => $proctoringFlags
        ]);

        return response()->json(['success' => true]);
    }

    /**
     * Handle file uploads for a question
     */
    public function uploadFile(Request $request, Exam $exam, Question $question)
    {
        $request->validate([
            'file' => 'required|file|max:10240', // 10MB max
        ]);

        $attempt = ExamAttempt::where('user_id', Auth::id())
            ->where('exam_id', $exam->id)
            ->where('status', 'in_progress')
            ->firstOrFail();

        // Get or create the answer
        $answer = StudentAnswer::firstOrCreate([
            'exam_attempt_id' => $attempt->id,
            'question_id' => $question->id,
        ]);

        // Handle the file upload
        $file = $request->file('file');

        // Handle the file upload to public/uploads
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $filename);

// Save upload record
        $upload = new AnswerUpload([
            'student_answer_id' => $answer->id,
            'filename' => $filename,
            'original_filename' => $file->getClientOriginalName(),
            'file_size' => $file->getSize(),
            'file_type' => $file->getMimeType(),
            'file_path' => 'uploads/' . $filename, // Relative public path
        ]);
        $upload->save();

        return response()->json([
            'success' => true,
            'file' => [
                'id' => $upload->id,
                'name' => $upload->original_filename,
                'size' => $this->formatFileSize($upload->file_size),
                'type' => $upload->file_type,
                'url' => asset($upload->file_path), // Direct access
            ]
        ]);
    }
    /**
     * Delete an uploaded file
     */
    public function deleteFile(Exam $exam, Question $question, AnswerUpload $upload)
    {
        $attempt = ExamAttempt::where('user_id', Auth::id())
            ->where('exam_id', $exam->id)
            ->where('status', 'in_progress')
            ->firstOrFail();

        $answer = StudentAnswer::where('exam_attempt_id', $attempt->id)
            ->where('question_id', $question->id)
            ->firstOrFail();

        // Ensure the upload belongs to this answer
        if ($upload->student_answer_id !== $answer->id) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        }

        // Delete the file from storage
        Storage::disk('public')->delete($upload->file_path);

        // Delete the record
        $upload->delete();

        return response()->json(['success' => true]);
    }

    /**
     * Format file size for display
     */
    private function formatFileSize($size)
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        $i = 0;
        while ($size >= 1024 && $i < count($units) - 1) {
            $size /= 1024;
            $i++;
        }
        return round($size, 2) . ' ' . $units[$i];
    }


    /**
     * Check if the exam password is correct
     */
    public function checkPassword(Request $request, Exam $exam)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        if ($exam->password === $request->input('password')) {
            $attempt = ExamAttempt::where('user_id', Auth::id())
                ->where('exam_id', $exam->id)
                ->first();

            //update attempt access_control to 1
            if ($attempt) {
                $attempt->update(['access_control' => 1]);
            }

            return redirect()->route('student.exam', $exam->id)
                ->with('success', 'Password verified successfully. You can now access the exam.');
        }

        return redirect()->back()
            ->with('error', 'Incorrect password. Please try again.')
            ->withInput($request->except('password'));
    }
}
