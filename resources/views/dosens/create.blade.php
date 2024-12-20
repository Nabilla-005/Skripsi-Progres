@extends('mylayout.mainlayout')

@section('content')

<div class="container my-4">
    <h1 class="text-center mb-4">Tambah Akun Dosen</h1>
    <div class="card p-4 shadow-sm">
        <form action="{{ route('dosens.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" name="nip" id="nip" class="form-control" value="{{ old('nip') }}" placeholder="Masukkan NIP">
                @error('nip')
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
                <label for="fakultas" class="form-label">Fakultas</label>
                <input type="text" name="fakultas" id="fakultas" class="form-control" value="{{ old('fakultas') }}" placeholder="Masukkan Fakultas">
                @error('fakultas')
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
