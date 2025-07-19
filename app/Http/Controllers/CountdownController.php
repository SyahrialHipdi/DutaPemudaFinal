<?php

namespace App\Http\Controllers;

use App\Models\Countdown;
use Illuminate\Http\Request;

class CountdownController extends Controller
{
    public function index()
    {
        $countdowns = Countdown::all();
        return view('admin.countdown.index', compact('countdowns'));
    }

    public function create()
    {
        // $countdowns = Countdown::all();
        return view('admin.countdown.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'target_datetime' => 'required|date',
        ]);

        Countdown::create($request->only('title', 'target_datetime', 'status'));

        return redirect()->back()->with('success', 'Countdown berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $countdown = Countdown::findOrFail($id);
        return view('admin.countdown.edit', compact('countdown'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'target_datetime' => 'required|date',
            'status' => 'required',
        ]);

        $countdown = Countdown::findOrFail($id);
        $countdown->update($request->only('title', 'target_datetime', 'status'));

        return redirect('admin/countdown/index')->with('success', 'Countdown berhasil diperbarui.');
    }
}
