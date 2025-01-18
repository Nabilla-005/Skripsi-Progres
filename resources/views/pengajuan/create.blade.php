
@extends('layouts.mylayouts',['title' => 'Mengajukan Judul Skripsi'])
@section('content')
<hr class="my-5" />
    <div class="card">
        <div class="card-body">
            <h3 class="card-title"><strong>Pengajuan Judul Skripsi</strong></h3>
            <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-1 mb-3">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" required>
                    <span class="text-danger">{{ $errors->first('judul') }}</span>
                </div>

                <div class="form-group mt-1 mb-3">
                    <label for="deskripsi">Deskripsi Singkat</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" required></textarea>
                    <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                </div>

                <div class="form-group mt-1 mb-3">
                    <label for="file">Dokumen Pengajuan</label>
                    <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror" required>
                    <span class="text-danger">{{ $errors->first('file') }}</span>
                </div>

                <button type="submit" class="btn btn-primary mt-2">Kirim Pengajuan</button>
            </form>
        </div>
    </div>
    <hr class="my-5" />
@endsection