<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Peserta;
use App\Models\Sertifikat;
use App\Models\LombaPeserta;
use Illuminate\Support\Facades\Auth;


class PesertaController extends Controller
{

    public function index(User $user)
    {
        // $user = User::findOrFail($id);
        // $user = User::with(['provinsiWilayah', 'kabupatenWilayah', 'kecamatanWilayah','desaWilayah'])->get();
        // $user = User::();
        $peserta = Peserta::with('user')->where('Id_user', Auth::user()->id)->first();
        return view('peserta.index', compact('peserta'));
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
        $request->validate([
            'password' =>  'confirmed|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z\d]).+$/',
        ]);

        // $peserta = User::findOrFail($id);
        $user->update($request->only('password'));

        return redirect()->route('peserta.index')->with('berhasil', 'Password berhasil diperbarui.');
    }

    public function progress(Request $request)
    {
        $user = Auth::user(); // user yang sedang login
        $sertifikats = Sertifikat::where('user_id', Auth::user()->id)->first();
        $lombas = $user->lombaDiikuti; // ambil relasi lomba dari user

        return view('peserta.progress', compact('lombas', 'sertifikats'));
    }

    // public function download($id)
    // {
    //     // $sertifikat = Sertifikat::where('id', $id)
    //     //     ->where('user_id', Auth::user()->id) // agar user hanya bisa unduh sertifikat miliknya
    //     //     ->firstOrFail();

    //     // $sertifikat = Sertifikat::where('user_id', $id)->get();
    //     $sertifikat = Sertifikat::where('user_id', Auth::user()->id)->first();
    //     // dd($sertifikat->file_path);
    //     if (!$sertifikat) {
    //         return abort(404, 'Sertifikat tidak ditemukan atau bukan milikmu.');
    //     }

    //     return response()->download(storage_path('app/public/' . $sertifikat->file_path));
    // }
}
