<?php

namespace Database\Seeders;

use App\Models\Mood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mood::create([
            'name' => 'cerah',
        ]);
        Mood::create([
            'name' => 'mendung',
        ]);
        Mood::create([
            'name' => 'badai',
        ]);
    }
}
