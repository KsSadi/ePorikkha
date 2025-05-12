<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'exam_id',
        'question_title',
        'question_text',
        'question_type',
        'options',
        'correct_option',
        'answer_format',
        'marks',
        'time_limit',
        'sort_order',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'options' => 'array',
    ];

    /**
     * Get the exam that owns the question.
     */
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    /**
     * Get the options for the question.
     */
    public function options()
    {
        return $this->hasMany(QuestionOption::class)->orderBy('sort_order');
    }

    /**
     * Check if the question is MCQ type.
     */
    public function isMcq()
    {
        return $this->question_type === 'mcq';
    }

    /**
     * Get the correct option for MCQ questions.
     */
    public function getCorrectOption()
    {
        if (!$this->isMcq()) {
            return null;
        }

        return $this->options()->where('is_correct', true)->first();
    }
}
