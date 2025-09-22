<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    use Sluggable;


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name', 'email', 'photo', 'password',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'trial_ends_at' => 'datetime',
            'subscribed_until' => 'datetime',

        ];
    }
    public function diaryEntries()
    {
        return $this->hasMany(DiaryEntry::class);
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }

    public function role()
    {
        return $this->hasOne(Role::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    // Helper
    public function isOnTrial()
    {
        return $this->trial_ends_at && now()->lt($this->trial_ends_at);
    }
    
    public function hasAccess()
    {
        return $this->isOnTrial() || $this->isSubscribed();
    }
    public function getRouteKeyName()
    {
        return 'username'; // misalnya kamu punya kolom `username`
    }
    public function answers()
    {
        return $this->hasMany(\App\Models\Answer::class);
    }

    public function hasActiveSubscription(): bool
    {
        $subscription = $this->subscription;

        // Kalau belum ada subscription → FALSE
        if (!$subscription) {
            return false;
        }

        // Cek status dan tanggal berakhir
        return in_array($subscription->status, ['active', 'trial'])
            && $subscription->ends_at->isFuture();
    }

}
