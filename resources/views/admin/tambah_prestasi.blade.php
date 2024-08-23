@extends('admin.layout.app')

@section('content')

<div class="container mt-4">
    <h1 class="text-center mb-4">Tambah Prestasi</h1>

    <form action="{{ route('prestasi.store') }}" method="POST" enctype="multipart/form-data"
        class="shadow p-4 rounded bg-light">
        @csrf

        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
        </div>

        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar">
        </div>

        <div class="form-group text-center">
            <a href="{{ route('prestasi.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        
    </form>
</div>
@endsection