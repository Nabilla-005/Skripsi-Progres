@extends('mylayout.mainlayout')

@section('content')
<style>
    /* Styling untuk body dan layout */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f0f0f0; /* Warna latar belakang abu-abu */
    }

    .container {
        background-color: #ffffff;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-top: 30px;
    }

    h1 {
        color: #343a40; /* Warna gelap untuk teks judul */
        text-align: center;
        margin-bottom: 20px;
        font-size: 2.2rem;
    }

    p {
        text-align: center;
        font-size: 1.1em;
        margin-bottom: 20px;
    }

    .table-responsive {
        margin-top: 20px;
        overflow-x: auto;
    }

    /* Styling untuk tabel */
    .table {
        width: 100%;
        border-collapse: collapse; /* Menghilangkan jarak antar cell */
    }

    .table th, .table td {
        padding: 12px 15px;
        text-align: center;
        vertical-align: middle;
        border: 1px solid #ddd; /* Garis tabel abu-abu terang */
    }

    .table th {
        background-color: #6c757d; /* Warna abu-abu untuk header tabel */
        color: #ffffff;
        font-weight: bold;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    .table tbody tr:hover {
        background-color: rgba(108, 117, 125, 0.1); /* Warna abu-abu lebih terang saat hover */
    }

    /* Styling untuk tombol */
    .table .btn {
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .table .btn:hover {
        opacity: 0.8;
    }

    /* Styling untuk tombol tambah jadwal */
    .btn-add {
        display: inline-block;
        padding: 12px 25px;
        font-size: 1.1em;
        color: #ffffff;
        background-color: #28a745;
        border-radius: 5px;
        text-align: center;
        transition: background-color 0.3s ease;
        text-decoration: none;
        width: auto; /* Menyesuaikan lebar tombol dengan kontennya */
    }

    .btn-add:hover {
        background-color: #218838;
    }

    /* Styling untuk alert success */
    .alert {
        margin-top: 20px;
        font-size: 1.1em;
    }
</style>

<!-- Menambahkan font-awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="container">
    <h1>Manajemen Jadwal Kosong Dosen</h1>
    <p>Selamat datang di halaman jadwal kosong dosen. Anda dapat melihat, menambah, atau mengubah jadwal di sini.</p>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Dosen</th>
                    <th>Tanggal</th>
                    <th>Waktu Mulai</th>
                    <th>Waktu Selesai</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jadwal as $data)
                    <tr>
                        <td>{{ $data->dosen->nama ?? 'Tidak Diketahui' }}</td>
                        <td>{{ $data->tanggal }}</td>
                        <td>{{ $data->waktu_mulai }}</td>
                        <td>{{ $data->waktu_selesai }}</td>
                        <td>{{ ucfirst($data->status) }}</td>
                        <td>
                            <a href="{{ route('edit.jadwalkosong', $data->id_jadwal_kosong) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('delete.jadwalkosong', $data->id_jadwal_kosong) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Tidak ada jadwal yang tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <a href="{{ route('add.jadwalkosong') }}" class="btn-add">
        <i class="fas fa-plus"></i> Tambah Jadwal Baru
    </a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</div>

@endsection
