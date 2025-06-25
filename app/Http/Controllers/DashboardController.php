<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function show(Request $request)
    {
        // Cek apakah siswa login via session
        if (session()->has('siswa')) {
            $siswa = session('siswa');
            return view('dashboard.dashboard', compact('siswa'));
        }

        // Cek apakah admin/petugas login via Auth
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return view('dashboard.dashboard', compact('user'));
            }
        }

        // Kalau tidak ada yang login
        return redirect()->route('login')->withErrors(['error' => 'Akses ditolak. Silakan login.']);
    }
}
