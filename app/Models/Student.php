<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'full_name',
        'contact_no',
        'email',
        'password',
        'verification_token',
        'is_verified',
        'google_id',        // ✅ Added for Google OAuth

        // ✅ Newly added fields (for edit profile functionality)
        'university',
        'country',
        'address',
        'profile_image',
        'about',
    ];

    protected $hidden = ['password', 'remember_token'];

    public $timestamps = true;

    public function subscriptions()
    {
        return $this->hasMany(StudentSubscription::class, 'student_id');
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function latestSubscription()
    {
        return $this->hasOne(StudentSubscription::class)->latestOfMany();
    }

    public function subscriptionPackage()
    {
        return $this->hasOne(subscriptionPackage::class, 'id');
    }
}
