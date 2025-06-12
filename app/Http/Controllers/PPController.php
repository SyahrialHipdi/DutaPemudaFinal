<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Lomba;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PPController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.user.registerPP');
    }

    public function register(Request $request, Lomba $lomba)
    {
        $request->validate([
            'nik' => 'required|string|max:255|unique:users',
            'ktp' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            'cek' => 'accepted',
        ]);
        $tanggal_lengkap = $request->tgl_lahir_yyyy . '-' . $request->tgl_lahir_mm . '-' . $request->tgl_lahir_dd;
        $password = str_replace('-', '', $tanggal_lengkap); // 19990519
        $hashedPassword = Hash::make($password);

        if (!checkdate((int)$request->tgl_lahir_mm, (int)$request->tgl_lahir_dd, (int)$request->tgl_lahir_yyyy)) {
            return back()->withErrors(['tanggal' => 'Tanggal tidak valid.']);
        }

        $tglLahircek = Carbon::createFromFormat('Y-m-d', $tanggal_lengkap);

        $batasUsiaMax = Carbon::now()->subYears(30);
        $batasUsiaMin = Carbon::now()->subYears(17);

        if ($tglLahircek < $batasUsiaMax) {
            return back()->withErrors(['tanggal' => 'Usia maksimal adalah 30 tahun.']);
        }

        if ($tglLahircek > $batasUsiaMin) {
            return back()->withErrors(['tanggal' => 'Usia minimal adalah 17 tahun.']);
        }

        $photoPath = null;
        if ($request->hasFile('ktp')) {
            $photoFile = $request->file('ktp');
            $photoName = Str::random(20) . '.' . $photoFile->getClientOriginalExtension();
            $photoPath = $photoFile->storeAs('ktp', $photoName, 'public');
        }

        $user = User::create([
            'email' => $request->email,
            'password' => $hashedPassword,
        ]);

        $lomba->users()->attach($user->id, [
        'email' => $request->email,
        'nik' => $request->nik,
        'nama' => $request->nama,
        'whatsapp' => $request->whatsapp,
        'alamat' => $request->alamat,
        'provinsi' => $request->provinsi,
        'kota' => $request->kota,
        'kecamatan' => $request->kecamatan,
        'desa' => $request->desa,
        'rt_rw' => $request->rt_rw,
        'alamat' => $request->alamat,
        'kodePos' => $request->kodePos,
        'proposal' => $request->proposal,
        'ktp' => $request->ktp,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

        // Auth::guard('web')->login($user);
        Auth::login($user);
// sama kayak yang atas
        return redirect('user/dashboard')->with('success', "Berhasil Daftar, password Anda adalah {$password} (tanggal lahir) sialakn ganti password untuk keamanan");
    }
}
