<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ExamAttempt extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'exam_id',
        'start_time',
        'end_time',
        'status',
        'score',
        'percentage',
        'passed',
        'ip_address',
        'device_info',
        'time_spent',
        'proctoring_flags',
        'access_control',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'passed' => 'boolean',
        'percentage' => 'decimal:2',
        'proctoring_flags' => 'array',
    ];

    /**
     * Get the user (student) who attempted the exam.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the exam that was attempted.
     */
    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class);
    }

    /**
     * Get the answers submitted in this attempt.
     */
    public function answers(): HasMany
    {
        return $this->hasMany(StudentAnswer::class);
    }

    /**
     * Check if the exam attempt is in progress.
     */
    public function isInProgress(): bool
    {
        return $this->status === 'in_progress';
    }

    /**
     * Check if the exam attempt is completed.
     */
    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }

    /**
     * Calculate the time remaining in seconds.
     */
    public function getRemainingTimeAttribute(): int
    {
        if (!$this->isInProgress()) {
            return 0;
        }

        $endTime = Carbon::parse($this->start_time)->addMinutes($this->exam->duration);
        $now = Carbon::now();

        if ($now->gt($endTime)) {
            return 0;
        }

        return $now->diffInSeconds($endTime);
    }

    /**
     * Get the formatted time spent.
     */
    public function getFormattedTimeSpentAttribute(): string
    {
        if (!$this->time_spent) {
            return '0 minutes';
        }

        $hours = floor($this->time_spent / 3600);
        $minutes = floor(($this->time_spent % 3600) / 60);
        $seconds = $this->time_spent % 60;

        if ($hours > 0) {
            return $hours . ' hour' . ($hours > 1 ? 's' : '') .
                ($minutes > 0 ? ' ' . $minutes . ' minute' . ($minutes > 1 ? 's' : '') : '');
        }

        if ($minutes > 0) {
            return $minutes . ' minute' . ($minutes > 1 ? 's' : '') .
                ($seconds > 0 ? ' ' . $seconds . ' second' . ($seconds > 1 ? 's' : '') : '');
        }

        return $seconds . ' second' . ($seconds > 1 ? 's' : '');
    }

    /**
     * Calculate and update the score and status when exam is completed.
     */
    public function calculateResult(): void
    {
        if ($this->status !== 'completed') {
            return;
        }

        $totalMarks = $this->exam->total_marks;
        $achievedScore = $this->answers->sum('marks_awarded');
        $percentage = ($totalMarks > 0) ? ($achievedScore / $totalMarks) * 100 : 0;
        $passed = $percentage >= $this->exam->passing_score;

        $this->update([
            'score' => $achievedScore,
            'percentage' => $percentage,
            'passed' => $passed,
        ]);
    }
}
