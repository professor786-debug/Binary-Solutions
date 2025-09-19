<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSubscription extends Model
{
   protected $table = 'student_subscriptions';
    protected $primaryKey = 'id';

     protected $fillable = [
        'student_id',
        'subscription_plan_id',
        'amount',
        'currency',
        'start_date',
        'end_date',
        'stripe_charge_id',
    ];

    protected $allowedFields = [
        'student_id',
        'subscription_plan_id',
        'amount',
        'currency',
        'start_date',
        'end_date',
        'is_active',
        'created_at',
        'updated_at'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function package()
    {
        return $this->belongsTo(SubscriptionPackage::class, 'subscription_plan_id');
    }

}