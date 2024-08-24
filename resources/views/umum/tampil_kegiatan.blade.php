@extends('umum.layout.app')

@section('content')
<div class="container mt-5">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <div class="mb-3">
        <a href="/tpq-baitijannati#pricing" class="btn btn-black">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h1 class="display-4 mb-4">{{ $kegiatan->judul_keg }}</h1>

                    @if($kegiatan->gambar)
                        <div class="mb-4 text-center">
                            <img src="{{ asset('fotokegiatan/' . $kegiatan->gambar) }}" class="img-fluid rounded"
                                alt="{{ $kegiatan->judul_keg }}" style="max-width: 100%; height: auto;">
                        </div>
                    @endif

                    <h5>Assalamualaikum Warahmatullahi Wabarakatuh</h5>
                    <p class="mb-5" style="white-space: pre-wrap; font-size: 1.1rem;">{{ $kegiatan->isi_keg }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="mb-3">Informasi</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fas fa-calendar-alt mr-2"></i>
                            <strong style="margin-left: 8px;"></strong>
                            {{ $kegiatan->hari_keg }}
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            <strong style="margin-left: 8px;"></strong>
                            {{ $kegiatan->tempat_keg }}
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-phone-alt mr-2"></i>
                            <strong style="margin-left: 8px;"></strong>
                            {{ $kegiatan->kontak_keg }}
                        </li>
                    </ul>

                </div>
            </div>

            <div class="row mt-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="mb-3">Daftar Kegiatan</h5>
                        <form action="{{ route('kegiatan-tpq.register', ['id' => $kegiatan->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="usia">Usia</label>
                                <input type="number" id="usia" name="usia" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="jenis_kelamin_santri">Jenis Kelamin</label>
                                <select id="jenis_kelamin_santri" name="jenis_kelamin_santri" class="form-control"
                                    required>
                                    <option value="L">Pilih Jenis Kelamin</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea id="alamat" name="alamat" class="form-control" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" id="foto" name="foto" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="tlpn_ortu">Telepon Orang Tua</label>
                                <input type="text" id="tlpn_ortu" name="tlpn_ortu" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="height: 50px;"></div>


</div>
@endsection