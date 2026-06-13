<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //menampilkan halaman login
    public function showLogin(){
        return view('login');
    }
    // memproses login
    public function login(Request $request){
        $akun = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        // cek kecocokan data database
        if(Auth::attempt($akun)){
            // buat session
            $request->session()->regenerate();
            return redirect()->route('product.index');
        }
        // jika email/password salah, kemabalikan ke login dengan pesan error
        return back()->withErrors([
            'loginError' => 'Login Gagal! Pastikan username dan password benar.'
        ]);
    }
    // proses logout
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
