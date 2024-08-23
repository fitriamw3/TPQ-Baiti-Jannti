@extends('admin.layout.app')

@section('content')

<!-- Page Heading -->
<div class="container mt-4">
    <h1 class="mb-4">Edit Data Santri</h1>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form action="{{ route('updatesantri', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH') <!-- Menggunakan PATCH untuk update -->

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nama_santri">Nama Santri</label>
                <input type="text" name="nama_santri" id="nama_santri" class="form-control" required
                    value="{{ $data->nama_santri }}">
            </div>

            <div class="form-group col-md-6">
                <label for="nik_santri">NIK</label>
                <input type="text" name="nik_santri" id="nik_santri" class="form-control"
                    value="{{ $data->nik_santri }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="jenis_kelamin_santri">Jenis Kelamin</label>
                <select name="jenis_kelamin_santri" id="jenis_kelamin_santri" class="form-control" required>
                    <option value="" disabled>Pilih Jenis Kelamin</option>
                    <option value="L" {{ $data->jenis_kelamin_santri == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ $data->jenis_kelamin_santri == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="tmpt_lahir_santri">Tempat Lahir</label>
                <input type="text" name="tmpt_lahir_santri" id="tmpt_lahir_santri" class="form-control" required
                    value="{{ $data->tmpt_lahir_santri }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="tgl_lahir_santri">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir_santri" id="tgl_lahir_santri" class="form-control" required
                    value="{{ $data->tgl_lahir_santri }}">
            </div>

            <div class="form-group col-md-6">
                <label for="usia_santri">Usia</label>
                <input type="number" name="usia_santri" id="usia_santri" class="form-control" required
                    value="{{ $data->usia_santri }}">
            </div>
        </div>

        <div class="form-group">
            <label for="alamat_santri">Alamat</label>
            <textarea name="alamat_santri" id="alamat_santri" class="form-control" rows="4"
                required>{{ $data->alamat_santri }}</textarea>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="pendidikan_santri">Pendidikan</label>
                <select name="pendidikan_santri" id="pendidikan_santri" class="form-control" required>
                    <option value="" disabled>Pilih Pendidikan</option>
                    <option value="TK" {{ $data->pendidikan_santri == 'TK' ? 'selected' : '' }}>TK</option>
                    <option value="SD" {{ $data->pendidikan_santri == 'SD' ? 'selected' : '' }}>SD</option>
                    <option value="SMP" {{ $data->pendidikan_santri == 'SMP' ? 'selected' : '' }}>SMP</option>
                    <option value="SMA" {{ $data->pendidikan_santri == 'SMA' ? 'selected' : '' }}>SMA</option>
                    <option value="Belum Sekolah" {{ $data->pendidikan_santri == 'Belum Sekolah' ? 'selected' : '' }}>
                        Belum Sekolah</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="foto_santri">Foto</label>
            <input type="file" name="foto_santri" id="foto_santri" class="form-control-file">
            @if($data->foto_santri)
                <small class="form-text text-muted">Foto saat ini: <img
                        src="{{ asset('fotosantri/' . $data->foto_santri) }}" alt="Current Foto" class="img-thumbnail mt-2"
                        style="width: 100px;"></small>
            @endif
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="ayah_santri">Nama Ayah</label>
                <input type="text" name="ayah_santri" id="ayah_santri" class="form-control"
                    value="{{ $data->ayah_santri }}">
            </div>

            <div class="form-group col-md-6">
                <label for="ibu_santri">Nama Ibu</label>
                <input type="text" name="ibu_santri" id="ibu_santri" class="form-control"
                    value="{{ $data->ibu_santri }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="wali_santri">Nama Wali</label>
                <input type="text" name="wali_santri" id="wali_santri" class="form-control"
                    value="{{ $data->wali_santri }}">
            </div>

            <div class="form-group col-md-6">
                <label for="tlpn_ortu_santri">Telepon</label>
                <input type="text" name="tlpn_ortu_santri" id="tlpn_ortu_santri" class="form-control" rows="4" required
                    value="{{ $data->tlpn_ortu_santri }}">
                @error('tlpn_ortu_santri')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group text-center">
            <a href="{{ route('santri') }}" class="btn btn-secondary mr-2">Kembali</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>

@endsection