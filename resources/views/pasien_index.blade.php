@extends('layouts.app',['title' => 'Data Pasien'])
@section('content')
   <div class="card">
    <div class="card-body">
        <h3>Data pasien</h3>
        <a href="/pasien/create" class="btn btn-primary">Tambah Data</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>No Pasien</th>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Jenis Kelamin</th>
                    <th>Tgl Buat</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pasien as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->no_pasien }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->umur }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="/pasien/{{ $item->id }}/edit" class= "btn btn-info btn-sm ml-2">Edit</a>
                            <form action="/pasien/{{ $item->id }}" method="post" class="d-inline">
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
        {!! $pasien->links() !!}
    </div>
</div>
@endsection
