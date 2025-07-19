<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    // ... (method index, create, store, edit, update, destroy yang sudah ada) ...

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
