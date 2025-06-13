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

    public function edit($id)
{
    $user = User::findOrFail($id);
    $lombas = Lomba::all(); // ambil semua data lomba

    return view('admin.user.edit', compact('user', 'lombas'));
}

    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $validated = $request->validate([
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|min:6',
        'role' => 'required|in:admin,juri,verifikator',
        'lomba_id' => 'nullable|array',
        'lomba_id.*' => 'exists:lombas,id',
    ]);

    $user->email = $validated['email'];
    $user->role = $validated['role'];

    // Update password jika diisi
    if (!empty($validated['password'])) {
        $user->password = Hash::make($validated['password']);
    }

    $user->save();

    // Update relasi lomba jika juri
    if ($user->role === 'juri') {
        $user->lombaDijuri()->sync($validated['lomba_id'] ?? []);
    } else {
        // Jika bukan juri, pastikan tidak ada relasi lombaDijuri tertinggal
        $user->lombaDijuri()->detach();
    }

    return redirect()->route('admin.user.edit', $user->id)->with('success', 'User berhasil diperbarui');
}

public function destroy($id)
    {
        $user = USer::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user.dashboard')->with('success', 'User dihapus.');
    }


}
