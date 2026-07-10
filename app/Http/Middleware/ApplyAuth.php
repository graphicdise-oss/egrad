<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApplyAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('apply_logged_in')) {
            return redirect('/loginapply');
        }
        return $next($request);
    }
}
