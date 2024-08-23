@extends('admin.layout.app')

@section('content')

<div class="container mt-5">
    <div class="mb-3">
        <a href="{{ route('penilaian.index') }}" class="btn btn-black">
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <h1>Penilaian {{ $santri->nama_santri }}</h1>
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
            <form action="{{ route('penilaian.store') }}" method="POST">
                @csrf
                <input type="hidden" name="santri_id" value="{{ $santri->id }}">
                <div class="form-group">
                    <label for="juz">Pilih Juz</label>
                    <select name="juz" id="juz" class="form-control">
                        <option value="">Pilih Juz</option>
                        @for ($i = 1; $i <= 30; $i++)
                            <option value="{{ $i }}">Juz {{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_surah">Nama Surah</label>
                    <input type="text" name="nama_surah" id="nama_surah" class="form-control">
                </div>
                <div class="form-group">
                    <label for="ayat_mulai">Ayat Mulai</label>
                    <input type="number" name="ayat_mulai" id="ayat_mulai" class="form-control" min="1" required>
                </div>

                <div class="form-group">
                    <label for="ayat_akhir">Ayat Akhir</label>
                    <input type="number" name="ayat_akhir" id="ayat_akhir" class="form-control" min="1" required>
                </div>

                <div class="form-group">
                    <label for="nilai_tajwid">Nilai Tajwid</label>
                    <input type="number" name="nilai_tajwid" id="nilai_tajwid" class="form-control" min="0" max="100"
                        required>
                </div>

                <div class="form-group">
                    <label for="nilai_lancar">Nilai Lancar</label>
                    <input type="number" name="nilai_lancar" id="nilai_lancar" class="form-control" min="0" max="100"
                        required>
                </div>

                <div class="form-group">
                    <label for="catatan">Catatan</label>
                    <textarea name="catatan" id="catatan" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                </button>
                <a href="{{ route('penilaian.exportPdf', $santri->id) }}" class="btn btn-success">
                    <i class="fas fa-file-pdf"></i>
                </a>
            </form>

            <h2 class="mt-4">Daftar Penilaian</h2>
            @if($santri->penilaian && $santri->penilaian->isEmpty())
                <p class="text-center">Santri belum ada nilai</p>
            @else
                <ul class="list-group">
                    @foreach($santri->penilaian as $penilaian)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>Juz {{ $penilaian->juz }} - {{ $penilaian->nama_surah }}</strong> <br>
                                Jumlah Ayat: {{ $penilaian->ayat_mulai }} - {{ $penilaian->ayat_akhir }} <br>
                                Nilai Tajwid: {{ $penilaian->nilai_tajwid }} <br>
                                Nilai Lancar: {{ $penilaian->nilai_lancar }} <br>
                                Note: {{ $penilaian->catatan }}
                            </div>
                            <div>
                                <a href="{{ route('penilaian.edit', $penilaian->id) }}" class="btn btn-warning"
                                    style="color: #fff;">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('penilaian.destroy', $penilaian->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus penilaian ini?');">
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