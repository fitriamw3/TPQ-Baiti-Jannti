@extends('admin.layout.app')

@section('content')

<div class="container mt-4">
    <h1 class="text-center mb-4">Tambah Kegiatan</h1>

    <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data"
        class="shadow p-4 rounded bg-light">
        @csrf

        <div class="form-group">
            <label for="judul_keg">Judul Kegiatan</label>
            <input type="text" class="form-control" id="judul_keg" name="judul_keg" required>
        </div>

        <div class="form-group">
            <label for="isi_keg">Isi Kegiatan</label>
            <textarea class="form-control" id="isi_keg" name="isi_keg" required></textarea>
        </div>

        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar" required>
        </div>

        <div class="form-group">
            <label for="hari_keg">Hari Kegiatan</label>
            <input type="text" class="form-control" id="hari_keg" name="hari_keg" required>
        </div>

        <div class="form-group">
            <label for="tempat_keg">Tempat Kegiatan</label>
            <input type="text" class="form-control" id="tempat_keg" name="tempat_keg" required>
        </div>

        <div class="form-group">
            <label for="kontak_keg">Kontak Kegiatan</label>
            <input type="text" class="form-control" id="kontak_keg" name="kontak_keg" required>
        </div>

        <div class="form-group text-center">
            <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

    </form>
</div>

@endsection