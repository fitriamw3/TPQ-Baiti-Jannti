@extends('admin.layout.app')

@section('content')

<!-- Page Heading -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 text-gray-800 mb-0" style="border-bottom: 1px solid #ddd; padding-bottom: 8px;">Daftar Pengajar</h1>
    <a href="/pengajar/create" class="btn btn-sm" style="padding: 8px 16px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
        <i class="fas fa-plus"></i> Tambah Pengajar
    </a>
</div>

@if (session('success'))
    <div id="success-toast" class="toast align-items-center" style="background-color: #7cc576; color: #fff;" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                {{ session('success') }}
            </div>
        </div>
    </div>
@endif

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
                        <th>Tanggal Lahir</th>
                        <th>Tempat Lahir</th>
                        <th>Usia</th>
                        <th>Telepon</th>
                        <th>Gender</th>
                        <th>Alamat</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($data as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->nama_guru }}</td>
                            <td>{{ $row->nik_guru }}</td>
                            <td>{{ $row->tgl_lahir_guru }}</td>
                            <td>{{ $row->tmpt_lahir_guru }}</td>
                            <td>{{ $row->usia_guru }}</td>
                            <td>{{ $row->tlpn_guru }}</td>
                            <td>{{ $row->jenis_kelamin_guru == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            <td>{{ $row->alamat_guru }}</td>
                            <td>
                                <img src="{{ asset('fotoguru/' . $row->foto_guru) }}" alt="{{ $row->nama_guru }}"
                                    class="img-thumbnail img-thumbnail-large">
                            </td>
                            <td>
                                <a href="/pengajar/tampilkanguru/{{ $row->id }}" class="btn btn-info">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="#" class="btn btn-danger deleteguru" data-id="{{ $row->id }}"
                                    data-nama="{{ $row->nama_guru }}">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection