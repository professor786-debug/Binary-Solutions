<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',

        // ✅ New fields added
        'company',
        'job',
        'country',
        'address',
        'phone',
        'profile_image',
        'about',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',

        // ✅ New cast
        'is_admin' => 'boolean',
    ];

    /**
     * Accessor: get full profile image URL
     */
    public function getProfileImageUrlAttribute(): string
    {
        if (! $this->profile_image) {
            return asset('assets/img/profile-img.jpg');
        }

        // If profile_image is already a full URL, return as-is
        if (filter_var($this->profile_image, FILTER_VALIDATE_URL)) {
            return $this->profile_image;
        }

        return asset($this->profile_image);
    }

    /**
     * Scope: only admins
     */
    public function scopeAdmins($query)
    {
        return $query->where('is_admin', true);
    }

    /**
     * Helper: check if user is admin
     */
    public function isAdmin(): bool
    {
        return (bool) $this->is_admin;
    }
}
