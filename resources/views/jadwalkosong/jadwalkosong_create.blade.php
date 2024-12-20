@extends('mylayout.mainlayout')

@section('content')

<h1>Tambah Jadwal Kosong</h1>

<form action="{{ route('store.jadwalkosong') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="id_dosen">Dosen</label>
        <select name="id_dosen" id="id_dosen" class="form-control">
            @foreach ($dosen as $item)
                <option value="{{ $item->id_dosen }}">{{ $item->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" class="form-control">
    </div>

    <div class="form-group">
        <label for="waktu_mulai">Waktu Mulai</label>
        <input type="time" name="waktu_mulai" id="waktu_mulai" class="form-control">
    </div>

    <div class="form-group">
        <label for="waktu_selesai">Waktu Selesai</label>
        <input type="time" name="waktu_selesai" id="waktu_selesai" class="form-control">
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control">
            <option value="tersedia">Tersedia</option>
            <option value="penuh">Penuh</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

@endsection