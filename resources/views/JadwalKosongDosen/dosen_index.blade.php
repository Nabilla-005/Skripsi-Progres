
@extends('layouts.mylayoutdosen', ['title' => 'Jadwal Dosen'])

@section('content')
<div class="card">
>>>>>>> d1d7e3b (mahasiswa, dosen, login)
    <div class="card-body">
        <h3>Jadwal Kosong Dosen</h3>
        <a href="/JadwalKosongDosen/create" class="btn btn-primary">Tambah Jadwal</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>ID</th>
                    <th>ID Dosen</th>
                    <th>Tanggal</th>
                    <th>Waktu Mulai</th>
                    <th>Waktu Selesai</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwal_kosong_dosen as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->id_jadwal_kosong }}</td>
                        <td>{{ $item->id_dosen }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->waktu_mulai }}</td>
                        <td>{{ $item->waktu_selesai }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            @if(auth()->user()->status === 'dosen' && auth()->user()->dosen->id_dosen === $item->id_dosen)
                                <a href="/JadwalKosongDosen/{{ $item->id_jadwal_kosong }}/edit" class="btn btn-info btn-sm ml-2">Edit</a>
                                <form action="/JadwalKosongDosen/{{ $item->id_jadwal_kosong }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin untuk menghapus data?')">
                                        Hapus
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        {!! $jadwal_kosong_dosen instanceof \Illuminate\Pagination\LengthAwarePaginator ? $jadwal_kosong_dosen->links() : '' !!}
    </div>
</div>
@endsection
