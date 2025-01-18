
@extends('layouts.mylayoutdosen', ['title' => 'Pengajuan Bimbingan'])
@section('content')
<hr class="my-5" />

<!-- Hoverable Table rows -->
@if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
<div class="card">
    <div class="card-body">
        <h3>Pengajuan Bimbingan</h3>

        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Mahasiswa</th>
                        <th>ID Jadwal</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status Pengajuan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengajuan_jadwal_bimbingan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->mahasiswa->nama }}</td>
                            <td>{{ $item->id_jadwal_kosong }}</td>
                            <td>{{ $item->tanggal_pengajuan }}</td>
                            <td>
                                <!-- Form untuk mengupdate status -->
                                <form action="/PengajuanBimbingan/{{ $item->id_pengajuan }}" method="POST">
                                    @method('PUT')
                                    @csrf

                                    <!-- Dropdown Status -->
                                    <select name="status_pengajuan" class="form-control" onchange="this.form.submit()">
                                        <option value="menunggu" {{ $item->status_pengajuan == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                        <option value="diterima" {{ $item->status_pengajuan == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                        <option value="ditolak" {{ $item->status_pengajuan == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <!-- Dropdown Aksi -->
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);" 
                                           onclick="event.preventDefault(); 
                                                    if(confirm('Apakah Anda yakin ingin menghapus pengajuan ini?')) {
                                                        document.getElementById('delete-form-{{ $item->id_pengajuan }}').submit();
                                                    }">
                                            <i class="bx bx-trash me-1"></i> Hapus
                                        </a>
                                        <form id="delete-form-{{ $item->id_pengajuan }}" 
                                              action="{{ route('PengajuanBimbingan.destroy', $item->id_pengajuan) }}" 
                                              method="POST" style="display: none;">
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

        <!-- Pagination Links -->
        {!! $pengajuan_jadwal_bimbingan->links() !!}

    </div>
</div>

<!--/ Hoverable Table rows -->

<hr class="my-5" />
@endsection