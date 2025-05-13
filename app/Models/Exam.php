<?php

namespace App\Models;

use Carbon\Carbon;
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
     * Check if the exam is a draft.
     */
    public function isDraft()
    {
        return $this->status === 'draft';
    }

    /**
     * Check if the exam is upcoming.
     */
    public function isUpcoming()
    {
        return $this->status === 'published' &&
            $this->exam_date->gt(Carbon::today()) &&
            !$this->isActive();
    }

    /**
     * Check if the exam is active.
     */
    public function isActive()
    {
        $now = Carbon::now();
        $examStartDateTime = Carbon::parse($this->exam_date->format('Y-m-d') . ' ' . $this->start_time);
        $examEndDateTime = $examStartDateTime->copy()->addMinutes($this->duration);

        return $this->status === 'published' &&
            $now->gte($examStartDateTime) &&
            $now->lt($examEndDateTime);
    }

    /**
     * Check if the exam is completed.
     */
    public function isCompleted()
    {
        $now = Carbon::now();
        $examStartDateTime = Carbon::parse($this->exam_date->format('Y-m-d') . ' ' . $this->start_time);
        $examEndDateTime = $examStartDateTime->copy()->addMinutes($this->duration);

        return $this->status === 'published' &&
            $now->gte($examEndDateTime);
    }

    /**
     * Get the status text.
     */
    public function getStatusTextAttribute()
    {
        if ($this->isDraft()) {
            return 'Draft';
        } elseif ($this->isActive()) {
            return 'Active';
        } elseif ($this->isUpcoming()) {
            return 'Upcoming';
        } elseif ($this->isCompleted()) {
            return 'Completed';
        }

        return 'Unknown';
    }

    /**
     * Get the status class for CSS styling.
     */
    public function getStatusClassAttribute()
    {
        if ($this->isDraft()) {
            return 'status-draft';
        } elseif ($this->isActive()) {
            return 'status-active';
        } elseif ($this->isUpcoming()) {
            return 'status-upcoming';
        } elseif ($this->isCompleted()) {
            return 'status-completed';
        }

        return '';
    }

    /**
     * Get the CSS icon class based on subject area.
     */
    public function getIconClassAttribute()
    {
        switch(strtolower($this->subject_area)) {
            case 'technology':
            case 'computer science':
            case 'cs':
                return 'icon-cs fas fa-laptop-code';
            case 'mathematics':
            case 'math':
                return 'icon-math fas fa-square-root-alt';
            case 'science':
                return 'icon-science fas fa-flask';
            case 'english':
            case 'language':
                return 'icon-english fas fa-book';
            case 'history':
                return 'icon-history fas fa-landmark';
            case 'geography':
                return 'icon-geography fas fa-globe-americas';
            default:
                return 'icon-general fas fa-book-open';
        }
    }

    /**
     * Get the formatted duration.
     */
    public function getFormattedDurationAttribute(): string
    {
        $hours = floor($this->duration / 60);
        $minutes = $this->duration % 60;

        if ($hours > 0) {
            return $hours . ' hour' . ($hours > 1 ? 's' : '') .
                ($minutes > 0 ? ' ' . $minutes . ' minute' . ($minutes > 1 ? 's' : '') : '');
        }

        return $minutes . ' minute' . ($minutes > 1 ? 's' : '');
    }

    /**
     * Get the formatted date.
     */
    public function getFormattedDateAttribute(): string
    {
        return $this->exam_date->format('F j, Y');
    }

    /**
     * Get the formatted time.
     */
    public function getFormattedTimeAttribute(): string
    {
        return Carbon::parse($this->start_time)->format('g:i A');
    }
}
