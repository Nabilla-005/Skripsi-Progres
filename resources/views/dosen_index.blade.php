@extends('layouts.mylayoutdosen', ['title' => 'Halaman Dosen'])

@section('content')

<!-- Fonts -->
<link href="https://fonts.googleapis.com" rel="preconnect">
<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="assets/vendor/aos/aos.css" rel="stylesheet">
<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

<!-- Main CSS File -->
<link href="assets/css/main.css" rel="stylesheet">

<main class="main">

  <!-- Hero Section -->
  <section id="hero" class="hero section dark-background">
    <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in" class="">

    <div class="container" data-aos="fade-up" data-aos-delay="100">
      @foreach($dosen as $dosens)
        <h2>{{ $dosens->nama }}</h2>
        <p>Selamat <span class="typed" data-typed-items="Datang">Datang</span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span></p>
      @endforeach
    </div>
  </section><!-- /Hero Section -->

  <!-- About Section -->
  <section id="about" class="about section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Data Dosen</h2>
      <p></p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-4 justify-content-center">
        <div class="col-lg-4">
          <img src="assets/img/my-profile-img.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-8 content">
          @foreach($dosen as $dosens)
            <h2>{{ $dosens->nama }}</h2>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>NIP:</strong> <span>{{ $dosens->nip }}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>{{ $dosens->email }}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Fakultas:</strong> <span>{{ $dosens->fakultas }}</span></li>
                </ul>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>

  </section><!-- /About Section -->

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

</main>

@endsection
