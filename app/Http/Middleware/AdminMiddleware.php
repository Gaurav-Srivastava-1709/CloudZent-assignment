<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is logged in and is admin
        if (auth()->check() && auth()->user()->is_admin) {
            return $next($request);
        }

        // If not admin → block access
        abort(403, 'Unauthorized access. Admins only.');
    }
}
