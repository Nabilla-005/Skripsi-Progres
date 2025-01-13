@extends('layouts.mylayouts', ['title' => 'Mengajukan Judul Skripsi'])
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
                <th>Aksi</th> <!-- Kolom untuk tombol aksi -->
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
                <td>
                    <!-- Tombol Download -->
                    <a href="{{ route('pengajuan.download', $pengajuan->id_pengajuan) }}" class="btn btn-primary">Download</a>
                </td>
                <td>
                    <!-- Tombol Hapus -->
                    <form action="{{ route('pengajuan.hapus', $pengajuan->id_pengajuan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengajuan ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Batalkan Pengajuan</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
