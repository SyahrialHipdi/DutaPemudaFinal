<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VerifikatorController extends Controller
{
    public function dashboard()
    {
        // Ambil statistik untuk ditampilkan di dashboard
        // $stats = [
        //     'total' => User::where('role', 'peserta')->count(),
        //     'menunggu' => User::where('role', 'peserta')->where('status', 'menunggu')->count(),
        //     'diverifikasi' => User::where('role', 'peserta')->where('status', 'verified')->count(),
        //     'ditolak' => User::where('role', 'peserta')->where('status', 'rejected')->count(),
        // ];

        // // Ambil 5 peserta terbaru yang butuh verifikasi
        // $peserta_terbaru = User::where('role', 'peserta')
        //     ->where('status', 'menunggu')
        //     ->latest()
        //     ->take(5)
        //     ->get();

        // return view('verifikator.dashboard', compact('stats', 'peserta_terbaru'));
        return view('verifikator.dashboard');
    }

    public function index()
    {
        // Mengambil semua peserta yang relevan (bukan juri atau admin)
        $peserta = User::where('role', 'peserta')->latest()->get();
        return view('verifikator.peserta.index', compact('peserta'));
    }

    public function show(User $user)
    {
        // Decode data isian agar bisa diakses sebagai array di view
        if (is_string($user->data_isian)) {
            $user->data_isian = json_decode($user->data_isian, true) ?? [];
        }
        return view('verifikator.peserta.show', compact('user'));
    }

    public function verify(User $user)
    {
        $user->update([
            'status' => 'verified',
        ]);

        return back()->with('success', 'Peserta berhasil diverifikasi.');
    }

    public function reject(Request $request, User $user)
    {
        $request->validate(['alasan_penolakan' => 'required|string|max:500']);

        $user->update([
            'status' => 'rejected',
            'alasan_penolakan' => $request->alasan_penolakan,
        ]);

        return back()->with('success', 'Peserta berhasil ditolak dengan alasan yang tersimpan.');
    }
}
