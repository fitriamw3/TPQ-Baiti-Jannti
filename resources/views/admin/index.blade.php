@extends('admin.layout.app')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

<div class="card shadow mb-4">
    <div class="row justify-content-center">

        <div class="col-xl-4 col-md-6 mb-5">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-3"
                                style="font-size: 1.2rem;">Pengajar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPengajar }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-3x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-5">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-3"
                                style="font-size: 1.2rem;">Santri</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalSantri }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-3x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (auth()->user()->role=="admin")
        <div class="col-xl-4 col-md-6 mb-5">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-3"
                                style="font-size: 1.2rem;">Belum Verifikasi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalVerifikasi }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-child fa-3x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>

@endsection
