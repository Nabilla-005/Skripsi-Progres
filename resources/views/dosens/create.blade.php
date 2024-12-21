@extends('mylayout.mainlayout')

@section('content')

<div class="container my-5 d-flex justify-content-center" style="background: linear-gradient(to right, #757575, #424242); min-height: 100vh;">
    <div class="w-100" style="max-width: 600px;">
        <!-- Judul Halaman -->
        <h1 class="text-center mb-4" style="font-size: 2.5rem; color: #f5f5f5; font-weight: bold; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);">Tambah Akun Dosen</h1>

        <!-- Form Input -->
        <div class="card p-4 shadow-lg rounded-4" style="background-color: #ffffff; max-height: 80vh; overflow-y: auto;">
            <form action="{{ route('dosens.store') }}" method="POST">
                @csrf

                <!-- NIP -->
                <div class="form-group mb-4">
                    <label for="nip" class="form-label" style="font-size: 1.1rem; color: #424242;">NIP</label>
                    <input type="text" name="nip" id="nip" class="form-control form-control-lg" value="{{ old('nip') }}" placeholder="Masukkan NIP" style="border-radius: 30px; background-color: #f1f1f1; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    @error('nip')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Nama -->
                <div class="form-group mb-4">
                    <label for="nama" class="form-label" style="font-size: 1.1rem; color: #424242;">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control form-control-lg" value="{{ old('nama') }}" placeholder="Masukkan Nama" style="border-radius: 30px; background-color: #f1f1f1; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Fakultas -->
                <div class="form-group mb-4">
                    <label for="fakultas" class="form-label" style="font-size: 1.1rem; color: #424242;">Fakultas</label>
                    <input type="text" name="fakultas" id="fakultas" class="form-control form-control-lg" value="{{ old('fakultas') }}" placeholder="Masukkan Fakultas" style="border-radius: 30px; background-color: #f1f1f1; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    @error('fakultas')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group mb-4">
                    <label for="email" class="form-label" style="font-size: 1.1rem; color: #424242;">Email</label>
                    <input type="email" name="email" id="email" class="form-control form-control-lg" value="{{ old('email') }}" placeholder="Masukkan Email" style="border-radius: 30px; background-color: #f1f1f1; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group mb-4">
                    <label for="password" class="form-label" style="font-size: 1.1rem; color: #424242;">Password</label>
                    <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Masukkan Password" style="border-radius: 30px; background-color: #f1f1f1; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg" style="padding: 12px 40px; border-radius: 50px; font-size: 1.2rem; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
