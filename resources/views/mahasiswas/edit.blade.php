@extends('mylayout.mainlayout')

@section('content')
<div class="container mt-5 d-flex justify-content-center" style="background: linear-gradient(135deg, #6c757d, #495057); min-height: 100vh;">
    <div class="w-100" style="max-width: 600px;">
        <!-- Judul Halaman -->
        <h1 class="mb-4 text-center text-white fw-bold" style="font-size: 2.5rem;">Edit Data Mahasiswa</h1>
        
        <!-- Form dengan card -->
        <div class="card p-4 shadow-lg rounded-4" style="background-color: #ffffff;">
            <form action="{{ route('mahasiswas.update', $mahasiswa->id_mahasiswa) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- NIM -->
                <div class="form-group mb-3">
                    <label for="nim" class="form-label" style="font-size: 1.1rem; color: #495057;">NIM:</label>
                    <input type="text" id="nim" name="nim" class="form-control form-control-lg" value="{{ $mahasiswa->nim }}" required style="border-radius: 25px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); background-color: #f7f7f7;">
                </div>

                <!-- Nama -->
                <div class="form-group mb-3">
                    <label for="nama" class="form-label" style="font-size: 1.1rem; color: #495057;">Nama:</label>
                    <input type="text" id="nama" name="nama" class="form-control form-control-lg" value="{{ $mahasiswa->nama }}" required style="border-radius: 25px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); background-color: #f7f7f7;">
                </div>

                <!-- Program Studi -->
                <div class="form-group mb-3">
                    <label for="program_studi" class="form-label" style="font-size: 1.1rem; color: #495057;">Program Studi:</label>
                    <input type="text" id="program_studi" name="program_studi" class="form-control form-control-lg" value="{{ $mahasiswa->program_studi }}" required style="border-radius: 25px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); background-color: #f7f7f7;">
                </div>

                <!-- Email -->
                <div class="form-group mb-3">
                    <label for="email" class="form-label" style="font-size: 1.1rem; color: #495057;">Email:</label>
                    <input type="email" id="email" name="email" class="form-control form-control-lg" value="{{ $mahasiswa->email }}" required style="border-radius: 25px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); background-color: #f7f7f7;">
                </div>

                <!-- Tombol Submit -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg" style="border-radius: 30px; padding: 12px 40px; font-size: 1.2rem; transition: all 0.3s ease;">
                        <i class="fas fa-save me-2"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
