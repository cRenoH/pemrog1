<?php

namespace App\Http;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || !(auth()->user()->is_admin ?? false)) {
            abort(403, 'Unauthorized. Admin only.');
        }
        return $next($request);
    }
} 