<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset(env('APP_LOGO')) }}" type="image/x-icon">

    <!-- Script Mix -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-light">
    <!-- header -->
    <header class="py-md-2 py-1 bg-white">
        <div class="container d-flex gap-md-3 gap-2 align-items-center">
            <img src="{{ asset(env('APP_LOGO')) }}" class="" width="70">
            <h1 class="m-0 fw-bold text-primary">
                {{ env('APP_NAME') }}
            </h1>
        </div>
    </header>

    {{-- Navigasi --}}
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm pt-3">
        <div class="container">
            <button class="navbar-toggler w-100" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item me-md-3 me-sm-3 me-0 mt-md-0 mt-sm-1 mt-2">
                        <a class="nav-link bg-primary text-white rounded px-2" href="">
                            <i class="fa-solid fa-house"></i>
                            <span class="ms-1">Beranda</span>
                        </a>
                    </li>
                    <li class="nav-item me-md-3 me-sm-3 me-0 mt-md-0 mt-sm-1 mt-2">
                        <a class="nav-link" href="">
                            <i class="fa-solid fa-building"></i>
                            <span class="ms-1">Sekilas Pusat</span>
                        </a>
                    </li>
                    <li class="nav-item me-md-3 me-sm-3 me-0 mt-md-0 mt-sm-1 mt-2">
                        <a class="nav-link" href="">
                            <i class="fa-solid fa-rocket"></i>
                            <span class="ms-1">Visi Misi</span>
                        </a>
                    </li>
                    <li class="nav-item me-md-3 me-sm-3 me-0 mt-md-0 mt-sm-1 mt-2">
                        <a class="nav-link" href="">
                            <i class="fa-solid fa-unlock-keyhole"></i>
                            <span class="ms-1">Login</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5 py-3">
        <div class="row">
            <div class="col-md-6 col-12 align-self-center">
                <h1 class="display-4 fw-bold">Selamat Datang</h1>
                <p class="text-muted">
                    Sistem Informasi {{ env('APP_ENV') }} untuk Tracking atau Ekspedisi Berkas Tanah Dengan Bantuan
                    Grafik dan Kustomisasi Data</p>
                <a class="btn btn-primary btn-lg mt-3 px-4" href="{{ url('/login') }}" role="button">
                    Masuk Sekarang
                </a>
            </div>
            <div class="col-md-6 col-12">
                <img src="{{ asset('img/welcome.svg') }}" class="img-fluid">
            </div>
        </div>
    </main>

    <footer class="pb-4">
        <p class="text-center text-black-50">
            Powered by <strong class="text-primary">{{ env('APP_COPYRIGHT') }}</strong> &copy;
            {{ date('Y') }}
        </p>
    </footer>

</body>

</html>
