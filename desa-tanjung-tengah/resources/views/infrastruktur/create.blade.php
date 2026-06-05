@extends('adminlte::page')

@section('title', 'Tambah Data Infrastruktur & APBDES')

@section('content_header')
<div class="indata-page-header">
    <div>
        <h1 class="indata-page-title">Tambah Data Infrastruktur & APBDES</h1>
        <p class="indata-page-sub">
            Tambahkan data infrastruktur dan APBDES desa
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

@if ($errors->any())
<div class="indata-alert indata-alert-danger">
    <i class="fas fa-exclamation-circle"></i>

    <div>
        <strong>Terdapat kesalahan:</strong>
        <ul class="mb-0 pl-3">
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
                <i class="fas fa-plus-circle"></i>
            </div>

            Form Input Data Infrastruktur

        </div>
    </div>

    <div class="indata-card-body">

        <form action="{{ route('infrastruktur.store') }}"
              method="POST">

            @csrf

            <div class="row">

                <div class="col-md-4">

                    <div class="form-group">
                        <label class="indata-label">
                            Tahun
                        </label>

                        <input type="number"
                               name="tahun"
                               class="form-control indata-input @error('tahun') is-invalid @enderror"
                               value="{{ old('tahun', date('Y')) }}"
                               required>

                        @error('tahun')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>

                <div class="col-md-8">

                    <div class="form-group">
                        <label class="indata-label">
                            Sektor Fasilitas
                        </label>

                        <input type="text"
                               name="sektor_fasilitas"
                               class="form-control indata-input @error('sektor_fasilitas') is-invalid @enderror"
                               value="{{ old('sektor_fasilitas') }}"
                               placeholder="Contoh: Jalan Desa, Sanitasi, Air Bersih"
                               required>

                        @error('sektor_fasilitas')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>

            </div>

            <div class="form-group">

                <label class="indata-label">
                    Indikator Infrastruktur
                </label>

                <input type="text"
                       name="indikator_infrastruktur"
                       class="form-control indata-input @error('indikator_infrastruktur') is-invalid @enderror"
                       value="{{ old('indikator_infrastruktur') }}"
                       placeholder="Contoh: Panjang Jalan Aspal"
                       required>

                @error('indikator_infrastruktur')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="row">

                <div class="col-md-4">

                    <div class="form-group">

                        <label class="indata-label">
                            Satuan
                        </label>

                        <input type="text"
                               name="satuan"
                               class="form-control indata-input @error('satuan') is-invalid @enderror"
                               value="{{ old('satuan') }}"
                               placeholder="Meter / Unit / Rupiah"
                               required>

                        @error('satuan')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="form-group">

                        <label class="indata-label">
                            Nilai Kuantitatif
                        </label>

                        <input type="number"
                               step="any"
                               name="nilai_kuantitatif"
                               class="form-control indata-input"
                               value="{{ old('nilai_kuantitatif') }}"
                               placeholder="Contoh: 100">

                        <small class="text-muted">
                            Kosongkan jika menggunakan data kualitatif
                        </small>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="form-group">

                        <label class="indata-label">
                            Nilai Kualitatif
                        </label>

                        <input type="text"
                               name="nilai_kualitatif"
                               class="form-control indata-input"
                               value="{{ old('nilai_kualitatif') }}"
                               placeholder="Baik / Sedang / Buruk">

                        <small class="text-muted">
                            Kosongkan jika menggunakan data kuantitatif
                        </small>

                    </div>

                </div>

            </div>

            <div class="text-right mt-4">

                <a href="{{ route('infrastruktur.index') }}"
                   class="indata-btn-cancel">
                    Batal
                </a>

                <button type="submit"
                        class="indata-btn-primary">
                    <i class="fas fa-save"></i>
                    Simpan Data
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
    font-size:13px;
    color:#94a3b8;
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
    justify-content:center;
    align-items:center;
}

.indata-card-body{
    padding:25px;
}

/* Form */

.indata-label{
    display:block;
    font-size:13px;
    font-weight:600;
    color:#334155;
    margin-bottom:6px;
}

.indata-input{
    border:1px solid #dbe3ee;
    border-radius:10px;
    padding:10px 14px;
    font-size:14px;
    height:auto;
}

.indata-input:focus{
    border-color:#4e73df;
    box-shadow:0 0 0 .15rem rgba(78,115,223,.15);
}

/* Button */

.indata-btn-primary{
    background:#4e73df;
    color:white !important;
    border:none;
    padding:10px 18px;
    border-radius:10px;
    font-weight:600;
    text-decoration:none;
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
    text-decoration:none;
    font-weight:600;
}

.indata-btn-secondary:hover,
.indata-btn-cancel:hover{
    background:#cbd5e1;
}

/* Alert */

.indata-alert{
    display:flex;
    gap:10px;
    padding:15px;
    border-radius:10px;
    margin-bottom:20px;
}

.indata-alert-danger{
    background:#fdeaea;
    border:1px solid #f5c2c2;
    color:#a32d2d;
}

@media(max-width:576px){

    .indata-page-header{
        flex-direction:column;
        align-items:flex-start;
    }

    .indata-btn-secondary{
        width:100%;
        text-align:center;
    }

}

</style>
@stop
