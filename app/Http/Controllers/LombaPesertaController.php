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
                'bidang_pilihan_id' => 'nullable',
            ]);

            $user = Auth::user();
        }
        $bidangId = null;
        $bidangId = $validated['bidang_pilihan_id'] ?? null;
        LombaPeserta::create([
            'user_id' => $user->id,
            'lomba_id' => $lombaId,
            'bidang' => $bidangId,
        ]);
        return redirect()->route('peserta.index')->with('success', 'Berhasil daftar lomba.');
    }

    public function indexx()
    {
        $lombas = Lomba::withCount('users')->get();
        return view('admin.lomba_pendaftar.index', compact('lombas'));
    }

    public function show($id)
    {
        $lomba = Lomba::with('users')->findOrFail($id);
        return view('admin.lomba_pendaftar.show', compact('lomba'));
    }

    public function detail($id)
    {

        $user = User::with(['peserta', 'lombaDiikuti'])->findOrFail($id);

        $peserta = $user->peserta;

        if (!$peserta) {
            return back()->with('error', 'Data peserta tidak ditemukan.');
        }
        return view('admin.lomba_pendaftar.showdetail', compact('user', 'peserta'));

        // Ambil semua data lomba + data tambahan dari json
        // $pendaftarans = $peserta->lombaPeserta->map(function ($item) {
        //     $item->data_json_parsed = json_decode($item->data_json, true);
        //     $item->syarat_fields = json_decode($item->lomba->syarat_json, true);
        //     return $item;
        // });

        // @dd($user);
        // $peserta = LombaPeserta::with(['peserta.user', 'lomba'])->findOrFail($id);

        // $dataTambahan = json_decode($lombaPeserta->data_json, true);
        // $fields = json_decode($lombaPeserta->lomba->syarat_json, true);

        // return view('admin.lomba_peserta.show', compact('lombaPeserta', 'dataTambahan', 'fields'));
        // $pendaftaran = Pendaftaran::with(['lomba', 'peserta'])->findOrFail($id);
        // $peserta = Peserta::where('Id_user', $id)->firstOrFail();
        // return view('admin.lomba_pendaftar.showdetail', compact('peserta'));
        // dd($peserta);
    }

    public function data()
    {
        // Menampilkan semua peserta yang sudah mendaftar
        $peserta = LombaPeserta::with(['user', 'lomba'])->get();
        return view('admin.lomba_pendaftar.data', compact('peserta'));
    }

    public function datadetail($id)
    {
        $details = LombaPeserta::with(['user', 'lomba', 'peserta'])->find($id);
        return view('admin.lomba_pendaftar.data_detail', compact('details'));
    }

    public function editdatadetail($id)
    {
        $details = LombaPeserta::with(['user', 'lomba', 'peserta'])->find($id);
        return view('admin.lomba_pendaftar.edit_data_detail', compact('details'));
    }

    public function updatedatadetail(Request $request, $id)
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
