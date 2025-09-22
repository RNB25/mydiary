<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// database/migrations/2025_08_21_000003_create_days_table.php
return new class extends Migration {
    public function up(): void {
        Schema::create('days', function (Blueprint $table) {
            $table->id(); // unsignedBigInteger (cocok dengan foreignId di questions)
            $table->string('theme')->nullable(); // tema hari itu
            $table->integer('day_number'); // nomor hari
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('days');
    }
};
