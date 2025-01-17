@extends('layouts.mylayouts',['title' => 'Mengajukan Judul Skripsi'])
@section('content')
<div class="container">
    <h3>Daftar Pengajuan Judul</h3>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
            <th>No</th>
            <th>Nama Mahasiswa</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Dokumen</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengajuans as $pengajuan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pengajuan->mahasiswa->nama }}</td>
                <td>{{ $pengajuan->judul }}</td>
                <td>{{ $pengajuan->deskripsi }}</td>
                <td>{{ $pengajuan->status }}</td>
                <td><a href="{{ Storage::url($pengajuan->file_path) }}" target="_blank">Lihat Dokumen</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
