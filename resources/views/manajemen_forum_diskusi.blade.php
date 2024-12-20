@extends('mylayout.mainlayout')

@section('content')
<h1>Manajemen Forum Diskusi</h1>
<p>Selamat datang di halaman manajemen forum diskusi!</p>

<!-- Tampilkan forum yang ada -->
@foreach ($forums as $forum)
    <div class="forum">
        <h3>{{ $forum->judul }}</h3>
        <p>Kategori: {{ ucfirst($forum->kategori) }}</p>
        <p>Dibuat oleh: {{ $forum->pembuat->name }}</p>
        <p>Dibuat pada: {{ $forum->tanggal_dibuat->format('d M Y H:i') }}</p>

        <!-- Menampilkan komentar pada forum -->
        @if ($forum->komentar->count() > 0)
            <h4>Komentar:</h4>
            <ul>
                @foreach ($forum->komentar as $komentar)
                    <li>
                        <p>{{ $komentar->isi }}</p>
                        <p>Ditulis oleh: {{ $komentar->pengirim->name }}</p>
                    </li>
                @endforeach
            </ul>
        @else
            <p>Belum ada komentar.</p>
        @endif

        <!-- Form untuk menambah komentar -->
        <form action="{{ route('forum.komentar.store', $forum->id_forum) }}" method="POST">
         @csrf
        <div>
            <label for="isi">Tulis komentar:</label>
            <textarea name="isi" id="isi" required></textarea>
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
    <hr>
@endforeach

<!-- Link untuk membuat forum baru -->
<a href="{{ route('forum.create') }}" class="btn btn-success">Buat Forum Baru</a>
@endsection
