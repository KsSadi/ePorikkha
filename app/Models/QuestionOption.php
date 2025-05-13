<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question_id',
        'option_text',
        'is_correct',
        'sort_order',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_correct' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Get the question that owns the option.
     */
    /**
     * Get the question that owns the option.
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Get the letter representation for this option (A, B, C, etc.)
     */
    public function getLetterAttribute()
    {
        $letters = range('A', 'Z');
        $index = $this->sort_order % count($letters);

        return $letters[$index];
    }
}
