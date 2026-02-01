<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if admin is authenticated via session
        if (!$request->session()->get('admin_authenticated')) {
            return redirect()->route('admin.login')->with('error', 'Моля, влезте в системата.');
        }

        return $next($request);
    }
}
