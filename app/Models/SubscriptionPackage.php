<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPackage extends Model
{
    use HasFactory;

    protected $table = 'subscription_plans';

    protected $fillable = [
        'name',                 // e.g. "Starter", "Pro", "Unlimited"
        'price',                // e.g. 19.99, 39.99, 49.99
        'download_limit',       // e.g. 3, 10, NULL (for unlimited)
        'discount_percentage',  // e.g. 10 (only for Pro)
        'one_on_one_sessions',  // e.g. 0 or 1
        'description',          // e.g. "Access to 3 solution downloads/month"
        'status'                // 1 = active, 0 = inactive
    ];

    public function subscriptions() {
        return $this->hasMany(StudentSubscription::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class, 'package_id');
    }
}
