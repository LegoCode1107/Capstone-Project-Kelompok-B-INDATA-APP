@section('content')

@extends('adminlte::page')

@section('title', 'Dashboard')

{{-- HERO --}}
<div class="row mb-4">
    <div class="col-12">
        <div class="hero-dashboard">
            <div>
                <h2>👋 Selamat Datang, {{ Auth::user()->name }}</h2>
                <p>
                    Dashboard Monitoring Data Desa Tanjung Tengah
                </p>
            </div>

            <div class="hero-info">
                <h3>{{ date('d M Y') }}</h3>
                <span>Total Data Desa</span>

                <div class="hero-total">
                    {{ number_format($grandTotalData) }}
                </div>
            </div>
        </div>
    </div>
</div>

{{-- STATISTIK --}}
<div class="row">

    <div class="col-lg-4 col-md-6 mb-4">
    <div class="dashboard-card card-infrastruktur">

        <div class="dashboard-icon icon-infrastruktur">
            <i class="fas fa-road"></i>
        </div>

        <h2>{{ number_format($totalInfrastruktur) }}</h2>

        <p>Data Infrastruktur</p>

    </div>
</div>

<div class="col-lg-4 col-md-6 mb-4">
    <div class="dashboard-card card-kependudukan">

        <div class="dashboard-icon icon-kependudukan">
            <i class="fas fa-users"></i>
        </div>

        <h2>{{ number_format($totalKependudukan) }}</h2>

        <p>Kependudukan & Sosial</p>

    </div>
</div>

<div class="col-lg-4 col-md-6 mb-4">
    <div class="dashboard-card card-ekonomi">

        <div class="dashboard-icon icon-ekonomi">
            <i class="fas fa-briefcase"></i>
        </div>

        <h2>{{ number_format($totalEkonomi) }}</h2>

        <p>Ekonomi & Pekerjaan</p>

    </div>
</div>

<div class="col-lg-6 col-md-6 mb-4">
    <div class="dashboard-card card-pangan">

        <div class="dashboard-icon icon-pangan">
            <i class="fas fa-seedling"></i>
        </div>

        <h2>{{ number_format($totalPangan) }}</h2>

        <p>Produksi Pangan</p>

    </div>
</div>

<div class="col-lg-6 col-md-6 mb-4">
    <div class="dashboard-card card-perikanan">

        <div class="dashboard-icon icon-perikanan">
            <i class="fas fa-fish"></i>
        </div>

        <h2>{{ number_format($totalPerikanan) }}</h2>

        <p>Perikanan & Aset</p>

    </div>
</div>

{{-- QUICK SUMMARY --}}
{{-- <div class="row">

    <div class="col-md-6">
        <div class="summary-card">
            <h4>
                📊 Ringkasan Data
            </h4>

            <ul>
                <li>Total Infrastruktur : {{ $totalInfrastruktur }}</li>
                <li>Total Kependudukan : {{ $totalKependudukan }}</li>
                <li>Total Ekonomi : {{ $totalEkonomi }}</li>
                <li>Total Pangan : {{ $totalPangan }}</li>
                <li>Total Perikanan : {{ $totalPerikanan }}</li>
            </ul>
        </div>
    </div>

    <div class="col-md-6">
        <div class="summary-card">
            <h4>
                🎯 Status Sistem
            </h4>

            <ul>
                <li>Database Terhubung</li>
                <li>Laravel Aktif</li>
                <li>Data Desa Terintegrasi</li>
                <li>Dashboard Monitoring Aktif</li>
                <li>Siap Integrasi Looker Studio</li>
            </ul>
        </div>
    </div>

</div> --}}

<style>

.content-wrapper{
    background:#f5f7fb !important;
}

/* ================= HERO ================= */

.hero-dashboard{
    background:
    linear-gradient(
        135deg,
        #1e2a4a,
        #304878
    );

    border-radius:24px;
    padding:35px;

    color:white;

    display:flex;
    justify-content:space-between;
    align-items:center;

    box-shadow:
    0 15px 40px rgba(30,42,74,.20);

    position:relative;
    overflow:hidden;
}

.hero-dashboard::after{
    content:'';

    position:absolute;

    right:-70px;
    top:-70px;

    width:250px;
    height:250px;

    border-radius:50%;

    background:
    rgba(255,255,255,.08);
}

.hero-dashboard h2{
    font-weight:700;
    margin-bottom:5px;
}

.hero-dashboard p{
    margin:0;
    opacity:.9;
}

.hero-info{
    text-align:right;
}

.hero-info span{
    opacity:.8;
}

.hero-total{
    font-size:42px;
    font-weight:700;
}

/* ================= CARD ================= */

.dashboard-card{

    background:#fff;

    border-radius:20px;

    padding:25px;

    border:1px solid #edf2f7;

    height:100%;

    transition:.3s;

    box-shadow:
    0 8px 25px rgba(15,23,42,.05);

    position:relative;

    overflow:hidden;
}

.dashboard-card:hover{

    transform:translateY(-5px);

    box-shadow:
    0 15px 35px rgba(15,23,42,.10);
}

.dashboard-card::before{
    content:'';

    position:absolute;

    top:0;
    left:0;

    width:100%;
    height:5px;
}

/* warna sektor */

.card-infrastruktur::before{
    background:#4e73df;
}

.card-kependudukan::before{
    background:#1cc88a;
}

.card-ekonomi::before{
    background:#f6c23e;
}

.card-pangan::before{
    background:#6f42c1;
}

.card-perikanan::before{
    background:#e74a3b;
}

/* icon */

.dashboard-icon{
    width:60px;
    height:60px;

    border-radius:16px;

    display:flex;
    align-items:center;
    justify-content:center;

    margin-bottom:15px;

    font-size:24px;
}

.icon-infrastruktur{
    background:#eef1fd;
    color:#4e73df;
}

.icon-kependudukan{
    background:#eafaf4;
    color:#1cc88a;
}

.icon-ekonomi{
    background:#fff8e7;
    color:#f6c23e;
}

.icon-pangan{
    background:#f3ecff;
    color:#6f42c1;
}

.icon-perikanan{
    background:#fdeeee;
    color:#e74a3b;
}

.dashboard-card h2{
    font-size:36px;
    font-weight:700;
    color:#1e293b;
    margin-bottom:5px;
}

.dashboard-card p{
    margin:0;
    color:#64748b;
}

/* ================= SUMMARY ================= */

.summary-card{

    background:#fff;

    border-radius:20px;

    padding:25px;

    border:1px solid #edf2f7;

    box-shadow:
    0 8px 25px rgba(15,23,42,.05);
}

.summary-card h4{
    color:#1e293b;
    font-weight:700;
    margin-bottom:20px;
}

.summary-card ul{
    margin:0;
    padding-left:20px;
}

.summary-card li{
    margin-bottom:10px;
    color:#64748b;
}

/* ================= MOBILE ================= */

@media(max-width:768px){

    .hero-dashboard{
        flex-direction:column;
        text-align:center;
        gap:20px;
    }

    .hero-info{
        text-align:center;
    }

    .hero-total{
        font-size:32px;
    }

}

</style>

@endsection
