@extends('adminlte::page')

@section('title', 'Edit Data Perikanan & Aset')

@section('content_header')
<div class="indata-page-header">

    <div>
        <h1 class="indata-page-title">
            Edit Data Perikanan & Aset Infrastruktur
        </h1>

        <p class="indata-page-sub">
            Perbarui data aset infrastruktur dan perikanan desa
        </p>
    </div>

    <a href="{{ route('perikanan.index') }}"
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

            Form Edit Data Perikanan & Aset Infrastruktur

        </div>

    </div>

    <div class="indata-card-body">

        <form action="{{ route('perikanan.update', $data->id) }}"
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
                               min="2000"
                               value="{{ old('tahun', $data->tahun) }}"
                               class="form-control indata-input @error('tahun') is-invalid @enderror"
                               required>

                        @error('tahun')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="form-group">

                        <label class="indata-label">
                            Kelompok Aset
                        </label>

                        <input type="text"
                               name="kelompok_aset"
                               value="{{ old('kelompok_aset', $data->kelompok_aset) }}"
                               class="form-control indata-input @error('kelompok_aset') is-invalid @enderror"
                               required>

                        @error('kelompok_aset')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                </div>

                <div class="col-md-5">

                    <div class="form-group">

                        <label class="indata-label">
                            Nama Aset Infrastruktur
                        </label>

                        <input type="text"
                               name="nama_aset_infrastruktur"
                               value="{{ old('nama_aset_infrastruktur', $data->nama_aset_infrastruktur) }}"
                               class="form-control indata-input @error('nama_aset_infrastruktur') is-invalid @enderror"
                               required>

                        @error('nama_aset_infrastruktur')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-6">

                    <div class="form-group">

                        <label class="indata-label">
                            Satuan Ukuran
                        </label>

                        <input type="text"
                               name="satuan_ukuran"
                               value="{{ old('satuan_ukuran', $data->satuan_ukuran) }}"
                               placeholder="Contoh: Meter, Unit, Km"
                               class="form-control indata-input">

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group">

                        <label class="indata-label">
                            Volume / Jumlah
                        </label>

                        <input type="number"
                               step="0.01"
                               min="0"
                               name="volume_jumlah"
                               value="{{ old('volume_jumlah', $data->volume_jumlah) }}"
                               placeholder="Masukkan volume atau jumlah"
                               class="form-control indata-input">

                    </div>

                </div>

            </div>

            <div class="text-right mt-4">

                <a href="{{ route('perikanan.index') }}"
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

.indata-label{
    display:block;
    margin-bottom:6px;
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
