@extends('user.layout.app')

@section('content')

<section id="absensi" class="absensi">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Absensi Santri</h2>
            <p>Data absensi santri selama TPQ.</p>
        </div>

        <form method="GET" action="{{ route('absensi.santri') }}">
            <div class="row mb-4" data-aos="fade-up">
                <div class="col-md-4">
                    <select name="bulan" class="form-control">
                        <option value="">Pilih Bulan</option>
                        @foreach(range(1, 12) as $month)
                            <option value="{{ $month }}" {{ request('bulan') == $month ? 'selected' : '' }}>
                                {{ DateTime::createFromFormat('!m', $month)->format('F') }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <select name="tahun" class="form-control">
                        <option value="">Pilih Tahun</option>
                        @foreach($years as $year)
                            <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>

        <!-- Tabel Absensi -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover" data-aos="fade-up">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($absensi as $index => $absensiItem)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($absensiItem->tanggal)->format('d M Y') }}</td>
                            <td>
                                <span class="badge 
                                    {{ $absensiItem->hadir == 1 ? 'bg-success' : '' }}
                                    {{ $absensiItem->hadir == 2 ? 'bg-warning' : '' }}
                                    {{ $absensiItem->hadir == 3 ? 'bg-info' : '' }}
                                    {{ $absensiItem->hadir == 0 ? 'bg-danger' : '' }}">
                                    {{ $absensiItem->hadir == 1 ? 'Hadir' : '' }}
                                    {{ $absensiItem->hadir == 2 ? 'Sakit' : '' }}
                                    {{ $absensiItem->hadir == 3 ? 'Izin' : '' }}
                                    {{ $absensiItem->hadir == 0 ? 'Alpha' : '' }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">Tidak ada data absensi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
