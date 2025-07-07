<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class GuruMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
     public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (auth()->user()->role === 'guru') {
            return $next($request);
        }

        return match (auth()->user()->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'siswa' => redirect()->route('siswa.dashboard'),
            default => redirect()->route('login'),
        };
    }
}
