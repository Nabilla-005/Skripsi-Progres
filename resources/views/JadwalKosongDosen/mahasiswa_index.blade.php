
@extends('layouts.mylayouts', ['title' => 'Jadwal Kosong Dosen']) 

@section('content')
<hr class="my-5" />

<!-- Hoverable Table rows -->
<div class="card">
    <h5 class="card-header"><strong>Jadwal Kosong Dosen </strong></h5>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
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
            <tbody class="table-border-bottom-0">
                @foreach ($jadwal_kosong_dosen as $item)
                <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $loop->iteration }}</strong></td>
                    <td>{{ $item->id_jadwal_kosong }}</td>
                    <td>{{ $item->dosen->nama ?? 'Tidak Ditemukan' }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->waktu_mulai)->format('H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->waktu_selesai)->format('H:i') }}</td>
                    <td>
                        @if ($item->status === 'tersedia')
                        <span class="badge bg-label-success me-1">Tersedia</span>
                        @elseif ($item->status === 'penuh')
                        <span class="badge bg-label-warning me-1">Penuh</span>
                        @else
                        <span class="badge bg-label-secondary me-1">Tidak Diketahui</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!--/ Hoverable Table rows -->

<hr class="my-5" />
@endsection