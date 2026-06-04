@extends('adminlte::page')

@section('title', 'Detail Data Ekonomi & Pekerjaan')

@section('content_header')
<div class="indata-page-header">

    <div>
        <h1 class="indata-page-title">
            Detail Data Ekonomi & Pekerjaan
        </h1>

        <p class="indata-page-sub">
            Informasi lengkap data sektor ekonomi dan pekerjaan
        </p>
    </div>

    <a href="{{ route('ekonomi.index') }}"
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

                <i class="fas fa-briefcase"></i>

            </div>

            Informasi Detail Data

        </div>

    </div>

    <div class="indata-card-body p-0">

        <table class="table indata-detail-table mb-0">

            <tbody>

                <tr>
                    <th width="250">ID Data</th>
                    <td>{{ $data->id }}</td>
                </tr>

                <tr>
                    <th>Tahun</th>
                    <td>
                        <span class="indata-year-badge">
                            {{ $data->tahun }}
                        </span>
                    </td>
                </tr>

                <tr>
                    <th>Kategori Sektor</th>
                    <td>
                        <span class="indata-sector-badge">
                            {{ $data->kategori_sektor }}
                        </span>
                    </td>
                </tr>

                <tr>
                    <th>Jenis Pekerjaan</th>
                    <td>
                        <strong>{{ $data->jenis_pekerjaan }}</strong>
                    </td>
                </tr>

                <tr>
                    <th>Laki-Laki</th>
                    <td>
                        {{ number_format($data->laki_laki) }} Orang
                    </td>
                </tr>

                <tr>
                    <th>Perempuan</th>
                    <td>
                        {{ number_format($data->perempuan) }} Orang
                    </td>
                </tr>

                <tr>
                    <th>Total</th>
                    <td>
                        <span class="indata-total-badge">
                            {{ number_format($data->total) }} Orang
                        </span>
                    </td>
                </tr>

                <tr>
                    <th>Dibuat Pada</th>
                    <td>
                        {{ $data->created_at ? $data->created_at->format('d F Y H:i') : '-' }}
                    </td>
                </tr>

                <tr>
                    <th>Terakhir Diperbarui</th>
                    <td>
                        {{ $data->updated_at ? $data->updated_at->format('d F Y H:i') : '-' }}
                    </td>
                </tr>

            </tbody>

        </table>

    </div>

    <div class="indata-card-footer">

        <a href="{{ route('ekonomi.edit', $data->id) }}"
           class="indata-btn-warning">

            <i class="fas fa-edit"></i>
            Edit Data

        </a>

        <a href="{{ route('ekonomi.index') }}"
           class="indata-btn-secondary">

            <i class="fas fa-arrow-left"></i>
            Kembali

        </a>

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
    width:36px;
    height:36px;
    border-radius:10px;
    background:#eef1fd;
    color:#4e73df;
    display:flex;
    justify-content:center;
    align-items:center;
}

.indata-card-body{
    padding:25px;
}

.indata-card-footer{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:18px 22px;
    border-top:1px solid #edf2f7;
}

/* Table */

.indata-detail-table th{
    background:#f8fafc;
    color:#475569;
    font-weight:600;
    width:250px;
}

.indata-detail-table td,
.indata-detail-table th{
    padding:14px;
    vertical-align:middle;
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
}

.indata-total-badge{
    background:#dcfce7;
    color:#166534;
    padding:6px 12px;
    border-radius:8px;
    font-weight:700;
}

/* Buttons */

.indata-btn-warning{
    background:#f59e0b;
    color:white !important;
    padding:10px 18px;
    border-radius:10px;
    text-decoration:none;
    font-weight:600;
}

.indata-btn-warning:hover{
    background:#d97706;
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

@media(max-width:768px){

    .indata-card-footer{
        flex-direction:column;
        gap:10px;
    }

    .indata-btn-warning,
    .indata-btn-secondary{
        width:100%;
        text-align:center;
    }

}

</style>
@stop
