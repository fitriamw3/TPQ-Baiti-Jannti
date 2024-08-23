@extends('user.layout.app')

@section('content')

<section id="hafalan" class="hafalan">
    <div class="container">
        <!-- Section Title -->
        <div class="section-title" data-aos="fade-up">
            <h2>Hafalan Santri</h2>
            <p>Hafalan surah dan doa yang dicapai oleh santri.</p>
        </div>

        <!-- Hafalan Surah -->
        <h2 class="mt-5" data-aos="fade-up" style="font-size: 28px; font-weight: 700; text-transform: uppercase; border-bottom: 3px solid; display: inline-block; padding-bottom: 5px;">
            Hafalan Surah
        </h2>
        <div class="row">
            @forelse($hafalanSurahs as $hafalan)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="icon-box mt-5" data-aos="fade-up">
                        <i class="fas fa-quran" style="font-size: 36px; color: #7cc576;"></i>
                        <h4 class="mt-3">{{ $hafalan->surah->nama ?? 'Tidak ada nama surah' }}</h4>
                        <p><strong>Nilai:</strong> {{ $hafalan->nilai }}</p>
                        <p><strong>Jumlah Ayat:</strong> {{ $hafalan->jumlah_ayat }}</p>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-muted">Belum ada hafalan surah.</p>
                </div>
            @endforelse
        </div>

        <!-- Hafalan Doa -->
        <h2 class="mt-5" data-aos="fade-up" style="font-size: 28px; font-weight: 700; text-transform: uppercase; border-bottom: 3px solid; display: inline-block; padding-bottom: 5px;">
            Hafalan Doa
        </h2>
        <div class="row">
            @forelse($hafalanDoas as $hafalan)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="icon-box mt-5" data-aos="fade-up">
                        <i class="fas fa-praying-hands" style="font-size: 36px; color: #7cc576;"></i>
                        <h4 class="mt-3">{{ $hafalan->doa->doa ?? 'Tidak ada nama doa' }}</h4>
                        <p><strong>Nilai:</strong> {{ $hafalan->nilai }}</p>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-muted">Belum ada hafalan doa.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection
