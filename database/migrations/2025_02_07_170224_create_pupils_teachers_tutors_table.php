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
        Schema::create('pupils_teachers_tutors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pupil_id')->references('id')->on('users');
            $table->foreignId('teacher_id')->references('id')->on('users');
            $table->foreignId('tutor_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pupils_teachers_tutors');
    }
};
