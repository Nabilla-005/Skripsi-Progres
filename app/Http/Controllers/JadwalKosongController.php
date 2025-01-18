<?php

namespace App\Http\Controllers;
use App\Models\dosen;
use Illuminate\Http\Request;
use Carbon\Carbon;

class JadwalKosongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // JadwalKosongController.php
public function index()
{
    // Memeriksa apakah pengguna yang sedang login adalah dosen dan memiliki relasi dosen
    $user = auth()->user();
    
    // Mengambil data dosen yang terkait dengan email pengguna yang sedang login
    $dosen = $user->dosen; // ini akan mengambil relasi dosen berdasarkan email

    if ($dosen) {
        // Ambil data jadwal kosong berdasarkan id_dosen
        $data['jadwal_kosong_dosen'] = \App\Models\jadwal_kosong_dosen::where('id_dosen', $dosen->id_dosen)
            ->latest()->paginate(10);
    } else {
        // Jika tidak ditemukan dosen terkait, beri data kosong
        $data['jadwal_kosong_dosen'] = collect(); // Menggunakan koleksi kosong
    }

    $data['dosen'] = \App\Models\Dosen::all();
    
    return view('JadwalKosongDosen.dosen_index', $data);
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
        $jadwal_kosong_dosen = \App\Models\jadwal_kosong_dosen::findOrFail($id);
    
        // Pastikan pengguna adalah dosen dan memiliki id_dosen yang sesuai
        if (auth()->user()->status !== 'dosen' || auth()->user()->dosen->id_dosen !== $jadwal_kosong_dosen->id_dosen) {
            return redirect()->route('JadwalKosongDosen.index')->with('error', 'Akses ditolak!');
        }
    
        $data['jadwal_kosong_dosen'] = $jadwal_kosong_dosen;
        $data['dosens'] = \App\Models\Dosen::all();
        return view('JadwalKosongDosen.dosen_edit', $data);
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

    // Cek apakah id_dosen pada jadwal kosong sama dengan id_dosen dosen yang sedang login
   if (auth()->user()->status !== 'dosen' || auth()->user()->dosen->id_dosen !== $jadwal_kosong_dosen->id_dosen) {
        return redirect()->route('JadwalKosongDosen.index')->with('error', 'Akses ditolak!');
    }

    $jadwal_kosong_dosen->delete();
    flash('Data berhasil dihapus');
    return back();
}
}