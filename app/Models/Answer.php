<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $table = 'answers';

    protected $fillable = [
        'user_id',
        'question_id',
        'day_id',
        'mood_id',
        'answer_1',
        'answer_2',
        'answer_3',
    ];

    // Relasi ke User (jawaban ini dimiliki user tertentu)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function day()
    {
        return $this->belongsTo(Day::class, 'day_id');
    }
    // Relasi ke Question (jawaban untuk pertanyaan tertentu)
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
