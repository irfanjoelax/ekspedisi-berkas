<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') }}</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset(env('APP_LOGO')) }}" type="image/x-icon">

    <!-- Script Mix -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" />
    @yield('style')
</head>

<body class="sb-nav-fixed bg-light">
    <nav class="sb-topnav navbar navbar-expand navbar-white bg-white">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3 text-primary fw-bold" href="#">{{ env('APP_NAME') }}</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

        </div>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                    <span class="ml-2">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ url('admin/profile', []) }}">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            Keluar
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion bg-white" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Home</div>
                        <a class="nav-link {{ $activeMenu == 'dashboard' ? 'bg-primary text-white' : '' }}"
                            href="{{ url('/admin/dashboard') }}">
                            <i class="fa-solid fa-gauge"></i>
                            <span class="ms-2">Dashboard</span>
                        </a>
                        <div class="sb-sidenav-menu-heading">Fitur Utama</div>
                        <a class="nav-link {{ $activeMenu == 'permohonan' ? 'bg-primary text-white' : '' }}"
                            href="{{ url('/admin/permohonan') }}">
                            <i class="fa-solid fa-rectangle-list"></i>
                            <span class="ms-2">Daftar Permohonan</span>
                        </a>
                        <div class="sb-sidenav-menu-heading">Master Data</div>
                        <a class="nav-link {{ $activeMenu == 'desa' ? 'bg-primary text-white' : '' }}"
                            href="{{ url('/admin/desa') }}">
                            <i class="fa-solid fa-dungeon"></i>
                            <span class="ms-2">Desa/Kec</span>
                        </a>
                        <a class="nav-link {{ $activeMenu == 'prosedur' ? 'bg-primary text-white' : '' }}"
                            href="{{ url('/admin/prosedur') }}">
                            <i class="fa-solid fa-diagram-project"></i>
                            <span class="ms-2">Prosedur</span>
                        </a>
                        <a class="nav-link {{ $activeMenu == 'jenis_hak' ? 'bg-primary text-white' : '' }}"
                            href="{{ url('/admin/jenis_hak') }}">
                            <i class="fa-solid fa-ribbon"></i>
                            <span class="ms-2">Jenis Hak</span>
                        </a>
                        <a class="nav-link {{ $activeMenu == 'keterangan' ? 'bg-primary text-white' : '' }}"
                            href="{{ url('/admin/keterangan') }}">
                            <i class="fa-solid fa-check-to-slot"></i>
                            <span class="ms-2">Keterangan</span>
                        </a>
                        <a class="nav-link {{ $activeMenu == 'user' ? 'bg-primary text-white' : '' }}"
                            href="{{ url('/admin/user') }}">
                            <i class="fa-solid fa-users"></i>
                            <span class="ms-2">Daftar User</span>
                        </a>
                    </div>
                </div>
                {{-- <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Admin
                </div> --}}
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    @yield('content')
                </div>
            </main>

            <footer class="py-4 bg-white mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-center small">
                        <div class="text-muted">
                            Powered by <strong class="text-primary">{{ env('APP_COPYRIGHT') }}</strong> &copy;
                            {{ date('Y') }}
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-semibold" id="logoutModalLabel">Konfirmasi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Keluar Dari Aplikasi Ini ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak,
                        Batalkan!</button>
                    <a class="btn btn-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Yes, Keluar!
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    @yield('script')
    @include('sweetalert::alert')
</body>

</html>
