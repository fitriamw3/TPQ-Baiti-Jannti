@extends('admin.layout.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 text-gray-800 mb-0" style="border-bottom: 1px solid #ddd; padding-bottom: 8px;">Profile TPQ</h1>
    <a href="{{ route('about.create') }}" class="btn btn-sm"
        style="padding: 8px 16px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
        <i class="fas fa-plus"></i> Tambah Profile
    </a>
</div>

@foreach (['profil', 'visi', 'misi', 'gambar','lokasi','email','telepon'] as $katagori)
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ ucfirst($katagori) }}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>@if($katagori == 'gambar') Gambar @else Keterangan @endif</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($tpq->where('katagori', $katagori) as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->katagori }}</td>
                                <td>
                                    @if($katagori == 'gambar')
                                        <img src="{{ asset('fotoprofil/'.$row->gambar) }}" alt="Gambar" style="max-width: 150px; height: auto;">
                                    @else
                                        {{ $row->keterangan }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('about.edit', $row->id_profil) }}" class="btn btn-info">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('about.destroy', $row->id_profil) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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
@endforeach

@endsection
