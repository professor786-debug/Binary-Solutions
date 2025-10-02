<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        return view('admin.Course.course_list');
     }
 
     public function create(){
         return view('admin.Course.add_course');
     }
 
     public function store(){
         
     }
}
