<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Exam extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'subject_area',
        'description',
        'exam_date',
        'start_time',
        'duration',
        'passing_score',
        'total_marks',
        'randomize_questions',
        'show_results',
        'prevent_backtracking',
        'enable_proctoring',
        'access_control',
        'password',
        'question_settings',
        'time_tracking',
        'prevent_tab_switch',
        'disable_copy_paste',
        'disable_right_click',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'exam_date' => 'date',
        'randomize_questions' => 'boolean',
        'show_results' => 'boolean',
        'prevent_backtracking' => 'boolean',
        'enable_proctoring' => 'boolean',
        'prevent_tab_switch' => 'boolean',
        'disable_copy_paste' => 'boolean',
        'disable_right_click' => 'boolean',
    ];

    /**
     * Get the questions for the exam.
     */
    public function questions()
    {
        return $this->hasMany(Question::class)->orderBy('sort_order');
    }

    /**
     * Get the user who created the exam.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the total number of questions in the exam.
     */
    public function getQuestionCountAttribute()
    {
        return $this->questions()->count();
    }

    /**
     * Check if the exam is published.
     */
    public function isPublished()
    {
        return $this->status === 'published';
    }

    /**
     * Get the formatted duration.
     */
    public function getFormattedDurationAttribute()
    {
        $hours = floor($this->duration / 60);
        $minutes = $this->duration % 60;

        if ($hours > 0) {
            return $hours . ' hour' . ($hours > 1 ? 's' : '') .
                ($minutes > 0 ? ' ' . $minutes . ' minute' . ($minutes > 1 ? 's' : '') : '');
        }

        return $minutes . ' minute' . ($minutes > 1 ? 's' : '');
    }
}
