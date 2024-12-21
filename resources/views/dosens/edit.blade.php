@extends('mylayout.mainlayout')

@section('content')

<div class="container mt-5 d-flex justify-content-center" style="background: linear-gradient(to right, #E0E0E0, #B0B0B0); height: 100vh; overflow-y: auto;">
    <div class="w-100" style="max-width: 700px;">

        <!-- Title with shadow effect -->
        <h1 class="mb-4 text-center text-dark fw-bold" style="font-size: 2.5rem; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);">Edit Dosen</h1>
        
        <!-- Form with shadow effect -->
        <form action="{{ route('dosens.update', $dosen->id_dosen) }}" method="POST" class="p-5 border rounded shadow-lg" style="background-color: white; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            @csrf
            @method('PUT')

            <!-- NIP field -->
            <div class="form-group mb-4">
                <label for="nip" class="form-label" style="font-size: 1.2rem; color: #555;">NIP:</label>
                <input type="text" id="nip" name="nip" class="form-control form-control-lg" value="{{ $dosen->nip }}" required style="border-radius: 30px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            </div>

            <!-- Name field -->
            <div class="form-group mb-4">
                <label for="nama" class="form-label" style="font-size: 1.2rem; color: #555;">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-control form-control-lg" value="{{ $dosen->nama }}" required style="border-radius: 30px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            </div>

            <!-- Fakultas field -->
            <div class="form-group mb-4">
                <label for="fakultas" class="form-label" style="font-size: 1.2rem; color: #555;">Fakultas:</label>
                <input type="text" id="fakultas" name="fakultas" class="form-control form-control-lg" value="{{ $dosen->fakultas }}" required style="border-radius: 30px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            </div>

            <!-- Email field -->
            <div class="form-group mb-4">
                <label for="email" class="form-label" style="font-size: 1.2rem; color: #555;">Email:</label>
                <input type="email" id="email" name="email" class="form-control form-control-lg" value="{{ $dosen->email }}" required style="border-radius: 30px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg d-flex align-items-center justify-content-center" style="font-size: 1.2rem; padding: 12px 30px; border-radius: 50px;">
                    <i class="fas fa-save me-2"></i> Update
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
