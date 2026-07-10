<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class GradOrStdAuth
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('gradstdauth')->check() || Auth::guard('gradauth')->check()) {
            return $next($request);
        }

        return redirect()->route('stdlogin.form');
    }
}
