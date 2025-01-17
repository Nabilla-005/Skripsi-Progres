@extends('layouts.mylayoutdosen', ['title' => 'Detail Progres Skripsi'])
@section('content')
@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<div class="container">
    <h3>Detail Progres Skripsi</h3>

    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Informasi Progres</h3>
            <p><strong>Nama Mahasiswa:</strong> {{ $progres->mahasiswa->nama }}</p>
            <p><strong>Tanggal Upload:</strong> {{ $progres->tanggal_upload }}</p>
            <p><strong>Komentar:</strong> {{ $progres->komentar ?? 'Belum ada komentar.' }}</p>
            <p><strong>File:</strong> 
            <a href="{{ route('ProgresSkripsi.download', $progres->id_progres) }}" target="_blank">Download File</a>
        </p>
        </div>
    </div>

    <h3>Tambahkan atau Ubah Komentar</h3>
    <form action="{{ route('ProgresSkripsi.updateKomentar', $progres->id_progres) }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="komentar">Komentar:</label>
            <textarea name="komentar" id="komentar" class="form-control" rows="4" required>{{ $progres->komentar }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Komentar</button>
    </form>

    <a href="{{ route('ProgresSkripsi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
