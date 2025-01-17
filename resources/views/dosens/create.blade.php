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

    .btn-success {
        background-color: rgba(160, 0, 95, 0.9);
        border-color: rgba(160, 0, 95, 0.9);
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

    /* Layout grid untuk menyusun form input */
    .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .col-half {
        flex: 0 0 48%;
    }
</style>

<div class="container my-4">
    <h1 class="text-center mb-4">Tambah Akun Dosen</h1>

    <div class="card p-4 shadow-lg rounded-4">
        <form action="{{ route('dosens.store') }}" method="POST">
            @csrf

            <!-- NIP -->
            <div class="form-group mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" name="nip" id="nip" class="form-control" value="{{ old('nip') }}" placeholder="Masukkan NIP">
                @error('nip')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Nama -->
            <div class="form-group mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" placeholder="Masukkan Nama">
                @error('nama')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Fakultas -->
            <div class="form-group mb-3">
                <label for="fakultas" class="form-label">Fakultas</label>
                <input type="text" name="fakultas" id="fakultas" class="form-control" value="{{ old('fakultas') }}" placeholder="Masukkan Fakultas">
                @error('fakultas')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Row untuk input email dan password -->
            <div class="row">
                <!-- Email -->
                <div class="col-half form-group mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Masukkan Email">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Password -->
                <div class="col-half form-group mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection