<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // Import Str facade

class BeritaController extends Controller
{
    /**
     * Menampilkan daftar berita.
     */
    public function index()
    {
        $beritas = Berita::with('kategori', 'user')->latest()->paginate(10);
        return view('admin.berita.index', compact('beritas'));
    }

    /**
     * Menampilkan form untuk membuat berita baru.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.berita.create', compact('kategoris'));
    }

    /**
     * Menyimpan berita baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori_id' => 'required', // Validasi diubah menjadi 'required' saja
            'gambar' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        $kategoriId = $request->kategori_id;

        // Cek apakah input kategori adalah string (kategori baru)
        if (!is_numeric($kategoriId)) {
            $newKategori = Kategori::create([
                'nama' => $kategoriId,
                'slug' => Str::slug($kategoriId)
            ]);
            $kategoriId = $newKategori->id;
        }

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
            'kategori_id' => $kategoriId, // Gunakan ID kategori yang sudah diproses
            'user_id' => auth()->id(),
        ];

        if ($request->hasFile('gambar')) {
            $namaGambar = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('img/berita'), $namaGambar);
            $data['gambar'] = $namaGambar;
        }

        Berita::create($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit berita.
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        $kategoris = Kategori::all();
        return view('admin.berita.edit', compact('berita', 'kategoris'));
    }

    /**
     * Memperbarui data berita di database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori_id' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        $berita = Berita::findOrFail($id);

        $kategoriId = $request->kategori_id;

        // Cek apakah input kategori adalah string (kategori baru)
        if (!is_numeric($kategoriId)) {
            $newKategori = Kategori::create([
                'nama' => $kategoriId,
                'slug' => Str::slug($kategoriId)
            ]);
            $kategoriId = $newKategori->id;
        }

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
            'kategori_id' => $kategoriId,
        ];

        if ($request->hasFile('gambar')) {
            if ($berita->gambar && file_exists(public_path('img/berita/' . $berita->gambar))) {
                unlink(public_path('img/berita/' . $berita->gambar));
            }
            $namaGambar = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('img/berita'), $namaGambar);
            $data['gambar'] = $namaGambar;
        }

        $berita->update($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Menghapus data berita dari database.
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        if ($berita->gambar && file_exists(public_path('img/berita/' . $berita->gambar))) {
            unlink(public_path('img/berita/' . $berita->gambar));
        }
        $berita->delete();
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }

    /**
     * Menampilkan semua berita untuk halaman publik.
     */
    /**
     * Menampilkan semua berita untuk halaman publik.
     */
    public function showPublic()
    {
        $kategoris = Kategori::all();
        $highlightBerita = Berita::with('kategori', 'user')->latest()->first();

        $beritasQuery = Berita::with('kategori', 'user')->latest();
        if ($highlightBerita) {
            $beritasQuery->where('id', '!=', $highlightBerita->id);
        }
        $beritas = $beritasQuery->paginate(6);

        return view('berita', compact('highlightBerita', 'beritas', 'kategoris'));
    }

    /**
     * METHOD BARU: Menampilkan halaman detail untuk satu berita.
     */
    public function showDetail($id)
    {
        // Ambil data berita yang spesifik berdasarkan ID, beserta relasinya
        $berita = Berita::with('kategori', 'user')->findOrFail($id);

        // Ambil 4 berita terbaru lainnya untuk ditampilkan sebagai "Berita Terkait"
        $beritaTerkait = Berita::where('id', '!=', $id)
            ->latest()
            ->take(4)
            ->get();

        return view('berita_detail', compact('berita', 'beritaTerkait'));
    }
}
