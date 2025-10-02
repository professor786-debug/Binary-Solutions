<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'course_id',
        'subject_area',
        'problem_statement',
        'keywords',
        'description',
        'source_code_path',
        'video_demo_path',
        'walkthrough_path',
        'report_path',
        'preview_image',
        'has_tutorial_session',
        'price',
        'download_limit',
        'status',
    ];

}
