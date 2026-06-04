@extends('adminlte::page')

@section('title', 'Tambah Data Ekonomi')

@section('content_header')

<h1>Tambah Data Ekonomi & Pekerjaan</h1>

@stop

@section('content')

<div class="card">

    <div class="card-body">

        <form action="{{ route('ekonomi.store') }}"
              method="POST">

            @csrf

            <div class="row">

                <div class="col-md-4">

                    <label>Tahun</label>

                    <input type="number"
                           name="tahun"
                           class="form-control"
                           required>

                </div>

                <div class="col-md-8">

                    <label>Kategori Sektor</label>

                    <input type="text"
                           name="kategori_sektor"
                           class="form-control"
                           required>

                </div>

            </div>

            <div class="mt-3">

                <label>Jenis Pekerjaan</label>

                <input type="text"
                       name="jenis_pekerjaan"
                       class="form-control"
                       required>

            </div>

            <div class="row mt-3">

                <div class="col-md-4">

                    <label>Laki-Laki</label>

                    <input type="number"
                           name="laki_laki"
                           class="form-control">

                </div>

                <div class="col-md-4">

                    <label>Perempuan</label>

                    <input type="number"
                           name="perempuan"
                           class="form-control">

                </div>

                <div class="col-md-4">

                    <label>Total</label>

                    <input type="number"
                           name="total"
                           class="form-control">

                </div>

            </div>

            <button class="btn btn-success mt-3">

                <i class="fas fa-save"></i>
                Simpan

            </button>

            <a href="{{ route('ekonomi.index') }}"
               class="btn btn-secondary mt-3">

                Kembali

            </a>

        </form>

    </div>

</div>

@stop
