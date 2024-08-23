@extends('admin.layout.app')

@section('content')

<div class="container mt-4">
    <h1 class="text-center mb-4">Edit Profil TPQ</h1>

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

        <form action="{{ route('about.update', $tpq->id_profil) }}" method="POST" enctype="multipart/form-data"
            class="shadow p-4 rounded bg-light">
            @csrf
            @method('PUT')

            <div class="form-group  mb-3">
                <label for="katagori">Kategori</label>
                <select class="form-control" name="katagori" id="katagori" required>
                    <option value="" disabled>Pilih Kategori</option>
                    <option value="profil" {{ $tpq->katagori == 'profil' ? 'selected' : '' }}>Profil</option>
                    <option value="visi" {{ $tpq->katagori == 'visi' ? 'selected' : '' }}>Visi</option>
                    <option value="misi" {{ $tpq->katagori == 'misi' ? 'selected' : '' }}>Misi</option>
                    <option value="gambar" {{ $tpq->katagori == 'gambar' ? 'selected' : '' }}>Gambar</option>
                    <option value="lokasi" {{ $tpq->katagori == 'lokasi' ? 'selected' : '' }}>Lokasi</option>
                    <option value="email" {{ $tpq->katagori == 'email' ? 'selected' : '' }}>Email</option>
                    <option value="telepon" {{ $tpq->katagori == 'telepon' ? 'selected' : '' }}>Telepon</option>
                </select>
            </div>

            <div class="form-group  mb-3">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" name="keterangan" id="keterangan"
                    rows="5">{{ $tpq->keterangan }}</textarea>
            </div>

            <div class="form-group  mb-3">
                <label for="gambar">Upload Gambar</label>
                @if ($tpq->gambar)
                    <div class="mb-2">
                        <img src="{{ asset('fotoprofil/' . $tpq->gambar) }}" alt="Gambar TPQ" width="150">
                    </div>
                @endif
                <input type="file" class="form-control-file" name="gambar" id="gambar" accept="image/*">
            </div>

            <div class="form-group text-center">
                <a href="{{ route('about.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

        </form>
    </div>
</div>


@endsection