<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel - Web Berita</title>

    <!-- Font Awesome -->
    <link href="{{ asset('sbadmin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles SB Admin 2 -->
    <link href="{{ asset('sbadmin2/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom Elegant Theme Styles -->
    <style>
        body { color: #ccc; }
        #content-wrapper { background-color: #1a1a1a !important; }
        .sidebar-dark .nav-item .nav-link:hover { color: #d4af37 !important; }
        .sidebar-dark .nav-item.active .nav-link { color: #d4af37 !important; }
        .sidebar-dark .nav-item.active .nav-link i { color: #d4af37 !important; }
        .sidebar-dark .sidebar-brand { color: #d4af37 !important; }
        .sidebar-dark .sidebar-heading { color: rgba(212, 175, 55, 0.6) !important; }
        .sidebar-dark hr.sidebar-divider { border-top: 1px solid #2a2a2a !important; }
        .btn-primary { background-color: #d4af37 !important; border-color: #d4af37 !important; color: #1a1a1a !important; font-weight: bold; }
        .btn-primary:hover { background-color: #bfa133 !important; border-color: #bfa133 !important; }
        .dropdown-menu { background-color: #222; border: 1px solid #333; }
        .dropdown-item { color: #ccc; }
        .dropdown-item:hover { background-color: #333; color: #d4af37; }
        .dropdown-divider { border-top: 1px solid #333; }
        .modal-content { background-color: #1a1a1a; color: #ccc; border: 1px solid #333; }
        .modal-header, .modal-footer { border-color: #333; }
        .close { color: #d4af37; text-shadow: none; }
        .close:hover { color: #bfa133; }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- ========== SIDEBAR ========== -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #151515; border-right: 1px solid #2a2a2a;">

            <!-- Sidebar Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/admin/dashboard') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-crown"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Web Berita</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item: Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/admin/dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Kelola Konten
            </div>

            <!-- Nav Item: Berita -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBerita"
                    aria-expanded="true" aria-controls="collapseBerita">
                    <i class="fas fa-fw fa-newspaper"></i>
                    <span>Berita</span>
                </a>
                <div id="collapseBerita" class="collapse" aria-labelledby="headingBerita"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded" style="background-color: #222 !important; border: 1px solid #333;">
                        <h6 class="collapse-header" style="color: #d4af37;">Menu Berita:</h6>
                        <a class="collapse-item" href="{{ route('admin.berita.index') }}" style="color: #ccc;">Semua Berita</a>
                        <a class="collapse-item" href="{{ route('admin.berita.create') }}" style="color: #ccc;">Tambah Berita</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item: Kategori -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.kategori.index') }}">
                    <i class="fas fa-fw fa-tags"></i>
                    <span>Kategori</span>
                </a>
            </li>

            <!-- Nav Item: Komentar -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.komentar.index') }}">
                    <i class="fas fa-fw fa-comments"></i>
                    <span>Komentar</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Sistem & Laporan
            </div>

            <!-- Nav Item: Laporan -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.statistik.index') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Statistik & Laporan</span>
                </a>
            </li>

            <!-- Nav Item: Pengguna -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.pengguna.index') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Kelola Pengguna</span>
                </a>
            </li>

            <!-- Nav Item: Pengaturan -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.pengaturan.index') }}">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pengaturan</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle" style="background-color: #2a2a2a; color: #d4af37;"></button>
            </div>

        </ul>
        <!-- ========== END SIDEBAR ========== -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <!-- ========== TOPBAR ========== -->
                <nav class="navbar navbar-expand navbar-dark topbar mb-4 static-top shadow" style="background-color: #151515; border-bottom: 1px solid #2a2a2a;">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item: User Info -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline small" style="color: #d4af37; font-weight: 600;">
                                    {{ Auth::user()->name }}
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('sbadmin2/img/undraw_profile.svg') }}">
                            </a>

                            <!-- Dropdown: User -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>
                </nav>
                <!-- ========== END TOPBAR ========== -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer" style="background-color: #151515; border-top: 1px solid #2a2a2a;">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto" style="color: rgba(212, 175, 55, 0.7);">
                        <span>Copyright &copy; Web Berita {{ date('Y') }}</span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" jika kamu yakin ingin mengakhiri sesi.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('sbadmin2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('sbadmin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('sbadmin2/js/sb-admin-2.min.js') }}"></script>

</body>

</html>