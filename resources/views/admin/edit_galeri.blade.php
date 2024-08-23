@extends('admin.layout.app')

@section('content')

<div class="container mt-4">
    <h1 class="text-center mb-4">Edit Galeri</h1>
    <form action="{{ route('galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data"
        class="shadow p-4 rounded bg-light">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="nama_galeri" class="form-label">Nama Galeri</label>
            <input type="text" class="form-control" id="nama_galeri" name="nama_galeri"
                value="{{ $galeri->nama_galeri }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar">
            @if($galeri->gambar)
                <small class="form-text text-muted">Foto saat ini: 
                    <img src="{{ asset('fotogaleri/' . $galeri->gambar) }}" alt="Current Foto" 
                         class="img-thumbnail mt-2" style="width: 100px;">
                </small>
            @endif
        </div>

        <div class="form-group mb-4">
            <label for="ket_galeri" class="form-label">Keterangan Galeri</label>
            <textarea class="form-control" id="ket_galeri" name="ket_galeri" rows="3"
                required>{{ $galeri->ket_galeri }}</textarea>
        </div>
        
        <div class="form-group text-center">
            <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>

@endsection
