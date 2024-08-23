@extends('user.layout.app')

@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4">Ganti Password</h2>
    <div class="card shadow-sm mb-4">
        <div class="card-body">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('santri.changePassword') }}">
                @csrf

                <div class="mb-3">
                    <label for="current_password" class="form-label">Password Lama</label>
                    <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                        id="current_password" name="current_password" required>
                    @error('current_password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="new_password" class="form-label">Password Baru</label>
                    <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                        id="new_password" name="new_password" required>
                    @error('new_password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="new_password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                    <input type="password" class="form-control" id="new_password_confirmation"
                        name="new_password_confirmation" required>
                </div>

                <div class="d-flex justify-content-center mt-2">
                    <a href="{{ route('profil.santri', ['id' => $santri->id]) }}"
                        class="btn btn-secondary me-3">Kembali</a>
                    <button type="submit" class="btn btn-primary">Ganti Password</button>
                </div>

            </form>
        </div>
    </div>

    <div style="height: 50px;"></div>

</div>

@endsection