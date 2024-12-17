@extends('layouts.mylayoutdosen', ['title' => 'Tambah Data Jadwal Dosen'])
@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Edit Data Jadwal <b>{{$jadwal_kosong_dosen->dosen->nama}}</b></h3>
            <form action="/JadwalKosongDosen/{{ $jadwal_kosong_dosen->id_jadwal_kosong }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group mt-1 mb-3">
                    <label for="id_dosen">ID Dosen</label>
                    <select class="form-control @error('id_dosen') is-invalid @enderror" id="id_dosen" name="id_dosen">
                        <option value="">-- Pilih Dosen --</option>
                        @foreach ($dosens as $dosen)
                            <option value="{{ $dosen->id_dosen }}" {{ old('id_dosen') ?? $jadwal_kosong_dosen->id_dosen == $dosen->id_dosen ? 'selected' : '' }}>
                                {{ $dosen->nama }}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('id_dosen') }}</span>
                </div>

                <div class="form-group mt-1 mb-3">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                        name="tanggal" value="{{ old('tanggal') ?? $jadwal_kosong_dosen->tanggal }}">
                    <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="waktu_mulai">Waktu Mulai</label>
                    <input type="time" class="form-control @error('waktu_mulai') is-invalid @enderror" id="waktu_mulai"
                        name="waktu_mulai" value="{{ old('waktu_mulai') ?? $jadwal_kosong_dosen->waktu_mulai }}">
                    <span class="text-danger">{{ $errors->first('waktu_mulai') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="waktu_selesai">Waktu Selesai</label>
                    <input type="time" class="form-control @error('waktu_selesai') is-invalid @enderror" id="waktu_selesai"
                        name="waktu_selesai" value="{{ old('waktu_selesai') ?? $jadwal_kosong_dosen->waktu_selesai }}">
                    <span class="text-danger">{{ $errors->first('waktu_selesai') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="status">Status</label>
                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                        <option value="">-- Pilih Status --</option>
                        <option value="tersedia" {{ old('status') ?? $jadwal_kosong_dosen->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="penuh" {{ old('status') ?? $jadwal_kosong_dosen->status == 'penuh' ? 'selected' : '' }}>Penuh</option>
                    </select>
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Simpan</button>
            </form>
            <script>
                document.getElementById('jadwalForm').addEventListener('submit', function(event) {
    var waktuMulai = document.getElementById('waktu_mulai').value;
    var waktuSelesai = document.getElementById('waktu_selesai').value;

    function convertTo24HourFormat(time) {
        var timeParts = time.split(' ');  // AM/PM
        var timeValues = timeParts[0].split(':');  // Jam dan Menit
        var hour = parseInt(timeValues[0]);
        var minute = timeValues[1];
        
        if (timeParts[1] === 'PM' && hour !== 12) {
            hour += 12;
        } else if (timeParts[1] === 'AM' && hour === 12) {
            hour = 0;
        }

        return hour.toString().padStart(2, '0') + ':' + minute;
    }

    // Cek dan konversi waktu jika menggunakan format AM/PM
    if (waktuMulai.includes('AM') || waktuMulai.includes('PM')) {
        document.getElementById('waktu_mulai').value = convertTo24HourFormat(waktuMulai);
    }

    if (waktuSelesai.includes('AM') || waktuSelesai.includes('PM')) {
        document.getElementById('waktu_selesai').value = convertTo24HourFormat(waktuSelesai);
    }
});

</script>
        </div>
    </div>
@endsection
