<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Lomba;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Komponen;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.user.dashboard');
    }

    
    public function dashboard(){
        $users = User::all();
        return view('admin.user.dashboard', compact('users'));
    }

    public function create()
{
    $lombas = Lomba::all();
    return view('admin.user.create', compact('lombas'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'email' => 'required|email|unique:users,email',
        'password' => 'required',
        'role' => 'required|in:admin,juri,verifikator,peserta',
        'lomba_id' => 'nullable|array',
        'lomba_id.*' => 'exists:lombas,id',
    ]);

    // Simpan user
    $user = User::create([
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'role' => $validated['role'],
    ]);

    // Tambahkan ke relasi jika juri/peserta
    if ($user->role === 'juri') {
        $user->lombaDijuri()->attach($validated['lomba_id'] ?? []);
    } elseif ($user->role === 'peserta') {
        $user->lombaDiikuti()->attach($validated['lomba_id'] ?? []);
    }

    return redirect()->route('admin.user.create')->with('success', 'User berhasil ditambahkan');
}

    
    // public function lomba(){
    //     $lombas = Lomba::all();
    //     return view('admin.data_lomba', compact('lombas'));
    // }

    // public function lombaTambah(){
    //     return view('admin.tambah_lomba');
    // }

    // public function lombaShow($id){
    //     $komponen = Lomba::findOrFail($id);
    //     return view('admin.show_lomba', compact('komponen'));
    // }

    // public function lombaCreate(Request $request)
    // {
    //     $request->validate([
    //         // 'nama' => 'required|string|max:255',
    //         // 'tahun' => 'required|string|max:255|unique:admins',
    //         // 'deskripsi' => 'required|string|',
    //     ]);

    //     $lomba = Lomba::create([
    //         'nama_lomba' => $request->nama,
    //         'tahun' => $request->tahun,
    //         'deskripsi' => $request->deskripsi,
    //     ]);

    //     // Auth::guard('admin')->login($admin);

    //     return redirect('/admin/data_lomba');
    // }
}
