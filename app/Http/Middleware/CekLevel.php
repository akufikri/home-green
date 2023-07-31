<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       $guards = empty($guards) ? [null] : $guards;

    foreach ($guards as $guard) {
        if (Auth::guard($guard)->check()) {
            if ($guard === 'admin') {
                return redirect()->route('dashboard'); // Ganti 'dashboard' dengan nama rute untuk halaman dashboard admin
            } else {
                return redirect('/'); // Ganti '/' dengan URL untuk halaman depan (front-end)
            }
        }
    }

    return $next($request);
    }
}