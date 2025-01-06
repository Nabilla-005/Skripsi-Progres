@extends('mylayout.mainlayout')

@section('content')

<!-- Container with scroll effect -->
<div class="container mt-5 d-flex justify-content-center">
    <div class="w-100" style="max-width: 500px; height: 100%; overflow-y: auto;">

        <!-- Title with dark gray and slight effect -->
        <h1 class="mb-4 text-center fw-bold" style="font-size: 2rem; color: #333; text-shadow: 2px 2px 5px rgba(0,0,0,0.2);">
            Edit Jadwal Kosong
        </h1>

        <!-- Card with white background and slight dark gradient -->
        <div class="card p-3 shadow-lg rounded-3" style="background: linear-gradient(to right, #f7f7f7, #e0e0e0);">

            <form action="{{ route('update.jadwalkosong', $jadwal->id_jadwal_kosong) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Dosen -->
                <div class="form-group mb-2">
                    <label for="id_dosen" class="form-label" style="font-size: 1rem; color: #555;">Dosen</label>
                    <select name="id_dosen" id="id_dosen" class="form-control form-control-lg" style="border-radius: 15px; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);">
                        @foreach ($dosen as $item)
                            <option value="{{ $item->id_dosen }}" {{ $jadwal->id_dosen == $item->id_dosen ? 'selected' : '' }}>
                                {{ $item->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Tanggal -->
                <div class="form-group mb-2">
                    <label for="tanggal" class="form-label" style="font-size: 1rem; color: #555;">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control form-control-lg" value="{{ $jadwal->tanggal }}" style="border-radius: 15px; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);">
                </div>

                <!-- Waktu Mulai -->
                <div class="form-group mb-2">
                    <label for="waktu_mulai" class="form-label" style="font-size: 1rem; color: #555;">Waktu Mulai</label>
                    <input type="time" name="waktu_mulai" id="waktu_mulai" class="form-control form-control-lg" value="{{ $jadwal->waktu_mulai->format('H:i:s') }}" step="1" style="border-radius: 15px; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);">
                </div>

                <!-- Waktu Selesai -->
                <div class="form-group mb-2">
                    <label for="waktu_selesai" class="form-label" style="font-size: 1rem; color: #555;">Waktu Selesai</label>
                    <input type="time" name="waktu_selesai" id="waktu_selesai" class="form-control form-control-lg" value="{{ $jadwal->waktu_selesai->format('H:i:s') }}" step="1" style="border-radius: 15px; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);">
                </div>

                <!-- Status -->
                <div class="form-group mb-2">
                    <label for="status" class="form-label" style="font-size: 1rem; color: #555;">Status</label>
                    <select name="status" id="status" class="form-control form-control-lg" style="border-radius: 15px; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);">
                        <option value="tersedia" {{ $jadwal->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="penuh" {{ $jadwal->status == 'penuh' ? 'selected' : '' }}>Penuh</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg" style="border-radius: 30px; padding: 12px 40px; font-size: 1.2rem; transition: all 0.3s ease-in-out;">
                        <i class="fas fa-save me-2"></i> Perbarui
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
