
@extends('layouts.mylayouts', ['title' => 'Mengajukan Judul Skripsi'])
@section('content')
<hr class="my-5" />

@if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
<!-- Hoverable Table rows -->
<div class="card">
    <h5 class="card-header"><strong>Daftar Pengajuan Judul</strong></h5>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Dokumen</th>
                <th></th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            @foreach($pengajuans as $pengajuan)
                <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $loop->iteration }}</strong></td>
                    <td>{{ $pengajuan->mahasiswa->nama }}</td>
                <td>{{ $pengajuan->judul }}</td>
                <td>{{ $pengajuan->deskripsi }}</td>
                <td>
                    @if ($pengajuan->status === 'diterima')
                        <span class="badge bg-label-success me-1">Diterima</span>
                        @elseif ($pengajuan->status === 'ditolak')
                        <span class="badge bg-label-warning me-1">Ditolak</span>
                        @else
                        <span class="badge bg-label-secondary me-1">Diproses</span>
                        @endif</td>
                    <td><a href="{{ route('pengajuan.download', $pengajuan->id_pengajuan) }}" class="text-primary">Download File</a></td>
                    <td>
                    <td>
    <div class="dropdown">
        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
            <i class="bx bx-dots-vertical-rounded"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-center">
            <a class="dropdown-item" href="javascript:void(0);" 
               onclick="event.preventDefault(); 
                        if(confirm('Apakah Anda yakin ingin menghapus pengajuan ini?')) {
                            document.getElementById('delete-form-{{ $pengajuan->id_pengajuan }}').submit();
                        }">
                <i class="bx bx-trash me-1"></i> Delete
            </a>
            <form id="delete-form-{{ $pengajuan->id_pengajuan }}" 
                  action="{{ route('pengajuan.hapus', $pengajuan->id_pengajuan) }}" 
                  method="POST" 
                  style="display: none;">
                @csrf
                @method('DELETE')
            </form>
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