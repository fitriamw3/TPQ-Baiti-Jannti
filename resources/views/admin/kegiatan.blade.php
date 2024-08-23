@extends('admin.layout.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 text-gray-800 mb-0" style="border-bottom: 1px solid #ddd; padding-bottom: 8px;">Daftar Kegiatan</h1>
    <a href="{{ route('kegiatan.create') }}" class="btn btn-sm"
        style="padding: 8px 16px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
        <i class="fas fa-plus"></i> Tambah Kegiatan
    </a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Gambar</th>
                        <th>Hari</th>
                        <th>Tempat</th>
                        <th>Kontak</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kegiatan as $item)
                        <tr>
                            <td>{{ $item->judul_keg }}</td>
                            <td>
                                <p class="collapse" id="collapseExample{{ $item->id }}">{{ $item->isi_keg }}</p>
                                <a href="#collapseExample{{ $item->id }}" class="btn btn-sm"
                                    data-toggle="collapse">
                                    Baca Selengkapnya
                                </a>
                            </td>
                            <td><img src="{{ asset('fotokegiatan/' . $item->gambar) }}" width="100" /></td>
                            <td>{{ $item->hari_keg }}</td>
                            <td>{{ $item->tempat_keg }}</td>
                            <td>{{ $item->kontak_keg }}</td>
                            <td>
                                <a href="{{ route('kegiatan.edit', $item) }}" class="btn btn-info">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('kegiatan.destroy', $item) }}" method="POST" style="display:inline;"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection