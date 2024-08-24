@extends('umum.layout.app')

@section('content')

<main id="main">

  <!-- ======= About Us Section ======= -->

  <section id="about" class="about">
    <div class="container-fluid p-0">

      <div class="section-title text-center" data-aos="fade-up">
        <h2>About Us</h2>
        <p>Profil, Visi, dan Misi TPQ Baiti Jannati</p>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-12" data-aos="fade-down">
          <div class="image">
            @if (file_exists(public_path('fotoprofil/' . $gambar->gambar)))
        <img src="{{ asset('fotoprofil/' . $gambar->gambar) }}" class="img-fluid w-100"
          style="max-height: 600px; object-fit: cover; margin-bottom: 20px; border: none;" alt="">
      @else
    <p>Image not found.</p>
  @endif
          </div>
        </div>

        <div class="col-lg-10" data-aos="fade-up" style="margin-top: 35px;">
          <div class="content pt-4 pt-lg-0 pl-0 pl-lg-3">
            <p>
              {!! nl2br(e($profil->keterangan ?? 'Deskripsi profil belum tersedia.')) !!}
            </p>
          </div>
        </div>


        <div class="col-lg-10" data-aos="fade-up" style="margin-top: 35px;">
          <div class="content pt-4 pt-lg-0 pl-0 pl-lg-3">
            <h3>Visi</h3>
            <p>
              {{ $visi->keterangan ?? 'Deskripsi visi belum tersedia.' }}
            </p>
          </div>
        </div>

        <!-- Misi -->
        <div class="col-lg-10" data-aos="fade-up" style="margin-top: 35px;">
          <div class="content pt-4 pt-lg-0 pl-0 pl-lg-3">
            <h3>Misi</h3>
            <ul style="list-style: none; padding: 0;">
              @foreach($misi as $item)
          <li><i class="bx bx-check-double"></i> {{ $item->keterangan }}</li>
        @endforeach
            </ul>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- End About Us Section -->

  <!-- ======= Prestasi Section ======= -->

  <section id="featured" class="featured">
    <div class="container">

      <div class="row">
        <div class="col-lg-6 d-flex justify-content-center" data-aos="fade-right">
          <div class="tab-content">
            @foreach($prestasi as $index => $item)
        <div class="tab-pane {{ $index == 0 ? 'active show' : '' }}" id="tab-{{ $index + 1 }}">
          <figure class="d-flex justify-content-center">
          <img src="{{ asset('fotoprestasi/' . $item->gambar) }}" alt="{{ $item->judul }}"
            class="img-fluid mx-auto">
          </figure>
        </div>
      @endforeach
          </div>
        </div>
        <div class="col-lg-6 mt-4 mt-lg-0" data-aos="fade-left">
          <ul class="nav nav-tabs flex-column">
            @foreach($prestasi as $index => $item)
        <li class="nav-item mt-2">
          <a class="nav-link {{ $index == 0 ? 'active show' : '' }}" data-bs-toggle="tab"
          href="#tab-{{ $index + 1 }}">
          <h4>{{ $item->judul }}</h4>
          <p>{{ $item->deskripsi }}</p>
          </a>
        </li>
      @endforeach
          </ul>
        </div>
      </div>

    </div>
  </section>

  <!-- End Prestasi Section -->

  <!-- ======= Team Section ======= -->

  <section id="team" class="team">
    <div class="container">
      <div class="section-title" data-aos="fade-up">
        <h2>Pengajar</h2>
        <p>Guru-guru yang akan mengajari Santri dalam menuntut ilmu Qur'an</p>
      </div>
      <div class="row">
        @foreach ($guru as $pengajar)
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch justify-content-center">
        <div class="member" data-aos="zoom-in">
        <div class="member-img">
          <img src="{{ asset('fotoguru/' . $pengajar->foto_guru) }}" class="img-fluid square-img" alt="">
        </div>
        <div class="member-info text-center">
          <h3>{{ $pengajar->nama_guru }}</h3>
        </div>
        </div>
      </div>
    @endforeach
      </div>
    </div>
  </section>

  <style>
    .member-img img.square-img {
      width: 125px;
      height: 250px;
      object-fit: cover;
      display: block;
      margin: 0 auto;
    }
  </style>

  <!-- End Team Section -->

  <!-- ======= Program Section ======= -->

  <section id="pricing" class="pricing section-bg">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>Program TPQ Baiti Jannati</h2>
        <p>Program-Program Berikut Dibuka Untuk Umum</p>
      </div>

      <div class="row">
        @foreach($kegiatan as $item)
      <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
        <div class="box" style="margin-bottom: 20px;" data-aos="zoom-in">
          <h2 style="margin-bottom: 20px;">{{ $item->judul_keg }}</h2>
            @if($item->gambar)
            <img src="{{ asset('fotokegiatan/' . $item->gambar) }}" class="img-fluid" alt="{{ $item->judul_keg }}"
            style="margin-bottom: 20px;">
            @endif
              <div class="btn-wrap">
                <a href="{{ route('kegiatan-tpq.show', $item->id) }}" class="btn-buy">Info</a>
              </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- End Program Section -->

  <!-- ======= Galeri Section ======= -->

  <section id="portfolio" class="portfolio">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>Galeri</h2>
        <p>Dokumentasi TPQ Baiti Jannati</p>
      </div>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

        @foreach($galeri as $item)
      <div class="col-lg-4 col-md-6 portfolio-item filter-web">
        <div class="portfolio-wrap">
        <img src="{{ asset('fotogaleri/' . $item->gambar) }}" class="img-fluid" alt="{{ $item->nama_galeri }}">
        <div class="portfolio-info">
          <h4>{{ $item->nama_galeri }}</h4>
          <div class="portfolio-links">
          <a href="{{ asset('fotogaleri/' . $item->gambar) }}" data-gallery="portfolioGallery"
            class="portfolio-lightbox" title="{{ $item->ket_galeri }}"><i class="bx bx-plus"></i></a>
          </div>
        </div>
        </div>
      </div>
    @endforeach

      </div>

    </div>
  </section>

  <!-- End Galeri Section -->

  <!-- ======= Contact Section ======= -->

  <section id="contact" class="contact section-bg">
    <div class="container">

      <div class="section-title">
        <h2>Contact</h2>
        <p>Mempunyai Pertanyaan?</p>
      </div>

      <div class="row">

        <div class="col-lg-4">
          <div class="info d-flex flex-column justify-content-center" data-aos="fade-right">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>{{ $lokasi ? $lokasi->keterangan : 'No location available' }}</p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>{{ $email ? $email->keterangan : 'No email available' }}</p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <p>{{ $telepon ? $telepon->keterangan : 'No phone available' }}</p>
            </div>
          </div>
        </div>

        <div class="col-lg-8 mt-5 mt-lg-0">
          <form action="/contact/send" method="post" role="form" class="p-4 bg-white rounded" data-aos="fade-left">
            @csrf
            <div class="row">
              <div class="col-md-6 form-group mb-3">
                <input type="number" name="number" class="form-control border-radius" id="number"
                  placeholder="Your Cellphone Number / Whatsapp" required>
              </div>

              <div class="col-md-6 form-group mb-3">
                <input type="email" class="form-control border-radius" name="email" id="email" placeholder="Your Email"
                  required>
              </div>
            </div>

            <div class="form-group mb-3">
              <input type="text" name="name" class="form-control border-radius" id="name" placeholder="Your Name"
                required>
            </div>

            <div class="form-group mb-4">
              <textarea class="form-control border-radius" name="message" rows="5" placeholder="Message"
                required></textarea>
            </div>

            <div class="text-center">
              <button type="submit" class="btn px-5 py-2"
                style="background-color: #7cc576; border-color: #7cc576; color: #ffffff;">Send Message</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- End Contact Section -->

</main><!-- End #main -->

@endsection