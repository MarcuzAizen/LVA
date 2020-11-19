<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role_id == 1) return $next($request);

        if (Auth::user()->role_id == 2) {
            return redirect()->route('registrar.home');
        }

        if (Auth::user()->role_id == 3) {
            return redirect()->route('enrollment_officer.home');
        }

        if (Auth::user()->role_id == 4) {
            return redirect()->route('principal.home');
        }

        if (Auth::user()->role_id == 5) {
            return redirect()->route('teacher.home');
        }
    }
}
