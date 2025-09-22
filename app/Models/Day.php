<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    // Tabel yang digunakan
    protected $table = 'days';

    // Field yang boleh diisi (mass assignment)
    protected $fillable = [
        'day_number',
        'theme',
    ];

    // Relasi: Satu hari punya banyak pertanyaan (via moods)
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    // Relasi: Satu hari punya banyak entries dari user
    public function entries()
    {
        return $this->hasMany(DiaryEntry::class);
    }
    public function answers()
    {
        return $this->hasMany(Answer::class, 'day_id');
    }

}
