@extends('admin.layout.app')

@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1>Edit Hafalan Doa</h1>
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
            <form action="{{ route('hafalan2.update', $hafalan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="doas_id">Doa {{ $hafalan->doa->doa }}</label>
                </div>

                <div class="form-group">
                    <label for="nilai">Nilai</label>
                    <input type="number" class="form-control" name="nilai" id="nilai" value="{{ $hafalan->nilai }}" min="0" max="100" required>
                </div>

                <div class="form-group text-center">
                    <a href="{{ route('hafalan2.show', $hafalan->santri_id) }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                
            </form>
        </div>
    </div>
</div>

@endsection
