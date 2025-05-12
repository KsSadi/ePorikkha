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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subject_area');
            $table->text('description')->nullable();
            $table->date('exam_date');
            $table->time('start_time');
            $table->integer('duration'); // in minutes
            $table->integer('passing_score')->default(60);
            $table->integer('total_marks')->default(100);
            $table->boolean('randomize_questions')->default(false);
            $table->boolean('show_results')->default(false);
            $table->boolean('prevent_backtracking')->default(false);
            $table->boolean('enable_proctoring')->default(false);
            $table->enum('access_control', ['open', 'password'])->default('open');
            $table->string('password')->nullable();
            $table->enum('question_settings', ['open_all', 'one_by_one'])->default('one_by_one');
            $table->enum('time_tracking', ['full_exam', 'question_wise'])->default('question_wise');
            $table->boolean('prevent_tab_switch')->default(true);
            $table->boolean('disable_copy_paste')->default(true);
            $table->boolean('disable_right_click')->default(false);
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
