@extends('mylayout.mainlayout')

@section('content')
<div>
    <h1>Edit Dosen</h1>
    <form action="{{ route('dosens.update', $dosen->id_dosen) }}" method="POST">
        @csrf
        @method('PUT')
        <label>NIP:</label>
        <input type="text" name="nip" value="{{ $dosen->nip }}" required>
        <label>Nama:</label>
        <input type="text" name="nama" value="{{ $dosen->nama }}" required>
        <label>Fakultas:</label>
        <input type="text" name="fakultas" value="{{ $dosen->fakultas }}" required>
        <label>Email:</label>
        <input type="email" name="email" value="{{ $dosen->email }}" required>
        <button type="submit" class="btn btn-primary btn-sm">Update</button>
    </form>
</div>
@endsection
