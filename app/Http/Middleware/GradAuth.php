<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GradAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('grad_logged_in')) {
            return redirect()->route('grad.login');
        }
        return $next($request);
    }
}
