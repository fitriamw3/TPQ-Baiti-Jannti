@extends('admin.layout.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Absensi Santri - {{ $dayName }}, {{ $day }}
        {{ \Carbon\Carbon::create($year, $month, $day)->format('F') }} {{ $year }}</h1>

    <div class="mb-3">
        <a href="{{ route('absensi.showMonth', ['year' => $year, 'month' => $month]) }}" class="btn btn-black">
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('absensi.updateDay', ['year' => $year, 'month' => $month, 'day' => $day]) }}" method="POST">
        @csrf
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Santri</th>
                    <th>L/P</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($santris as $index => $santri)
                                @php
                                    $absensi = $absensis->where('santri_id', $santri->id)->first();
                                @endphp
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $santri->nik_santri }}</td>
                                    <td>{{ $santri->nama_santri }}</td>
                                    <td>{{ $santri->jenis_kelamin_santri }}</td>
                                    <td>
                                        <select name="hadir[{{ $santri->id }}]" class="form-control">
                                            <option value="1" {{ $absensi && $absensi->hadir == 1 ? 'selected' : '' }}>Hadir</option>
                                            <option value="2" {{ $absensi && $absensi->hadir == 2 ? 'selected' : '' }}>Sakit</option>
                                            <option value="3" {{ $absensi && $absensi->hadir == 3 ? 'selected' : '' }}>Izin</option>
                                            <option value="0" {{ $absensi && $absensi->hadir == 0 ? 'selected' : '' }}>Alpha</option>
                                        </select>
                                    </td>
                                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Perbarui Absensi</button>
    </form>
</div>
@endsection