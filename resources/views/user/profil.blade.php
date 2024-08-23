@extends('user.layout.app')

@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4">Profil Santri</h2>
    <div class="card shadow-sm mb-4">
        <div class="card-body text-center">
          
            <img src="{{ asset('fotosantri/' . $santri->foto_santri) }}" class="rounded-circle mb-3 border"
                style="width: 150px; height: 150px; object-fit: cover;" alt="Foto Santri">

            <h3 class="mb-3">{{ $santri->nama_santri }}</h3>

            <div class="row justify-content-center mb-3">
                <div class="col-md-6">
                    <p><strong>NIK:</strong> {{ $santri->nik_santri ?: '-' }}</p>
                    <p><strong>Tanggal Lahir:</strong>
                        {{ \Carbon\Carbon::parse($santri->tgl_lahir_santri)->format('d M Y') }}</p>
                    <p><strong>Tempat Lahir:</strong> {{ $santri->tmpt_lahir_santri }}</p>
                    <p><strong>Usia:</strong> {{ $santri->usia_santri }} tahun</p>
                    <p><strong>Jenis Kelamin:</strong>
                        {{ $santri->jenis_kelamin_santri == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                    <p><strong>Alamat:</strong> {{ $santri->alamat_santri }}</p>
                    <p><strong>Pendidikan:</strong> {{ $santri->pendidikan_santri }}</p>
                    <p><strong>Nama Ayah:</strong> {{ $santri->ayah_santri }}</p>
                    <p><strong>Nama Ibu:</strong> {{ $santri->ibu_santri }}</p>
                    <p><strong>Nama Wali:</strong> {{ $santri->wali_santri ?: '-' }}</p>
                    <p><strong>Telepon Orang Tua:</strong> {{ $santri->tlpn_ortu_santri }}</p>
                    <p><strong>Status Santri:</strong>
                        <span class="badge {{ $santri->terverifikasi ? 'bg-success' : 'bg-warning' }}">
                            {{ $santri->terverifikasi ? 'Aktif' : 'Tidak Aktif' }}
                        </span>
                    </p>
                </div>
            </div>

            <a href="{{ route('ubah') }}" class="btn btn-primary mt-3"><i class="fas fa-key mr-2"></i> Ubah Password</a>
        </div>
    </div>

    <div style="height: 50px;"></div>

</div>

@endsection