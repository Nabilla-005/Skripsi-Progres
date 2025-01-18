
<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\MahasiswaController;
use \App\Http\Controllers\DosenController;
use \App\Http\Controllers\JadwalKosongController;
use \App\Http\Controllers\JadwalKosongLihatController;
use \App\Http\Controllers\PengajuanController;
use \App\Http\Controllers\LihatStatusJudulController;


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Feedback_dan_PenilaianController;
use App\Http\Controllers\Manajemen_Akun_DosenController;
use App\Http\Controllers\Manajemen_Akun_MahasiswaController;
use App\Http\Controllers\Manajemen_Forum_DiskusiController;
use App\Http\Controllers\Manajemen_Jadwal_DosenController;
use App\Http\Controllers\PengaturanSistemController;
use App\Http\Controllers\Manajemen_Skripsi_MahasiswaController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\KomentarForumController;
use App\Http\Controllers\SettingsController;

use \App\Http\Controllers\DokterController;
use \App\Http\Controllers\PasienController;
use \Illuminate\Auth\Middleware\Authenticate;

use App\Http\Controllers\PengajuanJudulController;
use App\Http\Controllers\PengajuanBimbinganController;
use App\Http\Controllers\LihatJadwalBimbinganController;
use App\Http\Controllers\ProgresSkripsiController;
use App\Http\Controllers\LihatProgresSkripsiController;
use App\Http\Controllers\ProfileAdminController;
use App\Http\Controllers\PasswordController;


Route::resource('ProgresSkripsi', ProgresSkripsiController::class);
Route::post('ProgresSkripsi/{id}/update-komentar', [ProgresSkripsiController::class, 'updateKomentar'])->name('ProgresSkripsi.updateKomentar');

Route::get('/progres-skripsi/download/{id}', [LihatProgresSkripsiController::class, 'download'])->name('ProgresSkripsi.download');
Route::get('/LihatProgresSkripsi', [LihatProgresSkripsiController::class, 'index'])->name('LihatProgresSkripsi.index');
Route::delete('/LihatProgresSkripsi/{id}', [LihatProgresSkripsiController::class, 'destroy'])->name('LihatProgresSkripsi.destroy');


Route::get('/pengajuan/create', [PengajuanController::class, 'create'])->name('pengajuan.create');
Route::post('/pengajuan', [PengajuanController::class, 'store'])->name('pengajuan.store');
Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan.index');
Route::put('/pengajuan/{id_pengajuan}', [PengajuanController::class, 'update'])->name('pengajuan.update');
Route::delete('/pengajuan/{id_pengajuan}/hapus', [PengajuanController::class, 'destroy'])->name('pengajuan.hapus');

Route::resource('LihatStatusJudul', LihatStatusJudulController::class);
Route::get('/pengajuan/status', [LihatStatusJudulController::class, 'index'])->name('pengajuan.LihatStatusPengajuan');
Route::get('/pengajuan/download/{id_pengajuan}', [PengajuanController::class, 'download'])->name('pengajuan.download');


Route::middleware([Authenticate::class])->group(function () {
    Route::resource('pasien', PasienController::class);    
});


Route::get('dokter',[DokterController::class, 'index']);

Route::get('profile', function() {
    return 'hello world';
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'checkRole:mahasiswa'])->group(function () {
Route::resource('mahasiswa', MahasiswaController::class);
});

Route::middleware(['auth', 'checkRole:dosen'])->group(function () {
Route::resource('dosen', DosenController::class);
});

Route::middleware(['auth', 'checkRole:dosen'])->group(function () {
Route::resource('JadwalKosongDosen', JadwalKosongController::class);
});

Route::middleware(['auth', 'checkRole:mahasiswa'])->group(function () {
Route::resource('LihatJadwalKosong', JadwalKosongLihatController::class);
});

Route::resource('PengajuanBimbingan', PengajuanBimbinganController::class);

Route::resource('LihatJadwalBimbingan', LihatJadwalBimbinganController::class);

Route::get('/lihat-jadwal-bimbingan', [LihatJadwalBimbinganController::class, 'index'])->name('LihatJadwalBimbingan.index');


