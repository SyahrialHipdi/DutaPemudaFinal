<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LombaJuri;
use App\Models\Lomba;
use App\Models\Penilaian;
use App\Models\LombaPeserta;
use Illuminate\Support\Facades\Auth;


class JuriController extends Controller
{
    //
    public function dashboardLama(){
        $lombajuris = LombaJuri::all();
        return view('juri.dashboard', compact('lombajuris'));
    }

    public function dashboardAgakLama(){
        $penilaians = Penilaian::all();
        return view('juri.dashboard', compact('penilaians'));
    }

    public function indexxx(Request $request,$id)
    {
        $user = Auth::user();
        // $lomba = Lomba::findOrFail($id);
        $lombapesertas = LombaPeserta::findOrFail($user);
        return view('juri.index', compact('lombapesertas'));
    }

    public function index()
    {
        $juri = Auth::user();

        // Ambil semua lomba yang juri ini ditugaskan
        // $lombas = $juri->lombaDijuri()->with('users')->get();
//         $lombas = $juri->lombaDijuri()->with(['users', 'penilaians' => function ($query) use ($juri) {
//     $query->where('juri_id', $juri->id);
// }])->get();

$lombas = $juri->lombaDijuri()->with([
    'users' => function ($query) {
        $query->wherePivot('status', 'proses'); // filter hanya peserta yang diverifikasi
    },
    'penilaians' => function ($query) use ($juri) {
        $query->where('juri_id', $juri->id);
    }
])->get();


        return view('juri.index', compact('lombas'));
    }

    // public function create($id)
    // {
    //     $user = User::findOrFail($id);
    //     return view('juri.create', compact('user'));
    // }

    public function create($lombaId, $pesertaId)
    {
        $juri = Auth::user();
        $lomba = Lomba::findOrFail($lombaId);
        $peserta = User::findOrFail($pesertaId);

        // Cek: apakah juri ditugaskan di lomba ini?
        if (!$juri->lombaDijuri->contains($lomba)) {
            abort(403, 'Anda tidak ditugaskan untuk lomba ini.');
        }

        // Cek: apakah peserta terdaftar di lomba ini?
        if (!$lomba->users->contains($peserta)) {
            abort(403, 'Peserta tidak terdaftar di lomba ini.');
        }

        return view('juri.create', compact('lomba', 'peserta'));
    }


    
public function store(Request $request, $lombaId, $pesertaId)
{
    $validated = $request->validate([
        'komentar' => 'nullable',
        'nilai' => 'nullable',
        'nilai.*' => 'nullable',
    ]);
    $juri = Auth::user();
    $lomba = Lomba::findOrFail($lombaId);
    $peserta = User::findOrFail($pesertaId);
    Penilaian::updateOrCreate(
        [
            'juri_id' => $juri->id,
            'peserta_id' => $peserta->id,
            'lomba_id' => $lomba->id,
        ],
        [
            // 'nilai' => json_encode($request->input('nilai')),
            'nilai' => $request->input('nilai'),
            'komentar' => $request->komentar,
            // 'juri_id' => $juri->id,
            // 'peserta_id' => $peserta->id,
            // 'lomba_id' => $lomba->id,
        ]
    );

    return redirect()->route('juri.index')->with('success', 'User berhasil ditambahkan');
}
    // public function dashboard(){
    //     return view('juri.dashboard');
    // }
}
