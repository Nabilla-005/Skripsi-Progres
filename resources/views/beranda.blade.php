@extends('mylayout.mainlayout')

@section('content')
<style>
    body {
        background: url('/path/to/your/background.jpg') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Arial', sans-serif;
    }

    .container {
        background-color: rgba(255, 255, 255, 0.9); /* Transparan putih untuk kontras dengan background */
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Efek bayangan */
    }

    h1 {
        color: #343a40; /* Abu-abu tua */
        font-weight: bold;
    }

    .card {
        border: none;
        border-radius: 8px;
        transition: transform 0.3s, box-shadow 0.3s;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Tambahkan bayangan */
    }

    .card:hover {
        transform: scale(1.05); /* Efek zoom saat hover */
        box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.2); /* Perbesar bayangan */
    }

    .card-title {
        font-size: 2.5rem; /* Ukuran teks besar */
        font-weight: bold;
    }

    .card-footer {
        text-align: right;
    }

    .card-footer a {
        font-weight: bold;
        text-decoration: none;
        transition: color 0.3s;
    }

    .card-footer a:hover {
        text-decoration: underline;
    }

    .text-white {
        color: #ffffff !important;
    }

    .text-dark {
        color: #343a40 !important;
    }

    .bg-light {
        background-color: rgb(253, 222, 238) !important;
    }

    .bg-dark {
        background-color: rgb(181, 225, 174) !important;
    }

    .bg-success {
        background-color: rgb(148, 168, 208) !important;
    }

    .bg-primary {
        background-color: rgb(193, 179, 215) !important;
    }

    .bg-info {
        background-color: rgb(219, 213, 185) !important;
    }

    .bg-danger {
        background-color: rgb(251, 182, 209) !important;
    }

    .bg-warning {
        background-color: rgb(255, 250, 129) !important;
    }

    .bg-secondary {
        background-color: rgb(25, 182, 174) !important;
    }
</style>

<div class="container mt-4">
    <h1 class="text-center mb-4">Beranda</h1>
    <div class="row">
        <!-- Box 1 -->
        <div class="col-md-3">
            <div class="card bg-success text-dark">
                <div class="card-body">
                    <p>Manajemen Akun Mahasiswa</p>
                </div>
                <div class="card-footer bg-transparent">
                    <a href="{{ route('manajemen_akun_mahasiswa') }}" class="text-white">Selengkapnya &rarr;</a>
                </div>
            </div>
        </div>
        <!-- Box 2 -->
        <div class="col-md-3">
            <div class="card bg-primary text-dark">
                <div class="card-body">
                    <p>Manajemen Akun Dosen</p>
                </div>
                <div class="card-footer bg-transparent">
                    <a href="{{ route('manajemen_akun_dosen') }}" class="text-white">Selengkapnya &rarr;</a>
                </div>
            </div>
        </div>
        <!-- Box 3 -->
        <div class="col-md-3">
            <div class="card bg-info text-dark">
                <div class="card-body">
                    <p>Manajemen Jadwal Dosen</p>
                </div>
                <div class="card-footer bg-transparent">
                    <a href="{{ route('manajemen_jadwal_dosen') }}" class="text-white">Selengkapnya &rarr;</a>
                </div>
            </div>
        </div>
        <!-- Box 4 -->
        <div class="col-md-3">
            <div class="card bg-danger text-dark">
                <div class="card-body">
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
                    <p>Manajemen Forum Diskusi</p>
                </div>
                <div class="card-footer bg-transparent">
                    <a href="{{ route('manajemen_forum_diskusi') }}" class="text-white">Selengkapnya &rarr;</a>
                </div>
            </div>
        </div>
        <!-- Box 6 -->
        <div class="col-md-3">
            <div class="card bg-secondary text-dark">
                <div class="card-body">
                    <p>Feedback & Penilaian</p>
                </div>
                <div class="card-footer bg-transparent">
                    <a href="{{ route('feedback&penilaian') }}" class="text-white">Selengkapnya &rarr;</a>
                </div>
            </div>
        </div>
        <!-- Box 7 -->
        <div class="col-md-3">
            <div class="card bg-dark text-dark">
                <div class="card-body">
                    <p>Statistik</p>
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
                    <p>Pengaturan Sistem</p>
                </div>
                <div class="card-footer bg-transparent">
                    <a href="{{ route('pengaturan_sistem') }}" class="text-white">Selengkapnya &rarr;</a>
                </div>
            </div>
        </div>
        <!-- Add other boxes with their respective routes -->
    </div>
</div>
@endsection