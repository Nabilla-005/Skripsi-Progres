@extends('layouts.mylayouts',['title' => 'Mengajukan Jadwal Bimbingan'])
@section('content')

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Pengajuan Jadwal Bimbingan</h3>
            <form action="{{ route('PengajuanBimbingan.store') }}" method="POST">
                @csrf
                <div class="form-group mt-1 mb-3">
                    <label for="id_mahasiswa">Nama Mahasiswa</label>
                    <select class="form-control @error('id_mahasiswa') is-invalid @enderror" id="id_mahasiswa" name="id_mahasiswa">
                        <option value="">-- Nama Anda --</option>
                        @foreach ($mahasiswas as $mahasiswa)
                            <option value="{{ $mahasiswa->id_mahasiswa }}" {{ old('id_mahasiswa') == $mahasiswa->id_mahasiswa ? 'selected' : '' }}>
                                {{ $mahasiswa->nama }}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('id_mahasiswa') }}</span>
                </div>

                <div class="form-group mt-1 mb-3">
                    <label for="id_jadwal_kosong">Jadwal Kosong Dosen</label>
                    <select class="form-control @error('id_jadwal_kosong') is-invalid @enderror" id="id_jadwal_kosong" name="id_jadwal_kosong">
                        <option value="">-- ID Jadwal Sesuai Tabel Jadwal Dosen --</option>
                        @foreach ($jadwal_kosong as $jadwal)
                            <option value="{{ $jadwal->id_jadwal_kosong }}" {{ old('id_jadwal_kosong') == $jadwal->id_jadwal_kosong ? 'selected' : '' }}>
                                {{ $jadwal->id_jadwal_kosong }} <!-- Menampilkan nama dosen -->
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('id_jadwal_kosong') }}</span>
                </div>

                <div class="form-group mt-1 mb-3">
                    <label for="tanggal_pengajuan">Tanggal</label>
                    <input type="date" class="form-control @error('tanggal_pengajuan') is-invalid @enderror" id="tanggal_pengajuan"
                        name="tanggal_pengajuan" value="{{ old('tanggal_pengajuan') }}">
                    <span class="text-danger">{{ $errors->first('tanggal_pengajuan') }}</span>
                </div>

                <button type="submit" class="btn btn-primary mt-2">Simpan</button>
            </form>

        </div>
    </div>
@endsection