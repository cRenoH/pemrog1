<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $credentials['email'])->first();

        // Cek apakah user ditemukan dan password cocok
        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Login user menggunakan Laravel Auth (session otomatis dikelola)
            Auth::login($user);

            // Cek apakah user adalah admin
            if ($user->is_admin ?? false) {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('home')->with('success', "Login berhasil! Selamat datang, {$user->first_name}");
        }

        // Jika gagal, kembali ke halaman login dengan pesan error.
        return back()->with('error', 'Email atau password yang Anda masukkan salah!');
    }

    public function logout(Request $request)
    {
        // Logout menggunakan Laravel Auth
        Auth::logout();

        // Invalidate session dan regenerate token untuk keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Arahkan pengguna kembali ke halaman utama dengan pesan sukses.
        return redirect()->route('home')->with('success', 'Anda telah berhasil logout.');
    }
}
