<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lomba;
use App\Models\User;
use App\Models\Peserta;
use App\Models\LombaPeserta;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class LombaPesertaController extends Controller
{
    public function index()
    {
        $lombas = Lomba::all();
        return view('lomba.index', compact('lombas'));
    }

    public function form($id)
    {
        $lomba = Lomba::findOrFail($id);
        return view('lomba.form', compact('lomba'));
    }

    public function submit(Request $request, $id)
    {
        $lomba = Lomba::findOrFail($id);

        // Cek
        $lombaId = $lomba->id;
        $user = Auth::id();
        // $data_isian = [];


        if (!Auth::check()) {
            // User belum login, validasi semua field
            $validated = $request->validate([
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:5',
                'nama' => 'required|string|max:255',
                'nik' => 'required|string|max:20|unique:pesertas,nik',
                'provinsi' => 'required',
                'kota' => 'required',
                'kecamatan' => 'required',
                'desa' => 'required',
                'rt_rw' => 'required',
                'alamat' => 'required|string|max:255',
                'kodepos' => 'required',
                'proposal' => 'nullable',
                'ktp' => 'required',
                'bidang_pilihan_id' => 'nullable',
                'lahir' => 'required',
            ]);

            // Buat user
            $user = User::create([
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'peserta',
            ]);

            // Simpan data peserta
            Peserta::create([
                'Id_user' => $user->id,
                'nama' => $validated['nama'],
                'nik' => $validated['nik'],
                'provinsi' => $validated['provinsi'],
                'kota' => $validated['kota'],
                'kecamatan' => $validated['kecamatan'],
                'desa' => $validated['desa'],
                'rt_rw' => $validated['rt_rw'],
                'alamat' => $validated['alamat'],
                'kodepos' => $validated['kodepos'],
                'ktp' => $validated['ktp'],
                'lahir' => $validated['lahir'],
            ]);

            Auth::login($user);
        } else {
            $validated = $request->validate([
                'proposal' => 'nullable',
                'bidang_pilihan_id' => 'nullable',
            ]);

            $user = Auth::user();
        }
        $bidangId = null;
        $bidangId = $validated['bidang_pilihan_id'] ?? null;

        // $sudahTerdaftar = LombaPeserta::where('user_id', $user->id)
        //     ->where('lomba_id', $lombaId)
        //     ->exists();

        // if ($sudahTerdaftar) {
        //     return back()->withErrors(['error' => 'Kamu sudah mendaftar ke lomba ini.'])->withInput();
        // }

        $alreadyExists = LombaPeserta::where('user_id', $user->id)
            ->where('lomba_id', $lombaId)
            ->exists();

        if ($alreadyExists) {
            return back()->withErrors([
                'error' => 'Kamu sudah mendaftar ke lomba ini sebelumnya.'
            ])->withInput();
        }
        LombaPeserta::create([
            'user_id' => $user->id,
            'lomba_id' => $lombaId,
            'bidang' => $bidangId,
            'proposal' => $validated['proposal'],
        ]);
        return redirect()->route('peserta.index')->with('success', 'Berhasil daftar lomba.');
    }

    public function data()
    {
        // Menampilkan semua peserta yang sudah mendaftar
        $data = LombaPeserta::with(['user', 'lomba', 'peserta'])->get();
        return view('admin.lomba_pendaftar.data', compact('data'));
    }

    public function detail($id)
    {
        $details = LombaPeserta::with(['user', 'lomba', 'peserta'])->find($id);
        return view('admin.lomba_pendaftar.detail', compact('details'));
    }

    public function edit($id)
    {
        $details = LombaPeserta::with(['user', 'lomba', 'peserta'])->find($id);
        return view('admin.lomba_pendaftar.edit', compact('details'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'nullable|string',
            'alasan' => 'nullable|string',
            'bidang' => 'nullable|string',
        ]);

        $peserta = LombaPeserta::findOrFail($id);
        $peserta->update([
            'status' => $request->status,
            'alasan' => $request->alasan,
            'bidang' => $request->bidang,
        ]);

        return redirect()->route('admin.lomba_pendaftar.data')->with('success', 'Data peserta berhasil diperbarui.');
    }
}
