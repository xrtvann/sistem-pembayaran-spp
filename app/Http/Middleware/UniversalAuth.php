<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UniversalAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Admin atau petugas
        if (Auth::check()) {
            return $next($request);
        }

        // Siswa manual login via session
        if ($request->session()->has('siswa')) {
            return $next($request);
        }

        // Jika tidak ada yang login
        return redirect()->route('login')->withErrors(['error' => 'Silakan login terlebih dahulu.']);
    }
}
