@extends('mylayout.mainlayout')

@section('content')

<div class="container my-5">
    <h3 class="text-center mb-4 font-weight-bold text-white" style="font-size: 2.5rem; text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.7);">Tambah Akun Mahasiswa</h3>
    <div class="card p-5 shadow-lg rounded-lg border-0" style="background: linear-gradient(to right, #555, #333); max-width: 1200px; width: 100%; margin: auto; height: 600px; overflow-y: auto;">
        <form action="{{ route('mahasiswas.store') }}" method="POST">
            @csrf
            <div class="form-group mb-4">
                <label for="nim" class="form-label text-light" style="font-size: 1.2rem;">NIM</label>
                <input type="text" name="nim" id="nim" class="form-control form-control-lg rounded-pill" value="{{ old('nim') }}" placeholder="Masukkan NIM" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                @error('nim')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="nama" class="form-label text-light" style="font-size: 1.2rem;">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control form-control-lg rounded-pill" value="{{ old('nama') }}" placeholder="Masukkan Nama" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                @error('nama')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="program_studi" class="form-label text-light" style="font-size: 1.2rem;">Program Studi</label>
                <input type="text" name="program_studi" id="program_studi" class="form-control form-control-lg rounded-pill" value="{{ old('program_studi') }}" placeholder="Masukkan Program Studi" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                @error('program_studi')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="email" class="form-label text-light" style="font-size: 1.2rem;">Email</label>
                <input type="email" name="email" id="email" class="form-control form-control-lg rounded-pill" value="{{ old('email') }}" placeholder="Masukkan Email" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="password" class="form-label text-light" style="font-size: 1.2rem;">Password</label>
                <input type="password" name="password" id="password" class="form-control form-control-lg rounded-pill" placeholder="Masukkan Password" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-primary rounded-pill px-5 py-3" style="font-size: 1.2rem;">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection
