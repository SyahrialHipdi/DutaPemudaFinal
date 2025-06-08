<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lomba;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;

class LombaController extends Controller
{
    //

// public function showForm($id)
// {
//     $lomba = Lomba::findOrFail($id);
//     $slug = strtolower(str_replace(' ', '_', $lomba->nama_lomba)); // e.g., "Lomba A" => "lomba_a"
//     $formPath = "forms/{$slug}.json";

//     if (!Storage::exists($formPath)) {
//         abort(404, 'Form tidak ditemukan.');
//     }

//     $formSchema = json_decode(Storage::get($formPath), true);

//     return view('competition_form', [
//         'formSchema' => $formSchema,
//         'competitionId' => $lomba->id,
//     ]);
// }

public function showForm($id)
{
    $lomba = Lomba::findOrFail($id);
    $formFile = 'forms/' . Str::slug($lomba->nama_lomba, '_') . '.json';

    if (!Storage::exists($formFile)) {
        abort(404, 'Form tidak ditemukan.');
    }

    $formJson = Storage::get($formFile);
    $formFields = json_decode($formJson, true)['fields'];

    // Perbaiki pemanggilan view, pakai dot (.) bukan slash (/)
    return view('lomba/form', compact('lomba', 'formFields'));
}

    public function index(){
        return view('lomba/form');
    }

}
