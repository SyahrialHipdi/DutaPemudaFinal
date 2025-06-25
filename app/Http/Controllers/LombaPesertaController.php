<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lomba;
use App\Models\User;
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
        $nikBaru = $request->input('data_isian')['nik']; // ambil isian nik dari input
        $userId = Auth::id();

        // Cari apakah sudah ada peserta lain yang mendaftar ke lomba ini dengan nik yang sama
        $duplikat = DB::table('lomba_pesertas')
            ->where('lomba_id', $lombaId)
            // ->where('user_id', '!=', $userId) // boleh juga tanpa ini jika tidak boleh daftar 2x
            ->whereRaw("JSON_UNQUOTE(JSON_EXTRACT(data_isian, '$.nik')) = ?", [$nikBaru])
            ->exists();

        if ($duplikat) {
            return back()->withErrors(['nik' => 'nik ini sudah digunakan untuk lomba yang sama.']);
        }
        // End Cek
        // $user = Auth::user();

        $rules = [
            'email' => 'string|unique:users,email',
            'password' => 'string',
        ];
        $data_isian = [];

        foreach ($lomba->syarat_lomba as $syarat) {
            $parts = explode(':', $syarat);
            $field = $parts[0];
            $type = $parts[1] ?? 'text';

            if ($type === 'file') {
                $rules["data_isian.$field"] = 'required|file|mimes:jpg,jpeg,png|max:2048';
            } else {
                $rules["data_isian.$field"] = 'required|string';
            }
        }

        $validated = $request->validate($rules);

        if (!Auth::check()) {
            $user = User::create([
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'peserta', // default role
            ]);

            Auth::login($user); // login otomatis
        } else {
            $user = Auth::user();
        }

        foreach ($lomba->syarat_lomba as $syarat) {
            $parts = explode(':', $syarat);
            $field = $parts[0];
            $type = $parts[1] ?? 'text';

            if ($type === 'file') {
                if ($request->hasFile("data_isian.$field")) {
                    $path = $request->file("data_isian.$field")->store("pendaftaran/{$lomba->id}/{$user->id}", 'public');
                    $data_isian[$field] = $path;
                }
            } else {
                $data_isian[$field] = $validated['data_isian'][$field];
            }
        }

        $user->lombas()->attach($lomba->id, [
            'data_isian' => json_encode($data_isian),
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
}
