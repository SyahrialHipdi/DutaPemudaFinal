<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.admin.login');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    if (Auth::guard('admin')->attempt($credentials)) {
        $request->session()->regenerate();
        
        return match(auth('admin')->user()->role) {
            'admin' => redirect()->intended('/admin/dashboard'),
            'verifikator' => redirect()->intended('/verifikator/dashboard'),
            'juri' => redirect()->intended('/juri/dashboard'),
            default => redirect('/admin/dashboard')
        };
    }

    return back()->withErrors([
        'username' => 'Credentials do not match our records.',
    ]);
}
    public function showRegisterForm()
    {
        return view('auth.admin.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:admins',
            'role' => 'required|string|',
            'password' => 'required|string|',
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        // Auth::guard('admin')->login($admin);

        return redirect('/admin/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
}