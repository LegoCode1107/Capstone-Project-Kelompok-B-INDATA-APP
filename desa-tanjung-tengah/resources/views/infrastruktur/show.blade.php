@extends('adminlte::page')

@section('title', 'Detail Data Infrastruktur & APBDES')

@section('content_header')
<div class="indata-page-header">
    <div>
        <h1 class="indata-page-title">Detail Data Infrastruktur & APBDES</h1>
        <p class="indata-page-sub">
            Informasi lengkap data infrastruktur dan APBDES desa
        </p>
    </div>

    <a href="{{ route('infrastruktur.index') }}"
       class="indata-btn-secondary">
        <i class="fas fa-arrow-left"></i>
        Kembali
    </a>
</div>
@stop

@section('content')

<div class="indata-card">

    <div class="indata-card-head">

        <div class="indata-card-title">

            <div class="indata-card-icon-wrap">
                <i class="fas fa-road"></i>
            </div>

            Detail Data Infrastruktur

        </div>

    </div>

    <div class="indata-card-body">

        <div class="row">

            <div class="col-md-4 mb-4">

                <label class="indata-label">
                    ID Data
                </label>

                <div class="indata-detail-box">
                    #{{ $data->id }}
                </div>

            </div>

            <div class="col-md-4 mb-4">

                <label class="indata-label">
                    Tahun
                </label>

                <div>
                    <span class="indata-year-badge">
                        {{ $data->tahun }}
                    </span>
                </div>

            </div>

            <div class="col-md-4 mb-4">

                <label class="indata-label">
                    Satuan
                </label>

                <div>
                    <span class="indata-sector-badge">
                        {{ $data->satuan }}
                    </span>
                </div>

            </div>

            <div class="col-md-6 mb-4">

                <label class="indata-label">
                    Sektor Fasilitas
                </label>

                <div class="indata-detail-box">
                    {{ $data->sektor_fasilitas }}
                </div>

            </div>

            <div class="col-md-6 mb-4">

                <label class="indata-label">
                    Indikator Infrastruktur
                </label>

                <div class="indata-detail-box">
                    {{ $data->indikator_infrastruktur }}
                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-md-6 mb-4">

                <label class="indata-label">
                    Nilai Kuantitatif
                </label>

                <div class="indata-stat-card">

                    <div class="indata-stat-icon bg-primary">
                        <i class="fas fa-chart-bar"></i>
                    </div>

                    <div>

                        <div class="indata-stat-value">

                            @if($data->nilai_kuantititaf !== null)

                                @if(
                                    str_contains(strtolower($data->satuan), 'rupiah')
                                    ||
                                    str_contains(strtolower($data->satuan), 'rp')
                                )

                                    Rp {{ number_format($data->nilai_kuantititaf,0,',','.') }}

                                @else

                                    {{ number_format($data->nilai_kuantititaf) }}

                                @endif

                            @else

                                -

                            @endif

                        </div>

                        <div class="indata-stat-text">
                            Nilai Kuantitatif
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-6 mb-4">

                <label class="indata-label">
                    Nilai Kualitatif
                </label>

                <div class="indata-stat-card">

                    <div class="indata-stat-icon bg-success">
                        <i class="fas fa-clipboard-check"></i>
                    </div>

                    <div>

                        <div class="indata-stat-value">

                            {{ $data->nilai_kualitatif ?: '-' }}

                        </div>

                        <div class="indata-stat-text">
                            Nilai Kualitatif
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-md-6 mb-4">

                <label class="indata-label">
                    Dibuat Pada
                </label>

                <div class="indata-detail-box">
                    {{ $data->created_at ? $data->created_at->format('d F Y H:i') : '-' }}
                </div>

            </div>

            <div class="col-md-6 mb-4">

                <label class="indata-label">
                    Terakhir Diperbarui
                </label>

                <div class="indata-detail-box">
                    {{ $data->updated_at ? $data->updated_at->format('d F Y H:i') : '-' }}
                </div>

            </div>

        </div>

        <div class="text-right mt-4">

            <a href="{{ route('infrastruktur.edit',$data->id) }}"
               class="indata-btn-primary">
                <i class="fas fa-edit"></i>
                Edit Data
            </a>

        </div>

    </div>

</div>

@stop

@section('css')
<style>

.content-wrapper{
    background:#f5f6fa !important;
}

/* Header */

.indata-page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap:wrap;
    gap:15px;
    margin-bottom:20px;
}

.indata-page-title{
    font-size:22px;
    font-weight:700;
    color:#1e293b;
    margin:0;
}

.indata-page-sub{
    color:#94a3b8;
    font-size:13px;
    margin-top:4px;
}

/* Card */

.indata-card{
    background:#fff;
    border:1px solid #e8eaf0;
    border-radius:14px;
    overflow:hidden;
}

.indata-card-head{
    padding:18px 22px;
    border-bottom:1px solid #edf2f7;
}

.indata-card-title{
    display:flex;
    align-items:center;
    gap:10px;
    font-size:15px;
    font-weight:700;
    color:#1e293b;
}

.indata-card-icon-wrap{
    width:34px;
    height:34px;
    border-radius:10px;
    background:#eef1fd;
    color:#4e73df;
    display:flex;
    align-items:center;
    justify-content:center;
}

.indata-card-body{
    padding:25px;
}

/* Label */

.indata-label{
    display:block;
    font-size:12px;
    text-transform:uppercase;
    font-weight:700;
    color:#94a3b8;
    margin-bottom:8px;
}

/* Badge */

.indata-year-badge{
    background:#eef1fd;
    color:#2a4ab0;
    padding:6px 12px;
    border-radius:8px;
    font-weight:700;
}

.indata-sector-badge{
    background:#f1f5f9;
    color:#334155;
    padding:6px 12px;
    border-radius:8px;
    font-weight:600;
}

/* Detail Box */

.indata-detail-box{
    background:#f8fafc;
    border:1px solid #e2e8f0;
    padding:14px;
    border-radius:10px;
    color:#334155;
}

/* Statistik */

.indata-stat-card{
    display:flex;
    align-items:center;
    gap:15px;
    border:1px solid #e2e8f0;
    border-radius:12px;
    padding:18px;
}

.indata-stat-icon{
    width:50px;
    height:50px;
    border-radius:12px;
    color:white;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:18px;
}

.bg-primary{
    background:#4e73df;
}

.bg-success{
    background:#28a745;
}

.indata-stat-value{
    font-size:20px;
    font-weight:700;
    color:#1e293b;
}

.indata-stat-text{
    font-size:13px;
    color:#64748b;
}

/* Button */

.indata-btn-primary{
    background:#4e73df;
    color:white !important;
    border:none;
    padding:10px 18px;
    border-radius:10px;
    text-decoration:none;
    font-weight:600;
}

.indata-btn-primary:hover{
    background:#3a5ec0;
}

.indata-btn-secondary{
    background:#e2e8f0;
    color:#334155 !important;
    padding:10px 18px;
    border-radius:10px;
    text-decoration:none;
    font-weight:600;
}

.indata-btn-secondary:hover{
    background:#cbd5e1;
}

</style>
@stop
