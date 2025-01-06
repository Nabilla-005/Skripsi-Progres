<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanJadwalBimbingan; // Pastikan nama model sesuai dengan konvensi
use App\Models\Mahasiswa; // Model untuk mahasiswa
use App\Models\jadwal_kosong_dosen; // Model untuk jadwal kosong dosen

class PengajuanBimbinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pengajuan_jadwal_bimbingan'] = \App\Models\pengajuan_jadwal_bimbingan::with('mahasiswa')->latest()->paginate(10);
        return view('PengajuanBimbingan.pengajuan_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['mahasiswas'] = Mahasiswa::all(); // Ambil semua mahasiswa
        $data['jadwal_kosong'] = jadwal_kosong_dosen::all(); // Ambil semua jadwal kosong
        return view('PengajuanBimbingan.pengajuan_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // Validasi input
        $validated = $request->validate([
            'id_mahasiswa' => 'required|exists:mahasiswas,id_mahasiswa',
            'id_jadwal_kosong' => 'required|exists:jadwal_kosong_dosens,id_jadwal_kosong',
            'tanggal_pengajuan' => 'required|date',
        ]);
    
        // Simpan data ke dalam database menggunakan model PengajuanJadwalBimbingan
        \App\Models\pengajuan_jadwal_bimbingan::create([ // Pastikan ini adalah model yang benar
            'id_mahasiswa' => $validated['id_mahasiswa'],
            'id_jadwal_kosong' => $validated['id_jadwal_kosong'], // Simpan id_jadwal_kosong
            'tanggal_pengajuan' => $validated['tanggal_pengajuan'],
        ]);
    
        // Flash message dan redirect
        flash('Pengajuan bimbingan berhasil!')->success();
        return redirect()->route('LihatJadwalBimbingan.create');
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
        $data['pengajuan_jadwal_bimbingan'] = \App\Models\pengajuan_jadwal_bimbingan::findOrFail($id);
        return view('PengajuanBimbingan.pengajuan_edit',  $data);
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
        \Log::info('Update Request: ', $request->all()); // Log input request
    
        $validated = $request->validate([
            'status_pengajuan' => 'required|in:menunggu,diterima,ditolak',
            'catatan_dosen' => 'nullable|string|max:255', // Catatan bisa kosong
        ]);
    
        // Ambil pengajuan berdasarkan id
        $pengajuan = \App\Models\pengajuan_jadwal_bimbingan::findOrFail($id);
        // Update data pengajuan dengan nilai yang sudah divalidasi
        $pengajuan->fill($validated);
        // Simpan perubahan
        $pengajuan->save();
    
        \Log::info('Updated Pengajuan: ', $pengajuan->toArray()); // Log data setelah update
    
        flash('Data berhasil diperbarui')->success();
        return redirect()->route('PengajuanBimbingan.index');
    }
    


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengajuan = \App\Models\pengajuan_jadwal_bimbingan::findOrFail($id);
        $pengajuan->delete();
        flash('Data berhasil dihapus');
        return back();
    }
}
