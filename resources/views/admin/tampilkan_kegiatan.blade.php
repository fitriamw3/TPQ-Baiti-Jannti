@extends('admin.layout.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Pilih Kegiatan</h1>

    <div class="row">
        @foreach($kegiatan as $item)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-light">
                    @if($item->gambar)
                        <img src="{{ asset('fotokegiatan/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul_keg }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->judul_keg }}</h5>
                        <p class="card-text">{{ Str::limit($item->deskripsi_keg, 100) }}</p>
                        <a href="{{ route('kegiatan-tpq.registrations', $item->id) }}" class="btn btn-primary">
                            <i class="fas fa-eye"></i> Lihat Pendaftar
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
