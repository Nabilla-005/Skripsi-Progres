@extends('layouts.mylayouts', ['title' => 'Upload Progres Skripsi'])
@section('content')
<div class="container">
    <h3>Upload Progres Skripsi</h3>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ProgresSkripsi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="file">Pilih File:</label>
            <input type="file" name="file" id="file" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

    <a href="{{ route('ProgresSkripsi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
