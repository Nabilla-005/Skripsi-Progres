<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\Feedback_dan_PenilaianController;
use App\Http\Controllers\Manajemen_Akun_DosenController;
use App\Http\Controllers\Manajemen_Akun_MahasiswaController;
use App\Http\Controllers\Manajemen_Forum_DiskusiController;
use App\Http\Controllers\Manajemen_Jadwal_DosenController;
use App\Http\Controllers\Pengaturan_SistemController;
use App\Http\Controllers\Manajemen_Skripsi_MahasiswaController;
use App\Http\Controllers\Statistik_Dan_LaporanController;

use App\Http\Controllers\KomentarForumController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[DashboardController::class,'index']);
Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
Route::get('/feedback_dan_penilaian',[Feedback_dan_PenilaianController::class,'index'])->name('feedback&penilaian');
Route::get('/manajemen_akun_dosen',[Manajemen_Akun_DosenController::class,'index'])->name('manajemen_akun_dosen');
Route::get('/manajemen_akun_mahasiswa',[Manajemen_Akun_MahasiswaController::class,'index'])->name('manajemen_akun_mahasiswa');
Route::get('/manajemen_forum_diskusi',[Manajemen_Forum_DiskusiController::class,'index'])->name('manajemen_forum_diskusi');
Route::get('/jadwalkosong',[Manajemen_Jadwal_DosenController::class,'index'])->name('manajemen_jadwal_dosen');
Route::get('/pengaturan_sistem',[Pengaturan_SistemController::class,'index'])->name('pengaturan_sistem');
Route::get('/manajemen_skripsi_mahasiswa',[Manajemen_Skripsi_MahasiswaController::class,'index'])->name('manajemen_skripsi_mahasiswa');
Route::get('/statistik_dan_laporan',[Statistik_Dan_LaporanController::class,'index'])->name('statistik&laporan');

Route::get('/jadwalkosong/create', [Manajemen_Jadwal_DosenController::class, 'create'])->name('add.jadwalkosong');
Route::post('/jadwalkosong', [Manajemen_Jadwal_DosenController::class, 'store'])->name('store.jadwalkosong');
Route::get('/jadwalkosong/{id}/edit', [Manajemen_Jadwal_DosenController::class, 'edit'])->name('edit.jadwalkosong');
Route::put('/jadwalkosong/{id}', [Manajemen_Jadwal_DosenController::class, 'update'])->name('update.jadwalkosong');
Route::delete('/jadwalkosong/{id}', [Manajemen_Jadwal_DosenController::class, 'destroy'])->name('delete.jadwalkosong');

Route::get('/mahasiswas/create', [Manajemen_Akun_MahasiswaController::class, 'create'])->name('mahasiswas.create');
Route::post('/mahasiswas', [Manajemen_Akun_MahasiswaController::class, 'store'])->name('mahasiswas.store');
Route::get('/mahasiswas/{id}/edit', [Manajemen_Akun_MahasiswaController::class, 'edit'])->name('mahasiswas.edit');
Route::put('/mahasiswas/{id}', [Manajemen_Akun_MahasiswaController::class, 'update'])->name('mahasiswas.update');
Route::delete('/mahasiswas/{id}', [Manajemen_Akun_MahasiswaController::class, 'destroy'])->name('mahasiswas.destroy');

Route::get('/dosens/create', [Manajemen_Akun_DosenController::class, 'create'])->name('dosens.create');
Route::post('/dosens', [Manajemen_Akun_DosenController::class, 'store'])->name('dosens.store');
Route::get('/dosens/{id}/edit', [Manajemen_Akun_DosenController::class, 'edit'])->name('dosens.edit');
Route::put('/dosens/{id}', [Manajemen_Akun_DosenController::class, 'update'])->name('dosens.update');
Route::delete('/dosens/{id}', [Manajemen_Akun_DosenController::class, 'destroy'])->name('dosens.destroy');

Route::get('manajemen/forum/create', [Manajemen_Forum_DiskusiController::class, 'create'])->name('forum.create');
Route::post('manajemen/forum/store', [Manajemen_Forum_DiskusiController::class, 'store'])->name('forum.store');
Route::delete('manajemen/forum/{id}', [Manajemen_Forum_DiskusiController::class, 'destroy'])->name('forum.destroy');
Route::post('/forum/{forum}/komentar', [Manajemen_Forum_DiskusiController::class, 'storeKomentar'])->name('forum.komentar.store');

// routes/web.php
Route::get('/feedback/{id}', [Statistik_Dan_LaporanController::class, 'showFeedback'])->name('skripsi.feedback');
Route::get('/pengajuan-jadwal', [Statistik_Dan_LaporanController::class, 'showPengajuanJadwal'])->name('skripsi.pengajuan_jadwal');
Route::post('/pengajuan-jadwal/{id}/update/{status}', [Statistik_Dan_LaporanController::class, 'updateStatusPengajuan'])->name('skripsi.update_status');

Route::get('/feedback/{id}', [Feedback_dan_PenilaianController::class, 'showFeedbackAndPenilaian'])->name('feedback.show');
Route::get('/feedback', [FeedbackDanPenilaianController::class, 'index'])->name('feedback.index');

Route::get('/statistik-dan-laporan', [Statistik_Dan_LaporanController::class, 'index'])->name('statistik.dan.laporan');
Route::post('/generate-laporan', [Statistik_Dan_LaporanController::class, 'generateLaporan'])->name('generate.laporan');