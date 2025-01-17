@extends('layouts.mylayoutdosen', ['title' => 'Daftar Progres Skripsi'])
@section('content')
<div class="container">
    <h3>Daftar Progres Skripsi</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Form Pencarian -->
    <form action="{{ route('ProgresSkripsi.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Nama atau NIM" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Tanggal Upload</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @forelse($progresSkripsi as $progres)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $progres->mahasiswa->nama }}</td>
                    <td>{{ $progres->mahasiswa->nim }}</td>
                    <td>{{ $progres->tanggal_upload }}</td>
                    <td>
                        <a href="{{ route('ProgresSkripsi.show', $progres) }}" class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
