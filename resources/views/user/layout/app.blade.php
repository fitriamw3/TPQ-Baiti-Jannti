<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>TPQ BAITI JANNATI</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/Logo.png') }}" rel="icon">
    <link href="{{ asset('assets/img/Logo.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .sidebar-green {
            background-color: #7cc576 !important;
        }

        /* Menambahkan jarak antara elemen <a> */
        .py-2.bg-light a.small {
            margin-right: 20px !important;
            color: #5a6268 !important;
            text-decoration: none !important;
        }

        .ftco-subscribe-1 {
            padding: 120px 0;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .custom-breadcrumbs {
            padding: 20px 0;
            background: #fff;
            border-bottom: 1px solid #dee2e6;
            margin-bottom: 40px;
        }

        .site-section {
            padding: 60px 0;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .btn-custom {
            background-color: #51be78;
            color: #ffffff !important;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 5px;

        }

        .forgot-password {
            font-size: 12px;
            text-align: right;
            margin-top: 5px;
            color: #7cc576;
        }

        .forgot-password a {
            color: #7cc576;
        }

        .forgot-password a:hover {
            color: #5aab52;
            /* Warna teks saat hover */
        }

        .nav-link.active {
            color: #7cc576 !important;
        }

        .dropdown-menu .dropdown-item:focus,
        .dropdown-menu .dropdown-item:active {
            background-color: transparent;
            color: inherit;
        }

        @media (max-width: 768px) {
            .ftco-subscribe-1 {
                padding: 60px 0;
            }

            .custom-breadcrumbs {
                padding: 10px 0;
                margin-bottom: 20px;
            }

            .site-section {
                padding: 55px 0;
            }

            .form-group label {
                font-size: 14px;
            }

            .form-control-lg {
                font-size: 14px;
                padding: 10px;
            }

            .btn-custom {
                padding: 8px 16px;
                font-size: 16px;
            }

            .col-lg-7 h2 {
                font-size: 25px;
                /* Adjust font size for smaller screens */
            }

            .container {
                font-size: 17px;
                /* Further adjust font size for smaller screens */
            }

            .forgot-password {
                font-size: 11px;
            }
        }

        @media (max-width: 576px) {
            .ftco-subscribe-1 {
                padding: 40px 0;
            }

            .custom-breadcrumbs {
                padding: 5px 0;
                margin-bottom: 10px;
            }

            .site-section {
                padding: 40px 0;
            }

            .form-group label {
                font-size: 12px;
            }

            .form-control-lg {
                font-size: 12px;
                padding: 8px;
            }

            .btn-custom {
                padding: 6px 12px;
                font-size: 14px;
            }

            .col-lg-7 h2 {
                font-size: 23px;
                /* Adjust font size for smaller screens */
            }

            .container {
                font-size: 13px;
                /* Further adjust font size for smaller screens */
            }

        }
    </style>

</head>

<body>

    <!-- ======= Header ======= -->
    <div class="py-2 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9 d-none d-lg-block">
                    <a href="/tpq-baitijannati#contact" class="small mr-3" style="color: #7cc576 !important;"><span
                            class="fas fa-question-circle mr-2"></span> Have a question?</a>
                    <a class="small mr-3">
                        <span class="fas fa-phone-alt mr-2"></span>
                        {{ $telepon ? $telepon->keterangan : 'No phone available' }}
                    </a>
                    <a class="small mr-3">
                        <span class="fas fa-envelope mr-2"></span>
                        {{ $email ? $email->keterangan : 'No email available' }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                <a href="/home-santri#about"><img src="{{ asset('assets/img/Logo.png') }}" alt=""
                        class="img-fluid logo-img"></a>
            </div>

            <nav id="navbar" class="navbar">
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link scrollto" href="/home-santri#about">Home</a></li>
                    <li class="nav-item">
                        <a class="nav-link scrollto {{ request()->is('/home-santri#pricing') || request()->is('kegiatan-santri*') ? 'active' : '' }}"
                            href="/home-santri#pricing">Program</a>
                    </li>
                    <li class="dropdown"><a
                            class="nav-link scrollto {{ request()->is('/home-santri#services*') || request()->is('aktivitas*') ? 'active' : '' }}"
                            href="/home-santri#services">Aktivitas</a>
                        <ul>
                            <li><a href="/aktivitas/santri-absensi">Absensi</a></li>
                            <li><a href="/aktivitas/santi-nilai">Penilaian</a></li>
                            <li><a href="/aktivitas/santri-hafalan">Hafalan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link scrollto" href="/home-santri#portfolio">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link scrollto" href="/home-santri#contact">Contact</a></li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                            role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="{{ asset('fotosantri/' . Auth::user()->santri->foto_santri) }}"
                                class="rounded-circle img-fluid" style="width: 30px; height: 30px; object-fit: cover;"
                                alt="Profile Image">
                        </a>

                        <div class="dropdown-menu dropdown-menu-end shadow" style="min-width: 200px;"
                            aria-labelledby="navbarDropdown">
                            <a class="dropdown-item d-flex align-items-center"
                                href="{{ route('profil.santri', Auth::user()->santri->id) }}">
                                <i class="bi bi-person-circle"></i>Data Santri
                                <span></span>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); confirmLogout();">
                                <i class="bi bi-box-arrow-right"></i>{{ __('Logout') }}
                                <span></span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>

                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

        </div>
    </header>

    <div class="container-fluid">
        @yield('content')

    </div>

    <!-- ======= Footer ======= -->
    <footer id="footer" style="background-color: #f1f1f1;"> <!-- Ganti dengan warna yang Anda inginkan -->
        <div class="container footer-bottom clearfix">
            <div class="location" style="text-align: center; margin-bottom: 10px;">
                <p><strong>Lokasi:</strong> {{ $lokasi ? $lokasi->keterangan : 'No location available' }} </p>
            </div>

            <div class="d-flex justify-content-center align-items-center" style="gap: 20px; margin-bottom: 20px;">
                <div class="map-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.8124303780423!2d109.35130157395832!3d-0.09845039990057718!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d5a5d646165a1%3A0x7915d304c4e9aa2b!2sMasjid%20Baiti%20Jannati!5e0!3m2!1sid!2sid!4v1722342593453!5m2!1sid!2sid"
                        width="730" height="350" style="border:0; border-radius: 10px;" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div class="social-links d-flex flex-column align-items-center">
                    <a href="https://www.facebook.com/remajamasjid.baitijannati?locale=id_ID" class="facebook"
                        style="margin-bottom: 10px;">
                        <i class="bx bxl-facebook" style="font-size: 30px; color: #3B5998;"></i>
                    </a>
                    <a href="https://www.instagram.com/remajamasjid.baitijannati?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                        class="instagram">
                        <i class="bx bxl-instagram" style="font-size: 30px; color: #E1306C;"></i>
                    </a>
                </div>
            </div>

            <div class="text-center mt-3">
                <div class="copyright">
                    &copy; Copyright <strong><span>Fitri Ambarwati</span></strong> 3202116103
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>

    <script>
        // Tunggu hingga seluruh halaman dimuat
        document.addEventListener('DOMContentLoaded', function () {
            // Cek apakah elemen dengan id 'passwordError' ada
            var passwordError = document.getElementById('passwordError');
            if (passwordError) {
                // Setel timeout untuk menghapus elemen setelah 5 detik (5000 milidetik)
                setTimeout(function () {
                    passwordError.style.display = 'none';
                }, 5000);
            }
        });
    </script>

    <script>
        function confirmLogout() {
            if (confirm('Kamu yakin keluar dari {{ auth()->user()->nama }} ?')) {
                document.getElementById('logout-form').submit();
            }
        }
    </script>

</body>

</html>