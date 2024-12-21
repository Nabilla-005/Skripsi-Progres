@extends('mylayout.mainlayout')

@section('content')
<h1 class="text-center mb-4">Manajemen Forum Diskusi</h1>
<p class="text-center">Selamat datang di halaman manajemen forum diskusi!</p>

<!-- Tampilkan forum yang ada -->
@foreach ($forums as $forum)
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">{{ $forum->judul }}</h3>
            <p class="card-text">Kategori: <strong>{{ ucfirst($forum->kategori) }}</strong></p>
            <p class="card-text">Dibuat oleh: <strong>{{ $forum->pembuat->name }}</strong></p>
            <p class="card-text">Dibuat pada: <strong>{{ $forum->tanggal_dibuat->format('d M Y H:i') }}</strong></p>

            <!-- Menampilkan komentar pada forum -->
            @if ($forum->komentar->count() > 0)
                <h4>Komentar:</h4>
                <ul class="list-group">
                    @foreach ($forum->komentar as $komentar)
                        <li class="list-group-item">
                            <p>{{ $komentar->isi }}</p>
                            <p class="text-muted">Ditulis oleh: <strong>{{ $komentar->pengirim->name }}</strong></p>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Belum ada komentar.</p>
            @endif

            <!-- Form untuk menambah komentar -->
            <form action="{{ route('forum.komentar.store', $forum->id_forum) }}" method="POST" class="mt-3">
                @csrf
                <div class="mb-3">
                    <label for="isi" class="form-label">Tulis komentar:</label>
                    <textarea name="isi" id="isi" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim Komentar</button>
            </form>

            <!-- Hapus Forum -->
            <form action="{{ route('forum.destroy', $forum->id_forum) }}" method="POST" style="margin-top: 10px;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus Forum</button>
            </form>
        </div>
    </div>
@endforeach

<!-- Link untuk membuat forum baru -->
<a href="{{ route('forum.create') }}" class="btn btn-success mt-3">Buat Forum Baru</a>
@endsection
