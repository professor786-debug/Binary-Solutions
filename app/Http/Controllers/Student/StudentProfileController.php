<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentProfileController extends Controller
{
    /**
     * Return the currently authenticated student (robust across guards).
     */
    protected function getStudent()
    {
        // prefer student guard if available, otherwise fallback to default auth
        if (Auth::guard('student')->check()) {
            return Auth::guard('student')->user();
        }

        if (Auth::check()) {
            return Auth::user();
        }

        return null;
    }

    /**
     * Show profile page
     */
    public function profile()
    {
        $student = $this->getStudent();

        if (! $student) {
            abort(403, 'Unauthorized');
        }

        return view('student.profile', compact('student'));
    }

    /**
     * Update student profile (text fields)
     */
    public function updateProfile(Request $request)
    {
        $student = $this->getStudent();
        if (! $student) abort(403, 'Unauthorized');

        $request->validate([
            'full_name'  => 'nullable|string|max:255',
            'name'       => 'nullable|string|max:255',
            'university' => 'nullable|string|max:255',
            'country'    => 'nullable|string|max:255',
            'address'    => 'nullable|string|max:255',
            'contact_no' => 'nullable|string|max:20',
            'email'      => 'required|email|unique:students,email,' . $student->id,
            'about'      => 'nullable|string',
        ]);

        $student->update($request->only([
            'name',
            'full_name',
            'university',
            'country',
            'address',
            'contact_no',
            'email',
            'about',
        ]));

        return back()->with('success', 'Profile updated successfully.');
    }

    /**
     * Update profile image
     */
    public function updateProfileImage(Request $request)
    {
        $student = $this->getStudent();
        if (! $student) abort(403, 'Unauthorized');

        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // delete old image if exists
        if ($student->profile_image) {
            Storage::disk('public')->delete($student->profile_image);
        }

        $path = $request->file('profile_image')->store('profile_images', 'public');
        $student->update(['profile_image' => $path]);

        return back()->with('success', 'Profile image updated successfully.');
    }

    /**
     * Delete profile image
     */
    public function deleteProfileImage()
    {
        $student = $this->getStudent();
        if (! $student) abort(403, 'Unauthorized');

        if ($student->profile_image) {
            Storage::disk('public')->delete($student->profile_image);
            $student->update(['profile_image' => null]);
        }

        return back()->with('success', 'Profile image removed.');
    }

    /**
     * Change password
     */
    public function changePassword(Request $request)
    {
        $student = $this->getStudent();
        if (! $student) abort(403, 'Unauthorized');

        $request->validate([
            'current_password' => 'required',
            'new_password'     => 'required|min:6|confirmed',
        ]);

        if (! Hash::check($request->current_password, $student->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $student->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password changed successfully.');
    }
}
