<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DiaryEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        // 'content',
        // 'mood',
        'entry_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
