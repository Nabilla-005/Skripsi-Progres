@extends('layouts.mylayouts', ['title' => 'Daftar Progres Skripsi'])

@section('content')
<div class="container">
    <h3>Daftar Progres Skripsi</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Form Pencarian -->
    <form action="{{ route('LihatProgresSkripsi.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Progres" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Progres ke-</th>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Tanggal Upload</th>
                <th>Dokumen</th>
                <th></th>
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
                    <a href="{{ route('ProgresSkripsi.download', $progres->id_progres) }}" target="_blank">Download File</a>
                </td>

                    <td>
                        <form action="{{ route('LihatProgresSkripsi.destroy', $progres->id_progres) }}" method="POST" style="display:inline;" onsubmit="return confirmDeletion();">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Batalkan</button>
                        </form>
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

<script>
    function confirmDeletion() {
        return confirm('Apakah Anda yakin ingin membatalkan progres ini?');
    }
</script>

@endsection
