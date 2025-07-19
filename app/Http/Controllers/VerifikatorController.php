<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Peserta;
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

        return back()->with('success', 'Peserta berhasil ditolak.');
    }

    public function terima(Request $request, $id)
    {
        $pendaftaran = LombaPeserta::findOrFail($id);
        $pendaftaran->status = 'proses';
        $pendaftaran->save();

        return redirect('verifikator/index')->with('success', 'Peserta berhasil diverifikasi.');
    }

    public function detail($id)
    {
        $detail = LombaPeserta::with('peserta')->find($id);;
        return view('verifikator.show', compact('detail'));
        // dd($peserta);
    }
}
