<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Lomba;
use App\Models\User;
use App\Models\Sertifikat;
use Illuminate\Support\Facades\Hash;
use App\Models\Komponen;
use App\Models\penilaian;

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

public function daftarLomba()
    {
        $lombas = Lomba::all();
        return view('admin.ranking.daftar-lomba', compact('lombas'));
    }

    // public function rankingLomba(Lomba $lomba)
    // {
    //     $penilaians = $lomba->penilaians()->with('peserta')->get();

    //     $pesertaNilai = [];

    //     foreach ($penilaians as $penilaian) {
    //         $nilaiArray = is_array($penilaian->nilai) ? $penilaian->nilai : json_decode($penilaian->nilai, true);
    //         if (!$nilaiArray) continue;

    //         $total = array_sum($nilaiArray);
    //         $count = count($nilaiArray);
    //         $avg = $count > 0 ? $total / $count : 0;

    //         $id = $penilaian->peserta_id;

    //         // Jika peserta sudah ada, gunakan nilai tertinggi (atau update strategi akumulasi lain)
    //         if (!isset($pesertaNilai[$id])) {
    //             $pesertaNilai[$id] = [
    //                 'nama' => $penilaian->peserta->name ?? 'Peserta #' . $id,
    //                 'total' => $avg,
    //                 'count' => 1,
    //             ];
    //         } else {
    //             $pesertaNilai[$id]['total'] += $avg;
    //             $pesertaNilai[$id]['count']++;
    //         }
    //     }

    //     $ranking = [];
    //     foreach ($pesertaNilai as $pesertaId => $data) {
    //         $rata = $data['count'] > 0 ? $data['total'] / $data['count'] : 0;
    //         $ranking[] = [
    //             'peserta_id' => $pesertaId,
    //             'nama' => $data['nama'],
    //             'rata_rata' => round($rata, 2),
    //         ];
    //     }

    //     // Urutkan berdasarkan rata-rata tertinggi
    //     usort($ranking, fn($a, $b) => $b['rata_rata'] <=> $a['rata_rata']);

    //     return view('admin.ranking.lihat', compact('lomba', 'ranking'));
    // }


    public function rankingLomba($lombaId)
{
    $penilaians = Penilaian::where('lomba_id', $lombaId)->get();
    $lombaaa = Penilaian::where('lomba_id', $lombaId)->first();

    $pesertaNilai = [];

    foreach ($penilaians as $penilaian) {
        $pesertaId = $penilaian->peserta_id;
        $nilaiArray = $penilaian->nilai;

        if (!isset($pesertaNilai[$pesertaId])) {
            $pesertaNilai[$pesertaId] = [
                'total' => 0,
                'count' => 0,
                'nama' => $penilaian->peserta->email ?? 'Peserta #' . $pesertaId,
                'user_id' => $penilaian->peserta_id??null ,
            ];
        }

        if (is_array($nilaiArray)) {
            $pesertaNilai[$pesertaId]['total'] += array_sum($nilaiArray);
            $pesertaNilai[$pesertaId]['count'] += count($nilaiArray);
        }
    }

    // Hitung rata-rata dan simpan
    $ranking = [];
    foreach ($pesertaNilai as $pesertaId => $data) {
        $hasSertifikat = Sertifikat::where('user_id', $data['user_id'] ?? null)
        ->where('lomba_id', $lombaId)
        ->exists();
        $rata = $data['count'] > 0 ? $data['total'] / $data['count'] : 0;
        $ranking[] = [
            'peserta_id' => $pesertaId,
            'nama' => $data['nama'],
            'rata_rata' => round($rata, 2),
            'has_sertifikat' =>$hasSertifikat,
        ];
    }

    // Urutkan dari rata-rata tertinggi
    usort($ranking, fn($a, $b) => $b['rata_rata'] <=> $a['rata_rata']);
    // @dd($ranking);
    return view('admin.ranking.show', compact('ranking','lombaaa'));
}

}
