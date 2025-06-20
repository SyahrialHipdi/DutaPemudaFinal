<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class PesertaController extends Controller
{

    public function index(User $user)
    {
        return view('peserta.index', compact('user'));
    }

    public function show(User $user)
    {
        // $user = User::findOrFail($id);
        // $user = User::with(['provinsiWilayah', 'kabupatenWilayah', 'kecamatanWilayah','desaWilayah'])->get();
        // $user = User::();
        return view('peserta.show', compact('user'));
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        // $peserta = User::findOrFail($id);
        return view('peserta.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        // $request->validate([
        //     'password' =>  'confirmed|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z\d]).+$/',
        // ]);

        // $peserta = User::findOrFail($id);
        $user->update($request->only('password'));

        return redirect()->route('peserta.index')->with('berhasil', 'Password berhasil diperbarui.');
    }

    public function progress(Request $request)
    {
        $user = Auth::user(); // user yang sedang login
        $lombas = $user->lombas; // ambil relasi lomba dari user

        return view('peserta.progress', compact('lombas'));
    }
}
