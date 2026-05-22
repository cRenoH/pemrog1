<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $emailInput = $request->input('email');
    $passwordInput = $request->input('password');
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);
    // Cari user berdasarkan email
    $user = User::where('email', $emailInput)->first();
    // Cek apakah user ditemukan dan password cocok
    if ($user && Hash::check($passwordInput, $user->password)) {
        // Simpan email user ke session (gunakan key yang konsisten)
        $request->session()->put('user_email', $user->email);
        // Login user secara manual
        Auth::login($user);
        // Cek apakah user adalah admin
        if ($user->is_admin ?? false) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('home')->with('success', "Login berhasil! Selamat datang, {$user->name}");
    }
    // Jika gagal, kembali ke halaman login dengan pesan error.
    return back()->with('error', 'Email atau password yang Anda masukkan salah!');
    }

    public function logout(Request $request)
    {
        // Hapus semua data dari session untuk keamanan dan kebersihan.
        $request->session()->flush();
        // Arahkan pengguna kembali ke halaman utama dengan pesan sukses.
        return redirect()->route('home')->with('success', 'Anda telah berhasil logout.');
    }
}
