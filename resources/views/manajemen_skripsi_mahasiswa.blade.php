@extends('mylayout.mainlayout')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4 text-center" style="font-weight: 600; color: #3a3a3a; font-size: 2rem;">Manajemen Skripsi Mahasiswa</h2>
        
        <!-- Menampilkan daftar mahasiswa dan status pengajuan skripsi -->
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-hover table-striped shadow-lg rounded-4" style="background-color: #ffffff; border: 1px solid #ddd;">
                        <thead class="thead-dark" style="background-color: #343a40; color: #fff;">
                            <tr>
                                <th style="font-size: 1.2rem; border: 1px solid #ddd; padding: 10px;">Nama Mahasiswa</th>
                                <th style="font-size: 1.2rem; border: 1px solid #ddd; padding: 10px;">Status Pengajuan</th>
                                <th style="font-size: 1.2rem; border: 1px solid #ddd; padding: 10px;">Status Progres Skripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswas as $mahasiswa)
                                <tr style="background-color: #f8f9fa; border-top: 1px solid #ddd;">
                                    <td style="font-size: 1.1rem; padding: 10px; border: 1px solid #ddd;">{{ $mahasiswa->nama }}</td>
                                    <td style="padding: 10px; border: 1px solid #ddd;">
                                        @if ($mahasiswa->pengajuanJuduls->isNotEmpty())
                                            <span class="badge bg-success" style="font-size: 1.1rem;">{{ $mahasiswa->pengajuanJuduls->last()->status }}</span>
                                        @else
                                            <span class="badge bg-danger" style="font-size: 1.1rem;">Belum ada pengajuan</span>
                                        @endif
                                    </td>
                                    <td style="padding: 10px; border: 1px solid #ddd;">
                                        @if ($mahasiswa->progresSkripsis->isNotEmpty())
                                            <span class="badge bg-success" style="font-size: 1.1rem;">{{ $mahasiswa->progresSkripsis->last()->komentar }}</span>
                                        @else
                                            <span class="badge bg-danger" style="font-size: 1.1rem;">Belum ada progres</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
