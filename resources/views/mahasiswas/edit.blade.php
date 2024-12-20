@extends('mylayout.mainlayout')

@section('content')
<div>
    <h1>Edit Mahasiswa</h1>
    <form action="{{ route('mahasiswas.update', $mahasiswa->id_mahasiswa) }}" method="POST">
        @csrf
        @method('PUT')
        <label>NIM:</label>
        <input type="text" name="nim" value="{{ $mahasiswa->nim }}" required>
        <label>Nama:</label>
        <input type="text" name="nama" value="{{ $mahasiswa->nama }}" required>
        <label>Program Studi:</label>
        <input type="text" name="program_studi" value="{{ $mahasiswa->program_studi }}" required>
        <label>Email:</label>
        <input type="email" name="email" value="{{ $mahasiswa->email }}" required>
        <button type="submit" class="btn btn-primary btn-sm">Update</button>
    </form>
</div>
@endsection
