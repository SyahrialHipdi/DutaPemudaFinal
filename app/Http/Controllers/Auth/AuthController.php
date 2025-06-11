<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Admin;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // $user = auth()->user();
            $user = Auth::user();
            $request->session()->regenerate();
            return match ($user->role) {
                'admin' => redirect()->intended('/admin/dashboard'),
                'verifikator' => redirect()->intended('/verifikator/dashboard'),
                'juri' => redirect()->intended('/juri/dashboard'),
                'peserta' => redirect()->intended('/peserta/dashboard'),
                default => redirect('/peserta/dashboard')
            };
        }

        return back()->withErrors([
            'email' => 'Credentials do not match our records.',
            // 'password' => 'Email/Username atau password salah',
        ]);
    }
}
