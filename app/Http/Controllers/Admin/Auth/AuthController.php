<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view("admin.login");
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin_dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function edit()
    {
        $user = Auth::user();
        return view('admin.admin-profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'job' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'about' => 'nullable|string',
        ]);

        $user->update($validated);

        return back()->with('success', 'Profile updated successfully!');
    }

  public function updateProfileImage(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'profile_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Ensure storage link exists
    if (!file_exists(public_path('storage'))) {
        \Artisan::call('storage:link');
    }

    // Delete old image if exists
    if ($user->profile_image && file_exists(public_path('storage/' . $user->profile_image))) {
        unlink(public_path('storage/' . $user->profile_image));
    }

    // Generate unique file name
    $filename = 'user_' . $user->id . '_' . time() . '.' . $request->file('profile_image')->getClientOriginalExtension();

    // Store in storage/app/public/uploads/profile
    $path = $request->file('profile_image')->storeAs('uploads/profile', $filename, 'public');

    // Save only relative path (without "storage/")
    $user->update([
        'profile_image' => $path
    ]);

    return back()->with('success', 'Profile image updated successfully!');
}

 public function deleteProfileImage(Request $request)
{
    $user = Auth::user();

    if ($user->profile_image && file_exists(public_path('storage/' . $user->profile_image))) {
        unlink(public_path('storage/' . $user->profile_image));
    }

    $user->update(['profile_image' => null]);

    return back()->with('success', 'Profile image removed successfully!');
}


    public function changePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:6',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->update([
            'password' => $request->new_password, // auto-hashed by User model
        ]);

        return back()->with('success', 'Password changed successfully!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('main');
    }
}
