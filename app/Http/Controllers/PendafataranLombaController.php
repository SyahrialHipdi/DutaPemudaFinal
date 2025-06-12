<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\pendaftaranLomba;

class PendafataranLombaController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'competition_id' => 'required|exists:competitions,id',
        'extra_data' => 'required|array',
    ]);

    // Cek apakah user sudah ada
    $user = User::firstOrCreate(
        ['email' => $request->email],
        ['password' => bcrypt($request->password)]
    );

    // Simpan pendaftaran ke lomba
    $registration = PendaftaranLomba::create([
        'user_id' => $user->id,
        'competition_id' => $request->competition_id,
        'extra_data' => $request->extra_data,
    ]);

    return response()->json([
        'message' => 'Pendaftaran berhasil',
        'registration' => $registration
    ]);
}

}
