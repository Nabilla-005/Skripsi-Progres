@extends('layouts.admin')

@section('content')
<h1>Pengajuan Judul Skripsi</h1>

<table>
    <thead>
        <tr>
            <th>Nama Mahasiswa</th>
            <th>Judul</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pengajuan as $item)
        <tr>
            <td>{{ $item->mahasiswa->nama }}</td>
            <td>{{ $item->judul }}</td>
            <td>{{ $item->status }}</td>
            <td>
                <a href="#">Edit</a> | 
                <a href="#">Hapus</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection