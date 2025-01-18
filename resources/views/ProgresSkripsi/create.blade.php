
@extends('layouts.mylayouts', ['title' => 'Upload Progres Skripsi'])
@section('content')
<hr class="my-5" />
    <div class="card">
        <div class="card-body">
            <h3 class="card-title"><strong>Upload Progres Skripsi</strong></h3>

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
                <div class="form-group mt-1 mb-3">
                    <label for="file">Pilih File:</label>
                    <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror" required>
                    <span class="text-danger">{{ $errors->first('file') }}</span>
                </div>

                <button type="submit" class="btn btn-primary mt-2">Upload</button>
            </form>

        </div>
    </div>
<hr class="my-5" />
@endsection