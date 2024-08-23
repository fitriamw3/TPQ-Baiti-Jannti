@extends('admin.layout.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 text-gray-800 mb-0" style="border-bottom: 1px solid #ddd; padding-bottom: 8px;">Data Doa</h1>
    <a href="{{ route('doas.create') }}" class="btn btn-sm"
        style="padding: 8px 16px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
        <i class="fas fa-plus"></i> Tambah Doa</a>
</div>

@if (session('success'))
    <div id="success-toast" class="toast align-items-center" style="background-color: #7cc576; color: #fff;" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                {{ session('success') }}
            </div>
        </div>
    </div>
@endif

<div class="container mt-4">
    @if($doas->isEmpty())
        <p class="text-center">Tidak ada data doa yang tersedia.</p>
    @else
        <ul class="list-group">
            @foreach($doas as $doa)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $doa->doa }}</span>
                    <form action="{{ route('doas.destroy', $doa->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Anda yakin ingin menghapus surah ini?')"><i
                                class="fas fa-trash"></i></button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
</div>

@endsection