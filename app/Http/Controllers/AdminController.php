<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

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
}
