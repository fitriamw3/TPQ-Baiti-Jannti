@extends('admin.layout.app')

@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1>Tambah Doa</h1>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('doas.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="doa">Nama Doa</label>
                    <input type="text" class="form-control" name="doa" id="doa" required>
                </div>

                <div class="form-group text-center">
                    <a href="{{ route('doas.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
                
            </form>
        </div>
    </div>
</div>

@endsection