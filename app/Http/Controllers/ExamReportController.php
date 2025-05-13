<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\ExamAttempt;
use App\Models\StudentAnswer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExamReportController extends Controller
{
    public function manageReport()
    {
        // Get active and completed exams
        $exams = Exam::where('status', 'published')
            ->orderBy('exam_date', 'desc')
            ->get();

        // Filter to keep only active and completed exams
        $filteredExams = $exams->filter(function($exam) {
            return $exam->isActive() || $exam->isCompleted();
        });

        // For each exam, get additional statistics
        $examStats = [];
        foreach ($filteredExams as $exam) {
            $attempts = ExamAttempt::where('exam_id', $exam->id)->get();
            $totalStudents = $attempts->pluck('user_id')->unique()->count();
            $totalSubmissions = $attempts->count();

            // Calculate completion percentage
            $progress = $totalStudents > 0
                ? round(($totalSubmissions / $totalStudents) * 100)
                : 0;

            $examStats[$exam->id] = [
                'totalStudents' => $totalStudents,
                'totalSubmissions' => $totalSubmissions,
                'progress' => $progress,
                'status' => $exam->isActive() ? 'active' : 'completed'
            ];
        }

        return view('admin.report.manage', compact('filteredExams', 'examStats'));
    }

    public function showReport(Exam $exam)
    {
        // Get all attempts for this exam
        $attempts = ExamAttempt::where('exam_id', $exam->id)->with('user')->get();

        // Count statistics
        $totalSubmissions = $attempts->count();
        $completedCount = $attempts->where('status', 'completed')->count();
        $inProgressCount = $attempts->where('status', 'in_progress')->count();

        // Calculate average completion time
        $avgCompletionTime = "0m";
        if ($completedCount > 0) {
            $totalTimeSpent = $attempts->where('status', 'completed')->sum('time_spent');
            $avgSeconds = $totalTimeSpent / $completedCount;
            $avgCompletionTime = $this->formatTimeFromSeconds($avgSeconds);
        }

        // Analyze question statistics
        $questions = $exam->questions()->orderBy('sort_order')->get();
        $questionStats = [];

        foreach ($questions as $question) {
            // Get all answers for this question
            $answers = StudentAnswer::whereHas('examAttempt', function($query) use ($exam) {
                $query->where('exam_id', $exam->id);
            })->where('question_id', $question->id)->get();

            $totalAnswers = $answers->count();
            $completedAnswers = $answers->where('status', 1)->count();

            // Time statistics
            $timeSpentValues = $answers->where('status', 1)->where('time_spent', '>', 0)
                ->pluck('time_spent')->toArray();

            $avgTime = count($timeSpentValues) > 0 ? array_sum($timeSpentValues) / count($timeSpentValues) : 0;
            $quickestTime = count($timeSpentValues) > 0 ? min($timeSpentValues) : 0;
            $slowestTime = count($timeSpentValues) > 0 ? max($timeSpentValues) : 0;

            $questionStats[] = [
                'question' => $question,
                'submissions' => "{$totalAnswers}/{$totalSubmissions}",
                'completed' => $completedAnswers,
                'avgTime' => $this->formatTimeFromSeconds($avgTime),
                'quickestTime' => $this->formatTimeFromSeconds($quickestTime),
                'slowestTime' => $this->formatTimeFromSeconds($slowestTime)
            ];
        }

        // Process student submissions
        $studentSubmissions = [];
        foreach ($attempts as $attempt) {
            $answers = StudentAnswer::where('exam_attempt_id', $attempt->id)->get();
            $completedQuestions = $answers->where('status', 1)->count();

            // Find first and last submission times
            $firstSubmission = null;
            $lastSubmission = null;

            if ($answers->count() > 0) {
                $firstAnswer = $answers->sortBy('created_at')->first();
                $lastAnswer = $answers->sortByDesc('created_at')->first();

                $firstSubmission = $firstAnswer ? $firstAnswer->created_at : null;
                $lastSubmission = $lastAnswer ? $lastAnswer->created_at : null;
            }

            $studentSubmissions[] = [
                'student' => $attempt->user,
                'progress' => "{$completedQuestions}/{$questions->count()} Questions",
                'firstSubmission' => $firstSubmission,
                'lastSubmission' => $lastSubmission,
                'totalTime' => $attempt->formatted_time_spent,
                'status' => $attempt->status,
                'attempt_id' => $attempt->id
            ];
        }

        return view('admin.report.show', compact(
            'exam',
            'totalSubmissions',
            'completedCount',
            'inProgressCount',
            'avgCompletionTime',
            'questionStats',
            'studentSubmissions',
        ));
    }

    /**
     * Format seconds into a human-readable time string.
     */
    private function formatTimeFromSeconds($seconds)
    {
        if ($seconds < 1) {
            return '-';
        }

        $minutes = floor($seconds / 60);
        $remainingSeconds = floor($seconds % 60);

        if ($minutes >= 60) {
            $hours = floor($minutes / 60);
            $minutes = $minutes % 60;
            return "{$hours}h {$minutes}m {$remainingSeconds}s";
        }

        return "{$minutes}m {$remainingSeconds}s";
    }


    /**
     * Show the student's answers for grading
     */
    public function showStudentAnswers(ExamAttempt $attempt)
    {
        // Get the exam and questions
        $exam = $attempt->exam;
        $student = $attempt->user;

        // Get all answers for this attempt with their questions
        $answers = StudentAnswer::where('exam_attempt_id', $attempt->id)
            ->with(['question', 'selectedOption', 'uploads'])
            ->orderBy('question_id')
            ->get();

        // Get all attempts for this exam (for navigation between students)
        $allAttempts = ExamAttempt::where('exam_id', $exam->id)
            ->where('status', 'completed')
            ->with('user')
            ->orderBy('user_id')
            ->get();

        // Find previous and next student
        $currentIndex = $allAttempts->search(function($item) use ($attempt) {
            return $item->id === $attempt->id;
        });

        $prevAttempt = ($currentIndex > 0) ? $allAttempts[$currentIndex - 1] : null;
        $nextAttempt = ($currentIndex < count($allAttempts) - 1) ? $allAttempts[$currentIndex + 1] : null;

        // Calculate current total score
        $totalMarksAwarded = $answers->sum('marks_awarded');
        $totalPossibleMarks = $exam->total_marks;
        $percentage = $totalPossibleMarks > 0 ? ($totalMarksAwarded / $totalPossibleMarks) * 100 : 0;

        return view('admin.report.update_result', compact(
            'exam',
            'attempt',
            'student',
            'answers',
            'prevAttempt',
            'nextAttempt',
            'totalMarksAwarded',
            'totalPossibleMarks',
            'percentage'
        ));
    }

    /**
     * Save grade for a single answer
     */
    public function saveGrade(Request $request, StudentAnswer $answer)
    {
        // Validate the request
        $validated = $request->validate([
            'marks_awarded' => 'required|numeric|min:0|max:' . $answer->question->marks,
            'feedback' => 'nullable|string|max:1000',
        ]);

        // Update the answer
        $answer->update([
            'marks_awarded' => $validated['marks_awarded'],
            'feedback' => $validated['feedback'] ?? null,
            'is_correct' => $validated['marks_awarded'] >= $answer->question->marks // Consider correct if full marks
        ]);

        // Recalculate exam attempt results
        $answer->examAttempt->calculateResult();

        return response()->json([
            'success' => true,
            'message' => 'Grade saved successfully',
            'marks_awarded' => $answer->marks_awarded,
            'total_marks' => $answer->examAttempt->score,
            'percentage' => $answer->examAttempt->percentage
        ]);
    }


}
