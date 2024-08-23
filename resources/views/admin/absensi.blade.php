@extends('admin.layout.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1 class="mb-4 text">Absensi Santri</h1>
        </div>

        <div class="card-body">
            <div class="row justify-content-end mb-4">
                <div class="col-md-4 text-right">
                    <form action="{{ route('absensi.index') }}" method="GET">
                        <div class="input-group">
                            <select name="year" class="form-control" onchange="this.form.submit()">
                                @foreach ($years as $availableYear)
                                    <option value="{{ $availableYear }}" {{ $availableYear == $year ? 'selected' : '' }}>
                                        {{ $availableYear }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-sm" type="submit">Tampilkan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row justify-content">
                @foreach ($absensis as $monthYear => $absensi)
                                @php
                                    $year = Carbon\Carbon::parse($monthYear)->format('Y');
                                    $month = Carbon\Carbon::parse($monthYear)->format('m');
                                    $monthName = Carbon\Carbon::parse($monthYear)->locale('id')->translatedFormat('F');
                                @endphp
                                <div class="col-6 col-md-4 col-lg-3 mb-2">
                                    <div class="card border-0 rounded-lg overflow-hidden">
                                        <a href="{{ route('absensi.showMonth', ['year' => $year, 'month' => $month]) }}"
                                            class="btn btn-block text-decoration-none d-flex flex-column align-items-center justify-content-center"
                                            style="background-color: #ffffff; padding: 0.8rem; height: 50%;">
                                            <div class="calendar-icon mb-1" style="font-size: 2.5rem; color: #007bff;">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </div>
                                            <div class="text-center">
                                                <strong style="font-size: 1.2rem; color: #333;">{{ $monthName }}</strong>
                                            </div>
                                            <div class="text-center mt-1">
                                                <span style="font-size: 1rem; color: #6c757d;">{{ $year }}</span>
                                            </div>
                                        </a>
                                        <div class="card-footer bg-light d-flex justify-content-center p-2">
                                            <a href="{{ route('absensi.exportPdf', ['year' => $year, 'month' => $month]) }}"
                                                class="btn btn-success d-flex align-items-center justify-content-center"
                                                style="border-radius: 0.5rem; background-color: #28a745; border-color: #28a745; padding: 0.5rem 0.8rem; font-size: 0.9rem; transition: background-color 0.3s;">
                                                <i class="fas fa-file-pdf mr-1"></i> Export to PDF
                                            </a>
                                        </div>
                                    </div>
                                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
    .calendar-icon {
        color: white;
    }

    .btn-outline-primary {
        background-color: #f0f0f0;
        border: 2px solid #007bff;
        color: #007bff;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: white;
    }

    .btn-outline-primary .calendar-icon {
        color: #007bff;
    }

    .btn-outline-primary:hover .calendar-icon {
        color: white;
    }
</style>
@endsection