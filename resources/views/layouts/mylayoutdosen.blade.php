<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="description">
  <meta content="" name="keywords">
  <title>{{ $title ?? '' }} {{env('APP_NAME')}}</title>

  <!-- Favicons -->
  <link href="#" rel="icon">
  <link href="#" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('assets/css/stylee.css') }}">

  <!-- Main CSS File -->
  <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header dark-background d-flex flex-column">
    <i class="header-toggle d-xl-none bi bi-list"></i>

    <div class="profile-img">
      <img src="{{asset('assets/img/my-profile-img.jpg')}}" alt="" class="img-fluid rounded-circle">
    </div>

    <a href="/dosen" class="logo d-flex align-items-center justify-content-center">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <!-- <img src="assets/img/logo.png" alt=""> -->
      @auth
      <h1 class="sitename" >{{ Auth::user()->name }}</h1>
      @endauth
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="/dosen" class="active"><i class="bi bi-house navicon"></i>Home</a></li>
        <li><a href="/dosen#about"><i class="bi bi-person navicon"></i> Profile</a></li>
        <li><a href="#resume"><i class="bi bi-file-earmark-text navicon"></i> Mahasiswa Bimbingan</a></li>
        <li class="dropdown"><a href="#"><i class="bi bi-menu-button navicon"></i> <span>Pengajuan</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="/JadwalKosongDosen">Atur Jadwal Kosong</a></li>
            <li class="dropdown"><a href="#"><span>Lihat Pengajuan</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                <li><a href="/PengajuanBimbingan">Pengajuan Bimbingan</a></li>
                <li><a href="/pengajuan">Pengajuan Judul</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="/ProgresSkripsi"><i class="bi bi-file-earmark-text navicon"></i> Progres Skripsi</a></li>
        <ul class="navbar-nav ms-auto">
        @auth
        <li class="dropdown"><a href="/dosen"><span>{{ Auth::user()->name }}</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                </form>
              </ul>
            </li>
            @endauth
          </ul>
        </li>
    </nav>

  </header>
  <main class="container">
            @if(session()->has('pesan'))
                <div class="alert alert-info" role="alert">
                    {{ session('pesan') }}
                </div>
            @endif
            @include('flash::message')
            @yield('content')
        </main>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/typed.js/typed.umd.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>