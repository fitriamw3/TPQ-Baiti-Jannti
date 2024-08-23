@extends('umum.layout.app')

@section('content')
<main id="main">
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
            <div class="row align-items-end justify-content-center text-center">
                <div class="col-lg-7">
                    <h2 class="mb-0">Daftar Calon Santri</h2>
                    <p>Hanya Dilakukan Jika Ingin Menjadi santri</p>
                </div>
            </div>
        </div>
    </div>

    <div class="custom-breadcrumns border-bottom">
        <div class="container">
            <a href="/tpq-baitijannati" style="color: #7cc576">Home</a>
            <span class="mx-3 fas fa-chevron-right"></span>
            <span class="current">Daftar</span>
        </div>
    </div>

    <div class="site-section py-5">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card shadow-lg border-light">
                <div class="card-body">
                    <form action="/register" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="nama" class="small">Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control form-control-sm"
                                    value="{{ old('nama') }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="nik" class="small">NIK</label>
                                <input type="text" id="nik" name="nik" class="form-control form-control-sm"
                                    value="{{ old('nik') }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="gender" class="small">Jenis Kelamin</label>
                                <select id="gender" name="gender" class="form-control form-control-sm">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="tmpt_lahir" class="small">Tempat Lahir</label>
                                <input type="text" id="tmpt_lahir" name="tmpt_lahir"
                                    class="form-control form-control-sm" value="{{ old('tmpt_lahir') }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="tgl_lahir" class="small">Tanggal Lahir</label>
                                <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control form-control-sm"
                                    value="{{ old('tgl_lahir') }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="usia" class="small">Usia</label>
                                <input type="number" id="usia" name="usia" class="form-control form-control-sm"
                                    value="{{ old('usia') }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="pendidikan" class="small">Pendidikan</label>
                                <select id="pendidikan" name="pendidikan" class="form-control form-control-sm">
                                    <option value="">Pilih Pendidikan</option>
                                    <option value="TK" {{ old('pendidikan') == 'TK' ? 'selected' : '' }}>TK</option>
                                    <option value="SD" {{ old('pendidikan') == 'SD' ? 'selected' : '' }}>SD</option>
                                    <option value="SMP" {{ old('pendidikan') == 'SMP' ? 'selected' : '' }}>SMP</option>
                                    <option value="SMA" {{ old('pendidikan') == 'SMA' ? 'selected' : '' }}>SMA</option>
                                    <option value="Belum Sekolah">Belum Sekolah</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="alamat" class="small">Alamat</label>
                                <input type="text" id="alamat" name="alamat" class="form-control form-control-sm"
                                    value="{{ old('alamat') }}">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="foto" class="small">Foto</label>
                                <input type="file" id="foto" name="foto" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="ayah" class="small">Ayah</label>
                                <input type="text" id="ayah" name="ayah" class="form-control form-control-sm"
                                    value="{{ old('ayah') }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="ibu" class="small">Ibu</label>
                                <input type="text" id="ibu" name="ibu" class="form-control form-control-sm"
                                    value="{{ old('ibu') }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="wali" class="small">Wali</label>
                                <input type="text" id="wali" name="wali" class="form-control form-control-sm"
                                    value="{{ old('wali') }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="no_hp_ortu_wali" class="small">No HP Ortu/Wali</label>
                                <input type="text" id="no_hp_ortu_wali" name="tlpn_ortu"
                                    class="form-control form-control-sm" value="{{ old('tlpn_ortu') }}">
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="small btn px-4 py-2 rounded-0"
                                    style="background-color: #7cc576; color: #ffffff !important;">Daftar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection