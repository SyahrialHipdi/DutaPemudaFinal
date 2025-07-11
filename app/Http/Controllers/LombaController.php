<?php

// app/Http/Controllers/LombaController.php

namespace App\Http\Controllers;

use App\Models\komponen;
use App\Models\Lomba;
use Illuminate\Http\Request;

class LombaController extends Controller
{
    public function index()
    {
        $lombas = Lomba::all();
        return view('admin.lomba.index', compact('lombas'));
    }

    public function show($id)
    {
        $lomba = Lomba::findOrFail($id);
        return view('admin.lomba.show', compact('lomba'));
    }

    public function daftarForm($id)
    {
        $lomba = Lomba::findOrFail($id);
        return view('admin.lomba.daftar', compact('lomba'));
    }

    public function daftarSubmit(Request $request, $id)
    {
        $lomba = Lomba::findOrFail($id);

        // Buat rules validasi dinamis berdasarkan syarat_lomba
        $rules = [];
        foreach ($lomba->syarat_lomba as $field) {
            $rules[$field] = 'required';
            // bisa ditambah validasi spesifik sesuai field, misal 'email' => 'required|email'
            if ($field === 'email') {
                $rules[$field] = 'required|email';
            }
            if ($field === 'usia') {
                $rules[$field] = 'required|integer|min:1';
            }
        }

        $validated = $request->validate($rules);

        // Simpan data pendaftaran, misalnya di tabel pendaftaran (belum dibuat)
        // Untuk demo, kita hanya return data yg diterima

        return redirect()->route('lomba.index')->with('success', 'Pendaftaran berhasil!');
    }

    public function create()
    {
        return view('admin.lomba.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lomba' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'syarat_lomba' => 'array',
            'syarat_lomba.*.field' => 'nullable|string',
            'syarat_lomba.*.type' => 'nullable|string',
            'komponen_penilaian' => 'array',
            'komponen_penilaian.*' => 'nullable',

        ]);

        $syarat = $request->input('syarat_lomba', []);
        $syarat_lomba = [];

        foreach ($syarat as $item) {
            $field = trim($item['field'] ?? '');
            $type = trim($item['type'] ?? 'text');

            if ($field !== '') {
                $syarat_lomba[] = "$field:$type";
            }
        }

         $komponen_penilaian = array_filter(array_map('trim', $request->input('komponen_penilaian', [])));
        Lomba::create([
            'nama_lomba' => $request->nama_lomba,
            'tahun' => $request->tahun,
            'deskripsi' => $request->deskripsi,
            'syarat_lomba' => $syarat_lomba,
            'komponen_penilaian' => $komponen_penilaian,
        ]);

        return redirect()->route('admin.lomba.index')->with('success', 'Lomba berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $lomba = Lomba::findOrFail($id);
        return view('admin.lomba.edit', compact('lomba'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lomba' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'syarat_lomba' => 'array',
            'syarat_lomba.*.field' => 'nullable|string',
            'syarat_lomba.*.type' => 'nullable|string',
            'komponen_penilaian' => 'nullable',
            'komponen_penilaian.*' => 'nullable',
        ]);

        $lomba = Lomba::findOrFail($id);

        $syarat = $request->input('syarat_lomba', []);
        $syarat_lomba = [];

        foreach ($syarat as $item) {
            $field = trim($item['field'] ?? '');
            $type = trim($item['type'] ?? 'text');

            if ($field !== '') {
                $syarat_lomba[] = "$field:$type";
            }
        }
        $komponen = $request->input('komponen_penilaian', []);

        $lomba->update([
            'nama_lomba' => $request->nama_lomba,
            'tahun' => $request->tahun,
            'deskripsi' => $request->deskripsi,
            'syarat_lomba' => $syarat_lomba,
            'komponen_penilaian' => $komponen, 
        ]);

        return redirect()->route('admin.lomba.index')->with('success', 'Lomba berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $lomba = Lomba::findOrFail($id);
        $lomba->delete();

        return redirect()->route('admin.lomba.index')->with('success', 'Lomba dihapus.');
    }
}
