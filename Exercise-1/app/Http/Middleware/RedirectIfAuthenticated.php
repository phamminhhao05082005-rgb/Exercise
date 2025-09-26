<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (Auth::check()) {
            // nếu đã login, chuyển hướng theo role
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('users.index');
            } else {
                return redirect()->route('users.employee');
            }
        }

        return $next($request);
    }
}
