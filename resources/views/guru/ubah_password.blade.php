@extends('admin.layout.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header text-black text-center">
            <h3 class="mb-0">Ubah Kata Sandi</h3>
        </div>
        <div class="card-body p-4">
            @if (session('status'))
                <div class="alert alert-success text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('update-password') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="current_password" class="form-label">Password Saat Ini</label>
                    <input type="password" name="current_password" id="current_password"
                        class="form-control @error('current_password') is-invalid @enderror" required
                        value="{{ $user->password }}">
                    @error('current_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="new_password" class="form-label">Password Baru</label>
                    <input type="password" name="new_password" id="new_password"
                        class="form-control @error('new_password') is-invalid @enderror" required>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" onclick="togglePassword('new_password')">
                        <label class="form-check-label">
                            Tampilkan Password
                        </label>
                    </div>
                    @error('new_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="new_password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                        class="form-control" required>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox"
                            onclick="togglePassword('new_password_confirmation')">
                        <label class="form-check-label">
                            Tampilkan Password
                        </label>
                    </div>
                </div>

                <div class="text-center">
                    <a href="{{ route('profile') }}" class="btn btn-secondary px-4 mt-3 ms-2">Kembali</a>
                    <button type="submit" class="btn btn-primary px-4 mt-3">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        if (field.type === "password") {
            field.type = "text";
        } else {
            field.type = "password";
        }
    }
</script>
@endsection