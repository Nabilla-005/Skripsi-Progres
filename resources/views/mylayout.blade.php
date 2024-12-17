<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>@yield('title', 'Dashboard')</title>
  <!-- Link Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      overflow: hidden; /* Mencegah scroll di halaman */
      margin: 0;
    }
    .sidebar {
      height: 100vh;
      background-color: #343a40;
      color: white;
      width: 300px;
      transition: transform 0.3s ease; /* Animasi untuk menyembunyikan sidebar */
    }
    .sidebar.hide {
      transform: translateX(-100%);
    }
    .sidebar a {
      color: #fff;
      text-decoration: none;
      padding: 10px 15px;
      display: block;
    }
    .sidebar a:hover, .sidebar a.active {
      background-color: #007bff;
    }
    .content-section {
      display: none;
    }
    .content-section.active {
      display: block;
    }
    .navbar-custom {
      background-color: #ffffff;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    }
    .notification-badge {
      position: absolute;
      top: 2px;
      right: 2px;
      font-size: 10px;
      background-color: red;
      color: white;
      border-radius: 50%;
      padding: 2px 6px;
    }
    .menu-toggle {
      cursor: pointer;
      font-size: 1.5rem;
      color: #343a40;
    }
    .d-flex {
      display: flex;
    }
    .flex-grow-1 {
      flex-grow: 1;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
      <!-- Toggle Sidebar Button -->
      <span class="menu-toggle me-3" id="menuToggle">
        <i class="bi bi-list"></i>
      </span>
      <!-- Logo -->
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="https://via.placeholder.com/40" alt="Logo" class="me-2">
        <span class="fw-bold text-dark">MENU UTAMA</span>
      </a>
      <!-- User Profile & Notification -->
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav align-items-center">
          <!-- Notifikasi Dropdown -->
          <li class="nav-item dropdown me-3 position-relative">
            <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-bell fs-4 text-dark"></i>
              <span class="notification-badge">3</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown">
              <li><a class="dropdown-item" href="#">Notifikasi 1</a></li>
              <li><a class="dropdown-item" href="#">Notifikasi 2</a></li>
              <li><a class="dropdown-item" href="#">Notifikasi 3</a></li>
            </ul>
          </li>
          <!-- Profil Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fw-bold text-dark" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Hello, <span class="text-primary">Admin</span>
              <i class="bi bi-person-circle fs-4 ms-1"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
              <li><a class="dropdown-item" href="#">Profil Saya</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="#">Keluar</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Container -->
  <div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar p-3" id="sidebar">
      <div class="text-center mb-4">
        <img src="https://via.placeholder.com/50" alt="Logo" class="img-fluid mb-2">
        <h5>MENU UTAMA</h5>
      </div>
      <nav>
        <a href="#" class="menu-item active" data-section="beranda">
          <i class="bi bi-house-door"></i> Beranda
        </a>
        <h6 class="mt-4">UTILITY</h6>
        <a href="#" class="menu-item" data-section="manajemen-akun-mahasiswa">
          <i class="bi bi-person-check"></i> Manajemen Akun Mahasiswa
        </a>
        <a href="#" class="menu-item" data-section="manajemen-akun-dosen">
          <i class="bi bi-person-circle"></i> Manajemen Akun Dosen
        </a>
        <a href="#" class="menu-item" data-section="manajemen-jadwal-dosen">
          <i class="bi bi-calendar-event"></i> Manajemen Jadwal Dosen
        </a>
        <a href="#" class="menu-item" data-section="manajemen-skripsi-mahasiswa">
          <i class="bi bi-bookmark-star"></i> Manajemen Skripsi Mahasiswa
        </a>
        <a href="#" class="menu-item" data-section="manajemen-forum-diskusi">
          <i class="bi bi-chat-square-dots"></i> Manajemen Forum Diskusi
        </a>
        <a href="#" class="menu-item" data-section="feedback-penilaian">
          <i class="bi bi-pencil-square"></i> Feedback & Penilaian
        </a>
        <a href="#" class="menu-item" data-section="statistik-laporan">
          <i class="bi bi-graph-up"></i> Statistik & Laporan
        </a>
        <a href="#" class="menu-item" data-section="pengaturan-sistem">
          <i class="bi bi-gear-wide"></i> Pengaturan Sistem
        </a>
      </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1 p-4">
      <div id="beranda" class="content-section active">
        <h3>Beranda</h3>
        <p>Selamat datang di halaman beranda. Ini adalah tampilan utama dashboard.</p>
      </div>
      <div id="manajemen-akun-mahasiswa" class="content-section">
        <h3>Manajemen Akun Mahasiswa</h3>
        <p>Halaman ini berisi pengaturan akun mahasiswa.</p>
      </div>
      <div id="manajemen-akun-dosen" class="content-section">
        <h3>Manajemen Akun Dosen</h3>
        <p>Kelola akun dosen di halaman ini.</p>
      </div>
      <div id="manajemen-jadwal-dosen" class="content-section">
        <h3>Manajemen Jadwal Dosen</h3>
        <p>Halaman untuk manajemen jadwal dosen.</p>
      </div>
      <div id="manajemen-skripsi-mahasiswa" class="content-section">
        <h3>Manajemen Skripsi Mahasiswa</h3>
        <p>Halaman untuk mengelola skripsi mahasiswa.</p>
      </div>
      <div id="manajemen-forum-diskusi" class="content-section">
        <h3>Manajemen Forum Diskusi</h3>
        <p>Halaman untuk mengelola forum diskusi.</p>
      </div>
      <div id="feedback-penilaian" class="content-section">
        <h3>Feedback & Penilaian</h3>
        <p>Halaman untuk feedback dan penilaian.</p>
      </div>
      <div id="statistik-laporan" class="content-section">
        <h3>Statistik & Laporan</h3>
        <p>Halaman untuk statistik dan laporan.</p>
      </div>
      <div id="pengaturan-sistem" class="content-section">
        <h3>Pengaturan Sistem</h3>
        <p>Halaman untuk pengaturan sistem.</p>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

  <!-- JavaScript untuk Sidebar dan Menu -->
  <script>
    // Toggle Sidebar
    document.getElementById("menuToggle").addEventListener("click", function() {
      document.getElementById("sidebar").classList.toggle("hide");
    });

    // Interaktif Menu
    document.addEventListener("DOMContentLoaded", function() {
      const menuItems = document.querySelectorAll(".menu-item");
      const sections = document.querySelectorAll(".content-section");

      menuItems.forEach(item => {
        item.addEventListener("click", function(e) {
          e.preventDefault();
          menuItems.forEach(link => link.classList.remove("active"));
          sections.forEach(section => section.classList.remove("active"));

          const sectionId = this.getAttribute("data-section");
          document.getElementById(sectionId).classList.add("active");
          this.classList.add("active");
        });
      });
    });
  </script>
</body>
</html>
