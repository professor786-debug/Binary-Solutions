<?php

namespace App\Http\Controllers\Admin\Universty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Universty;

class UniverstyController extends Controller
{
    public function index() {
        $universities = Universty::all();
        $years = range(2005, now()->year);
        return view('admin.Universty.universty_list', compact('universities','years'));
    }
 
     public function create(){
         return view('admin.Universty.add_universty');
     }
 
     public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:1,2',
        ]);

        Universty::create($validated);

        return redirect()->back()->with('success', 'University added successfully.');
    }

    public function edit($id)
    {
        $university = Universty::findOrFail($id);
        return view('admin.Universty.edit_universty', compact('university'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:0,1'
        ]);

        $university = Universty::findOrFail($id);
        $university->update($request->all());

        return redirect()->route('universty.index')->with('success', 'University updated successfully.');
    }

    public function destroy($id)
    {
        $university = Universty::findOrFail($id);
        $university->delete();

        return redirect()->route('universty.index')->with('success', 'University deleted successfully.');
    }
}
