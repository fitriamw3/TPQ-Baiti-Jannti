@extends('admin.layout.app')

@section('content')

<div class="container mt-4">
    <h1 class="text-center mb-4">Edit Prestasi</h1>
    <form action="{{ route('prestasi.update', $prestasi->id_prestasi) }}" method="POST" enctype="multipart/form-data"
        class="shadow p-4 rounded bg-light">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $prestasi->judul }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $prestasi->deskripsi }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar">
            @if($prestasi->gambar)
                <img src="{{ asset('fotoprestasi/' . $prestasi->gambar) }}" width="150" alt="Gambar Prestasi">
            @endif
        </div>

        <div class="form-group text-center">
            <a href="{{ route('prestasi.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection