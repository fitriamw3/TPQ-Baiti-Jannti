@extends('admin.layout.app')

@section('content')

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('fotoguru/' . $guru->foto_guru) }}" class="img-fluid rounded-start" style="max-height: 400px; object-fit: cover;" alt="Foto Guru">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 24px; font-weight: bold;">Profil Guru</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>NIK:</strong> {{ $guru->nik_guru }}</li>
                        <li class="list-group-item"><strong>Nama:</strong> {{ $guru->nama_guru }}</li>
                        <li class="list-group-item"><strong>Tanggal Lahir:</strong> {{ $guru->tgl_lahir_guru }}</li>
                        <li class="list-group-item"><strong>Tempat Lahir:</strong> {{ $guru->tmpt_lahir_guru }}</li>
                        <li class="list-group-item"><strong>Usia:</strong> {{ $guru->usia_guru }} tahun</li>
                        <li class="list-group-item"><strong>Jenis Kelamin:</strong>
                            {{ $guru->jenis_kelamin_guru == 'L' ? 'Laki-laki' : 'Perempuan' }}
                        </li>
                        <li class="list-group-item"><strong>Telepon:</strong> {{ $guru->tlpn_guru }}</li>
                        <li class="list-group-item"><strong>Alamat:</strong> {{ $guru->alamat_guru }}</li>
                    </ul>
                    <div class="mt-4 text-left">
                        <a href="{{ route('change-password') }}" class="btn btn-sm">Ubah Kata Sandi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
