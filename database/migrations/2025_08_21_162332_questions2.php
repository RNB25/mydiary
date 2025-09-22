<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// database/migrations/2025_08_21_000004_create_questions_table.php
return new class extends Migration {
    public function up(): void {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('day_id');
            $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');            $table->foreignId('mood_id')->constrained('moods')->cascadeOnDelete();
            // $table->integer('order'); // urutan pertanyaan
            $table->text('question_1');
            $table->text('question_2');
            $table->text('question_3');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('questions');
    }
};
