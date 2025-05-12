<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_id')->constrained()->onDelete('cascade');
            $table->text('question_title');
            $table->text('question_text');
            $table->enum('question_type', ['mcq', 'description'])->default('mcq');
            $table->json('options')->nullable(); // For MCQ, will store options as JSON
            $table->enum('answer_format', ['text', 'fileupload'])->nullable(); // For description questions
            $table->integer('marks')->default(5);
            $table->integer('time_limit')->nullable(); // Optional time limit per question (in minutes)
            $table->integer('sort_order')->default(0); // For ordering questions
            $table->timestamps();
        });


// Create Question Options Table Migration
        Schema::create('question_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained()->onDelete('cascade');
            $table->text('option_text');
            $table->boolean('is_correct')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
