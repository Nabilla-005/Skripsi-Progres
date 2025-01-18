@extends('layouts.mylayoutdosen', ['title' => 'Jadwal Kosong Dosen'])

@section('content')
<hr class="my-5" />

<!-- Hoverable Table rows -->

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <h5 class="card-header d-flex justify-content-between align-items-center">
        <strong>Jadwal Kosong Dosen</strong>
        <!-- Tombol Tambah Jadwal -->
        <a href="/JadwalKosongDosen/create" class="btn btn-primary">Tambah Jadwal</a>
    </h5>

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
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            @foreach($jadwal_kosong_dosen as $item)
                <tr>
                    <td><strong>{{ $loop->iteration }}</strong></td>
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
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                @if(auth()->user()->status === 'dosen' && auth()->user()->dosen->id_dosen === $item->id_dosen)
                                    <!-- Edit Action -->
                                    <a class="dropdown-item" href="{{ route('JadwalKosongDosen.edit', $item->id_jadwal_kosong) }}">
                                        <i class="bx bx-edit-alt me-1"></i> Edit Jadwal
                                    </a>
                                    
                                    <!-- Delete Action -->
                                    <a class="dropdown-item" href="javascript:void(0);" 
                                       onclick="event.preventDefault(); 
                                                if(confirm('Apakah Anda yakin ingin menghapus jadwal ini?')) {
                                                    document.getElementById('delete-form-{{ $item->id_jadwal_kosong }}').submit();
                                                }">
                                        <i class="bx bx-trash me-1"></i> Hapus Jadwal
                                    </a>
                                    <form id="delete-form-{{ $item->id_jadwal_kosong }}" 
                                          action="{{ route('JadwalKosongDosen.destroy', $item->id_jadwal_kosong) }}" 
                                          method="POST" 
                                          style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endif
                            </div>
                        </div>
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
