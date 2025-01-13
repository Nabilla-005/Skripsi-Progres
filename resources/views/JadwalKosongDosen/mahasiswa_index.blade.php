@extends('layouts.mylayouts', ['title' => 'Jadwal Kosong Dosen'])
@section('content')
   <div class="card">
      <div class="card-body">
          <h3>Jadwal Kosong Dosen</h3>
          <table class="table table-striped">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>ID</th>
                      <th>Nama Dosen</th>
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
                          <td>{{ $item->dosen->nama ?? 'Tidak Ditemukan' }}</td>
                          <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                          <td>{{ \Carbon\Carbon::parse($item->waktu_mulai)->format('H:i') }}</td>
                          <td>{{ \Carbon\Carbon::parse($item->waktu_selesai)->format('H:i') }}</td>
                          <td>{{ ucfirst($item->status) }}</td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
          {!! $jadwal_kosong_dosen->links('pagination::bootstrap-4') !!}
      </div>
  </div>
@endsection
