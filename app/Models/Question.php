<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';

    protected $fillable = [
        'day_id',
        'mood_id',
        'question_1',
        'question_2',
        'question_3',
    ];

    // Relasi ke Day (satu pertanyaan milik 1 hari)
    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    // Relasi ke Mood (satu pertanyaan milik 1 mood)
    public function mood()
    {
        return $this->belongsTo(Mood::class);
    }

    // Relasi ke Answer (satu pertanyaan bisa punya banyak jawaban user)
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
