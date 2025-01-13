@extends('mylayout.mainlayout')

@section('content')
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
            padding: 20px 45px;
            text-align: center;
            border: 2px solid black;
        }

        .table th {
            background-color: rgba(160, 0, 95, 0.8);
            color: white;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(160, 0, 95, 0.3);
        }

        .btn {
            border-radius: 5px;
            transition: background-color 0.3s ease;
            padding: 10px 16px;
            text-align: center;
            width: auto;
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

        .btn-danger {
            background-color: #dc3545;
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
            font-size: 2.8rem;
            font-weight: 600;
            color: rgb(160, 0, 95);
        }

        .table-responsive {
            max-height: 400px;
            overflow-y: auto;
        }
    </style>
</head>

<div class="container mt-5">
    <h1 class="text-center mb-4">Feedback dan Penilaian</h1>
    
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Mahasiswa</th>
                    <th>Progres Skripsi</th>
                    <th>Komentar Feedback</th>
                    <th>Penilaian</th>
                    <th>Tanggal Upload</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($allFeedback as $feedback)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $feedback->progres->mahasiswa->nama ?? 'Tidak diketahui' }}</td>
                        <td><a href="{{ asset($feedback->progres->file_path) }}" target="_blank">Lihat Progres</a></td>
                        <td>{{ $feedback->komentar }}</td>
                        <td>{{ $feedback->penilaian }}</td>
                        <td>{{ $feedback->progres->tanggal_upload }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data feedback dan penilaian.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
