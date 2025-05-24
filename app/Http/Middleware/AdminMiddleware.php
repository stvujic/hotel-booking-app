<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        return Auth::check() && Auth::user()->is_admin
            ? $next($request)
            : abort(403, 'Access denied');
    }
}
