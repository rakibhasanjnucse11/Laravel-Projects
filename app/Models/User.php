<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Project;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'phone',
        'address',
        'education',
        'experience',
        'skills',
        'linkedin',         // ✅ Added for social profiles
        'github',           // ✅ Added for social profiles
        'certifications',   // ✅ Optional field
        'profile_picture',  // ✅ If you have a picture field
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // 🚀 Project relationship
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
