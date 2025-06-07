<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.user.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/user/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showRegisterForm()
    {
        return view('auth.user.register');
    }

    public function persetujuan()
    {
        return view('auth.user.pendaftaran');
    }

    public function Postpersetujuan(Request $request)
    {
        $request->validate([
            'cek' => 'accepted',
            // 'password' => 'required|string|min:8|confirmed',
        ]);
        // Auth::guard('web')->login($user);

        return redirect('user/register');
    }

    public function register(Request $request)
    {
        $request->validate([
            // 'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:255|unique:users',
            'ktp' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            'cek' => 'accepted',

            // 'password' => 'required|string|min:8|confirmed',
        ]);
        $tanggal_lengkap = $request->tgl_lahir_yyyy . '-' . $request->tgl_lahir_mm . '-' . $request->tgl_lahir_dd;

        // $tglLahir = $request->input('tanggalLahir'); // format: Y-m-d

        // Generate password dari tanggal lahir misalnya (tanpa tanda strip)
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
            'nik' => $request->nik,
            'nama' => $request->nama,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'tanggalLahir' => $tanggal_lengkap,
            'password' => $hashedPassword,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'desa' => $request->desa,
            'rt_rw' => $request->rt_rw,
            'alamat' => $request->alamat,
            'kodePos' => $request->kodePos,
            'proposal' => $request->proposal,
            'ktp' => $photoPath,
        ]);

        Auth::guard('web')->login($user);

        return redirect('user/dashboard')->with('success', "Berhasil Daftar, password Anda adalah {$password} (tanggal lahir) sialakn ganti password untuk keamanan");
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/user/login');
    }
}
