@extends('adminlte::page')

@section('title', 'Edit Produksi Pangan')

@section('content_header')
<h1>Edit Produksi Pangan</h1>
@stop

@section('content')

<div class="card card-warning">

<form action="{{ route('produksi.update',$data->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="card-body">

        <div class="row">

            <div class="col-md-3">
                <label>Tahun</label>
                <input type="number"
                       name="tahun"
                       value="{{ $data->tahun }}"
                       class="form-control">
            </div>

            <div class="col-md-4">
                <label>Sektor</label>
                <input type="text"
                       name="sektor"
                       value="{{ $data->sektor }}"
                       class="form-control">
            </div>

            <div class="col-md-5">
                <label>Komoditas</label>
                <input type="text"
                       name="komoditas"
                       value="{{ $data->komoditas }}"
                       class="form-control">
            </div>

        </div>

        <div class="row mt-3">

            <div class="col-md-4">
                <label>Luas Lahan</label>
                <input type="number"
                       step="0.01"
                       name="luas_ha"
                       value="{{ $data->luas_ha }}"
                       class="form-control">
            </div>

            <div class="col-md-4">
                <label>Produksi</label>
                <input type="number"
                       step="0.01"
                       name="hasil_produksi"
                       value="{{ $data->hasil_produksi }}"
                       class="form-control">
            </div>

            <div class="col-md-4">
                <label>Nilai Produksi</label>
                <input type="number"
                       name="nilai_produksi"
                       value="{{ $data->nilai_produksi }}"
                       class="form-control">
            </div>

        </div>

        <hr>

        <div class="row">

            <div class="col-md-3">
                <label>Biaya Pupuk</label>
                <input type="number"
                       name="biaya_pupuk"
                       value="{{ $data->biaya_pupuk }}"
                       class="form-control">
            </div>

            <div class="col-md-3">
                <label>Biaya Bibit</label>
                <input type="number"
                       name="biaya_bibit"
                       value="{{ $data->biaya_bibit }}"
                       class="form-control">
            </div>

            <div class="col-md-3">
                <label>Biaya Obat</label>
                <input type="number"
                       name="biaya_obat"
                       value="{{ $data->biaya_obat }}"
                       class="form-control">
            </div>

            <div class="col-md-3">
                <label>Biaya Lainnya</label>
                <input type="number"
                       name="biaya_lainnya"
                       value="{{ $data->biaya_lainnya }}"
                       class="form-control">
            </div>

        </div>

    </div>

    <div class="card-footer">

        <button class="btn btn-primary">
            Update Data
        </button>

    </div>

</form>

</div>

@stop
