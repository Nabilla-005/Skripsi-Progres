@extends('mylayout.mainlayout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Sistem</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Menambahkan overflow agar halaman bisa di-scroll */
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .container {
            max-height: 100vh;
            overflow-y: auto;
            padding-bottom: 50px; /* Untuk memberi ruang jika konten terlalu panjang */
        }

        .card {
            height: 100%;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center my-4">Statistik Sistem</h1>

        <!-- Card Statistik -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Mahasiswa</h5>
                        <p class="card-text display-4">{{ $totalMahasiswa }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Dosen</h5>
                        <p class="card-text display-4">{{ $totalDosen }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Jadwal</h5>
                        <p class="card-text display-4">{{ $totalJadwal }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Feedback dan Penilaian</h5>
                        <p class="card-text display-4">{{ $totalFeedback }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Forum Diskusi</h5>
                        <p class="card-text display-4">{{ $totalForumDiskusi }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grafik -->
        <h2 class="text-center mb-4">Grafik Statistik</h2>
        <div class="d-flex justify-content-center">
            <div style="max-width: 600px; width: 100%;">
                <canvas id="statsChart"></canvas>
            </div>
        </div>
        <p class="text-center mt-3">Grafik di atas menunjukkan jumlah total mahasiswa, dosen, dan jadwal dalam sistem.</p>
    </div>

    <!-- Script Chart.js -->
    <script>
        const ctx = document.getElementById('statsChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Mahasiswa', 'Dosen', 'Jadwal', 'Feedback', 'ForumDiskusi',],
                datasets: [{
                    label: 'Jumlah',
                    data: [{{ $totalMahasiswa }}, {{ $totalDosen }}, {{ $totalJadwal }}, {{ $totalFeedback }}, {{ $totalForumDiskusi}}, ],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)',
                        'rgba(75, 19, 192, 0.5)',
                        'rgba(153, 10, 255, 0.5)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(123, 239, 127, 0.5)',
                        'rgba(210, 116, 159, 0.5)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Kategori'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
@endsection
