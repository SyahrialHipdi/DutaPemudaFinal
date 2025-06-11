<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Lomba;
use Illuminate\Http\Request;

class AdminLombaController extends Controller
{
    public function index()
    {
        $lombas = Lomba::all();
        return view('admin.lomba.index', compact('lombas'));
    }

    public function create()
    {
        return view('admin.lomba.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_lomba' => 'required|string|max:255',
            'tahun' => 'required|digits:4|integer',
            'deskripsi' => 'nullable|string',
            'syarat_lomba' => 'required|array|min:1',
            'syarat_lomba.*' => 'required|string',
        ]);

        Lomba::create($data);

        return redirect()->route('admin.lomba.index')->with('success', 'Lomba berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $lomba = Lomba::findOrFail($id);
        return view('admin.lomba.edit', compact('lomba'));
    }

    public function update(Request $request, $id)
    {
        $lomba = Lomba::findOrFail($id);

        $data = $request->validate([
            'nama_lomba' => 'required|string|max:255',
            'tahun' => 'required|digits:4|integer',
            'deskripsi' => 'nullable|string',
            'syarat_lomba' => 'required|array|min:1',
            'syarat_lomba.*' => 'required|string',
        ]);

        $lomba->update($data);

        return redirect()->route('admin.lomba.index')->with('success', 'Lomba berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $lomba = Lomba::findOrFail($id);
        $lomba->delete();

        return redirect()->route('admin.lomba.index')->with('success', 'Lomba dihapus.');
    }
}
