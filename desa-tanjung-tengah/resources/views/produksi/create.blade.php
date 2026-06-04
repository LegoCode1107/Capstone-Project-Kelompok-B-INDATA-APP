@extends('adminlte::page')

@section('title', 'Tambah Produksi Pangan')

@section('content_header')
<div class="d-flex justify-content-between align-items-center">
    <h1>
        <i class="fas fa-seedling text-success"></i>
        Tambah Data Produksi Pangan
    </h1>

    <a href="{{ route('produksi.index') }}"
       class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i>
        Kembali
    </a>
</div>
@stop

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Terjadi Kesalahan!</strong>

    <ul class="mb-0 mt-2">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card card-success card-outline">

    <div class="card-header">
        <h3 class="card-title">
            Form Input Produksi Pangan
        </h3>
    </div>

    <form action="{{ route('produksi.store') }}"
          method="POST">

        @csrf

        <div class="card-body">

            <div class="row">

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Tahun <span class="text-danger">*</span></label>
                        <input type="number"
                               name="tahun"
                               value="{{ old('tahun') }}"
                               class="form-control"
                               required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Sektor</label>
                        <input type="text"
                               name="sektor"
                               value="{{ old('sektor') }}"
                               class="form-control"
                               placeholder="Contoh: Pertanian">
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group">
                        <label>Komoditas</label>
                        <input type="text"
                               name="komoditas"
                               value="{{ old('komoditas') }}"
                               class="form-control"
                               placeholder="Contoh: Padi">
                    </div>
                </div>

            </div>

            <hr>

            <h5 class="text-success">
                <i class="fas fa-chart-bar"></i>
                Data Produksi
            </h5>

            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Luas Lahan (Ha)</label>
                        <input type="number"
                               step="0.01"
                               name="luas_ha"
                               value="{{ old('luas_ha') }}"
                               class="form-control">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Hasil Produksi</label>
                        <input type="number"
                               step="0.01"
                               name="hasil_produksi"
                               value="{{ old('hasil_produksi') }}"
                               class="form-control">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nilai Produksi (Rp)</label>
                        <input type="number"
                               name="nilai_produksi"
                               value="{{ old('nilai_produksi') }}"
                               class="form-control">
                    </div>
                </div>

            </div>

            <hr>

            <h5 class="text-primary">
                <i class="fas fa-money-bill-wave"></i>
                Biaya Produksi
            </h5>

            <div class="row">

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Biaya Pupuk</label>
                        <input type="number"
                               name="biaya_pupuk"
                               value="{{ old('biaya_pupuk') }}"
                               class="form-control">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Biaya Bibit</label>
                        <input type="number"
                               name="biaya_bibit"
                               value="{{ old('biaya_bibit') }}"
                               class="form-control">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Biaya Obat</label>
                        <input type="number"
                               name="biaya_obat"
                               value="{{ old('biaya_obat') }}"
                               class="form-control">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Biaya Lainnya</label>
                        <input type="number"
                               name="biaya_lainnya"
                               value="{{ old('biaya_lainnya') }}"
                               class="form-control">
                    </div>
                </div>

            </div>

        </div>

        <div class="card-footer text-right">

            <button type="submit"
                    class="btn btn-success">

                <i class="fas fa-save"></i>
                Simpan Data

            </button>

            <a href="{{ route('produksi.index') }}"
               class="btn btn-secondary">

                Batal

            </a>

        </div>

    </form>

</div>

@stop
