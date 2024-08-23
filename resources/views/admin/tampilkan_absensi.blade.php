@extends('admin.layout.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Absensi Santri - {{ $monthName }} {{ $year }}</h1>

    <div class="mb-3">
        <a href="{{ route('absensi.index') }}" class="btn btn-black">
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>

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

    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="">
                <tr>
                    <th class="bg-info text-white" rowspan="2">No</th>
                    <th class="bg-info text-white" rowspan="2">Nama Santri</th>
                    <th class="bg-info text-white" rowspan="2">L/P</th>
                    @for ($day = 1; $day <= $daysInMonth; $day++)
                        <th class="bg-secondary text-white">
                            <a href="{{ route('absensi.showDay', ['year' => $year, 'month' => $month, 'day' => $day]) }}"
                                class="text-decoration-none text-white">
                                {{ $day }}
                            </a>
                        </th>
                    @endfor
                    <th class="bg-success text-white" rowspan="2">H</th>
                    <th class="bg-danger text-white" rowspan="2">A</th>
                    <th class="bg-warning text-white" rowspan="2">S</th>
                    <th class="bg-primary text-white" rowspan="2">I</th>
                </tr>
                <tr>
                    @for ($day = 1; $day <= $daysInMonth; $day++)
                        <th class="bg-info text-white">{{ \Carbon\Carbon::create($year, $month, $day)->format('D') }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @foreach ($santris as $index => $santri)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $santri->nama_santri }}</td>
                                    <td>{{ $santri->jenis_kelamin_santri }}</td>
                                    @php
                                        $hadirCount = 0;
                                        $alphaCount = 0;
                                        $sakitCount = 0;
                                        $izinCount = 0;
                                    @endphp
                                    @for ($day = 1; $day <= $daysInMonth; $day++)
                                                    @php
                                                        $currentDate = \Carbon\Carbon::create($year, $month, $day)->format('Y-m-d');
                                                        $absensi = $absensis->where('santri_id', $santri->id)->where('tanggal', $currentDate)->first();
                                                    @endphp
                                                    <td>
                                                        @if ($absensi)
                                                            @if ($absensi->hadir == 1)
                                                                <span class="badge bg-success text-white">H</span>
                                                                @php                $hadirCount++; @endphp
                                                            @elseif ($absensi->hadir == 2)
                                                                <span class="badge bg-warning text-white">S</span>
                                                                @php                $sakitCount++; @endphp
                                                            @elseif ($absensi->hadir == 3)
                                                                <span class="badge bg-primary text-white">I</span>
                                                                @php                $izinCount++; @endphp
                                                            @else
                                                                <span class="badge bg-danger text-white">A</span>
                                                                @php                $alphaCount++; @endphp
                                                            @endif
                                                        @else
                                                            <span class="badge bg-light text-dark">?</span>
                                                        @endif
                                                    </td>
                                    @endfor
                                    <td>{{ $hadirCount }}</td>
                                    <td>{{ $alphaCount }}</td>
                                    <td>{{ $sakitCount }}</td>
                                    <td>{{ $izinCount }}</td>
                                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection