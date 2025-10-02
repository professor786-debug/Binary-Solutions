<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomSolution extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'student_id',
        'problem_file',
        'problem_description',
        'solution_file',
        'step',
        'status',
        'price',
        'paid_at'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
