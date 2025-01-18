
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
        width: 1000px;
        max-height: 100vh;
        overflow-y: auto;
        padding-bottom: 50px;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        font-size: 1.1rem;
        color: rgb(160, 0, 95);
    }

    .form-control {
        border-radius: 10px;
        border: 2px solid rgba(160, 0, 95, 0.8);
    }

    .btn {
        border-radius: 30px;
        padding: 10px 30px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-primary {
        background-color: #fd7e14;
        border-color: #fd7e14;
    }

    .btn:hover {
        opacity: 0.8;
    }

    h1 {
        font-size: 2.8rem;
        font-weight: 600;
        color: rgb(160, 0, 95);
        text-align: center;
        margin-bottom: 40px;
    }

    .card {
        max-width: 900px;
        padding: 30px;
        border: 2px solid rgba(160, 0, 95, 0.8);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease;
        margin: 0 auto;
        background-color: #ffffff;
    }

    .card:hover {
        transform: scale(1.02);
    }
</style>

<div class="container my-4">
    <h1>Tambah Jadwal Kosong</h1>

    <div class="card p-4 shadow-lg rounded-4">
        <form action="{{ route('store.jadwalkosong') }}" method="POST">
            @csrf

            <!-- Dosen -->
            <div class="form-group mb-3">
                <label for="id_dosen" class="form-label">Dosen:</label>
                <select name="id_dosen" id="id_dosen" class="form-control">
                    @foreach ($dosen as $item)
                        <option value="{{ $item->id_dosen }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Tanggal -->
            <div class="form-group mb-3">
                <label for="tanggal" class="form-label">Tanggal:</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control">
            </div>

            <!-- Waktu Mulai -->
            <div class="form-group mb-3">
                <label for="waktu_mulai" class="form-label">Waktu Mulai:</label>
                <input type="time" name="waktu_mulai" id="waktu_mulai" class="form-control">
            </div>

            <!-- Waktu Selesai -->
            <div class="form-group mb-3">
                <label for="waktu_selesai" class="form-label">Waktu Selesai:</label>
                <input type="time" name="waktu_selesai" id="waktu_selesai" class="form-control">
            </div>

            <!-- Status -->
            <div class="form-group mb-3">
                <label for="status" class="form-label">Status:</label>
                <select name="status" id="status" class="form-control">
                    <option value="tersedia">Tersedia</option>
                    <option value="penuh">Penuh</option>
                </select>
            </div>

            <!-- Tombol Submit -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection