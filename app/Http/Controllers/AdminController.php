<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Lomba;
use App\Models\Komponen;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.dashboard');
    }

    
    public function dashboard(){
        $admins = Admin::all();
        return view('admin.dashboard', compact('admins'));
    }
    
    public function lomba(){
        $lombas = Lomba::all();
        return view('admin.data_lomba', compact('lombas'));
    }

    public function lombaTambah(){
        return view('admin.tambah_lomba');
    }

    public function lombaShow($id){
        $komponen = Lomba::findOrFail($id);
        return view('admin.show_lomba', compact('komponen'));
    }

    public function lombaCreate(Request $request)
    {
        $request->validate([
            // 'nama' => 'required|string|max:255',
            // 'tahun' => 'required|string|max:255|unique:admins',
            // 'deskripsi' => 'required|string|',
        ]);

        $lomba = Lomba::create([
            'nama_lomba' => $request->nama,
            'tahun' => $request->tahun,
            'deskripsi' => $request->deskripsi,
        ]);

        // Auth::guard('admin')->login($admin);

        return redirect('/admin/data_lomba');
    }
}
