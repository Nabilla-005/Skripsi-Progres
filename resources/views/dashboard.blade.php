@extends('mylayout.mainlayout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafik Sistem</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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

        .card {
            background-color: #f3f3f3; /* Soft grey background */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px; /* Menambahkan jarak antar card */
            padding: 20px;
        }

        .card-title, h1, h2, p {
            color: rgb(160, 0, 95); /* Warna teks utama */
        }

        .chart-container {
            max-width: 800px;
            margin: 0 auto;
            margin-top: 30px; /* Memberikan jarak antara grafik dan card */
        }

        canvas {
            width: 100% !important;
            height: 400px !important;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center my-4">Grafik Sistem</h1>

        <!-- Card Statistik -->
        <!-- Card Statistik -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-center" style="background-color: rgba(255, 182, 193, 0.5);">
                <div class="card-body">
                    <h5 class="card-title" style="color: rgb(160, 0, 95);">Total Mahasiswa</h5>
                    <p class="card-text display-4" style="color: rgb(160, 0, 95);">{{ $totalMahasiswa }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm text-center" style="background-color: rgba(153, 102, 255, 0.5);">
                <div class="card-body">
                    <h5 class="card-title" style="color: rgb(160, 0, 95);">Total Dosen</h5>
                    <p class="card-text display-4" style="color: rgb(160, 0, 95);">{{ $totalDosen }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm text-center" style="background-color: rgba(255, 159, 64, 0.5);">
                <div class="card-body">
                    <h5 class="card-title" style="color: rgb(160, 0, 95);">Total Jadwal</h5>
                    <p class="card-text display-4" style="color: rgb(160, 0, 95);">{{ $totalJadwal }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm text-center" style="background-color: rgba(201, 213, 37, 0.5);">
                <div class="card-body">
                    <h5 class="card-title" style="color: rgb(160, 0, 95);">Total Feedback dan Penilaian</h5>
                    <p class="card-text display-4" style="color: rgb(160, 0, 95);">{{ $totalFeedback }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm text-center" style="background-color: rgba(97, 216, 237, 0.5);">
                <div class="card-body">
                    <h5 class="card-title" style="color: rgb(160, 0, 95);">Total Manjemen Skripsi</h5>
                    <p class="card-text display-4" style="color: rgb(160, 0, 95);">{{ $totalForumDiskusi }}</p>
                </div>
            </div>
        </div>
    </div>

        <!-- Grafik -->
        <h2 class="text-center mb-4">Grafik Sistem</h2>
        <div class="chart-container">
            <canvas id="statsChart"></canvas>
        </div>
        <p class="text-center mt-3">Grafik di atas menunjukkan jumlah total mahasiswa, dosen, dan jadwal dalam sistem.</p>
    </div>

     <!-- Script Chart.js -->
     <script>
        const ctx = document.getElementById('statsChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Mahasiswa', 'Dosen', 'Jadwal', 'Feedback', 'Manajemen Skripsi',],
                datasets: [{
                    label: 'Jumlah',
                    data: [{{ $totalMahasiswa }}, {{ $totalDosen }}, {{ $totalJadwal }}, {{ $totalFeedback }}, {{ $totalManajemenSkripsi}}, ],
                    backgroundColor: [
                        'rgba(255, 182, 193, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)',
                        'rgba(75, 19, 192, 0.5)',
                        'rgba(153, 10, 255, 0.5)',
                    ],
                    borderColor: [
                        'rgba(255, 182, 193, 0.5)',
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