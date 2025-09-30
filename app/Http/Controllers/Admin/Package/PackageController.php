<?php

namespace App\Http\Controllers\Admin\Package;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubscriptionPackage;
use Illuminate\Support\Facades\Hash;

class PackageController extends Controller
{
        public function index() {
        $packages = SubscriptionPackage::all();
        return view('admin.Packeges.packege_list', compact('packages'));
    }

     public function create(){
         return view('admin.Packeges.add_packege');
     }

  public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:100',
        'price' => 'required|numeric|min:0',
        'duration' => 'required|integer|min:1', // ✅ added
        'download_limit' => 'nullable|integer|min:0',
        'discount_percentage' => 'nullable|numeric|min:0|max:100',
        'one_on_one_sessions' => 'required|boolean',
        'description' => 'nullable|string|max:1000',
        'status' => 'required|boolean',
    ]);

    SubscriptionPackage::create([
        'name' => $request->name,
        'price' => $request->price,
        'duration' => $request->duration, // ✅ added
        'download_limit' => $request->download_limit,
        'discount_percentage' => $request->discount_percentage,
        'one_on_one_sessions' => $request->one_on_one_sessions,
        'description' => $request->description,
        'status' => $request->status,
    ]);

    return redirect()->route('package.index')->with('success', 'Package added successfully!');
}



    public function edit($id)
    {
        $package = SubscriptionPackage::findOrFail($id);
        return view('admin.Packeges.edit_packege', compact('package'));
    }

   public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:100',
        'price' => 'required|numeric|min:0',
        'duration' => 'required|integer|min:1', // ✅ updated
        'download_limit' => 'nullable|integer|min:0',
        'discount_percentage' => 'nullable|numeric|min:0|max:100',
        'one_on_one_sessions' => 'required|boolean',
        'description' => 'nullable|string|max:1000',
        'status' => 'required|boolean',
    ]);

    $package = SubscriptionPackage::findOrFail($id);

    $package->update([
        'name' => $request->name,
        'price' => $request->price,
        'duration' => $request->duration, // ✅ updated
        'download_limit' => $request->download_limit,
        'discount_percentage' => $request->discount_percentage,
        'one_on_one_sessions' => $request->one_on_one_sessions,
        'description' => $request->description,
        'status' => $request->status,
    ]);

    return redirect()->route('package.index')->with('success', 'Package updated successfully!');
}

    public function destroy($id)
    {
        $student = SubscriptionPackage::findOrFail($id);
        $student->delete();

        return redirect()->route('student.index')->with('success', 'Student deleted successfully.');
    }

}
