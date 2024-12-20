@extends('mylayout.mainlayout')
@section('content')

<h1>Edit Jadwal Kosong</h1>

<form action="{{ route('update.jadwalkosong', $jadwal->id_jadwal_kosong) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="id_dosen">Dosen</label>
        <select name="id_dosen" id="id_dosen" class="form-control">
            @foreach ($dosen as $item)
                <option value="{{ $item->id_dosen }}" 
                        {{ $jadwal->id_dosen == $item->id_dosen ? 'selected' : '' }}>
                    {{ $item->nama }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $jadwal->tanggal }}">
    </div>

    <div class="form-group">
        <label for="waktu_mulai">Waktu Mulai</label>
        <input type="time" name="waktu_mulai" id="waktu_mulai" class="form-control" value="{{ $jadwal->waktu_mulai->format('H:i:s') }}" step="1">
    </div>

    <div class="form-group">
        <label for="waktu_selesai">Waktu Selesai</label>
        <input type="time" name="waktu_selesai" id="waktu_selesai" class="form-control" value="{{ $jadwal->waktu_selesai->format('H:i:s') }}" step="1">
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control">
            <option value="tersedia" {{ $jadwal->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
            <option value="penuh" {{ $jadwal->status == 'penuh' ? 'selected' : '' }}>Penuh</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Perbarui</button>
</form>

@endsection
