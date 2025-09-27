<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function profile()
    {
        return view('student.student-profile');
    }
    public function index() {
        $students = Student::all();
        return view('admin.Student.student_list', compact('students'));
    }

     public function create(){
         return view('admin.Student.add_student');
     }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|min:6',
            'is_verified' => 'required|boolean',
        ]);

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_verified' => $request->is_verified,
        ]);

        return redirect()->route('student.index')->with('success', 'Student added successfully!');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.Student.edit_student', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:students,email,' . $id,
            'password' => 'nullable|min:6',
            'is_verified' => 'required|boolean',
        ]);

        $student = Student::findOrFail($id);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'is_verified' => $request->is_verified,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $student->update($data);

        return redirect()->route('student.index')->with('success', 'Student updated successfully!');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('student.index')->with('success', 'Student deleted successfully.');
    }

}
