<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GradStdAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('gradstd_logged_in')) {
            return redirect()->route('gradstd.login');
        }
        return $next($request);
    }
}
