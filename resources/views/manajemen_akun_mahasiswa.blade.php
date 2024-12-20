@extends('mylayout.mainlayout')

@section('content')
<div class="container my-4">
    <h1 class="text-center mb-4">Daftar Mahasiswa</h1>
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('mahasiswas.create') }}" class="btn btn-success">Tambah Mahasiswa</a>
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
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Program Studi</th>
                    <th scope="col">Email</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mahasiswas as $mahasiswa)
                <tr>
                    <td>{{ $mahasiswa->nim }}</td>
                    <td>{{ $mahasiswa->nama }}</td>
                    <td>{{ $mahasiswa->program_studi }}</td>
                    <td>{{ $mahasiswa->email }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('mahasiswas.edit', $mahasiswa->id_mahasiswa) }}" class="btn btn-primary btn-sm me-2">Edit</a>
                            <form action="{{ route('mahasiswas.destroy', $mahasiswa->id_mahasiswa) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus mahasiswa ini?')">
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
