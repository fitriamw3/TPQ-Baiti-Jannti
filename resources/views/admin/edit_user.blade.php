@extends('admin.layout.app')

@section('content')

<!-- Page Heading -->
<div class="container mt-4">
    <h1 class="mb-4">Edit Data User</h1>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/updateuser/{{ $data->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH') <!-- Menggunakan PATCH untuk update -->

        <div class="form-group mb-3">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="{{ $data->username }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="password">Kata Sandi Baru</label>
            <input type="password" name="password" id="password" class="form-control">
            <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah kata sandi</small>
        </div>

        <div class="form-group mb-3">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" class="form-control" required value="{{ $data->nama }}">
        </div>

        <div class="form-group mb-3">
            <label for="role">Peran</label>
            <select name="role" id="role" class="form-control" required>
                <option value="" disabled selected>Pilih Peran</option>
                <option value="admin" {{ $data->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="guru" {{ $data->role == 'guru' ? 'selected' : '' }}>Guru</option>
                <option value="santri" {{ $data->role == 'santri' ? 'selected' : '' }}>Santri</option>
            </select>
        </div>

        <div class="form-group text-center">
            <a href="{{ route('user') }}" class="btn btn-secondary mr-2">Kembali</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>

@endsection
