@extends('layouts.mylayouts', ['title' => 'Pengajuan Bimbingan'])
@section('content')
<div class="card">
    <div class="card-body">
        <h3>Pengajuan Bimbingan</h3>

        <!-- Form Pencarian -->
        <form action="{{ route('PengajuanBimbingan.index') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama mahasiswa atau nim..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama Mahasiswa</th>
                    <th>NIM</th>
                    <th>ID Jadwal</th>
                    <th>Tanggal</th>
                    <th>Status Pengajuan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengajuan_jadwal_bimbingan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->mahasiswa->nama ?? 'Tidak Ditemukan' }}</td>
                    <td>{{ $item->mahasiswa->nim ?? 'Tidak Ditemukan' }}</td>
                    <td>{{ $item->id_jadwal_kosong }}</td>
                    <td>{{ $item->tanggal_pengajuan }}</td>
                    <td>{{ $item->status_pengajuan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $pengajuan_jadwal_bimbingan->links() !!}
    </div>
</div>
@endsection
