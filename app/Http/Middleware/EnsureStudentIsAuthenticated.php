<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EnsureStudentIsAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
        public function handle(Request $request, Closure $next)
        {
            if (!Auth::guard('student')->check()) {
                session(['url.intended' => url()->full()]);
                return redirect()->route('login')->with('error', 'You must be logged in to continue.');
            }

            return $next($request);
        }
}
