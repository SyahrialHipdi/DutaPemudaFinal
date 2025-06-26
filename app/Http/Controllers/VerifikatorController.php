<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LombaPeserta;
use Illuminate\Http\Request;

class VerifikatorController extends Controller
{
    public function index()
    {
        // Menampilkan semua peserta yang sudah mendaftar
        $peserta = LombaPeserta::with(['user', 'lomba'])->get();
        return view('verifikator.index', compact('peserta'));
    }

    public function store($id)
    {
        $peserta = LombaPeserta::findOrFail($id);
        $peserta->update([
            'status' => 'proses'
        ]);

        return back()->with('success', 'Peserta berhasil diverifikasi.');
    }

    public function tolak(Request $request, $id)
    {
        $peserta = LombaPeserta::findOrFail($id);
        $peserta->update([
            'status' => 'ditolak',
            'alasan' => $request->alasan,
        ]);

        return back()->with('success', 'Peserta berhasil diverifikasi.');
    }
}
