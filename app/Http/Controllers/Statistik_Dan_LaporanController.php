<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Statistik_Dan_LaporanController extends Controller
{
    public function index()
    {
        return view('statistik&laporan');
    }
}
