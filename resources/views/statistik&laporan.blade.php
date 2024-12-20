@extends('mylayout.mainlayout')

@section('content')
<div class="container">
    <h1>Statistik Sistem</h1>
    <div>
        <p>Total Mahasiswa: {{ $totalMahasiswa }}</p>
        <p>Total Dosen: {{ $totalDosen }}</p>
        <p>Total Jadwal: {{ $totalJadwal }}</p>
    </div>
</div>
@endsection
