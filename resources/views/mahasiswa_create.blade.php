@extends('layouts.mylayouts',['title' => 'Tambah Data Jadwal Dosen'])
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Jadwal Kosong Dosen</h5>
            <form action="/pasien" method="POST">
                @csrf
                <div class="form-group mt-1 mb-3">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                        name="tanggal" value="{{ old('tanggal') }}">
                    <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="waktu_mulai">Waktu Mulai</label>
                    <input type="time" class="form-control @error('waktu_mulai') is-invalid @enderror" id="waktu_mulai"
                        name="waktu_mulai" value="{{ old('waktu_mulai') }}">
                    <span class="text-danger">{{ $errors->first('waktu_mulai') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="waktu_selesai">Waktu Selesai</label>
                    <input type="time" class="form-control @error('waktu_selesai') is-invalid @enderror" id="waktu_selesai"
                        name="waktu_selesai" value="{{ old('waktu_selesai') }}">
                    <span class="text-danger">{{ $errors->first('waktu_selesai') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="status">Status</label>
                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                        <option value="">-- Pilih Status --</option>
                        <option value="tersedia" {{ old('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="penuh" {{ old('status') == 'penuh' ? 'selected' : '' }}>Penuh</option>
                    </select>
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Simpan</button>
            </form>
        </div>
    </div>
@endsection
