@extends('mylayout.mainlayout')

@section('content')
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
        padding: 40px;
        border-radius: 15px;
        margin-left: 1000px;
        margin-top: 1000px;
        max-width: 900px;
        margin: auto;
    }

    h1 {
        font-size: 2.8rem;
        color: rgb(160, 0, 95);
        font-weight: bold;
        text-align: center;
        margin-bottom: 30px;
    }

    table {
        width: 100%;
        border-spacing: 300px;
        text-align: center;
    }

    .table-section {
        width: 1000px;
        background-color: #fef8fc;
        border: 2px solid rgb(160, 0, 95);
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    h3 {
        font-size: 1.8rem;
        color: rgb(160, 0, 95);
        font-weight: 500;
        margin-bottom: 20px;
    }

    label {
        font-size: 1.1rem;
        font-weight: 500;
        color: #495057;
    }

    .form-control {
        border: 2px solid #ced4da;
        border-radius: 8px;
        padding: 12px;
        font-size: 1rem;
    }

    .btn {
        font-size: 1rem;
        font-weight: 600;
        border-radius: 8px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .btn-success {
        background-color: rgb(160, 0, 95);
        color: white;
        border: none;
    }

    .btn-warning {
        background-color: #ffc107;
        color: white;
        border: none;
    }

    .btn:hover {
        opacity: 0.9;
        transform: translateY(-2px);
    }

    /* Responsif untuk layar kecil */
    @media (max-width: 768px) {
        table {
            display: block;
        }

        .table-section {
            margin-bottom: 20px;
        }
    }
</style>

<div class="container">
    <h1>Pengaturan Backup & Restore</h1>

    <!-- Notifikasi Sukses -->
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <table>
        <tr>
            <!-- Bagian Backup -->
            <td class="table-section">
                <h3>Backup Data</h3>
                <p>Unduh data backup untuk keamanan data Anda.</p>
                <a href="{{ route('pengaturan.backup') }}" class="btn btn-success">
                    <i class="fas fa-download"></i> Download Backup
                </a>
            </td>

            <!-- Bagian Restore -->
            <td class="table-section">
                <h3>Restore Data</h3>
                <p>Unggah file backup untuk memulihkan data.</p>
                <form method="POST" action="{{ route('pengaturan.restore') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="backup_file"><i class="fas fa-file-upload"></i> Pilih File:</label>
                        <input type="file" name="backup_file" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-upload"></i> Restore Data
                    </button>
                </form>
            </td>
        </tr>
    </table>
</div>
@endsection