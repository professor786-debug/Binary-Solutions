<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPackage extends Model
{
    use HasFactory;

    protected $table = 'subscription_plans'; // your existing table name

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'name',
        'price',
        'duration',            // in days or months
        'download_limit',      // NULL = unlimited
        'discount_percentage', // default 0
        'one_on_one_sessions', // default 0
        'description',
        'status',              // 1 = active, 0 = inactive
    ];

    /**
     * Attribute casting
     */
    protected $casts = [
        'price' => 'decimal:2',
        'duration' => 'integer',
        'download_limit' => 'integer',
        'discount_percentage' => 'integer',
        'one_on_one_sessions' => 'integer',
        'status' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Default attribute values
     */
    protected $attributes = [
        'discount_percentage' => 0,
        'one_on_one_sessions' => 0,
        'status' => 0,
    ];

    /**
     * Relationships
     */
    public function subscriptions()
    {
        return $this->hasMany(StudentSubscription::class, 'package_id');
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class, 'package_id');
    }
}
