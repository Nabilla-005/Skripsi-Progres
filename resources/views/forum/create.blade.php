@extends('mylayout.mainlayout')

@section('content')
<h1>Buat Forum Baru</h1>

<form action="{{ route('forum.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="judul">Judul Forum:</label>
        <input type="text" class="form-control" name="judul" id="judul" required>
    </div>

    <div class="form-group">
        <label for="kategori">Kategori:</label>
        <select class="form-control" name="kategori" id="kategori" required>
            <option value="personal">Personal</option>
            <option value="kelompok">Kelompok</option>
            <option value="umum">Umum</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Buat Forum</button>
</form>
@endsection
