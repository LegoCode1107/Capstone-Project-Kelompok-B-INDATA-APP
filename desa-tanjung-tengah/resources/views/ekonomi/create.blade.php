@extends('adminlte::page')

@section('title', 'Tambah Data Ekonomi & Pekerjaan')

@section('content_header')
<div class="indata-page-header">

    <div>
        <h1 class="indata-page-title">
            Tambah Data Ekonomi & Pekerjaan
        </h1>

        <p class="indata-page-sub">
            Tambahkan data sektor ekonomi dan pekerjaan masyarakat
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

                <i class="fas fa-briefcase"></i>

            </div>

            Form Tambah Data Ekonomi & Pekerjaan

        </div>

    </div>

    <div class="indata-card-body">

        <form action="{{ route('ekonomi.store') }}"
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
                               min="2000"
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
                            Kategori Sektor
                        </label>

                        <input type="text"
                               name="kategori_sektor"
                               class="form-control indata-input @error('kategori_sektor') is-invalid @enderror"
                               value="{{ old('kategori_sektor') }}"
                               placeholder="Contoh: Pertanian, Perdagangan, Industri"
                               required>

                        @error('kategori_sektor')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

            </div>

            <div class="form-group">

                <label class="indata-label">
                    Jenis Pekerjaan
                </label>

                <input type="text"
                       name="jenis_pekerjaan"
                       class="form-control indata-input @error('jenis_pekerjaan') is-invalid @enderror"
                       value="{{ old('jenis_pekerjaan') }}"
                       placeholder="Contoh: Petani, Pedagang, Buruh"
                       required>

                @error('jenis_pekerjaan')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="row">

                <div class="col-md-4">

                    <div class="form-group">

                        <label class="indata-label">
                            Laki-Laki
                        </label>

                        <input type="number"
                               min="0"
                               name="laki_laki"
                               id="laki_laki"
                               class="form-control indata-input @error('laki_laki') is-invalid @enderror"
                               value="{{ old('laki_laki',0) }}"
                               required>

                        @error('laki_laki')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="form-group">

                        <label class="indata-label">
                            Perempuan
                        </label>

                        <input type="number"
                               min="0"
                               name="perempuan"
                               id="perempuan"
                               class="form-control indata-input @error('perempuan') is-invalid @enderror"
                               value="{{ old('perempuan',0) }}"
                               required>

                        @error('perempuan')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="form-group">

                        <label class="indata-label">
                            Total
                        </label>

                        <input type="number"
                               min="0"
                               name="total"
                               id="total"
                               class="form-control indata-input"
                               value="{{ old('total',0) }}"
                               readonly>

                        <small class="text-muted">
                            Otomatis dihitung
                        </small>

                    </div>

                </div>

            </div>

            <div class="text-right mt-4">

                <a href="{{ route('ekonomi.index') }}"
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
    align-items:center;
    justify-content:center;
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
    font-size:14px;
    height:auto;
}

.indata-input:focus{
    border-color:#4e73df;
    box-shadow:0 0 0 .15rem rgba(78,115,223,.15);
}

.indata-btn-primary{
    background:#4e73df;
    color:white !important;
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
    text-decoration:none;
    font-weight:600;
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

@section('js')
<script>

$(document).ready(function(){

    function hitungTotal(){

        let laki =
            parseInt($('#laki_laki').val()) || 0;

        let perempuan =
            parseInt($('#perempuan').val()) || 0;

        $('#total').val(
            laki + perempuan
        );
    }

    $('#laki_laki, #perempuan')
        .on('input', hitungTotal);

    hitungTotal();

});

</script>
@stop
