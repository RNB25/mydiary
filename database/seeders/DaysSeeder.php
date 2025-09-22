<?php

namespace Database\Seeders;

use App\Models\Day;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Day::create([
            'day_number' => 1,
            'theme' => 'Hari Ini Dimulai',
        ]);
        Day::create([
            'day_number' => 2,
            'theme' => 'Energi & Batas Diri',
        ]);
        Day::create([
            'day_number' => 3,
            'theme' => 'Arah dan Makna',
        ]);
        Day::create([
            'day_number' => 4,
            'theme' => 'Luka dan Proses Sembuh',
        ]);
        Day::create([
            'day_number' => 5,
            'theme' => 'Hubungan',
        ]);
        Day::create([
            'day_number' => 6,
            'theme' => 'Suara Hati',
        ]);
        Day::create([
            'day_number' => 7,
            'theme' => 'Rasa Takut',
        ]);
        Day::create([
            'day_number' => 8,
            'theme' => 'Harapan dan Impian',
        ]);
        Day::create([
            'day_number' => 9,
            'theme' => 'Tubuh dan Perasaan',
        ]);
        Day::create([
            'day_number' => 10,
            'theme' => 'Penerimaan',
        ]);
        Day::create([
            'day_number' => 11,
            'theme' => 'Versi Terbaik Diri',
        ]);
        Day::create([
            'day_number' => 12,
            'theme' => 'Melepaskan',
        ]);
        Day::create([
            'day_number' => 13,
            'theme' => 'Memaafkan',
        ]);
        Day::create([
            'day_number' => 14,
            'theme' => 'Melangkah ke Depan',
        ]);
    }
}
