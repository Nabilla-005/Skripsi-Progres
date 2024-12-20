@extends('mylayout.mainlayout')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Beranda</h1>
    <div class="row">
        <!-- Box 1 -->
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h2 class="card-title">8</h2>
                    <p>Manajemen Akun Mahasiswa</p>
                </div>
                <div class="card-footer bg-transparent">
                    <a href="{{ route('manajemen_akun_mahasiswa') }}" class="text-white">Selengkapnya &rarr;</a>
                </div>
            </div>
        </div>
        <!-- Box 2 -->
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h2 class="card-title">3</h2>
                    <p>Manajemen Akun Dosen</p>
                </div>
                <div class="card-footer bg-transparent">
                    <a href="{{ route('manajemen_akun_dosen') }}" class="text-white">Selengkapnya &rarr;</a>
                </div>
            </div>
        </div>
        <!-- Box 3 -->
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h2 class="card-title">7</h2>
                    <p>Manajemen Jadwal Dosen</p>
                </div>
                <div class="card-footer bg-transparent">
                    <a href="{{ route('manajemen_jadwal_dosen') }}" class="text-white">Selengkapnya &rarr;</a>
                </div>
            </div>
        </div>
        <!-- Box 4 -->
        <div class="col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h2 class="card-title">16</h2>
                    <p>Manajemen Skripsi Mahasiswa</p>
                </div>
                <div class="card-footer bg-transparent">
                    <a href="{{ route('manajemen_skripsi_mahasiswa') }}" class="text-white">Selengkapnya &rarr;</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <!-- Box 5 -->
        <div class="col-md-3">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <h2 class="card-title">1</h2>
                    <p>Manajemen Forum Diskusi</p>
                </div>
                <div class="card-footer bg-transparent">
                    <a href="{{ route('manajemen_forum_diskusi') }}" class="text-dark">Selengkapnya &rarr;</a>
                </div>
            </div>
        </div>
        <!-- Box 6 -->
        <div class="col-md-3">
            <div class="card bg-secondary text-white">
                <div class="card-body">
                    <h2 class="card-title">1</h2>
                    <p>Feedback & Penilaian</p>
                </div>
                <div class="card-footer bg-transparent">
                    <a href="{{ route('feedback&penilaian') }}" class="text-white">Selengkapnya &rarr;</a>
                </div>
            </div>
        </div>
        <!-- Box 7 -->
        <div class="col-md-3">
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <h2 class="card-title">1</h2>
                    <p>Statistik & Laporan</p>
                </div>
                <div class="card-footer bg-transparent">
                    <a href="{{ route('statistik&laporan') }}" class="text-white">Selengkapnya &rarr;</a>
                </div>
            </div>
        </div>
         <!-- Box 8 -->
         <div class="col-md-3">
            <div class="card bg-light text-dark">
                <div class="card-body">
                    <h2 class="card-title">1</h2>
                    <p>Pengaturan Sistem</p>
                </div>
                <div class="card-footer bg-transparent">
                    <a href="{{ route('pengaturan_sistem') }}" class="text-dark">Selengkapnya &rarr;</a>
                </div>
            </div>
        </div>
        <!-- Add other boxes with their respective routes -->
    </div>
</div>
@endsection
