<?php

namespace App\Http\Controllers\Admin\Solution;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Universty;
use App\Models\Country;
use App\Models\Solution;
use Illuminate\Support\Str;
use App\Models\CustomSolution;

class SolutionController extends Controller
{

    public function index(){
       $solutions = Solution::all();
       return view('admin.Solutions.solution_list',compact('solutions'));
    }

    public function create(){

        $universities = Universty::all();
        $countries = Country::all();
        $years = range(2005, now()->year);
        return view('admin.Solutions.add_solution', compact('universities','years','countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'course_name' => 'required|string|max:255',
            'universty_name' => 'required',
            'year' => 'required|integer',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'subject_area' => 'required|string|max:255',
            'problem_statement' => 'required|string',
            'keywords' => 'required|string',
            'source_code_path' => 'nullable|file|mimes:zip|max:51200',
            'walkthrough_path' => 'nullable|file|mimes:pdf',
            'report_path' => 'nullable|file|mimes:pdf|max:51200',
            'preview_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'has_tutorial_session' => 'required|boolean',
            'price' => 'required|numeric',
            'download_limit' => 'required|integer',
            'status' => 'required|in:Draft,Published',
            'video_demo_path' => 'nullable|file|mimes:mp4|max:51200', // 50MB max
            'description' => 'nullable|string|max:5000',
        ]);


          $courseFolder = Str::slug(
        $request->title . '-' .
        $request->course_name . '-' .
        $request->universty_name . '-' .
        $request->year . '-' .
        $request->country . '-' .
        $request->city
    );



        $storeFile = function ($fileInput, $typeSuffix) use ($request, $courseFolder) {
            if ($request->hasFile($fileInput)) {
                try {
                    $file = $request->file($fileInput);
                    $filename = time() . "_{$typeSuffix}." . $file->getClientOriginalExtension();
                    $folder = public_path("admin/uploads/{$courseFolder}/solutions/{$typeSuffix}");

                    if (!file_exists($folder)) {
                        mkdir($folder, 0755, true);
                    }

                    $file->move($folder, $filename);
                    return "admin/uploads/{$courseFolder}/solutions/{$typeSuffix}/{$filename}";
                } catch (\Exception $e) {
                    \Log::error("❌ Failed to upload {$fileInput}: " . $e->getMessage());
                    return null;
                }
            }
            return null;
        };

       $videoPath = $storeFile('video_demo_path', 'video_demo');
if (!$videoPath && $request->hasFile('video_demo_path')) {
    return redirect()->back()->with('error', '❌ Failed to upload video file. Please try again.');
}


        $slugSource = implode('-', [
            $request->title,
            $request->course_name,
            $request->universty_name,
            $request->year,
            $request->country,
            $request->city
        ]);

        $solution = new Solution();
        $solution->title = $request->title;
        $solution->course_name = $request->course_name;
        $solution->universty_name = $request->universty_name;
        $solution->year = $request->year;
        $solution->country = $request->country;
        $solution->city = $request->city;
        $solution->slug = Str::slug($slugSource);
        $solution->subject_area = $request->subject_area;
        $solution->problem_statement = $request->problem_statement;
        $solution->keywords = $request->keywords;
        $solution->has_tutorial_session = $request->has_tutorial_session;
        $solution->price = $request->price;
        $solution->download_limit = $request->download_limit;
        $solution->status = $request->status;
        $solution->description = $request->description;

        $solution->video_demo_path = $videoPath;

        $solution->source_code_path = $storeFile('source_code_path', 'source_code');
        $solution->walkthrough_path = $storeFile('walkthrough_path', 'walkthrough');
        $solution->report_path = $storeFile('report_path', 'report');
        $solution->preview_image = $storeFile('preview_image', 'preview');

        $solution->save();

        return redirect()->back()->with('success', '✅ Solution added successfully!');
    }

    public function edit($id)
    {
        $solution = Solution::findOrFail($id);
        $universities = Universty::all();
        $countries = Country::all();
        $years = range(2005, now()->year);

        return view('admin.Solutions.edit_solution', compact('solution','universities','years','countries'));
    }

    public function destroy($id)
    {
        $solution = Solution::findOrFail($id);

        $fileFields = [
            'source_code_path',
            'video_demo_path',
            'walkthrough_path',
            'report_path',
            'preview_image'
        ];

        foreach ($fileFields as $field) {
            if ($solution->$field && file_exists(public_path($solution->$field))) {
                @unlink(public_path($solution->$field));
            }
        }

        $solution->delete();

        return redirect()->back()->with('success', '✅ Solution deleted successfully!');
    }

    // public function custom_solution_list(){
    //     $customSolutions = CustomSolution::all();
    //     // dd($customSolutions);
    //     return view('admin.Custom_Solutions.index', compact('customSolutions'));
    // }

    public function updateStep(Request $request, $id)
    {
        $solution = CustomSolution::findOrFail($id);
        $step = $request->input('step');

        if ($step == 2) {
            return response()->json(['modal' => 'price', 'id' => $solution->id]);
        } elseif ($step == 3) {
            return response()->json(['modal' => 'solution', 'id' => $solution->id]);
        }

        $solution->step = $step;
        $solution->save();

        return response()->json(['success' => true]);
    }

    public function updatePrice(Request $request, $id)
    {
        $request->validate([
            'price' => 'required|numeric|min:1'
        ]);

        $solution = CustomSolution::findOrFail($id);
        $solution->step = 2;
        $solution->price = $request->price;
        $solution->status = 'awaiting_payment';
        $solution->save();

        return redirect()->back()->with('success', 'Price updated.');
    }

