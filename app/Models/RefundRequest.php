<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefundRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'transaction_id',
        'package_name',
        'amount',
        'start_date',
        'end_date',
        'card_last4',
        'payment_status',
        'reason',
        'status',
        'refund_amount',
        'rejection_reason',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
