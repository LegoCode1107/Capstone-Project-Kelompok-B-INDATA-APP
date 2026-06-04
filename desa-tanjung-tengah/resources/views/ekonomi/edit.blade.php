@extends('adminlte::page')

@section('title', 'Edit Data')

@section('content_header')

<h1>Edit Data Ekonomi & Pekerjaan</h1>

@stop

@section('content')

<div class="card">

    <div class="card-body">

        <form action="{{ route('ekonomi.update',$data->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-4">

                    <label>Tahun</label>

                    <input type="number"
                           name="tahun"
                           value="{{ $data->tahun }}"
                           class="form-control">

                </div>

                <div class="col-md-8">

                    <label>Kategori Sektor</label>

                    <input type="text"
                           name="kategori_sektor"
                           value="{{ $data->kategori_sektor }}"
                           class="form-control">

                </div>

            </div>

            <div class="mt-3">

                <label>Jenis Pekerjaan</label>

                <input type="text"
                       name="jenis_pekerjaan"
                       value="{{ $data->jenis_pekerjaan }}"
                       class="form-control">

            </div>

            <div class="row mt-3">

                <div class="col-md-4">

                    <input type="number"
                           name="laki_laki"
                           value="{{ $data->laki_laki }}"
                           class="form-control">

                </div>

                <div class="col-md-4">

                    <input type="number"
                           name="perempuan"
                           value="{{ $data->perempuan }}"
                           class="form-control">

                </div>

                <div class="col-md-4">

                    <input type="number"
                           name="total"
                           value="{{ $data->total }}"
                           class="form-control">

                </div>

            </div>

            <button class="btn btn-primary mt-3">

                Update Data

            </button>

        </form>

    </div>

</div>

@stop
