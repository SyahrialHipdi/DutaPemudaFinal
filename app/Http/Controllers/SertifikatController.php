<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sertifikat;
use App\Models\User;
use App\Models\Lomba;
use App\Models\LombaPeserta;
// use PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SertifikatController extends Controller
{

    public function index()
    {
        $users = User::all();
        $lombas = Lomba::all();

        return view('admin.sertifikat.index', compact('users', 'lombas'));
    }

    // public function generate(Request $request)
    // {
    //     $user = User::findOrFail($request->user_id);
    //     $lomba = Lomba::findOrFail($request->lomba_id);
    //     $nomor = 'SERT-' . strtoupper(Str::random(10));

    //     $pdf = PDF::loadView('sertifikat', [
    //         'user' => $user,
    //         'lomba' => $lomba,
    //         'nomor_sertifikat' => $nomor,
    //     ]);

    //     $filename = 'sertifikat_' . $user->id . '_' . $lomba->id . '.pdf';
    //     $path = 'sertifikat/' . $filename;
    //     Storage::put('public/' . $path, $pdf->output());

    //     Sertifikat::create([
    //         'user_id' => $user->id,
    //         'lomba_id' => $lomba->id,
    //         'nomor_sertifikat' => $nomor,
    //         'file_path' => $path,
    //     ]);

    //     return back()->with('success', 'Sertifikat berhasil dibuat!');
    // }

    //     public function generate(Request $request)
    // {
    //     $user = User::findOrFail($request->user_id);
    //     $lomba = Lomba::findOrFail($request->lomba_id);
    //     $nomor = 'SERT-' . strtoupper(Str::random(10));

    //     $pdf = PDF::loadView('sertifikat', [
    //         'user' => $user,
    //         'lomba' => $lomba,
    //         'nomor_sertifikat' => $nomor,
    //     ]);

    //     $filename = 'sertifikat_' . $user->id . '_' . $lomba->id . '.pdf';
    //     $path = 'sertifikat/' . $filename;

    //     // ✅ Simpan ke storage/app/public/sertifikat/
    //     Storage::disk('public')->put($path, $pdf->output());

    //     Sertifikat::create([
    //         'user_id' => $user->id,
    //         'lomba_id' => $lomba->id,
    //         'nomor_sertifikat' => $nomor,
    //         'file_path' => $path, // Simpan hanya "sertifikat/namafile.pdf"
    //     ]);

    //     return back()->with('success', 'Sertifikat berhasil dibuat!');
    // }
    //     public function generate(Request $request, $lombaid, $pesertaid)
    // {
    //     $user = $pesertaid;
    //     $lomba = $lombaid;
    //     $nomor = 'SERT-' . strtoupper(Str::random(10));

    //     $pdf = PDF::loadView('sertifikat', [
    //         'user' => $user,
    //         'lomba' => $lomba,
    //         'nomor_sertifikat' => $nomor,
    //     ]);

    //     $filename = 'sertifikat_' . $user->id . '_' . $lomba->id . '.pdf';
    //     $path = 'sertifikat/' . $filename;

    //     // ✅ Simpan ke storage/app/public/sertifikat/
    //     Storage::disk('public')->put($path, $pdf->output());

    //     Sertifikat::create([
    //         'user_id' => $user->id,
    //         'lomba_id' => $lomba->id,
    //         'nomor_sertifikat' => $nomor,
    //         'file_path' => $path, // Simpan hanya "sertifikat/namafile.pdf"
    //     ]);

    //     return back()->with('success', 'Sertifikat berhasil dibuat!');
    // }

    public function userIndex()
    {
        $userId = Auth::user()->id;

        $sertifikats = Sertifikat::with('lomba') // jika kamu ingin tampil nama lomba
            ->where('user_id', $userId)
            ->get();

        return view('peserta.downloadsertif', compact('sertifikats'));
    }


    public function generate(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'lomba_id' => 'required|exists:lombas,id',
        ]);

        $user = User::findOrFail($request->user_id);
        $lomba = Lomba::findOrFail($request->lomba_id);
        $nomor = 'SERT-' . strtoupper(Str::random(10));

        $pdf = PDF::loadView('sertifikat', [
            'user' => $user,
            'lomba' => $lomba,
            'nomor_sertifikat' => $nomor,
        ]);

        $filename = 'sertifikat_' . $user->id . '_' . $lomba->id . '.pdf';
        $path = 'sertifikat/' . $filename;

        Storage::disk('public')->put($path, $pdf->output());

        if (Sertifikat::where('user_id', $user->id)->where('lomba_id', $lomba->id)->exists()) {
            return back()->with('warning', 'Sertifikat sudah pernah dibuat untuk peserta ini.');
        }
        
        Sertifikat::create([
            'user_id' => $user->id,
            'lomba_id' => $lomba->id,
            'nomor_sertifikat' => $nomor,
            'file_path' => $path,
        ]);

        $peserta = LombaPeserta::where('user_id', $user->id)
            ->where('lomba_id', $lomba->id)
            ->first();

        if ($peserta) {
            $peserta->status = 'juara';
            $peserta->save();
        }

        return back()->with('success', 'Sertifikat berhasil diberikan!');
    }


    //
    public function download($id)
    {
        // $sertifikat = Sertifikat::where('id', $id)
        //     ->where('user_id', Auth::user()->id) // agar user hanya bisa unduh sertifikat miliknya
        //     ->firstOrFail();

        // $sertifikat = Sertifikat::where('user_id', $id)->get();
        $sertifikat = Sertifikat::where('user_id', Auth::user()->id)->first();
        // dd($sertifikat->file_path);
        if (!$sertifikat) {
            return abort(404, 'Sertifikat tidak ditemukan atau bukan milikmu.');
        }

        return response()->download(storage_path('app/public/' . $sertifikat->file_path));
    }

    public function downloadUser($id)
    {
        $sertifikat = Sertifikat::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->firstOrFail();

        return response()->download(storage_path('app/public/' . $sertifikat->file_path));
    }
}
