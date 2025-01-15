<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pengaturan_SistemController extends Controller
{
    public function index()
    {
        return view('pengaturan_sistem');
    }
}
