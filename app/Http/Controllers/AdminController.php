<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Show form to create a new admin.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store new admin.
     */
  public function store(Request $request)
{
    $validated = $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
        'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'company'  => 'nullable|string|max:255',
        'job'      => 'nullable|string|max:255',
        'country'  => 'nullable|string|max:255',
        'address'  => 'nullable|string|max:255',
        'phone'    => 'nullable|string|max:20',
        'about'    => 'nullable|string',
    ]);

    $imagePath = null;
    if ($request->hasFile('profile_image')) {
        $imagePath = $request->file('profile_image')->store('uploads/profiles', 'public');
    }

    User::create([
        'name'     => $validated['name'],
        'email'    => $validated['email'],
        'password' => Hash::make($validated['password']),
        'company'  => $validated['company'] ?? null,
        'job'      => $validated['job'] ?? null,
        'country'  => $validated['country'] ?? null,
        'address'  => $validated['address'] ?? null,
        'phone'    => $validated['phone'] ?? null,
        'about'    => $validated['about'] ?? null,
        'profile_image' => $imagePath,

    ]);

    return redirect()->route('admin_dashboard')->with('success', 'New admin created successfully!');
}

}
