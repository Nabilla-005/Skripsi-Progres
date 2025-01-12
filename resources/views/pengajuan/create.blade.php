@extends('layouts.mylayouts',['title' => 'Mengajukan Judul Skripsi'])
@section('content')
<div class="container">
    <h3>Pengajuan Judul</h3>
    <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi Singkat</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="file">Dokumen Pengajuan</label>
            <input type="file" name="file" id="file" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Kirim Pengajuan</button>
    </form>
</div>
@endsection
