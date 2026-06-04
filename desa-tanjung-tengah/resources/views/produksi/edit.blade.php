@extends('adminlte::page')

@section('title', 'Edit Produksi Pangan')

@section('content_header')
<div class="indata-page-header">

    <div>
        <h1 class="indata-page-title">
            Edit Produksi Pangan
        </h1>

        <p class="indata-page-sub">
            Perbarui data produksi pangan desa
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

@if ($errors->any())

<div class="indata-alert indata-alert-danger">

    <i class="fas fa-exclamation-circle mr-2"></i>

    <div>

        <strong>Terdapat kesalahan:</strong>

        <ul class="mb-0 pl-3 mt-2">

            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

        </ul>

    </div>

</div>

@endif

<div class="indata-card">

    <div class="indata-card-head">

        <div class="indata-card-title">

            <div class="indata-card-icon-wrap">

                <i class="fas fa-edit"></i>

            </div>

            Form Edit Produksi Pangan

        </div>

    </div>

    <div class="indata-card-body">

        <form action="{{ route('produksi.update',$data->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-3">

                    <div class="form-group">

                        <label class="indata-label">
                            Tahun
                        </label>

                        <input type="number"
                               name="tahun"
                               value="{{ old('tahun',$data->tahun) }}"
                               class="form-control indata-input"
                               required>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="form-group">

                        <label class="indata-label">
                            Sektor
                        </label>

                        <input type="text"
                               name="sektor"
                               value="{{ old('sektor',$data->sektor) }}"
                               class="form-control indata-input">

                    </div>

                </div>

                <div class="col-md-5">

                    <div class="form-group">

                        <label class="indata-label">
                            Komoditas
                        </label>

                        <input type="text"
                               name="komoditas"
                               value="{{ old('komoditas',$data->komoditas) }}"
                               class="form-control indata-input">

                    </div>

                </div>

            </div>

            <div class="indata-section-title">
                <i class="fas fa-chart-bar"></i>
                Data Produksi
            </div>

            <div class="row">

                <div class="col-md-4">

                    <div class="form-group">

                        <label class="indata-label">
                            Luas Lahan (Ha)
                        </label>

                        <input type="number"
                               step="0.01"
                               name="luas_ha"
                               value="{{ old('luas_ha',$data->luas_ha) }}"
                               class="form-control indata-input">

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="form-group">

                        <label class="indata-label">
                            Hasil Produksi
                        </label>

                        <input type="number"
                               step="0.01"
                               name="hasil_produksi"
                               value="{{ old('hasil_produksi',$data->hasil_produksi) }}"
                               class="form-control indata-input">

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="form-group">

                        <label class="indata-label">
                            Nilai Produksi (Rp)
                        </label>

                        <input type="number"
                               name="nilai_produksi"
                               value="{{ old('nilai_produksi',$data->nilai_produksi) }}"
                               class="form-control indata-input">

                    </div>

                </div>

            </div>

            <div class="indata-section-title">

                <i class="fas fa-money-bill-wave"></i>

                Biaya Produksi

            </div>

            <div class="row">

                <div class="col-md-3">

                    <div class="form-group">

                        <label class="indata-label">
                            Biaya Pupuk
                        </label>

                        <input type="number"
                               name="biaya_pupuk"
                               value="{{ old('biaya_pupuk',$data->biaya_pupuk) }}"
                               class="form-control indata-input">

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="form-group">

                        <label class="indata-label">
                            Biaya Bibit
                        </label>

                        <input type="number"
                               name="biaya_bibit"
                               value="{{ old('biaya_bibit',$data->biaya_bibit) }}"
                               class="form-control indata-input">

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="form-group">

                        <label class="indata-label">
                            Biaya Obat
                        </label>

                        <input type="number"
                               name="biaya_obat"
                               value="{{ old('biaya_obat',$data->biaya_obat) }}"
                               class="form-control indata-input">

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="form-group">

                        <label class="indata-label">
                            Biaya Lainnya
                        </label>

                        <input type="number"
                               name="biaya_lainnya"
                               value="{{ old('biaya_lainnya',$data->biaya_lainnya) }}"
                               class="form-control indata-input">

                    </div>

                </div>

            </div>

            <div class="text-right mt-4">

                <a href="{{ route('produksi.index') }}"
                   class="indata-btn-cancel">

                    Batal

                </a>

                <button type="submit"
                        class="indata-btn-primary">

                    <i class="fas fa-save"></i>
                    Update Data

                </button>

            </div>

        </form>

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
    font-size:13px;
    margin-top:4px;
}

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

.indata-section-title{
    margin:25px 0 15px;
    font-size:15px;
    font-weight:700;
    color:#1e293b;
    border-bottom:1px solid #edf2f7;
    padding-bottom:10px;
}

.indata-label{
    font-size:13px;
    font-weight:600;
    color:#334155;
}

.indata-input{
    border:1px solid #dbe3ee;
    border-radius:10px;
    padding:10px 14px;
    height:auto;
}

.indata-input:focus{
    border-color:#4e73df;
    box-shadow:0 0 0 .15rem rgba(78,115,223,.15);
}

.indata-btn-primary{
    background:#4e73df;
    color:#fff !important;
    border:none;
    padding:10px 18px;
    border-radius:10px;
    font-weight:600;
}

.indata-btn-primary:hover{
    background:#3a5ec0;
}

.indata-btn-secondary,
.indata-btn-cancel{
    background:#e2e8f0;
    color:#334155 !important;
    padding:10px 18px;
    border-radius:10px;
    font-weight:600;
    text-decoration:none;
}

.indata-btn-secondary:hover,
.indata-btn-cancel:hover{
    background:#cbd5e1;
}

.indata-alert{
    display:flex;
    gap:12px;
    padding:15px;
    border-radius:10px;
    margin-bottom:20px;
}

.indata-alert-danger{
    background:#fdeaea;
    border:1px solid #f5c2c2;
    color:#a32d2d;
}

</style>
@stop
