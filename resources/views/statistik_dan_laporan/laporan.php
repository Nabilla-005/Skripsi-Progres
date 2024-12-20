<!-- resources/views/statistik_dan_laporan/laporan.blade.php -->
@extends('mylayout.mainlayout')

@section('content')
<div class="container">
    <h1>Laporan Aktivitas</h1>

    <h3>Aktivitas Mahasiswa</h3>
    <ul>
        @foreach($aktivitasMahasiswa as $mahasiswa)
            <li>{{ $mahasiswa->nama }} - Aktivitas: {{ $mahasiswa->logAktivitas->pluck('jenis_aktivitas')->join(', ') }}</li>
        @endforeach
    </ul>

    <h3>Aktivitas Dosen</h3>
    <ul>
        @foreach($aktivitasDosen as $dosen)
            <li>{{ $dosen->nama }} - Aktivitas: {{ $dosen->logAktivitas->pluck('jenis_aktivitas')->join(', ') }}</li>
        @endforeach
    </ul>
</div>
@endsection
