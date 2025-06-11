<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lomba;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
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

    // public function submit(Request $request, $id)
    // {
    //     $lomba = Lomba::findOrFail($id);
    //     $user = Auth::user();

    //     $dataIsian = $request->input('data_isian', []);

    //     $user->lombas()->attach($lomba->id, [
    //         'data_isian' => json_encode($dataIsian),
    //         // 'data_isian' => $dataIsian,
    //     ]);

    //     return redirect()->route('lomba.index')->with('success', 'Berhasil daftar lomba.');
    // }

//     public function submit(Request $request, $id)
// {
//     $lomba = Lomba::findOrFail($id);
//     $user = Auth::user();

//     $rules = [];
//     $data_isian = [];

//     foreach ($lomba->syarat_lomba as $syarat) {
//         $parts = explode(':', $syarat);
//         $field = $parts[0];
//         $type = $parts[1] ?? 'text';

//         if ($type === 'file') {
//             $rules["data_isian.$field"] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
//         } else {
//             $rules["data_isian.$field"] = 'required';
//         }
//     }

//     $validated = $request->validate($rules);

//     foreach ($lomba->syarat_lomba as $syarat) {
//         $parts = explode(':', $syarat);
//         $field = $parts[0];
//         $type = $parts[1] ?? 'text';

//         if ($type === 'file') {
//             if ($request->hasFile("data_isian.$field")) {
//                 $path = $request->file("data_isian.$field")->store("pendaftaran/{$lomba->id}/{$user->id}", 'public');
//                 $data_isian[$field] = $path;
//             }
//         } else {
//             $data_isian[$field] = $validated['data_isian'][$field];
//         }
//     }

//     $user->lombas()->attach($lomba->id, [
//         'data_isian' => json_encode($data_isian),
//     ]);

//     return redirect()->route('lomba.index')->with('success', 'Berhasil daftar lomba.');
// }

public function submit(Request $request, $id)
{
    $lomba = Lomba::findOrFail($id);
    $user = Auth::user();

    $rules = [];
    $data_isian = [];

    foreach ($lomba->syarat_lomba as $syarat) {
        $parts = explode(':', $syarat);
        $field = $parts[0];
        $type = $parts[1] ?? 'text';

        if ($type === 'file') {
            $rules["data_isian.$field"] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
        } else {
            $rules["data_isian.$field"] = 'required|string';
        }
    }

    $validated = $request->validate($rules);

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

    return redirect()->route('lomba.index')->with('success', 'Berhasil daftar lomba.');
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
