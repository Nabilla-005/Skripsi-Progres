@extends('layouts.mylayouts',['title' => 'Jadwal Kosong Dosen'])
@section('content')
   <div class="card">
    <div class="card-body">
        <h3>Jadwal Kosong Dosen</h3>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $jadwal_kosong_dosen->links() !!}
    </div>
</div>
@endsection
