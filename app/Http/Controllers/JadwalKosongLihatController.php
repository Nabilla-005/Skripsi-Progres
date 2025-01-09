<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class JadwalKosongLihatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['jadwal_kosong_dosen'] = \App\Models\jadwal_kosong_dosen::latest()->paginate(10);
        return view('JadwalKosongDosen.mahasiswa_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['dosens'] = \App\Models\Dosen::all();
    return view('JadwalKosongDosen.dosen_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'id_dosen' => 'required|exists:dosens,id_dosen',
        'tanggal' => 'required|date',
        'waktu_mulai' => 'required|date_format:H:i',
        'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
        'status' => 'required|in:tersedia,penuh',
    ]);

    // Simpan data ke database
    $jadwal_kosong_dosen = new \App\Models\jadwal_kosong_dosen();
    $jadwal_kosong_dosen->fill($validated);
    $jadwal_kosong_dosen->save();
    flash('Data berhasil disimpan')->success();
    return back();
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['jadwal_kosong_dosen'] = \App\Models\jadwal_kosong_dosen::findOrFail($id);
        $data['dosens'] = \App\Models\Dosen::all();
        return view('JadwalKosongDosen.dosen_edit',  $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_dosen' => 'required|exists:dosens,id_dosen',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required|after:waktu_mulai',
            'status' => 'required|in:tersedia,penuh',
        ]);
    
        // Simpan data ke database
        $jadwal_kosong_dosen = \App\Models\jadwal_kosong_dosen::findOrFail($id);
        $jadwal_kosong_dosen->fill($validated);
        $jadwal_kosong_dosen->save();
        flash('Data berhasil diubah')->success();
        return redirect('/JadwalKosongDosen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwal_kosong_dosen = \App\Models\jadwal_kosong_dosen::findOrFail($id);
        $jadwal_kosong_dosen->delete();
        flash('Data berhasil dihapus');
        return back();
    }
}
