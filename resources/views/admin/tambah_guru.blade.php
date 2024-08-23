@extends('admin.layout.app')

@section('content')

<!-- Page Heading -->
<div class="container mt-4">
    <h1 class="mb-4">Tambah Data Guru</h1>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form action="/insertguru" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nama_guru">Nama Guru</label>
                <input type="text" name="nama_guru" id="nama_guru" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label for="nik_guru">NIK Guru</label>
                <input type="number" name="nik_guru" id="nik_guru" class="form-control" required>
                @error('nik_guru')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="tgl_lahir_guru">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir_guru" id="tgl_lahir_guru" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label for="tmpt_lahir_guru">Tempat Lahir</label>
                <input type="text" name="tmpt_lahir_guru" id="tmpt_lahir_guru" class="form-control" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="usia_guru">Usia</label>
                <input type="number" name="usia_guru" id="usia_guru" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label for="jenis_kelamin_guru">Jenis Kelamin</label>
                <select name="jenis_kelamin_guru" id="jenis_kelamin_guru" class="form-control" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="tlpn_guru">Telepon</label>
                <input type="text" name="tlpn_guru" id="tlpn_guru" class="form-control" rows="4" required>
                @error('tlpn_guru')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="alamat_guru">Alamat</label>
            <textarea name="alamat_guru" id="alamat_guru" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="foto_guru" class="form-label">Foto</label>
            <input type="file" name="foto_guru" id="foto_guru" class="form-control-file">
        </div>

        <div class="form-group text-center">
            <a href="{{ route('guru') }}" class="btn btn-secondary mr-2">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

    </form>
</div>

@endsection