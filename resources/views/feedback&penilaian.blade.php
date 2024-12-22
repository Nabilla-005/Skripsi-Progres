@extends('mylayout.mainlayout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback dan Penilaian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Feedback dan Penilaian</h1>
        
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
