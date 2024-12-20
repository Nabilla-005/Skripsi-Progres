@extends('mylayout.mainlayout')

@section('content')
<div class="container my-4">
    <h1 class="text-center mb-4">Daftar Dosen</h1>
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('dosens.create') }}" class="btn btn-success">Tambah Dosen</a>
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">NIP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Fakultas</th>
                    <th scope="col">Email</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dosens as $dosen)
                <tr>
                    <td>{{ $dosen->nip }}</td>
                    <td>{{ $dosen->nama }}</td>
                    <td>{{ $dosen->fakultas }}</td>
                    <td>{{ $dosen->email }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('dosens.edit', $dosen->id_dosen) }}" class="btn btn-primary btn-sm me-2">Edit</a>
                            <form action="{{ route('dosens.destroy', $dosen->id_dosen) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus dosen ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
