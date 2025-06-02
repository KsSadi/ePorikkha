<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'role')) {
                $table->enum('role', ['admin', 'instructor', 'evaluator', 'student'])->default('student');
            }
            if (!Schema::hasColumn('users', 'status')) {
                $table->enum('status', ['active', 'pending', 'suspended', 'inactive'])->default('pending');
            }
            if (!Schema::hasColumn('users', 'institution')) {
                $table->string('institution')->nullable();
            }
            if (!Schema::hasColumn('users', 'points')) {
                $table->integer('points')->default(0);
            }
            if (!Schema::hasColumn('users', 'last_activity')) {
                $table->timestamp('last_activity')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'status', 'institution', 'points', 'last_activity']);
        });
    }
};
