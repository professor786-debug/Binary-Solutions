<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomSolution;
use Illuminate\Support\Facades\Auth;

class CustomSolutionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'problem_file' => 'required|file|mimes:pdf,doc,docx,jpg,png',
            'description' => 'required|string|max:2000',
        ]);

        $student = Auth::guard('student')->user();


        if (!Auth::guard('student')->check()) {
            return redirect()->route('main')->with('error', 'You must be logged in to submit a solution.');
        }

        $file = $request->file('problem_file');

        $typeSuffix = 'question';
        $courseFolder = 'general';
        $filename = time() . "_{$typeSuffix}." . $file->getClientOriginalExtension();
        $folder = public_path("assets/uploads/solutions/{$typeSuffix}");

        if (!file_exists($folder)) {
            mkdir($folder, 0755, true);
        }

        $file->move($folder, $filename);

        $customSolution = new CustomSolution();
        $customSolution->student_id = $student->id; 
        $customSolution->problem_file = "assets/uploads/solutions/{$typeSuffix}/{$filename}";
        $customSolution->solution_file = null;
        $customSolution->step = 1;
        $customSolution->problem_description = $request->description;
        $customSolution->status = 'pending';
        $customSolution->price = null;
        $customSolution->paid_at = null;
        $customSolution->save();

        return back()->with('success', 'Your question has been submitted successfully.');
    }
}