Route::middleware(['auth', 'checkRole:dosen'])->group(function () {
    Route::resource('dosen', DosenController::class);
});

Route::middleware(['auth', 'checkRole:mahasiswa'])->group(function () {
    Route::resource('mahasiswa', MahasiswaController::class);
});


Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/', function () {
    return redirect('/login');
});

Route::get('/home', function () {
    return view('home');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/feedback_dan_penilaian',[Feedback_dan_PenilaianController::class,'index'])->name('feedback&penilaian');
Route::get('/manajemen_akun_dosen',[Manajemen_Akun_DosenController::class,'index'])->name('manajemen_akun_dosen');
Route::get('/manajemen_akun_mahasiswa',[Manajemen_Akun_MahasiswaController::class,'index'])->name('manajemen_akun_mahasiswa');
Route::get('/manajemen_forum_diskusi',[Manajemen_Forum_DiskusiController::class,'index'])->name('manajemen_forum_diskusi');
Route::get('/jadwalkosong',[Manajemen_Jadwal_DosenController::class,'index'])->name('manajemen_jadwal_dosen');
Route::get('/pengaturan_sistem',[PengaturanSistemController::class,'index'])->name('pengaturan_sistem');
Route::get('/manajemen_skripsi_mahasiswa',[Manajemen_Skripsi_MahasiswaController::class,'index'])->name('manajemen_skripsi_mahasiswa');
Route::get('/statistik_dan_laporan',[StatistikController::class,'statistik'])->name('statistik&laporan');

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
Route::get('/feedback/{id}', [BerandaController::class, 'showFeedback'])->name('skripsi.feedback');
Route::get('/pengajuan-jadwal', [BerandaController::class, 'showPengajuanJadwal'])->name('skripsi.pengajuan_jadwal');
Route::post('/pengajuan-jadwal/{id}/update/{status}', [BerandaController::class, 'updateStatusPengajuan'])->name('skripsi.update_status');

Route::get('/feedback/{id}', [Feedback_dan_PenilaianController::class, 'showFeedbackAndPenilaian'])->name('feedback.show');
Route::get('/feedback', [Feedback_dan_PenilaianController::class, 'index'])->name('feedback.index');


Route::get('/statistik-dan-laporan', [BerandaController::class, 'index'])->name('statistik.dan.laporan');
Route::post('/generate-laporan', [BerandaController::class, 'generateLaporan'])->name('generate.laporan');

Route::post('/store-pengajuan', [Manajemen_Skripsi_MahasiswaController::class, 'storePengajuan'])->name('storePengajuan');
Route::post('/store-progres', [Manajemen_Skripsi_MahasiswaController::class, 'storeProgres'])->name('storeProgres');

Route::get('pengaturan', [PengaturanSistemController::class, 'index'])->name('pengaturan.index');
Route::post('pengaturan', [PengaturanSistemController::class, 'update'])->name('pengaturan.update');
Route::get('pengaturan/test-email', [PengaturanSistemController::class, 'testEmail'])->name('pengaturan.testEmail');
Route::get('/pengaturan-sistem', [SettingsController::class, 'index'])->name('pengaturan.index');
Route::post('/pengaturan-sistem', [SettingsController::class, 'update']);
Route::get('/backup', [SettingsController::class, 'backup'])->name('pengaturan.backup');
Route::post('/restore', [SettingsController::class, 'restore'])->name('pengaturan.restore');


Route::get('/profil', [ProfileAdminController::class, 'index'])->name('ProfilAdmin.index');
Route::get('/profil/edit', [ProfileAdminController::class, 'edit'])->name('ProfilAdmin.edit');
Route::put('/profil/edit', [ProfileAdminController::class, 'update'])->name('ProfilAdmin.update');


Route::get('/password/edit', [PasswordController::class, 'edit'])->name('password.edit');
Route::put('/password/edit', [PasswordController::class, 'update'])->name('password.update');

Route::get('/backup', [PengaturanSistemController::class, 'backupData'])->name('backup.data');
Route::get('/backup', [PengaturanSistemController::class, 'backupData'])->name('pengaturan.backup');
Route::post('/pengaturan/restore', [PengaturanSistemController::class, 'restore'])->name('pengaturan.restore');
