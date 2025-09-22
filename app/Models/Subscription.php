<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'subscription_plan_id',
        'starts_at',
        'ends_at',
    ];
    protected $casts = [
            'starts_at' => 'datetime',
            'ends_at' => 'datetime',
        ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function plan(): BelongsTo
    {
        return $this->belongsTo(SubscriptionPlan::class, 'subscription_plan_id');
    }
    public function isActive(): bool
    {
        return $this->status === 'active' && $this->ends_at >= now();
    }
}
