<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class PesertaController extends Controller
{
    
    public function show(User $user){
        // $user = User::findOrFail($id);
        // $user = User::with(['provinsiWilayah', 'kabupatenWilayah', 'kecamatanWilayah','desaWilayah'])->get();
        // $user = User::();
        return view('peserta.show',compact('user'));
    }
    public function edit($id)
    {
        $peserta = User::findOrFail($id);
        return view('peserta.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'password' =>  'confirmed|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z\d]).+$/',
        ]);

        $peserta = User::findOrFail($id);
        $peserta->update($request->only('password'));

        return redirect()->route('peserta.dashboard')->with('berhasil', 'Password berhasil diperbarui.');
    }
}
