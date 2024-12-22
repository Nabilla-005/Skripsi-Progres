@extends('layouts.mylayouts',['title' => 'Jadwal Kosong Dosen'])
@section('content')
   <div class="card">
    <div class="card-body">
        <h3>Jadwal Kosong Dosen</h3>
        <a href="/mahasiswa/create" class="btn btn-primary">Tambah Data</a>
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
                        <td>{{ $item->waktu_mulai }}</td>
                        <td>{{ $item->waktu_selesai }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="/mahasiswa/{{ $item->id }}/edit" class= "btn btn-info btn-sm ml-2">Edit</a>
                            <form action="/mahasiswa/{{ $item->id }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin untuk menghapus data?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $jadwal_kosong_dosen->links() !!}
    </div>
</div>
@endsection
