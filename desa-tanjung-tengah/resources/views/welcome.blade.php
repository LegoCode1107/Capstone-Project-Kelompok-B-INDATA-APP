<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Tanjung Tengah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #38bdf8;
            --secondary: #0ea5e9;
            --light: #f8fafc;
            --dark: #0f172a;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            overflow-x: hidden;
        }

        .navbar {
            background: rgba(255,255,255,.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,.08);
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--secondary) !important;
        }

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background:
                linear-gradient(rgba(255,255,255,.8), rgba(255,255,255,.9)),
                url('{{ asset("images/desa.jpg") }}');
            background-size: cover;
            background-position: center;
        }

        .hero-title {
            font-size: 4rem;
            font-weight: 800;
            color: var(--dark);
        }

        .hero-subtitle {
            color: #64748b;
            font-size: 1.2rem;
        }

        .floating-logo {
            animation: float 4s ease-in-out infinite;
        }

        @keyframes float {
            0% { transform: translateY(0px);}
            50% { transform: translateY(-20px);}
            100% { transform: translateY(0px);}
        }

        .section-title {
            font-weight: 700;
            margin-bottom: 50px;
            color: var(--dark);
        }

        .stats-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,.08);
            transition: .3s;
        }

        .stats-card:hover {
            transform: translateY(-10px);
        }

        .stats-card h2 {
            font-size: 40px;
            font-weight: 800;
            color: var(--secondary);
        }

        .feature-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,.08);
            transition: .3s;
        }

        .feature-card:hover {
            transform: translateY(-10px);
        }

        .icon-box {
            width: 80px;
            height: 80px;
            background: #e0f2fe;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
        }

        .icon-box i {
            font-size: 35px;
            color: var(--secondary);
        }

        .news-card img {
            height: 250px;
            object-fit: cover;
        }

        .gallery img {
            height: 250px;
            object-fit: cover;
            border-radius: 15px;
            transition: .3s;
        }

        .gallery img:hover {
            transform: scale(1.05);
        }

        footer {
            background: #0f172a;
            color: white;
        }

        footer a {
            color: white;
            text-decoration: none;
        }

        .btn-main {
            background: linear-gradient(135deg,#38bdf8,#0ea5e9);
            border: none;
            color: white;
        }

        .btn-main:hover {
            color: white;
        }

        @media(max-width:768px){

            .hero-title{
                font-size:2.5rem;
            }

            .hero{
                text-align:center;
            }

            .floating-logo{
                margin-top:30px;
                max-width:200px;
            }

        }
    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">

        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/PPU.png') }}" width="40">
            Desa Tanjung Tengah
        </a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a href="#profil" class="nav-link">Profil</a>
                </li>

                <li class="nav-item">
                    <a href="#potensi" class="nav-link">Potensi</a>
                </li>

                <li class="nav-item">
                    <a href="#berita" class="nav-link">Berita</a>
                </li>

                <li class="nav-item">
                    <a href="#kontak" class="nav-link">Kontak</a>
                </li>

                <li class="nav-item ms-lg-3">

                    <a href="{{ route('login') }}"
                       class="btn btn-main rounded-pill px-4">

                        Login

                    </a>

                </li>

            </ul>

        </div>

    </div>
</nav>

<section class="hero">

<div class="container">

<div class="row align-items-center">

<div class="col-lg-6">

<span class="badge bg-info text-dark mb-3 p-2">
Sistem Informasi Desa Digital
</span>

<h1 class="hero-title">
Desa Tanjung Tengah
</h1>

<p class="hero-subtitle">
Melayani masyarakat dengan cepat,
transparan dan berbasis teknologi.
</p>

<a href="#profil" class="btn btn-main btn-lg mt-3">
Jelajahi Desa
</a>

</div>

<div class="col-lg-6 text-center">

<img src="{{ asset('images/PPU.png') }}"
     class="img-fluid floating-logo"
     width="300">

</div>

</div>

</div>

</section>

<section class="py-5 bg-light">

<div class="container">

<h2 class="text-center section-title">
Statistik Desa
</h2>

<div class="row g-4">

<div class="col-md-3">
<div class="stats-card">
<h2>2.706</h2>
<p>Penduduk</p>
</div>
</div>

<div class="col-md-3">
<div class="stats-card">
<h2>785</h2>
<p>KK</p>
</div>
</div>

<div class="col-md-3">
<div class="stats-card">
<h2>3</h2>
<p>Dusun</p>
</div>
</div>

<div class="col-md-3">
<div class="stats-card">
<h2>125</h2>
<p>UMKM</p>
</div>
</div>

</div>

</div>

</section>

<section id="profil" class="py-5">

<div class="container">

<h2 class="section-title text-center">
Profil Desa
</h2>

<div class="row align-items-center">

<div class="col-lg-6">

<img src="{{ asset('images/desa.jpg') }}"
     class="img-fluid rounded-4 shadow">

</div>

<div class="col-lg-6">

<h3>Visi Desa</h3>

<p>
Terwujudnya Desa Tanjung Tengah yang maju,
mandiri, sejahtera dan berbasis teknologi.
</p>

<h3>Misi Desa</h3>

<ul>
<li>Meningkatkan pelayanan publik.</li>
<li>Meningkatkan kesejahteraan masyarakat.</li>
<li>Mendorong UMKM dan ekonomi desa.</li>
<li>Penguatan tata kelola pemerintahan desa.</li>
</ul>

</div>

</div>

</div>

</section>

<section id="potensi" class="py-5 bg-light">

<div class="container">

<h2 class="section-title text-center">
Potensi Desa
</h2>

<div class="row g-4">

<div class="col-md-4">
<div class="card feature-card">
<div class="card-body text-center p-5">
<div class="icon-box">
<i class="fas fa-seedling"></i>
</div>
<h4 class="mt-3">Pertanian</h4>
</div>
</div>
</div>

<div class="col-md-4">
<div class="card feature-card">
<div class="card-body text-center p-5">
<div class="icon-box">
<i class="fas fa-fish"></i>
</div>
<h4 class="mt-3">Perikanan</h4>
</div>
</div>
</div>

<div class="col-md-4">
<div class="card feature-card">
<div class="card-body text-center p-5">
<div class="icon-box">
<i class="fas fa-store"></i>
</div>
<h4 class="mt-3">UMKM</h4>
</div>
</div>
</div>

</div>

</div>

</section>

<section id="berita" class="py-5">

<div class="container">

<h2 class="section-title text-center">
Berita Desa
</h2>

<div class="row g-4">

@for($i=1;$i<=3;$i++)

<div class="col-md-4">

<div class="card news-card feature-card">

<img src="https://picsum.photos/600/400?random={{ $i }}"
     class="card-img-top">

<div class="card-body">

<h5>Kegiatan Desa Tanjung Tengah</h5>

<p>
Informasi kegiatan terbaru desa.
</p>

</div>

</div>

</div>

@endfor

</div>

</div>

</section>

<section class="py-5 bg-light">

<div class="container">

<h2 class="section-title text-center">
Galeri Desa
</h2>

<div class="row g-4 gallery">

@for($i=10;$i<=15;$i++)

<div class="col-md-4">

<img src="https://picsum.photos/600/400?random={{ $i }}"
     class="img-fluid">

</div>

@endfor

</div>

</div>

</section>

<section id="kontak" class="py-5">

<div class="container">

<h2 class="section-title text-center">
Lokasi Desa
</h2>

<div class="ratio ratio-16x9">

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31909.159530691595!2d116.64420585405985!3d-1.389603410223051!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df116572d0bea67%3A0x3a1a01e2e6f01629!2sCentral%20Tanjung%2C%20Penajam%2C%20Penajam%20North%20Paser%20Regency%2C%20East%20Kalimantan!5e0!3m2!1sen!2sid!4v1780634565914!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

</div>

</div>

</section>

<footer class="py-5">

<div class="container text-center">

<img src="{{ asset('images/PPU.png') }}"
     width="80"
     class="mb-3">

<h4>Desa Tanjung Tengah</h4>

<p>
Melayani dengan Cepat, Transparan dan Digital
</p>

<hr>

<p>
© {{ date('Y') }} Pemerintah Desa Tanjung Tengah Kelurahan Tanjung Tengah, Kecamatan Penajam, Kabupaten Penajam Paser Utara, Provinsi Kalimantan Timur, Kode Pos 76143
</p>

</div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
