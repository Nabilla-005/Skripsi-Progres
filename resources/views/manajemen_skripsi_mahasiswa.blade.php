@extends('mylayout.mainlayout')

@section('content')
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<style>
    body, html {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    .container {
        max-height: 100vh;
        overflow-y: auto;
        padding-bottom: 50px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    .table th,
    .table td {
        padding: 20px 100px;
        text-align: center;
        border: 2px solid black;
    }

    .table th {
        background-color: rgba(160, 0, 95, 0.8);
        color: white;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(160, 0, 95, 0.3);
    }

    .btn {
        border-radius: 5px;
        transition: background-color 0.3s ease;
        padding: 10px 16px;
        text-align: center;
        width: auto;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-success {
        background-color: rgba(160, 0, 95, 0.9);
        border-color: rgba(160, 0, 95, 0.9);
    }

    .btn-primary {
        background-color: #fd7e14;
        border-color: #fd7e14;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn:hover {
        opacity: 0.8;
    }

    .alert {
        margin-top: 20px;
        margin-bottom: 20px;
    }

    h1 {
        font-size: 2.8rem;
        font-weight: 600;
        color: rgb(160, 0, 95);
    }

    .tambah-btn {
        display: flex;
        justify-content: flex-end;
        margin-top: 30px;
    }

    .btn i {
        margin-right: 8px;
    }

    .table-responsive {
        max-height: 400px;
        overflow-y: auto;
    }
</style>

<div class="container my-4">
    <h1 class="text-center mb-4">Manajemen Skripsi Mahasiswa</h1>

    <!-- Menampilkan notifikasi sukses -->
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel Daftar Mahasiswa -->
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Nama Mahasiswa</th>
                    <th scope="col">Status Pengajuan</th>
                    <th scope="col">Status Progres Skripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mahasiswas as $mahasiswa)
                <tr>
                    <td>{{ $mahasiswa->nama }}</td>
                    <td>
                        @if ($mahasiswa->pengajuanJuduls->isNotEmpty())
                            <span class="badge bg-success">{{ $mahasiswa->pengajuanJuduls->last()->status }}</span>
                        @else
                            <span class="badge bg-danger">Belum ada pengajuan</span>
                        @endif
                    </td>
                    <td>
                        @if ($mahasiswa->progresSkripsis->isNotEmpty())
                            <span class="badge bg-success">{{ $mahasiswa->progresSkripsis->last()->komentar }}</span>
                        @else
                            <span class="badge bg-danger">Belum ada progres</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Tombol Tambah Mahasiswa -->
    <div class="tambah-btn">
        <a href="{{ route('mahasiswas.create') }}" class="btn btn-success btn-sm">
            <i class="fas fa-plus"></i> Tambah Mahasiswa
        </a>
    </div>
</div>
@endsection
