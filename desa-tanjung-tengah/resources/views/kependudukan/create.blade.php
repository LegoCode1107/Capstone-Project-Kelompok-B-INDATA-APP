@extends('adminlte::page')

@section('title', 'Tambah Data Kependudukan')

@section('content_header')
<div class="indata-page-header">
    <div>
        <h1 class="indata-page-title">Tambah Data Kependudukan</h1>
        <p class="indata-page-sub">Tambahkan data kependudukan dan sosial desa</p>
    </div>

    <a href="{{ route('kependudukan.index') }}" class="indata-btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>
@stop

@section('content')

@if ($errors->any())
<div class="indata-alert indata-alert-danger">
    <i class="fas fa-exclamation-circle"></i>
    <div>
        <strong>Terjadi kesalahan:</strong>
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
                <i class="fas fa-user-plus"></i>
            </div>
            Form Tambah Data
        </div>
    </div>

    <div class="indata-card-body">

        <form action="{{ route('kependudukan.store') }}" method="POST">
            @csrf

            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="indata-label">Tahun</label>
                        <input type="number"
                               name="tahun"
                               class="form-control indata-input"
                               value="{{ old('tahun') }}"
                               required>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                        <label class="indata-label">Kategori</label>
                        <input type="text"
                               name="kategori"
                               class="form-control indata-input"
                               value="{{ old('kategori') }}"
                               placeholder="Masukkan kategori"
                               required>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label class="indata-label">Indikator</label>
                <input type="text"
                       name="indikator"
                       class="form-control indata-input"
                       value="{{ old('indikator') }}"
                       placeholder="Masukkan indikator"
                       required>
            </div>

            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="indata-label">Laki-Laki</label>
                        <input type="number"
                               name="laki_laki"
                               id="laki_laki"
                               class="form-control indata-input"
                               value="{{ old('laki_laki',0) }}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="indata-label">Perempuan</label>
                        <input type="number"
                               name="perempuan"
                               id="perempuan"
                               class="form-control indata-input"
                               value="{{ old('perempuan',0) }}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="indata-label">Total</label>
                        <input type="number"
                               name="total"
                               id="total"
                               class="form-control indata-input"
                               readonly>
                    </div>
                </div>

            </div>

            <div class="text-right mt-4">

                <a href="{{ route('kependudukan.index') }}"
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
    color:#94a3b8;
    margin:4px 0 0;
    font-size:13px;
}

/* Card */
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

/* Form */
.indata-label{
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
    box-shadow:0 0 0 0.15rem rgba(78,115,223,.15);
}

/* Buttons */
.indata-btn-primary{
    border:none;
    background:#4e73df;
    color:#fff;
    padding:10px 18px;
    border-radius:10px;
    font-weight:600;
    text-decoration:none;
}

.indata-btn-primary:hover{
    background:#3a5ec0;
    color:#fff;
}

.indata-btn-secondary,
.indata-btn-cancel{
    background:#e2e8f0;
    color:#334155;
    padding:10px 18px;
    border-radius:10px;
    text-decoration:none;
    font-weight:600;
}

.indata-btn-secondary:hover,
.indata-btn-cancel:hover{
    background:#cbd5e1;
    color:#1e293b;
}

/* Alert */
.indata-alert{
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

function hitungTotal() {
    let laki = parseInt($('#laki_laki').val()) || 0;
    let perempuan = parseInt($('#perempuan').val()) || 0;

    $('#total').val(laki + perempuan);
}

$('#laki_laki, #perempuan').on('keyup change', function(){
    hitungTotal();
});

hitungTotal();

</script>
@stop
