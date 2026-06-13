<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // ← TAMBAHKAN INI

class AuthController extends Controller
{
    // menampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // memproses login
    public function login(Request $request)
    {
        $akun = $request->validate([
            'email' => 'required|email',    // ← ganti 'username' jadi 'email'
            'password' => 'required'
        ]);

        // cek kecocokan data database
        if (Auth::attempt($akun)) {
            // buat session
            $request->session()->regenerate();
            return redirect()->route('products.index'); // ← 'products' (plural)
        }

        // jika email/password salah, kembalikan ke login dengan pesan error
        return back()->withErrors([
            'login-error' => 'Login Gagal! Pastikan email dan password benar.' // ← sesuaikan key
        ])->withInput(); // ← tambahkan withInput() agar email tetap terisi
    }

    // proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}