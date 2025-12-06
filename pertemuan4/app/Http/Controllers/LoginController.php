<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function index()
    {
        return view('login.index', [
            'title' => 'Masuk',
            'active' => 'login'
        ]);
    }

    // Menangani proses autentikasi login
    public function authenticate(Request $request)
    {
        // Validasi input username dan password
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Mencoba login dengan kredensial yang diberikan
        if (Auth::attempt($credentials)) {
            // Regenerasi session untuk keamanan
            $request->session()->regenerate();

            // Redirect ke halaman dashboard jika berhasil
            return redirect()->intended('/dashboard');
        }

        // Kembali ke halaman login dengan pesan error jika gagal
        return back()->with('loginError', 'Login gagal!');
    }

    // Menangani proses logout
    public function logout(Request $request)
    {
        // Logout user
        Auth::logout();

        // Invalidasi session
        $request->session()->invalidate();

        // Regenerasi token CSRF
        $request->session()->regenerateToken();

        // Redirect ke halaman utama
        return redirect('/');
    }
}
