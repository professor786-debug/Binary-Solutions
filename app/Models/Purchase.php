<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Student;
use App\Models\SubscriptionPlan;

class Purchase extends Model
{
    protected $fillable = [
        'student_id',
        'solution_id',
        'package_id',
        'base_price',
        'addons',
        'addon_total',
        'grand_total',
        'payment_status',
        'payment_method',
        'stripe_charge_id',
    ];

    protected $casts = [
        'addons' => 'array',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function package()
    {
        return $this->belongsTo(SubscriptionPackage::class, 'package_id');
    }

    public function solution()
    {
        return $this->belongsTo(Solution::class);
    }
}