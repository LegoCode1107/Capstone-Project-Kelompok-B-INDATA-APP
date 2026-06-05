@extends('layouts.app')

@section('content')

<style>

:root{
    --primary:#38BDF8;
    --secondary:#0EA5E9;
    --dark:#0F172A;
    --light:#F8FAFC;
}

body{
    margin:0;
    background:url('{{ asset("images/bg-desa.jpg") }}') center center;
    background-size:cover;
    background-attachment:fixed;
}

.overlay{
    position:fixed;
    top:0;
    left:0;
    right:0;
    bottom:0;

    background:
    linear-gradient(
        135deg,
        rgba(240,249,255,.95),
        rgba(224,242,254,.90)
    );

    z-index:1;
}

.login-wrapper{
    position:relative;
    z-index:2;
    min-height:100vh;
}

.logo-desa{
    animation:floating 4s ease-in-out infinite;
    filter:drop-shadow(0 15px 25px rgba(56,189,248,.35));
}

@keyframes floating{

    0%{
        transform:translateY(0);
    }

    50%{
        transform:translateY(-15px);
    }

    100%{
        transform:translateY(0);
    }

}

.info-section h1{
    color:#0F172A;
    font-weight:800;
}

.info-section h2{
    color:#0EA5E9;
    font-weight:700;
}

.info-section p{
    color:#475569;
}

.glass-card{

    background:rgba(255,255,255,.88);

    backdrop-filter:blur(20px);

    border:none;

    border-radius:30px;

    box-shadow:
    0 20px 50px rgba(14,165,233,.15);

}

.form-control{

    height:58px;

    border-radius:15px;

    border:2px solid #E2E8F0;

    padding-left:20px;

}

.form-control:focus{

    border-color:#38BDF8;

    box-shadow:
    0 0 0 .25rem rgba(56,189,248,.15);

}

.btn-login{

    height:58px;

    border:none;

    border-radius:15px;

    font-weight:600;

    color:white;

    background:
    linear-gradient(
        135deg,
        #38BDF8,
        #0EA5E9
    );

    transition:.3s;

}

.btn-login:hover{

    transform:translateY(-3px);

    box-shadow:
    0 15px 30px rgba(14,165,233,.35);

    color:white;

}

.stat-box{

    background:white;

    border-radius:20px;

    padding:25px;

    text-align:center;

    box-shadow:
    0 10px 30px rgba(0,0,0,.05);

    transition:.3s;

}

.stat-box:hover{

    transform:translateY(-5px);

}

.stat-box i{

    color:#0EA5E9;

}

.stat-box h3{

    color:#0F172A;

    font-weight:700;

}

.stat-box small{

    color:#64748B;

}

.login-title{

    color:#0F172A;

    font-weight:700;

}

.login-subtitle{

    color:#64748B;

}

.footer-text{

    color:#64748B;

}

@media(max-width:991px){

    .info-section{
        text-align:center;
        margin-bottom:40px;
    }

    .stat-row{
        display:none;
    }

}

</style>

<div class="overlay"></div>

<div class="container login-wrapper">

    <div class="row min-vh-100 align-items-center">

        <!-- KIRI -->
        <div class="col-lg-7 info-section">

            <img
                src="{{ asset('images/PPU.png') }}"
                class="logo-desa mb-4"
                width="140">

            <h1 class="display-4">
                Sistem Informasi Desa
            </h1>

            <h2 class="display-6 mb-4">
                Tanjung Tengah
            </h2>

            <p class="lead mb-5">
                Platform Digital Pelayanan Publik,
                Pengelolaan Data Kependudukan,
                Aset Desa dan Informasi Statistik Desa.
            </p>

            <div class="row stat-row">

                <div class="col-md-4">

                    <div class="stat-box">

                        <i class="fas fa-users fa-3x mb-3"></i>

                        <h3>2706+</h3>

                        <small>Penduduk</small>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="stat-box">

                        <i class="fas fa-home fa-3x mb-3"></i>

                        <h3>785+</h3>

                        <small>Kepala Keluarga</small>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="stat-box">

                        <i class="fas fa-file-alt fa-3x mb-3"></i>

                        <h3>24 Jam</h3>

                        <small>Layanan Digital</small>

                    </div>

                </div>

            </div>

        </div>

        <!-- KANAN -->
        <div class="col-lg-5">

            <div class="card glass-card">

                <div class="card-body p-5">

                    <div class="text-center mb-4">

                        <img
                            src="{{ asset('images/PPU.png') }}"
                            width="80"
                            class="logo-desa mb-3">

                        <h2 class="login-title">
                            Selamat Datang
                        </h2>

                        <p class="login-subtitle">
                            Login ke Sistem Informasi Desa
                        </p>

                    </div>

                    <form method="POST"
                          action="{{ route('login') }}">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Masukkan Email"
                                required
                                autofocus>

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Password
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Masukkan Password"
                                required>

                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-4 d-flex justify-content-between">

                            <div class="form-check">

                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    name="remember">

                                <label class="form-check-label">
                                    Ingat Saya
                                </label>

                            </div>

                            @if(Route::has('password.request'))

                            <a href="{{ route('password.request') }}"
                               class="text-decoration-none">

                                Lupa Password?

                            </a>

                            @endif

                        </div>

                        <button
                            type="submit"
                            class="btn btn-login w-100">

                            <i class="fas fa-sign-in-alt me-2"></i>

                            Login

                        </button>

                    </form>

                    <hr>

                    <div class="text-center footer-text">

                        © {{ date('Y') }}

                        <br>

                        Pemerintah Desa Tanjung Tengah

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
