<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Auth; // <-- 1. Import Class Auth

class BeritaController extends Controller
{
    public function index()
    {
        // Menggunakan latest() untuk mengurutkan dari yang terbaru & paginate untuk halaman
        $beritas = Berita::latest()->paginate(10);
        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        // 2. Validasi yang lebih baik
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            // 'image' memastikan file adalah gambar, 'nullable' membuatnya opsional
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        // Siapkan data yang akan disimpan
        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
            'user_id' => auth()->id(), // <-- 3. Ambil ID user yang login
        ];

        // 4. Logika untuk memproses gambar JIKA ada yang di-upload
        if ($request->hasFile('gambar')) {
            // Buat nama file yang unik
            $namaGambar = time() . '.' . $request->gambar->extension();
            // Pindahkan file ke folder public/img/berita
            $request->gambar->move(public_path('img/berita'), $namaGambar);
            // Tambahkan nama file gambar ke array data
            $data['gambar'] = $namaGambar;
        }

        // Simpan data ke database
        Berita::create($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Gunakan findOrFail untuk mendapatkan SATU OBJEK berita.
        // JANGAN GUNAKAN ->get() di sini.
        $berita = Berita::findOrFail($id);

        return view('admin.berita.edit', compact('berita'));
    }
}