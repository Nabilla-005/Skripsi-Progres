
@extends('layouts.mylayouts', ['title' => 'Pengajuan Bimbingan'])
@section('content')
<hr class="my-5" />

<!-- Hoverable Table rows -->
<div class="card">
    <h5 class="card-header"><strong>Jadwal Bimbingan </strong></h5>
    
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Mahasiswa</th>
                    <th>NIM</th>
                    <th>ID Jadwal</th>
                    <th>Tanggal</th>
                    <th>Status Pengajuan</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            @foreach ($pengajuan_jadwal_bimbingan as $item)
                <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $loop->iteration }}</strong></td>
                    <td>{{ $item->mahasiswa->nama ?? 'Tidak Ditemukan' }}</td>
                    <td>{{ $item->mahasiswa->nim ?? 'Tidak Ditemukan' }}</td>
                    <td>{{ $item->id_jadwal_kosong }}</td>
                    <td>{{ $item->tanggal_pengajuan }}</td>
                    <td>
                        @if ($item->status_pengajuan === 'diterima')
                        <span class="badge bg-label-success me-1">Diterima</span>
                        @elseif ($item->status === 'ditolak')
                        <span class="badge bg-label-warning me-1">Penuh</span>
                        @else
                        <span class="badge bg-label-primary me-1">Pending</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $pengajuan_jadwal_bimbingan->links() !!}
    </div>
</div>
<!--/ Hoverable Table rows -->

<hr class="my-5" />
@endsection