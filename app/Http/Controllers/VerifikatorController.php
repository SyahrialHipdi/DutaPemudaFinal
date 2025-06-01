<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VerifikatorController extends Controller
{
     public function dashboard(){
        return view('verifikator.dashboard');
    }

    public function index()
    {

        
        $peserta = User::where('status', '!=', 'deleted')->get();
        return view('verifikator.peserta.index', compact('peserta'));
    }

    public function verify(User $user)
    {
        $user->update([
            'status' => 'verified',
            'verified_at' => now(),
            'verified_by' => auth('admin')->id()
        ]);
        
        return back()->with('success', 'Peserta berhasil diverifikasi');
    }

    public function reject(Request $request, User $user)
    {
        $request->validate(['alasan' => 'required|string|max:255']);
        
        $user->update([
            'status' => 'rejected',
            'rejection_reason' => $request->alasan
        ]);
        
        return back()->with('success', 'Peserta berhasil ditolak');
    }

    // app/Http/Controllers/VerifikatorController.php
public function show(User $user)
{
    // $berkas = $user->documents; // Jika ada relasi dokumen
    // $aktivitas = $user->activities()->latest()->take(5)->get();
    
    return view('verifikator.peserta.show', compact('user'));
}
}