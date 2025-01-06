@extends('mylayout.mainlayout')

@section('content')
<style>
    /* Styling untuk halaman pengaturan */
    body {
        background-color: #f4f6f9;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
        background-color: #ffffff;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        margin-top: 40px;
        max-width: 900px; /* Atur lebar maksimal */
        height: auto; /* Agar tinggi menyesuaikan konten */
        margin-left: auto; /* Menambahkan jarak otomatis di kiri */
        margin-right: auto; /* Menambahkan jarak otomatis di kanan */
    }

    h1 {
        font-size: 2.5rem;
        color: #343a40;
        margin-bottom: 30px;
        font-weight: 600;
    }

    h3 {
        font-size: 1.75rem;
        color: #495057;
        margin-bottom: 20px;
        font-weight: 500;
    }

    .alert {
        font-size: 1.1rem;
        padding: 15px;
        margin-bottom: 20px;
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
        border-radius: 5px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        font-size: 1rem;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #ced4da;
    }

    label {
        font-size: 1.1rem;
        font-weight: 500;
        color: #495057;
    }

    .btn {
        padding: 12px 25px;
        font-size: 1rem;
        border-radius: 5px;
        transition: all 0.3s ease;
        width: auto; /* Membuat tombol sesuai dengan panjang teks */
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .btn-warning:hover {
        background-color: #e0a800;
        border-color: #d39e00;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    .hr-divider {
        margin: 40px 0;
        border-top: 1px solid #dee2e6;
    }

    /* Menambahkan overflow agar konten panjang bisa di-scroll */
    .container {
        max-height: calc(100vh - 100px); /* Menyesuaikan tinggi dengan viewport */
        overflow-y: auto;
        margin-left: auto;
        margin-right: auto;
    }

    /* Styling untuk menata posisi tombol */
    .btn-container {
        display: flex;
        justify-content: space-between; /* Menyusun tombol dengan jarak antara mereka */
        gap: 15px; /* Memberikan jarak antara tombol */
        margin-top: 20px;
    }

    .btn-container .btn {
        flex: 1; /* Menjadikan tombol memiliki lebar yang seimbang */
        max-width: 250px; /* Membatasi lebar tombol agar tidak terlalu besar */
    }
</style>

<div class="container">
    <h1>Pengaturan Sistem</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('pengaturan.index') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $settings->where('key', 'email')->first()->value ?? '') }}">
        </div>

        <div class="form-group">
            <label for="notifications">Notifikasi:</label>
            <input type="checkbox" name="notifications" value="1" {{ old('notifications', $settings->where('key', 'notifications')->first()->value) == '1' ? 'checked' : '' }}>
        </div>

        <div class="btn-container">
            <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
        </div>
    </form>

    <div class="hr-divider"></div>

    <h3>Backup & Restore</h3>
    <form method="POST" action="{{ route('pengaturan.restore') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="backup_file">Pilih File Backup untuk Restore:</label>
            <input type="file" name="backup_file" class="form-control">
        </div>
        <div class="btn-container">
            <button type="submit" class="btn btn-warning">Restore Data</button>
            <a href="{{ route('pengaturan.backup') }}" class="btn btn-success">Download Backup</a>
        </div>
    </form>
</div>

@endsection
