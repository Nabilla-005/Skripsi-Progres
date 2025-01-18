
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Dropdown Status -->
                        <div class="row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>

                            <div class="col-md-6">
                                <select id="status" name="status" class="form-control @error('status') is-invalid @enderror" required>
                                    <option value="">{{ __('Choose Status') }}</option>
                                    <option value="admin">{{ __('Admin') }}</option>
                                    <option value="mahasiswa">{{ __('Mahasiswa') }}</option>
                                    <option value="dosen">{{ __('Dosen') }}</option>
                                </select>

                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Kondisional Kolom Program Studi untuk Mahasiswa -->
                        <div id="program_studi_field" class="row mb-3" style="display: none;">
                            <label for="program_studi" class="col-md-4 col-form-label text-md-end">{{ __('Program Studi') }}</label>

                            <div class="col-md-6">
                                <input id="program_studi" type="text" class="form-control @error('program_studi') is-invalid @enderror" name="program_studi" value="{{ old('program_studi') }}">

                                @error('program_studi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Kondisional Kolom NIM untuk Mahasiswa -->
                        <div id="nim_field" class="row mb-3" style="display: none;">
                            <label for="nim" class="col-md-4 col-form-label text-md-end">{{ __('NIM') }}</label>

                            <div class="col-md-6">
                                <input id="nim" type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{ old('nim') }}">

                                @error('nim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Kondisional Kolom untuk Dosen -->
                        <div id="nip_field" class="row mb-3" style="display: none;">
                            <label for="nip" class="col-md-4 col-form-label text-md-end">{{ __('NIP') }}</label>

                            <div class="col-md-6">
                                <input id="nip" type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{ old('nip') }}">

                                @error('nip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div id="fakultas_field" class="row mb-3" style="display: none;">
                            <label for="fakultas" class="col-md-4 col-form-label text-md-end">{{ __('Fakultas') }}</label>

                            <div class="col-md-6">
                                <input id="fakultas" type="text" class="form-control @error('fakultas') is-invalid @enderror" name="fakultas" value="{{ old('fakultas') }}">

                                @error('fakultas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Menyembunyikan kolom Program Studi dan Fakulas jika status bukan mahasiswa atau dosen
    document.getElementById('status').addEventListener('change', function () {
        var status = this.value;
        var nimField = document.getElementById('nim_field');
        var programStudiField = document.getElementById('program_studi_field');
        var nipField = document.getElementById('nip_field');
        var fakultasField = document.getElementById('fakultas_field');
        
        if (status === 'mahasiswa') {
            nimField.style.display = 'block';
            programStudiField.style.display = 'block';
            nipField.style.display = 'none';
            fakultasField.style.display = 'none';
        } else if (status === 'dosen') {
            nipField.style.display = 'block';
            fakultasField.style.display = 'block';
            programStudiField.style.display = 'none';
        } else {
            nipField.style.display = 'none';
            fakultasField.style.display = 'none';
            programStudiField.style.display = 'none';
        }
    });
</script>
@endsection