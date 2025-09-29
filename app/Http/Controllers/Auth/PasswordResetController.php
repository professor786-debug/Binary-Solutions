<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use App\Mail\ResetPasswordMail;

class PasswordResetController extends Controller
{
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:students,email'
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            ['token' => $token, 'created_at' => Carbon::now()]
        );

        $link = url('/new-password?token=' . $token . '&email=' . urlencode($request->email));

        // ✅ Send using Mailable
        Mail::to($request->email)->send(new ResetPasswordMail($link));

        return response()->json(['success' => true, 'message' => 'Reset link sent to your email..']);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email'    => 'required|email|exists:students,email',
            'token'    => 'required',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $reset = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if (!$reset) {
            return response()->json(['success' => false, 'message' => 'Invalid or expired token'], 400);
        }

        Student::where('email', $request->email)->update([
            'password' => Hash::make($request->password)
        ]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return response()->json(['success' => true, 'message' => 'Password has been reset successfully']);
    }
}
