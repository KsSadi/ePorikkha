<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentAnswer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'exam_attempt_id',
        'question_id',
        'selected_option_id',
        'written_answer',
        'is_correct',
        'marks_awarded',
        'time_spent',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_correct' => 'boolean',
        'marks_awarded' => 'decimal:2',
    ];

    /**
     * Get the exam attempt this answer belongs to.
     */
    public function examAttempt(): BelongsTo
    {
        return $this->belongsTo(ExamAttempt::class);
    }

    /**
     * Get the question this answer is for.
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Get the selected option (for MCQ questions).
     */
    public function selectedOption(): BelongsTo
    {
        return $this->belongsTo(QuestionOption::class, 'selected_option_id');
    }

    /**
     * Check if the answer is correct.
     * This is primarily for MCQ questions with automated marking.
     */
    public function checkCorrectness(): bool
    {
        $question = $this->question;

        if ($question->isMcq() && $this->selected_option_id) {
            $correctOption = $question->getCorrectOption();
            $isCorrect = $correctOption && $correctOption->id === $this->selected_option_id;

            // Update the answer with correctness and awarded marks
            $this->update([
                'is_correct' => $isCorrect,
                'marks_awarded' => $isCorrect ? $question->marks : 0,
            ]);

            return $isCorrect;
        }

        // For non-MCQ questions, marking might be manual
        return false;
    }
    public function uploads()
    {
        return $this->hasMany(AnswerUpload::class);
    }
}
