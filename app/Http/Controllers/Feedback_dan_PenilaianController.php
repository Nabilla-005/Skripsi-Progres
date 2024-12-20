<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Feedback_dan_PenilaianController extends Controller
{
    public function index()
    {
        return view('feedback&penilaian');
    }
}
