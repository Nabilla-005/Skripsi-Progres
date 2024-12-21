@extends('mylayout.mainlayout')

@section('content')
<head>
    <!-- Menambahkan link font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

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
        margin-top: 50px; /* Margin atas agar tidak terlalu dekat dengan header */
        width: 100%;  /* Menggunakan 100% agar kontainer memenuhi lebar layar */
        max-width: none; /* Menghilangkan batasan lebar maksimum */
    }

    table {
        border-collapse: separate;
        border-spacing: 0 10px;
        width: 100%; /* Memastikan tabel mengambil seluruh lebar container */
    }

    .table {
        background-color: rgba(255, 255, 255, 0.8); /* Transparansi putih untuk kontras dengan background gambar */
        border-radius: 5px;
        overflow: hidden;
        transition: max-height 0.3s ease-in-out;
    }

    /* Untuk scroll horizontal */
    .table-responsive {
        max-height: 400px;  /* Tentukan tinggi maksimum agar bisa di-scroll vertikal */
        overflow-y: auto;   /* Mengaktifkan scroll vertikal */
        overflow-x: auto;   /* Mengaktifkan scroll horizontal */
        -webkit-overflow-scrolling: touch; /* Menambahkan sentuhan halus untuk perangkat mobile */
    }

    .table th,
    .table td {
        padding: 12px 15px;
        text-align: center;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.2);
    }

    .btn {
        border-radius: 5px;
        transition: background-color 0.3s ease;
        padding: 8px 16px; /* Menambah padding untuk ukuran tombol lebih proporsional */
        text-align: center;
        width: auto; /* Menyesuaikan lebar tombol sesuai teks */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Tombol dengan warna serasi */
    .btn-success {
        background-color: #007bff; /* Biru terang */
        border-color: #007bff;
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
        font-size: 2.5rem;
        font-weight: 600;
        color: #3a3a3a;
    }

    /* Tombol "Tambah Dosen" di pojok kanan atas */
    .tambah-btn {
        display: flex;
        justify-content: flex-end;
        margin-top: 20px;
    }

    .btn i {
        margin-right: 8px;
    }
</style>

<div class="container my-4">
    <h1 class="text-center mb-4">Daftar Dosen</h1>

    <!-- Menampilkan notifikasi sukses -->
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    
    <!-- Tabel Daftar Dosen -->
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">NIP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Fakultas</th>
                    <th scope="col">Email</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dosens as $dosen)
                <tr>
                    <td>{{ $dosen->nip }}</td>
                    <td>{{ $dosen->nama }}</td>
                    <td>{{ $dosen->fakultas }}</td>
                    <td>{{ $dosen->email }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('dosens.edit', $dosen->id_dosen) }}" class="btn btn-primary btn-sm me-2">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('dosens.destroy', $dosen->id_dosen) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus dosen ini?')">
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

    <!-- Tombol Tambah Dosen (posisi di pojok kanan atas) -->
    <div class="tambah-btn">
        <a href="{{ route('dosens.create') }}" class="btn btn-success btn-sm">
            <i class="fas fa-plus"></i> Tambah Dosen
        </a>
    </div>
</div>
@endsection
