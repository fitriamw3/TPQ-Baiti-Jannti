@extends('admin.layout.app')

@section('content')

<div class="container mt-4">
    <h1 class="text-center mb-4">Edit Kegiatan</h1>
    <form action="{{ route('kegiatan.update', $kegiatan) }}" method="POST" enctype="multipart/form-data"
        class="shadow p-4 rounded bg-light">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="judul_keg">Judul Kegiatan</label>
            <input type="text" class="form-control" id="judul_keg" name="judul_keg" value="{{ $kegiatan->judul_keg }}"
                required>
        </div>

        <div class="form-group mb-4">
            <label for="isi_keg">Isi Kegiatan</label>
            <textarea class="form-control" id="isi_keg" name="isi_keg" required>{{ $kegiatan->isi_keg }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar">
            @if($kegiatan->gambar)
                <small class="form-text text-muted">Foto saat ini:
                    <img src="{{ asset('fotokegiatan/' . $kegiatan->gambar) }}" alt="Current Foto"
                        class="img-thumbnail mt-2" style="width: 100px;">
                </small>
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="hari_keg">Hari Kegiatan</label>
            <input type="text" class="form-control" id="hari_keg" name="hari_keg" value="{{ $kegiatan->hari_keg }}"
                required>
        </div>

        <div class="form-group mb-3">
            <label for="tempat_keg">Tempat Kegiatan</label>
            <input type="text" class="form-control" id="tempat_keg" name="tempat_keg" value="{{ $kegiatan->tempat_keg }}"
                required>
        </div>

        <div class="form-group mb-3">
            <label for="kontak_keg">Kontak Kegiatan</label>
            <input type="text" class="form-control" id="kontak_keg" name="kontak_keg" value="{{ $kegiatan->kontak_keg }}"
                required>
        </div>

        <div class="form-group text-center">
            <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>

@endsection