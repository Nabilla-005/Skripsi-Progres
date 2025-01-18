
@extends('layouts.mylayouts', ['title' => 'Progres Skripsi'])
@section('content')
<hr class="my-5" />

<!-- Hoverable Table rows -->

@if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
<div class="card">
    <h5 class="card-header"><strong>Progres Skripsi</strong></h5>

   

    

  <!-- Form Pencarian -->
<form action="{{ route('LihatProgresSkripsi.index') }}" method="GET" class="d-flex mb-4 w-100"> <!-- d-flex untuk tata letak baris -->
    <div class="input-group w-100 "> <!-- Menambahkan w-100 untuk lebar penuh pada input group -->
        <input type="text" name="search" class="form-control me-2" placeholder="Cari Progres Skripsi" value="{{ request('search') }}" aria-label="Cari Progres Skripsi"> <!-- Menambahkan me-2 untuk margin kanan -->
    </div>
</form>


    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Mahasiswa</th>
                    <th>NIM</th>
                    <th>Tanggal Upload</th>
                    <th>Komentar</th>
                    <th>Dokumen</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            @forelse($progresSkripsi as $progres)
                <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $loop->iteration }}</strong></td>
                    <td>{{ $progres->mahasiswa->nama }}</td>
                    <td>{{ $progres->mahasiswa->nim }}</td>
                    <td>{{ $progres->tanggal_upload }}</td>
                    <td>{{ $progres->komentar }}</td>
                    <td>
                    <a href="{{ route('ProgresSkripsi.download', $progres->id_progres) }}" target="_blank">Download File</a></td>
                    <td>
                    <div class="dropdown">
    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
        <i class="bx bx-dots-vertical-rounded"></i>
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="javascript:void(0);" 
           onclick="event.preventDefault(); 
                    if(confirm('Apakah Anda yakin ingin membatalkan progres skripsi ini?')) {
                        document.getElementById('delete-form-{{ $progres->id_progres }}').submit();
                    }">
            <i class="bx bx-trash me-1"></i> Batalkan
        </a>
        <form id="delete-form-{{ $progres->id_progres }}" 
              action="{{ route('LihatProgresSkripsi.destroy', $progres->id_progres) }}" 
              method="POST" 
              style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>
</div>
 </td>

                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data ditemukan.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
<!--/ Hoverable Table rows -->

<hr class="my-5" />
@endsection