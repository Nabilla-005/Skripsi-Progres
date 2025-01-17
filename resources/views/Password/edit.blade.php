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
</style>

<div class="container my-4">
    <h1>Ubah Password</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card p-4 shadow-lg rounded-4">
        <form method="POST" action="{{ route('password.edit') }}">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="current_password" class="form-label">Password Lama</label>
                <input type="password" class="form-control" id="current_password" name="current_password" required>
            </div>

            <div class="form-group mb-3">
                <label for="password" class="form-label">Password Baru</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="form-group mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i> Simpan
            </button>
        </form>
    </div>
</div>
@endsection