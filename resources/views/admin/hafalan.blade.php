@extends('admin.layout.app')

@section('content')

<div class="container mt-5">
    <div class="mb-3">
        <a href="{{ route('hafalan.index') }}" class="btn btn-black">
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1>Hafalan Surah {{ $santri->nama_santri }}</h1>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div id="success-toast" class="toast align-items-center" style="background-color: #7cc576; color: #fff;"
                    role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            {{ session('success') }}
                        </div>
                    </div>
                </div>
            @endif
            <form action="{{ route('hafalan.store') }}" method="POST">
                @csrf
                <input type="hidden" name="santri_id" value="{{ $santri->id }}">
                <div class="form-group">
                    <label for="surah_id">Surah</label>
                    <select class="form-control" name="surahs_id" id="surahs_id" required>
                        <option value="">Pilih Surah</option>
                        @foreach($surahs as $surah)
                            <option value="{{ $surah->id }}">{{ $surah->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nilai">Nilai</label>
                    <input type="number" class="form-control" name="nilai" id="nilai" min="0" max="100" required>
                </div>
                <div class="form-group">
                    <label for="jumlah_ayat">Jumlah Ayat</label>
                    <input type="number" class="form-control" name="jumlah_ayat" id="jumlah_ayat" min="1" required>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                </button>
                <a href="{{ route('hafalan.pdf', $santri->id) }}" class="btn btn-success">
                    <i class="fas fa-file-pdf"></i>
                </a>
            </form>

            <h2 class="mt-4">Daftar Hafalan</h2>
            @if($santri->hafalans->isEmpty())
                <p class="text-center">Tidak ada hafalan untuk santri</p>
            @else
                <ul class="list-group">
                    @foreach($santri->hafalans->whereNotNull('surahs_id') as $hafalan)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $hafalan->surah->nama }}</strong> <br>
                                Nilai: {{ $hafalan->nilai }} <br>
                                Jumlah Ayat: {{ $hafalan->jumlah_ayat }}
                            </div>
                            <div>
                                <a href="{{ route('hafalan.edit', $hafalan->id) }}" class="btn btn-warning"
                                    style="color: #fff;">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('hafalan.destroy', $hafalan->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus hafalan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="color: #fff;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>

@endsection