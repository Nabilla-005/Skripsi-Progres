@extends('layouts.mylayoutdosen', ['title' => 'Detail Progres Skripsi'])
@section('content')
<hr class="my-5" />
    <div class="card">
        <div class="card-body">
            <h3 class="card-title"><strong>Detail Progres Skripsi</strong></h3>

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <!-- Informasi Progres Skripsi -->
            <div class="mb-4">
                <label for="nama_mahasiswa">Nama Mahasiswa</label>
                <input type="text" class="form-control" id="nama_mahasiswa" value="{{ $progres->mahasiswa->nama }}" readonly>
            </div>

            <div class="mb-4">
                <label for="tanggal_upload">Tanggal Upload</label>
                <input type="text" class="form-control" id="tanggal_upload" value="{{ $progres->tanggal_upload }}" readonly>
            </div>

            <div class="mb-4">
                <label for="komentar">Komentar</label>
                <textarea class="form-control" id="komentar" rows="4" readonly>{{ $progres->komentar ?? 'Belum ada komentar.' }}</textarea>
            </div>

            <div class="mb-4">
                <label for="file">File Progres Skripsi</label>
                <a href="{{ route('ProgresSkripsi.download', $progres->id_progres) }}" class="btn btn-info">Download File</a>
            </div>

            <!-- Space Pemisah antara Informasi dan Form Komentar -->
            <hr class="my-4">

            <!-- Form untuk menambah atau mengubah komentar -->
            <h5>Tambahkan atau Ubah Komentar</h5>
            <form action="{{ route('ProgresSkripsi.updateKomentar', $progres->id_progres) }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="komentar">Komentar Baru</label>
                    <textarea name="komentar" id="komentar" class="form-control" rows="4">{{ $progres->komentar }}</textarea>
                </div>
                <button type="submit" class="btn btn-info mt-2">Simpan Komentar</button>
            </form>

            <a href="{{ route('ProgresSkripsi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </div>
    <hr class="my-5" />
@endsection