    public function uploadSolutionFile(Request $request, $id)
    {
        $request->validate([
            'solution_file' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png',
        ]);

        $solution = CustomSolution::findOrFail($id);

        $file = $request->file('solution_file');
        $typeSuffix = 'solution';
        $courseFolder = 'general';
        $filename = time() . "_{$typeSuffix}." . $file->getClientOriginalExtension();
        $folder = public_path("assets/uploads/solutions/{$typeSuffix}");

        if (!file_exists($folder)) {
            mkdir($folder, 0755, true);
        }

        $file->move($folder, $filename);

        $solution->step = 3;
        $solution->solution_file = "assets/uploads/solutions/{$typeSuffix}/{$filename}";
        $solution->status = 'completed';
        $solution->save();

        return redirect()->back()->with('success', 'Solution uploaded.');
    }
    public function custom_solution_list_review()
    {
        $customSolutions = CustomSolution::where('step', '1')->get();
        return view('admin.Custom_Solutions.index', compact('customSolutions'));
    }

    public function custom_solution_list_payment()
    {
        $customSolutions = CustomSolution::where('step', '2')->get();
        return view('admin.Custom_Solutions.payment', compact('customSolutions'));
    }

    public function custom_solution_list_solutions()
    {
        $customSolutions = CustomSolution::where('step', '3')->get();
        return view('admin.Custom_Solutions.solution', compact('customSolutions'));
    }

    public function setPrice(Request $request, $id)
    {
        $request->validate([
            'price' => 'required|numeric|min:0',
        ]);

        $solution = CustomSolution::findOrFail($id);
        $solution->price = $request->price;
        $solution->status = 'awaiting_payment';
        $solution->step = 2;
        $solution->save();

        return back()->with('success', 'Price set successfully.');
    }

    public function uploadSolution(Request $request, $id)
    {
        $request->validate([
            'solution_file' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:20480',
        ]);

        $solution = CustomSolution::findOrFail($id);

        $ext = $request->file('solution_file')->getClientOriginalExtension();
        $filename = 'solution_' . time() . '.' . $ext;
        $courseFolder = 'course_' . $solution->course_id; // Adjust if needed
        $path = public_path("admin/uploads/{$courseFolder}/solutions/");

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $request->file('solution_file')->move($path, $filename);

        $solution->solution_file = "admin/uploads/{$courseFolder}/solutions/{$filename}";
        $solution->step = 3;
        $solution->status = 'paid';
        $solution->save();

        return redirect()->back()->with('success', 'Solution file uploaded successfully.');
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'course_name' => 'required|string|max:255',
        'universty_name' => 'required',
        'year' => 'required|integer',
        'country' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'subject_area' => 'required|string|max:255',
        'problem_statement' => 'required|string',
        'keywords' => 'required|string',
        'source_code_path' => 'nullable|file|mimes:zip|max:51200',
        'walkthrough_path' => 'nullable|file|mimes:pdf',
        'report_path' => 'nullable|file|mimes:pdf|max:51200',
        'preview_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        'has_tutorial_session' => 'required|boolean',
        'price' => 'required|numeric',
        'download_limit' => 'required|integer',
        'status' => 'required|in:Draft,Published',
    ]);

    $solution = Solution::findOrFail($id);

    // update basic fields
    $solution->title = $request->title;
    $solution->course_name = $request->course_name;
    $solution->universty_name = $request->universty_name;
    $solution->year = $request->year;
    $solution->country = $request->country;
    $solution->city = $request->city;
    $solution->subject_area = $request->subject_area;
    $solution->problem_statement = $request->problem_statement;
    $solution->keywords = $request->keywords;
    $solution->has_tutorial_session = $request->has_tutorial_session;
    $solution->price = $request->price;
    $solution->download_limit = $request->download_limit;
    $solution->status = $request->status;

    // re-generate slug
    $slugSource = implode('-', [
        $request->title,
        $request->course_name,
        $request->universty_name,
        $request->year,
        $request->country,
        $request->city
    ]);
    $solution->slug = \Illuminate\Support\Str::slug($slugSource);

    // handle file uploads (reuse your $storeFile logic from store())
    $courseFolder = Str::slug($slugSource);

    $storeFile = function ($fileInput, $typeSuffix) use ($request, $courseFolder) {
        if ($request->hasFile($fileInput)) {
            $file = $request->file($fileInput);
            $filename = time() . "_{$typeSuffix}." . $file->getClientOriginalExtension();
            $folder = public_path("admin/uploads/{$courseFolder}/solutions/{$typeSuffix}");
            if (!file_exists($folder)) {
                mkdir($folder, 0755, true);
            }
            $file->move($folder, $filename);
            return "admin/uploads/{$courseFolder}/solutions/{$typeSuffix}/{$filename}";
        }
        return null;
    };

    if ($path = $storeFile('source_code_path', 'source_code')) {
        $solution->source_code_path = $path;
    }
    if ($path = $storeFile('walkthrough_path', 'walkthrough')) {
        $solution->walkthrough_path = $path;
    }
    if ($path = $storeFile('report_path', 'report')) {
        $solution->report_path = $path;
    }
    if ($path = $storeFile('preview_image', 'preview')) {
        $solution->preview_image = $path;
    }

    $solution->save();

    return redirect()->route('solutions.index')->with('success', '✅ Solution updated successfully!');
}

}
