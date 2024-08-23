@extends('admin.layout.app')

@section('content')

<!-- Page Heading -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 text-gray-800 mb-0" style="border-bottom: 1px solid #ddd; padding-bottom: 8px;">Verifikasi Santri</h1>
    <a href="/deleteverifikasi" class="btn btn-danger" style="padding: 8px 16px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
        <i class="fas fa-trash"></i> Hapus
    </a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Gender</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Usia</th>
                        <th>Pendidikan</th>
                        <th>Alamat</th>
                        <th>Foto</th>
                        <th>Ayah</th>
                        <th>Ibu</th>
                        <th>Wali</th>
                        <th>No HP Ortu/Wali</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @foreach ($santris as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->nama_santri }}</td>
                            <td>{{ $row->nik_santri }}</td>
                            <td>{{ $row->jenis_kelamin_santri == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            <td>{{ $row->tmpt_lahir_santri }}</td>
                            <td>{{ $row->tgl_lahir_santri }}</td>
                            <td>{{ $row->usia_santri }}</td>
                            <td>{{ $row->pendidikan_santri }}</td>
                            <td>{{ $row->alamat_santri }}</td>
                            <td>
                                <img src="{{ asset('fotosantri/' . $row->foto_santri) }}" alt="{{ $row->nama_santri }}"
                                    class="img-thumbnail img-thumbnail-large">
                            </td>
                            <td>{{ $row->ayah_santri }}</td>
                            <td>{{ $row->ibu_santri }}</td>
                            <td>{{ $row->wali_santri }}</td>
                            <td>{{ $row->tlpn_ortu_santri }}</td>
                            <td>
                                @if (!$row->terverifikasi)
                                    <form action="{{ route('santri.verify', $row->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success" style="font-size: 14px; padding: 5px 10px;">Verifikasi</button>
                                    </form>
                                @else
                                    <span>-</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection