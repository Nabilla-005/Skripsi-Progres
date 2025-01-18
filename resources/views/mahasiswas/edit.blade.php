
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

    .btn-success {
        background-color: rgba(160, 0, 95, 0.9);
        border-color: rgba(160, 0, 95, 0.9);
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
    <h1>Edit Data Mahasiswa</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card p-4 shadow-lg rounded-4">
        <form action="{{ route('mahasiswas.update', $mahasiswa->id_mahasiswa) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- NIM -->
            <div class="form-group mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" id="nim" name="nim" class="form-control" value="{{ $mahasiswa->nim }}" required>
            </div>

            <!-- Nama -->
            <div class="form-group mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" value="{{ $mahasiswa->nama }}" required>
            </div>

            <!-- Program Studi -->
            <div class="form-group mb-3">
                <label for="program_studi" class="form-label">Program Studi</label>
                <input type="text" id="program_studi" name="program_studi" class="form-control" value="{{ $mahasiswa->program_studi }}" required>
            </div>

            <!-- Email -->
            <div class="form-group mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ $mahasiswa->email }}" required>
            </div>

            <button type="submit" class="btn btn-success">
                <i class="fas fa-save me-2"></i> Update
            </button>
        </form>
    </div>
</div>
@endsection