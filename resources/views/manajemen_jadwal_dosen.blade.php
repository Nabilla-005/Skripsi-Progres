@extends('mylayout.mainlayout')
@section('content')

<h1>Manajemen Jadwal Kosong Dosen</h1>

<p>Selamat datang di halaman jadwal kosong dosen. Anda dapat melihat, menambah, atau mengubah jadwal di sini.</p>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama Dosen</th>
                <th>Tanggal</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($jadwal as $data)
                <tr>
                    <td>{{ $data->dosen->nama ?? 'Tidak Diketahui' }}</td>
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ $data->waktu_mulai }}</td>
                    <td>{{ $data->waktu_selesai }}</td>
                    <td>{{ ucfirst($data->status) }}</td>
                    <!-- <td>
                        <a href="{{ route('edit.jadwalkosong', $data->id_jadwal_kosong) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ route('delete.jadwalkosong', $data->id_jadwal_kosong) }}" class="btn btn-danger btn-sm">Hapus</a>
                    </td> -->
                    <td>
                        <a href="{{ route('edit.jadwalkosong', $data->id_jadwal_kosong) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('delete.jadwalkosong', $data->id_jadwal_kosong) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Tidak ada jadwal yang tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-3">
    <a href="{{ route('add.jadwalkosong') }}" class="btn btn-success">Tambah Jadwal Baru</a>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


@endsection