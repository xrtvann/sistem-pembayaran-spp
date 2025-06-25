<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $tipe = $request->input('tipe_login');

        // ==== LOGIN SISWA ====
        if ($tipe === 'siswa') {
            $request->validate([
                'nisn'     => 'required',
                'password' => 'required',
            ]);

            $siswa = Siswa::where('nisn', $request->nisn)->first();

            if (!$siswa) {
                return back()->withErrors(['nisn' => 'NISN tidak ditemukan']);
            }

            if ($request->password !== $siswa->nisn) {
                return back()->withErrors(['password' => 'Password salah']);
            }

            // ✅ Pastikan tidak ada admin/petugas yang masih login
            if (Auth::check()) {
                Auth::logout();
            }

            // ✅ Simpan sesi siswa
            session(['siswa' => $siswa]);

            return redirect()->route('dashboard');
        }

        // ==== LOGIN ADMIN / PETUGAS ====
        if ($tipe === 'admin') {
            $request->validate([
                'email'    => 'required|email',
                'password' => 'required',
            ]);

            // ✅ Pastikan tidak ada sesi siswa aktif
            $request->session()->forget('siswa');

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                return redirect()->intended('/dashboard');
            }

            return back()->withErrors(['email' => 'Email atau password salah']);
        }

        return back()->withErrors(['error' => 'Tipe login tidak valid.']);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    public function logout(Request $request)
    {
        // ✅ Logout admin/petugas
        if (Auth::check()) {
            Auth::logout();
        }

        // ✅ Hapus sesi siswa
        $request->session()->forget('siswa');

        return redirect()->route('login');
    }
}
