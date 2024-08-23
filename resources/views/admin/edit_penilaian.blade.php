@extends('admin.layout.app')

@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1>Edit Nilai</h1>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('penilaian.update', $penilaian->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="juz">Pilih Juz</label>
                    <select name="juz" id="juz" class="form-control">
                        @for ($i = 1; $i <= 30; $i++)
                            <option value="{{ $i }}" {{ $penilaian->juz == $i ? 'selected' : '' }}>
                                Juz {{ $i }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_surah">Nama Surah</label>
                    <input type="text" name="nama_surah" id="nama_surah" class="form-control" value="{{ $penilaian->nama_surah }}">
                </div>
                <div class="form-group">
                    <label for="ayat_mulai">Ayat Mulai</label>
                    <input type="number" name="ayat_mulai" id="ayat_mulai" class="form-control" min="1" value="{{ $penilaian->ayat_mulai }}" required>
                </div>

                <div class="form-group">
                    <label for="ayat_akhir">Ayat Akhir</label>
                    <input type="number" name="ayat_akhir" id="ayat_akhir" class="form-control" min="1" value="{{ $penilaian->ayat_akhir }}" required>
                </div>

                <div class="form-group">
                    <label for="nilai_tajwid">Nilai Tajwid</label>
                    <input type="number" name="nilai_tajwid" id="nilai_tajwid" class="form-control" min="0" max="100" value="{{ $penilaian->nilai_tajwid }}" required>
                </div>

                <div class="form-group">
                    <label for="nilai_lancar">Nilai Lancar</label>
                    <input type="number" name="nilai_lancar" id="nilai_lancar" class="form-control" min="0" max="100" value="{{ $penilaian->nilai_lancar }}" required>
                </div>

                <div class="form-group">
                    <label for="catatan">Catatan</label>
                    <textarea name="catatan" id="catatan" class="form-control">{{ $penilaian->catatan }}</textarea>
                </div>

                <div class="form-group text-center">
                    <a href="{{ route('penilaian.show', $penilaian->santri_id) }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
