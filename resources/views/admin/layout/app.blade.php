<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TPQ Baiti Jannati</title>

    <link href="{{ asset('assets/img/Logo.png') }}" rel="icon">
    <link href="{{ asset('assets/img/Logo.png') }}" rel="apple-touch-icon">

    <!-- Custom fonts for this template -->
    <link href="{{asset('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('template/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <style>
        .bg-gradient-primary {
            background: linear-gradient(90deg, #7cc576, #7cc576);
        }

        #sidebarToggle,
        #sidebarToggleTop {
            color: #7cc576 !important;
        }

        .btn-sm {
            background: #7cc576 !important;
            color: #ffffff !important;
        }

        .nav-link.active i {
            color: #ffffff !important;
        }

        .table td,
        .table th {
            vertical-align: middle !important;
        }

        .table .btn {
            margin: 0 !important;
        }

        .table .btn-info,
        .table .btn-danger {
            padding: 4px 10px !important;
            font-size: 12px !important;
        }

        .table th,
        .table td {
            white-space: nowrap;
        }

        .table .col-nama {
            width: 150px;
        }

        .table .col-nik {
            width: 120px;
        }

        .table .col-gender {
            width: 100px;
        }

        .table .col-tempat-lahir {
            width: 150px;
        }

        .table .col-tanggal-lahir {
            width: 150px;
        }

        .table .col-usia {
            width: 80px;
        }

        .table .col-pendidikan {
            width: 120px;
        }

        .table .col-alamat {
            width: 200px;
        }

        .table .col-foto {
            width: 120px;
        }

        .table .col-tanggal-masuk {
            width: 120px;
        }

        .table .col-ayah {
            width: 150px;
        }

        .table .col-ibu {
            width: 150px;
        }

        .table .col-wali {
            width: 150px;
        }

        .table .col-no-hp {
            width: 120px;
        }

        .table .col-action {
            width: 150px;
        }

        .table .img-thumbnail-large {
            width: 200px !important;
            /* Atur lebar gambar sesuai kebutuhan */
            height: auto !important;
            /* Menjaga rasio aspek gambar */
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }} {{ request()->is('admin') ? 'active' : '' }}"
                    href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                akun
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            @if (auth()->user()->role == "admin")
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('user*') ? 'active' : '' }}" href="/user">
                        <i class="fas fa-fw fa-users"></i>
                        <span>User</span>
                    </a>
                </li>
            @endif

            @if (auth()->user()->role == "admin")
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('pengajar*') ? 'active' : '' }}" href="/pengajar">
                        <i class="fas fa-fw fa-chalkboard-teacher"></i>
                        <span>Pengajar</span>
                    </a>
                </li>
            @endif

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('santri*') ? 'active' : '' }}" href="/santri">
                    <i class="fas fa-fw fa-user-graduate"></i>
                    <span>Santri</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>

            <!-- Nav Item - Charts -->
            @if (auth()->user()->role == "admin")
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('unverified') ? 'active' : '' }}" href="/unverified">
                        <i class="fas fa-fw fa-check-circle"></i>
                        <span>verifikasi Pendaftaran</span></a>
                </li>
            @endif

            @if (auth()->user()->role == "admin")
            <li class="nav-item">
                    <a class="nav-link collapsed {{ request()->is('kegiatan*') ? 'active' : '' }} {{ request()->is('daftar*') ? 'active' : '' }}" href="#"
                        data-toggle="collapse" data-target="#collapsePagesss" aria-expanded="true"
                        aria-controls="collapsePages">
                        <i class="fas fa-fw fa-list"></i>
                        <span>Kegiatan</span>
                    </a>
                    <div id="collapsePagesss" class="collapse" aria-labelledby="headingPagesss" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Kegiatan screen:</h6>
                            <a class="collapse-item" href="/kegiatan">kegiatan</a>
                            <a class="collapse-item" href="/daftar/kegiatan">peserta kegiatan</a>
                        </div>
                    </div>
                </li>    
            @endif

            <!-- Nav Item - Pages Collapse Menu -->
            @if (auth()->user()->role == "admin")
                <li class="nav-item">
                    <a class="nav-link collapsed {{ request()->is('profile*') ? 'active' : '' }}" href="#"
                        data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                        aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Profil TPQ</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">TPQ profile screen:</h6>
                            <a class="collapse-item" href="/profile/about">about</a>
                            <a class="collapse-item" href="/profile/galeri">galeri</a>
                            <a class="collapse-item" href="/profile/prestasi">prestasi</a>
                        </div>
                    </div>
                </li>
            @endif

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('absensi*') ? 'active' : '' }}" href="/absensi">
                    <i class="fas fa-fw fa-calendar-check"></i>
                    <span>Kehadiran</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('hafalan*') ? 'active' : '' }}" href="/hafalan">
                    <i class="fas fa-fw fa-brain"></i>
                    <span>Hafalan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed {{ request()->is('surahs') ? 'active' : '' }} {{ request()->is('doas') ? 'active' : '' }}"
                    href="#" data-toggle="collapse" data-target="#collapsePagess" aria-expanded="true"
                    aria-controls="collapsePagess">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Hafalan</span>
                </a>
                <div id="collapsePagess" class="collapse" aria-labelledby="headingPagess"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Hafalan Santri</h6>
                        <a class="collapse-item" href="/surahs">Data Surah</a>
                        <a class="collapse-item" href="/doas">Data Doa</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('penilaian*') ? 'active' : '' }}" href="/penilaian">
                    <i class="fas fa-fw fa-trophy"></i>
                    <span>Nilai</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                saya
            </div>

            @if (auth()->user()->role == "admin")
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('akun*') ? 'active' : '' }}" href="/akun">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Profil</span>
                    </a>
                </li>
            @endif

            @if (auth()->user()->role == "guru")
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('profile*') ? 'active' : '' }}" href="/profileguru">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Profil</span>
                    </a>
                </li>
            @endif

            <li class="nav-item">
                <a class="nav-link  {{ request()->is('#') ? 'active' : '' }}" href="#" data-toggle="modal"
                    data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-fw"></i>
                    <span>Logout</span>
                </a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        @if (auth()->user()->role == "admin")
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span
                                        class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->nama }}</span>
                                    <img class="img-profile rounded-circle" src="{{ asset('template/img/admin.png') }}">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item {{ request()->is('profile*') ? 'active' : '' }}"
                                        href="/profile">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        @endif

                        @if (auth()->user()->role == "guru")
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span
                                        class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->nama }}</span>
                                    <img class="img-profile rounded-circle"
                                        src="{{ asset('fotoguru/' . $guru->foto_guru) }}" alt="Foto Guru"
                                        style="object-fit: cover;">
                                </a>

                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="/profileguru">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        @endif

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Fitri Ambarwati 3202116103</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Kamu akan Log Out dari akun {{ auth()->user()->nama }} TPQ Baiti Jannati.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('template/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('template/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('template/js/demo/datatables-demo.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

<script>
    $('.deleteguru').click(function () {
        var userdelete = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');

        Swal.fire({
            title: "Are you sure?",
            text: "Kamu akan menghapus data " + nama + "",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/deleteguru/" + userdelete + ""
                Swal.fire({
                    title: "Deleted!",
                    text: "Data berhasil dihapus.",
                    icon: "success"
                });
            }
        });
    });
</script>

<script>
    $('.deletesantri').click(function () {
        var userdelete = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');

        Swal.fire({
            title: "Are you sure?",
            text: "Kamu akan menghapus data " + nama + "",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/deletesantri/" + userdelete + ""
                Swal.fire({
                    title: "Deleted!",
                    text: "Data berhasil dihapus.",
                    icon: "success"
                });
            }
        });
    });
</script>

<script>
    $('.deleteuser').click(function () {
        var userdelete = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');

        Swal.fire({
            title: "Are you sure?",
            text: "Kamu akan menghapus data " + nama + "",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/deleteuser/" + userdelete + ""
                Swal.fire({
                    title: "Deleted!",
                    text: "Data berhasil dihapus.",
                    icon: "success"
                });
            }
        });
    });
</script>

<script>
    function togglePassword(fieldId) {
        var field = document.getElementById(fieldId);
        if (field.type === "password") {
            field.type = "text";
        } else {
            field.type = "password";
        }
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var successToast = document.getElementById('success-toast');
        if (successToast) {
            var toast = new bootstrap.Toast(successToast, {
                delay: 3000
            });
            toast.show();
        }
    });
</script>

</html>