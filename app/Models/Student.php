<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password', 'verification_token', 'is_verified'];

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
