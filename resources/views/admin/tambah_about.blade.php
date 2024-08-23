@extends('admin.layout.app')

@section('content')

<div class="container mt-4">
    <h1 class="text-center mb-4">Tambah Profil TPQ</h1>

    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data"
            class="shadow p-4 rounded bg-light">
            @csrf

            <div class="form-group mb-3">
                <label for="katagori">Kategori</label>
                <select class="form-control" name="katagori" id="katagori" required>
                    <option value="" disabled selected>Pilih Kategori</option>
                    <option value="profil">Profil</option>
                    <option value="visi">Visi</option>
                    <option value="misi">Misi</option>
                    <option value="gambar">Gambar</option>
                    <option value="lokasi">Lokasi</option>
                    <option value="email">Email</option>
                    <option value="telepon">Telepon</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" name="keterangan" id="keterangan"
                    rows="5">{{ old('keterangan') }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="gambar">Upload Gambar</label>
                <input type="file" class="form-control-file" name="gambar" id="gambar" accept="image/*">
            </div>

            <div class="form-group text-center">
                <a href="{{ route('about.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>

        </form>
    </div>
</div>

@endsection