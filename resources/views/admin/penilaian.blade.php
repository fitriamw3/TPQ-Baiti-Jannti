@extends('admin.layout.app')

@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1>Daftar Santri</h1>
        </div>
        <div class="card-body">
        @if($santris->isEmpty())
                <p class="text-center">Tidak ada santri yang aktif</p>
            @else
                <ul class="list-group">
                    @foreach($santris as $santri)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                            <div>
                                Nama: <strong>{{ $santri->nama_santri }}</strong> <br>
                                Usia: {{ $santri->usia_santri }} tahun<br>
                            </div>
                            </div>
                            <div>
                                <a href="{{ route('penilaian.show', $santri->id) }}" class="btn btn-primary">
                                    <i class="fas fa-star"></i>
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>

@endsection
