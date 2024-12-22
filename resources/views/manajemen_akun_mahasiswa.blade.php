@extends('mylayout.mainlayout')

@section('content')
<head>
    <!-- Menambahkan link Font Awesome -->
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
    }

    table {
        border-collapse: separate;
        border-spacing: 0 10px;
    }

    .table {
        background-color: rgba(255, 255, 255, 0.8); /* Transparansi putih untuk kontras dengan background gambar */
        border-radius: 5px;
        overflow: hidden;
        transition: max-height 0.3s ease-in-out;
    }

    /* Untuk tabel agar bisa scroll */
    .table-responsive {
        max-height: 400px;  /* Tentukan tinggi maksimum agar bisa di-scroll */
        overflow-y: auto;   /* Mengaktifkan scroll vertikal */
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

    /* Tombol "Tambah Mahasiswa" di pojok kanan atas */
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
    <h1 class="text-center mb-4">Daftar Mahasiswa</h1>

    <!-- Menampilkan notifikasi sukses -->
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    
    <!-- Tabel Daftar Mahasiswa -->
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
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