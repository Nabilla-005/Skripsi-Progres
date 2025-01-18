
@extends('mylayout.mainlayout')

@section('content')
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Menambahkan link Font Awesome -->
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
        padding: 20px 50px;
        text-align: center;
        border: 2px solid black; /* Garis tabel warna hitam */
    }

    .table th {
        background-color: rgba(160, 0, 95, 0.8); /* Warna header tabel sesuai permintaan */
        color: white;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(160, 0, 95, 0.3); /* Hover dengan warna transparan */
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

    /* Tombol dengan warna serasi */
    .btn-success {
        background-color: rgba(160, 0, 95, 0.9);
        border-color: rgba(160, 0, 95, 0.9);
    }
    
    .btn-primary {
        background-color: #fd7e14; /* Oranye lembut */
        border-color: #fd7e14;
    }
    
    .btn-danger {
        background-color: #dc3545; /* Merah cerah */
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

    /* Tombol "Tambah Mahasiswa" di pojok kanan atas */
    .tambah-btn {
        display: flex;
        justify-content: flex-end;
        margin-top: 30px;
    }

    .btn i {
        margin-right: 8px;
    }

    /* Membatasi tinggi tabel dan menambahkan scroll vertikal */
    .table-responsive {
        max-height: 400px; /* Batasi tinggi area tabel */
        overflow-y: auto; /* Menambahkan scroll vertikal */
    }
</style>

<div class="container my-4">
    <h1 class="text-center mb-4">Manajemen Akun Mahasiswa</h1>

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
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Program Studi</th>
                    <th scope="col">Email</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mahasiswas as $mahasiswa)
                <tr>
                    <td>{{ $mahasiswa->nim }}</td>
                    <td>{{ $mahasiswa->nama }}</td>
                    <td>{{ $mahasiswa->program_studi }}</td>
                    <td>{{ $mahasiswa->email }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <!-- Tombol Edit dengan Ikon -->
                            <a href="{{ route('mahasiswas.edit', $mahasiswa->id_mahasiswa) }}" class="btn btn-primary btn-sm me-2">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <!-- Tombol Hapus dengan Ikon -->
                            <form action="{{ route('mahasiswas.destroy', $mahasiswa->id_mahasiswa) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus mahasiswa ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Tombol Tambah Mahasiswa (posisi di pojok kanan atas) -->
    <div class="tambah-btn">
        <a href="{{ route('mahasiswas.create') }}" class="btn btn-success btn-sm">
            <i class="fas fa-plus"></i> Tambah Mahasiswa
        </a>
    </div>
</div>
@endsection