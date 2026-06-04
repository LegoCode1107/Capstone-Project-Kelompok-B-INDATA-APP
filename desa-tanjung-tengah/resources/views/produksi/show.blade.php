@extends('adminlte::page')

@section('title', 'Detail Produksi Pangan')

@section('content_header')
<div class="indata-page-header">

    <div>
        <h1 class="indata-page-title">
            Detail Produksi Pangan
        </h1>

        <p class="indata-page-sub">
            Informasi lengkap data produksi pangan desa
        </p>
    </div>

    <a href="{{ route('produksi.index') }}"
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

                <i class="fas fa-seedling"></i>

            </div>

            Informasi Detail Produksi Pangan

        </div>

    </div>

    <div class="indata-card-body p-0">

        <table class="table table-hover mb-0">

            <tbody>

                <tr>
                    <th width="280">Tahun</th>
                    <td>
                        <span class="badge badge-primary px-3 py-2">
                            {{ $data->tahun }}
                        </span>
                    </td>
                </tr>

                <tr>
                    <th>Sektor</th>
                    <td>{{ $data->sektor ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Komoditas</th>
                    <td>
                        <strong>{{ $data->komoditas ?? '-' }}</strong>
                    </td>
                </tr>

                <tr>
                    <th>Luas Lahan</th>
                    <td>
                        {{ number_format($data->luas_ha ?? 0, 2, ',', '.') }} Ha
                    </td>
                </tr>

                <tr>
                    <th>Hasil Produksi</th>
                    <td>
                        {{ number_format($data->hasil_produksi ?? 0, 2, ',', '.') }}
                    </td>
                </tr>

                <tr>
                    <th>Nilai Produksi</th>
                    <td>
                        <span class="text-success font-weight-bold">
                            Rp {{ number_format($data->nilai_produksi ?? 0, 0, ',', '.') }}
                        </span>
                    </td>
                </tr>

                <tr class="table-light">
                    <th colspan="2">
                        <i class="fas fa-money-bill-wave text-primary"></i>
                        Informasi Biaya Produksi
                    </th>
                </tr>

                <tr>
                    <th>Biaya Pupuk</th>
                    <td>
                        Rp {{ number_format($data->biaya_pupuk ?? 0, 0, ',', '.') }}
                    </td>
                </tr>

                <tr>
                    <th>Biaya Bibit</th>
                    <td>
                        Rp {{ number_format($data->biaya_bibit ?? 0, 0, ',', '.') }}
                    </td>
                </tr>

                <tr>
                    <th>Biaya Obat</th>
                    <td>
                        Rp {{ number_format($data->biaya_obat ?? 0, 0, ',', '.') }}
                    </td>
                </tr>

                <tr>
                    <th>Biaya Lainnya</th>
                    <td>
                        Rp {{ number_format($data->biaya_lainnya ?? 0, 0, ',', '.') }}
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

        <a href="{{ route('produksi.edit',$data->id) }}"
           class="indata-btn-warning">

            <i class="fas fa-edit"></i>
            Edit Data

        </a>

        <a href="{{ route('produksi.index') }}"
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
    margin-top:4px;
    font-size:13px;
}

.indata-card{
    background:#fff;
    border-radius:14px;
    border:1px solid #e8eaf0;
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
    align-items:center;
    justify-content:center;
}

.indata-card-body{
    padding:25px;
}

.indata-card-body table th{
    width:280px;
    background:#f8fafc;
    color:#334155;
    font-weight:600;
}

.indata-card-footer{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:20px;
    border-top:1px solid #edf2f7;
}

.indata-btn-warning{
    background:#f59e0b;
    color:#fff !important;
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

.badge-primary{
    background:#4e73df;
    font-size:13px;
}

</style>
@stop
