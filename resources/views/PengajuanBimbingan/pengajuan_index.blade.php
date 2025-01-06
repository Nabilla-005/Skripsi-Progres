@extends('layouts.mylayoutdosen', ['title' => 'Pengajuan Bimbingan'])
@section('content')
<div class="card">
    <div class="card-body">
        <h3>Pengajuan Bimbingan</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama Mahasiswa</th>
                    <th>ID Jadwal</th>
                    <th>Tanggal</th>
                    <th>Status Pengajuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengajuan_jadwal_bimbingan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->mahasiswa->nama }}</td>
                    <td>{{ $item->id_jadwal_kosong }}</td>
                    <td>{{ $item->tanggal_pengajuan }}</td>
                    <td>
                        <!-- Form untuk mengupdate status -->
                        <form action="/PengajuanBimbingan/{{ $item->id_pengajuan }}" method="POST">
                            @method('PUT')
                            @csrf

                            <!-- Dropdown Status -->
                            <select name="status_pengajuan" class="form-control" onchange="this.form.submit()">
                                <option value="menunggu" {{ $item->status_pengajuan == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                <option value="diterima" {{ $item->status_pengajuan == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                <option value="ditolak" {{ $item->status_pengajuan == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        <!-- Form Hapus -->
                        <form action="{{ route('PengajuanBimbingan.destroy', $item->id_jadwal_kosong) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin untuk menghapus data?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $pengajuan_jadwal_bimbingan->links() !!}
    </div>
</div>
@endsection
