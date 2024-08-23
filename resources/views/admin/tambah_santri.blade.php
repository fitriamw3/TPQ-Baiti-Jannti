@extends('admin.layout.app')

@section('content')

<!-- Page Heading -->
<div class="container mt-4">
    <h1 class="mb-4">Tambah Data Santri</h1>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form action="/insertsantri" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nama_santri">Nama Santri</label>
                <input type="text" name="nama_santri" class="form-control" required>
            </div>
            <div class="form-group col-md-6">
                <label for="nik_santri">NIK</label>
                <input type="text" name="nik_santri" class="form-control">
                @error('nik_santri')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="jenis_kelamin_santri">Jenis Kelamin</label>
                <select name="jenis_kelamin_santri" class="form-control" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="tmpt_lahir_santri">Tempat Lahir</label>
                <input type="text" name="tmpt_lahir_santri" class="form-control" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="tgl_lahir_santri">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir_santri" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label for="usia_santri">Usia</label>
                <input type="number" name="usia_santri" class="form-control" required>
            </div>
        </div>

        <div class="form-group">
            <label for="alamat_santri">Alamat</label>
            <textarea name="alamat_santri" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="pendidikan_santri">Pendidikan</label>
                <select name="pendidikan_santri" class="form-control" required>
                    <option value="">Pilih Pendidikan</option>
                    <option value="TK">TK</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="Belum Sekolah">Belum Sekolah</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="foto_santri">Foto</label>
            <input type="file" name="foto_santri" id="foto_santri" class="form-control-file">
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="ayah_santri">Nama Ayah</label>
                <input type="text" name="ayah_santri" class="form-control">
            </div>

            <div class="form-group col-md-6">
                <label for="ibu_santri">Nama Ibu</label>
                <input type="text" name="ibu_santri" class="form-control">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="wali_santri">Nama Wali</label>
                <input type="text" name="wali_santri" class="form-control">
            </div>

            <div class="form-group col-md-6">
                <label for="tlpn_ortu_santri">Nomor Telepon Ortu/Wali</label>
                <input type="text" name="tlpn_ortu_santri" class="form-control" required>
                @error('tlpn_ortu_santri')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        @if ($errors->has('parent_guardian'))
            <div class="alert alert-danger mt-2">
                {{ $errors->first('parent_guardian') }}
            </div>
        @endif

        <div class="form-group text-center">
            <a href="{{ route('santri') }}" class="btn btn-secondary mr-2">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>

@endsection