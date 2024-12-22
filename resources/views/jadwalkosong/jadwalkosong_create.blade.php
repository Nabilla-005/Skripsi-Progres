@extends('mylayout.mainlayout')

@section('content')

<!-- Container dengan efek scroll -->
<div class="container mt-5 d-flex justify-content-center">
    <div class="w-100" style="max-width: 600px; height: 100%; overflow-y: auto;">

        <!-- Judul dengan warna abu gelap dan sedikit efek -->
        <h1 class="mb-4 text-center fw-bold" style="font-size: 2rem; color: #333; text-shadow: 2px 2px 5px rgba(0,0,0,0.2);">
            Tambah Jadwal Kosong
        </h1>

        <!-- Card dengan latar belakang putih dan sedikit gradasi abu gelap -->
        <div class="card p-4 shadow-lg rounded-4" style="background: linear-gradient(to right, #f7f7f7, #e0e0e0);">

            <form action="{{ route('store.jadwalkosong') }}" method="POST">
                @csrf

                <!-- Dosen -->
                <div class="form-group mb-3">
                    <label for="id_dosen" class="form-label" style="font-size: 1.1rem; color: #555;">Dosen</label>
                    <select name="id_dosen" id="id_dosen" class="form-control form-control-lg" style="border-radius: 25px; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);">
                        @foreach ($dosen as $item)
                            <option value="{{ $item->id_dosen }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Tanggal -->
                <div class="form-group mb-3">
                    <label for="tanggal" class="form-label" style="font-size: 1.1rem; color: #555;">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control form-control-lg" style="border-radius: 25px; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);">
                </div>

                <!-- Waktu Mulai -->
                <div class="form-group mb-3">
                    <label for="waktu_mulai" class="form-label" style="font-size: 1.1rem; color: #555;">Waktu Mulai</label>
                    <input type="time" name="waktu_mulai" id="waktu_mulai" class="form-control form-control-lg" style="border-radius: 25px; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);">
                </div>

                <!-- Waktu Selesai -->
                <div class="form-group mb-3">
                    <label for="waktu_selesai" class="form-label" style="font-size: 1.1rem; color: #555;">Waktu Selesai</label>
                    <input type="time" name="waktu_selesai" id="waktu_selesai" class="form-control form-control-lg" style="border-radius: 25px; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);">
                </div>

                <!-- Status -->
                <div class="form-group mb-3">
                    <label for="status" class="form-label" style="font-size: 1.1rem; color: #555;">Status</label>
                    <select name="status" id="status" class="form-control form-control-lg" style="border-radius: 25px; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);">
                        <option value="tersedia">Tersedia</option>
                        <option value="penuh">Penuh</option>
                    </select>
                </div>

                <!-- Tombol Submit -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg" style="border-radius: 30px; padding: 12px 40px; font-size: 1.2rem; transition: all 0.3s ease-in-out;">
                        <i class="fas fa-save me-2"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
