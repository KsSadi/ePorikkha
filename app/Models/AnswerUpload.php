<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerUpload extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'student_answer_id',
        'filename',
        'original_filename',
        'file_path',
        'file_type',
        'file_size',
    ];

    /**
     * Get the student answer that owns the upload.
     */
    public function studentAnswer()
    {
        return $this->belongsTo(StudentAnswer::class);
    }
}
