<?php

namespace App\Models;

use App\Notifications\VerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role' // add any additional user fields
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }

    // Relationships
    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function admissions()
    {
        return $this->hasMany(Admission::class);
    }
    public function isAdmin(): bool
{
    return $this->role === 'admin';
}

public function isInstitute(): bool
{
    return $this->role === 'institute';
}

public function isStudent(): bool
{
    return $this->role === 'student';
}
}
