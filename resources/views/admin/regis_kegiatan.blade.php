@extends('admin.layout.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Pendaftar untuk Kegiatan {{ $kegiatan->judul_keg }}</h1>

    @if($registrations->isEmpty())
        <p>Tidak ada pendaftaran untuk kegiatan ini.</p>
    @else

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%"
                        cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Usia</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Telepon Orang Tua</th>
                                <th>Tanggal Daftar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($registrations as $registration)
                                <tr>
                                    <td>{{ $registration->nama }}</td>
                                    <td>{{ \Carbon\Carbon::parse($registration->tgl_lahir)->format('d-m-Y') }}</td>
                                    <td>{{ $registration->usia }}</td>
                                    <td>{{ $registration->jenis_kelamin_santri == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                    <td>{{ $registration->alamat }}</td>
                                    <td>{{ $registration->tlpn_ortu }}</td>
                                    <td>{{ \Carbon\Carbon::parse($registration->created_at)->format('d-m-Y H:i') }}</td>
                                    <td>
                                        <form action="{{ route('kegiatan-tpq.registrations.destroy', $registration->id) }}"
                                            method="POST" style="display:inline;"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus hafalan ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>
                                                Hapus</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>

@endsection