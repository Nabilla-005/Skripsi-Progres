@extends('layouts.mylayoutdosen',['title' => 'Mengajukan Judul Skripsi'])
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
                <td>
                <!-- Form untuk mengupdate status -->
                <form action="{{ route('pengajuan.update', $pengajuan->id_pengajuan) }}" method="POST">
                @csrf
                @method('PUT')
                <select name="status" class="form-control" onchange="this.form.submit()">
                    <option value="proses" {{ $pengajuan->status == 'proses' ? 'selected' : '' }}>Menunggu</option>
                    <option value="diterima" {{ $pengajuan->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                    <option value="ditolak" {{ $pengajuan->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </form>

            </td>
                <td><a href="{{ Storage::url($pengajuan->file_path) }}" target="_blank">Lihat Dokumen</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
