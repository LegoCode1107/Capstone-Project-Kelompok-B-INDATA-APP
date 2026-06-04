@extends('adminlte::page')

@section('title','Tambah Data Perikanan & Aset')

@section('content_header')

<h1>
    Tambah Data Perikanan & Aset
</h1>

@stop

@section('content')

<div class="card card-success">

    <div class="card-header">

        <h3 class="card-title">
            Form Input Data
        </h3>

    </div>

    <form action="{{ route('perikanan.store') }}"
          method="POST">

        @csrf

        <div class="card-body">

            <div class="row">

                <div class="col-md-3">

                    <label>Tahun</label>

                    <input
                        type="number"
                        name="tahun"
                        class="form-control"
                        required>

                </div>

                <div class="col-md-4">

                    <label>Kelompok Aset</label>

                    <input
                        type="text"
                        name="kelompok_aset"
                        class="form-control"
                        required>

                </div>

                <div class="col-md-5">

                    <label>Nama Aset Infrastruktur</label>

                    <input
                        type="text"
                        name="nama_aset_infrastruktur"
                        class="form-control"
                        required>

                </div>

            </div>

            <div class="row mt-3">

                <div class="col-md-6">

                    <label>Satuan Ukuran</label>

                    <input
                        type="text"
                        name="satuan_ukuran"
                        class="form-control">

                </div>

                <div class="col-md-6">

                    <label>Volume / Jumlah</label>

                    <input
                        type="number"
                        step="0.01"
                        name="volume_jumlah"
                        class="form-control">

                </div>

            </div>

        </div>

        <div class="card-footer">

            <button
                type="submit"
                class="btn btn-success">

                <i class="fas fa-save"></i>
                Simpan

            </button>

            <a href="{{ route('perikanan.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </form>

</div>

@stop
