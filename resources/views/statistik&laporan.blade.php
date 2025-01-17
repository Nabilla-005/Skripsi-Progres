@extends('mylayout.mainlayout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Mahasiswa</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body, html {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1400px; 
            max-height: 100vh;
            overflow-y: auto;
            padding-bottom: 50px;
        }

        .card {
            background-color: #f3f3f3;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 30px;
        }

        .card-title, h1, h2, p {
            color: rgb(160, 0, 95);
        }

        .chart-container {
            max-width: 1200px;
            margin: 0 auto;
            margin-top: 30px;
        }

        canvas {
            width: 100% !important;
            height: 400px !important;
        }

        /* Menjaga ukuran card tetap konsisten dan sejajar */
        .card-wrapper {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .card-wrapper .card {
            flex: 1;
            margin: 10px;
            min-width: 280px; /* Menjamin ukuran minimum untuk setiap card */
        }
        
    </style>
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center my-4">Statistik Mahasiswa</h1>

        <!-- Statistik Mahasiswa -->
        <div class="card-wrapper">
            <div class="card text-center" style="background-color: rgba(52, 152, 219, 0.5);">
                <div class="card-body">
                    <h5 class="card-title">Mahasiswa Menunggu Sidang</h5>
                    <p class="card-text display-4">{{ $menungguSidang }}</p>
                </div>
            </div>
            <div class="card text-center" style="background-color: rgba(46, 204, 113, 0.5);">
                <div class="card-body">
                    <h5 class="card-title">Mahasiswa Lulus</h5>
                    <p class="card-text display-4">{{ $lulus }}</p>
                </div>
            </div>
            <div class="card text-center" style="background-color: rgba(231, 76, 60, 0.5);">
                <div class="card-body">
                    <h5 class="card-title">Mahasiswa Progres Skripsi</h5>
                    <p class="card-text display-5">{{ $progresSkripsi }}</p>
                </div>
            </div>
        </div>

        <!-- Grafik Statistik -->
        <h2 class="text-center mb-4">Grafik Statistik Mahasiswa</h2>
        <div class="chart-container">
            <canvas id="statistikChart"></canvas>
        </div>
        <p class="text-center mt-3">Grafik di atas menunjukkan jumlah mahasiswa berdasarkan statusnya dalam proses skripsi.</p>
    </div>

    <!-- Script Chart.js -->
    <script>
        const ctx = document.getElementById('statistikChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Menunggu Sidang', 'Lulus', 'Progres Skripsi'],
                datasets: [{
                    label: 'Jumlah Mahasiswa',
                    data: [{{ $menungguSidang }}, {{ $lulus }}, {{ $progresSkripsi }}],
                    backgroundColor: [
                        'rgba(52, 152, 219, 0.5)',
                        'rgba(46, 204, 113, 0.5)',
                        'rgba(231, 76, 60, 0.5)'
                    ],
                    borderColor: [
                        'rgba(52, 152, 219, 1)',
                        'rgba(46, 204, 113, 1)',
                        'rgba(231, 76, 60, 1)'
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
