@extends('admin.layout.app')

@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1>Edit Hafalan Surah</h1>
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
            <form action="{{ route('hafalan.update', $hafalan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="surah_id">Surah {{ $hafalan->surah->nama }}</label>
                </div>

                <div class="form-group">
                    <label for="nilai">Nilai</label>
                    <input type="number" class="form-control" name="nilai" id="nilai" value="{{ $hafalan->nilai }}"
                        min="0" max="100" required>
                </div>

                <div class="form-group">
                    <label for="jumlah_ayat">Jumlah Ayat</label>
                    <input type="number" class="form-control" name="jumlah_ayat" id="jumlah_ayat"
                        value="{{ $hafalan->jumlah_ayat }}" min="1" required>
                </div>

                <div class="form-group text-center">
                    <a href="{{ route('hafalan.show', $hafalan->santri_id) }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                
            </form>
        </div>
    </div>
</div>

@endsection