<?php
namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Student;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $student = Student::where('email', $googleUser->getEmail())->first();

            if (!$student) {
                $student = Student::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'is_verified' => 1,
                    'password' => bcrypt(str()->random(16)), // dummy password
                ]);
            }

            Auth::guard('student')->login($student);

            return redirect()->route('student.dashboard');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Failed to login with Google.');
        }
    }
}