<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                'juri' => redirect()->intended('/juri/index'),
                'peserta' => redirect()->intended('/peserta/index'),
                default => redirect('/peserta/index')
            };
        }

        return back()->withErrors([
            'email' => 'Credentials do not match our records.',
            // 'password' => 'Email/Username atau password salah',
        ]);
    }

    public function index()
    {
        return view('landing-page');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Berhasil logout');
    }
}
