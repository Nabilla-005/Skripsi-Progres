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
        padding: 20px 40px;
        text-align: center;
        border: 2px solid black;
        font-weight: 500;
    }

    .table th {
        background-color: rgba(160, 0, 95, 0.8); /* Warna header tabel sesuai permintaan */
        color: white;
        font-size: 1.2rem;
    }

    .table td {
        font-size: 1rem;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(160, 0, 95, 0.3); /* Hover dengan warna transparan */
    }

    .btn {
        border-radius: 8px;
        transition: background-color 0.3s ease;
        padding: 12px 20px;
        text-align: center;
        width: auto;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 5px;
        font-size: 1rem;
        font-weight: bold;
    }

    /* Tombol dengan warna serasi */
    .btn-success {
        background-color: rgba(160, 0, 95, 0.9);
        border-color: rgba(160, 0, 95, 0.9);
        color: white;
    }

    .btn-primary {
        background-color: #fd7e14; /* Oranye lembut */
        border-color: #fd7e14;
        color: white;
    }

    .btn-danger {
        background-color: #dc3545; /* Merah cerah */
        border-color: #dc3545;
        color: white;
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

    /* Tombol "Tambah Jadwal Kosong" di pojok kanan atas */
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

    .d-flex-center {
        display: flex;
        justify-content: center;
    }

    .btn-group {
        display: flex;
        gap: 10px;
    }

    .d-flex-center .btn {
        width: auto;
    }
</style>

<div class="container my-4">
    <h1 class="text-center mb-4">Profil Saya</h1>
    <p style="font-size: 1.5rem;"><strong>Nama:</strong> {{ $user->name }}</p>
<p style="font-size: 1.5rem;"><strong>Email:</strong> {{ $user->email }}</p>

    <div class="btn-group">
        <a href="{{ route('ProfilAdmin.edit') }}" class="btn btn-primary">
            <i class="fas fa-edit"></i> Edit Profil
        </a>
        <a href="{{ route('password.edit') }}" class="btn btn-secondary">
            <i class="fas fa-key"></i> Ubah Password
        </a>
    </div>
</div>

@endsection
