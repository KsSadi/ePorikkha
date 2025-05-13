<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\ExamAttempt;
use App\Models\Question;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function adminIndex()
    {
        // Get total exams count
        $totalExams = Exam::count();

        // Get active students (users who have attempted at least one exam)
        $activeStudents = User::where('role', 'user')
            ->where('status', 1)
            ->count();


        // Get total questions count
        $totalQuestions = Question::count();

        // Calculate completion rate based on exams whose date and time have passed
        $now = Carbon::now();

        // Count published exams only
        $publishedExams = Exam::where('status', 'published')->count();

        // Count completed exams (date and time in the past)
        $completedExams = Exam::where('status', 'published')
            ->where(function($query) use ($now) {
                $query->where('exam_date', '<', $now->format('Y-m-d'))
                    ->orWhere(function($q) use ($now) {
                        $q->where('exam_date', '=', $now->format('Y-m-d'))
                            ->whereRaw('TIME(start_time) + INTERVAL duration MINUTE < ?', [$now->format('H:i:s')]);
                    });
            })
            ->count();

        // Calculate completion rate
        $completionRate = $publishedExams > 0
            ? round(($completedExams / $publishedExams) * 100)
            : 0;


        $upcomingExams = Exam::where(function ($query) use ($now) {
            $query->where('exam_date', '>', $now->toDateString())
                ->orWhere(function ($subQuery) use ($now) {
                    $subQuery->where('exam_date', $now->toDateString())
                        ->whereTime('start_time', '>=', $now->format('H:i:s'));
                })
                ->orWhere(function ($subQuery) use ($now) {
                    $subQuery->where('exam_date', $now->toDateString())
                        ->whereRaw("ADDTIME(start_time, SEC_TO_TIME(duration * 60)) > ?", [$now->format('H:i:s')]);
                });
        })
            ->orderBy('exam_date')
            ->orderBy('start_time')
            ->take(3)
            ->get();

        $nextExam = Exam::where('exam_date', '>=', now()->format('Y-m-d'))
            ->orderBy('exam_date')
            ->orderBy('start_time')
            ->first();

        $examTimestamp = null;
        $examTitle = 'No Upcoming Exams';

        if ($nextExam) {

            $examDateTime = \Carbon\Carbon::parse($nextExam->exam_date)->setTimeFromTimeString($nextExam->start_time);
            $examTimestamp = $examDateTime->timestamp * 1000;
            $examTitle = $nextExam->title;
        }



        // Pass all stats to the view
        return view('admin.dashboard', compact(
            'totalExams',
            'activeStudents',
            'totalQuestions',
            'completionRate',
            'upcomingExams',
            'nextExam',
            'examTimestamp',
            'examTitle',

        ));
    }

    public function studentIndex()
    {
        // Get total exams count
        $totalExams = Exam::count();



        // Calculate completion rate based on exams whose date and time have passed
        $now = Carbon::now();

        // Count published exams only
        $publishedExams = Exam::where('status', 'published')->count();

        // Count completed exams (date and time in the past)
        $completedExams = Exam::where('status', 'published')
            ->where(function($query) use ($now) {
                $query->where('exam_date', '<', $now->format('Y-m-d'))
                    ->orWhere(function($q) use ($now) {
                        $q->where('exam_date', '=', $now->format('Y-m-d'))
                            ->whereRaw('TIME(start_time) + INTERVAL duration MINUTE < ?', [$now->format('H:i:s')]);
                    });
            })
            ->count();



        $upcomingExams = Exam::where(function ($query) use ($now) {
            $query->where('exam_date', '>', $now->toDateString())
                ->orWhere(function ($subQuery) use ($now) {
                    $subQuery->where('exam_date', $now->toDateString())
                        ->whereTime('start_time', '>=', $now->format('H:i:s'));
                })
                ->orWhere(function ($subQuery) use ($now) {
                    $subQuery->where('exam_date', $now->toDateString())
                        ->whereRaw("ADDTIME(start_time, SEC_TO_TIME(duration * 60)) > ?", [$now->format('H:i:s')]);
                });
        })
            ->orderBy('exam_date')
            ->orderBy('start_time')
            ->take(3)
            ->get();

        $nextExam = Exam::where('exam_date', '>=', now()->format('Y-m-d'))
            ->orderBy('exam_date')
            ->orderBy('start_time')
            ->first();

        $examTimestamp = null;
        $examTitle = 'No Upcoming Exams';

        if ($nextExam) {

            $examDateTime = \Carbon\Carbon::parse($nextExam->exam_date)->setTimeFromTimeString($nextExam->start_time);
            $examTimestamp = $examDateTime->timestamp * 1000;
            $examTitle = $nextExam->title;
        }


        //
        $user = Auth::user();

        // Get active exams
        $activeExams = $this->getActiveExams();
        // Get user's in-progress exam attempts
        $inProgressAttempts = ExamAttempt::where('user_id', $user->id)
            ->where('status', 'in_progress')
            ->with('exam')
            ->get();

        // Get user's completed exam attempts
        $completedAttempts = ExamAttempt::where('user_id', $user->id)
            ->whereIn('status', ['completed', 'timed_out'])
            ->with('exam')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();


        // Pass all stats to the view
        return view('user.dashboard', compact(
            'totalExams',

            'upcomingExams',
            'nextExam',
            'examTimestamp',
            'examTitle',
            'activeExams',
            'inProgressAttempts',
            'completedAttempts',
            'publishedExams',
            'completedExams',
            'user'


        ));

    }

    /**
     * Get exams that are currently active
     */
    private function getActiveExams()
    {
        $now = Carbon::now();
        $today = Carbon::today();

        return Exam::where('status', 'published')
            ->where(function($query) use ($now, $today) {
                // Active exams - happening right now
                $query->whereDate('exam_date', '=', $today)
                    ->whereTime('start_time', '<=', $now->format('H:i:s'))
                    ->whereRaw('DATE_ADD(CONCAT(exam_date, " ", start_time), INTERVAL duration MINUTE) > ?', [$now]);
            })
            ->orderBy('exam_date')
            ->orderBy('start_time')
            ->get();
    }

    /**
     * Start an exam attempt from the dashboard
     */
    public function startExam(Exam $exam)
    {
        $user = Auth::user();

        // Check if the exam is active
        if (!$exam->isActive()) {
            return redirect()->route('user.dashboard')
                ->with('error', 'This exam is not currently active.');
        }

        // Check if user already has an attempt in progress
        $existingAttempt = ExamAttempt::where('user_id', $user->id)
            ->where('exam_id', $exam->id)
            ->where(function($query) {
                $query->where('status', 'not_started')
                    ->orWhere('status', 'in_progress');
            })
            ->first();

        if ($existingAttempt) {
            // Continue existing attempt
            return redirect()->route('student.exam', $exam->id)
                ->with('info', 'Continuing your existing exam attempt.');
        }

        // Create a new attempt
        $attempt = ExamAttempt::create([
            'user_id' => $user->id,
            'exam_id' => $exam->id,
            'start_time' => Carbon::now(),
            'status' => 'in_progress',
            'ip_address' => request()->ip(),
            'device_info' => json_encode([
                'user_agent' => request()->header('User-Agent'),
            ]),
        ]);

        return redirect()->route('student.exam', $exam->id)
            ->with('success', 'Exam started successfully. Good luck!');
    }

}
