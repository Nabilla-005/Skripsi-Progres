@extends('mylayout.mainlayout')

@section('content')

<div class="container my-4">
    <h1 class="text-center mb-4">Tambah Akun Mahasiswa</h1>
    <div class="card p-4 shadow-sm">
        <form action="{{ route('mahasiswas.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" name="nim" id="nim" class="form-control" value="{{ old('nim') }}" placeholder="Masukkan NIM">
                @error('nim')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" placeholder="Masukkan Nama">
                @error('nama')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="program_studi" class="form-label">Program Studi</label>
                <input type="text" name="program_studi" id="program_studi" class="form-control" value="{{ old('program_studi') }}" placeholder="Masukkan Program Studi">
                @error('program_studi')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Masukkan Email">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password">
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection
