<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lomba;
use App\Models\User;
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

    public function submit(Request $request, $id)
    {
        $lomba = Lomba::findOrFail($id);
        $user = Auth::user();

        $dataIsian = $request->input('data_isian', []);

        $user->lombas()->attach($lomba->id, [
            'data_isian' => json_encode($dataIsian),
            // 'data_isian' => $dataIsian,
        ]);

        return redirect()->route('lomba.index')->with('success', 'Berhasil daftar lomba.');
    }
}
