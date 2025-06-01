<?php

namespace App\Http\Controllers;

use App\Models\TrefRegion; // ganti dengan TrefRegion jika kamu pakai model itu
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getProvinsi()
    {
        // Ambil semua wilayah dengan panjang kode 2 (provinsi)
        $provinsi = TrefRegion::whereRaw('LENGTH(code) = 2')->get();
        return response()->json($provinsi);
    }

    public function getKota($kodeProvinsi)
    {
        // Ambil semua kota/kabupaten berdasarkan kode provinsi
        $kota = TrefRegion::where('code', 'like', "$kodeProvinsi.%")
                       ->whereRaw('LENGTH(code) = 5')
                       ->get();
        return response()->json($kota);
    }

    public function getKecamatan($kodeKota)
    {
        // Ambil semua kecamatan berdasarkan kode kota
        $kecamatan = TrefRegion::where('code', 'like', "$kodeKota.%")
                            ->whereRaw('LENGTH(code) = 8')
                            ->get();
        return response()->json($kecamatan);
    }

    public function getDesa($kodeKecamatan)
    {
        // Ambil semua kecamatan berdasarkan kode kota
        $desa = TrefRegion::where('code', 'like', "$kodeKecamatan.%")
                            ->whereRaw('LENGTH(code) = 13')
                            ->get();
        return response()->json($desa);
    }
}
