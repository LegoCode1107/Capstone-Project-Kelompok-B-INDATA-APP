```php
@extends('adminlte::page')

@section('title', 'Edit Data')

@section('content_header')

<h1>Edit Data Kependudukan</h1>

@stop

@section('content')

<div class="card">

    <div class="card-body">

        <form action="{{ route('kependudukan.update',$data->id) }}"
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

                    <label>Kategori</label>

                    <input type="text"
                           name="kategori"
                           value="{{ $data->kategori }}"
                           class="form-control">

                </div>

            </div>

            <div class="mt-3">

                <label>Indikator</label>

                <input type="text"
                       name="indikator"
                       value="{{ $data->indikator }}"
                       class="form-control">

            </div>

            <div class="row mt-3">

                <div class="col-md-4">

                    <label>Laki-Laki</label>

                    <input type="number"
                           name="laki_laki"
                           value="{{ $data->laki_laki }}"
                           class="form-control">

                </div>

                <div class="col-md-4">

                    <label>Perempuan</label>

                    <input type="number"
                           name="perempuan"
                           value="{{ $data->perempuan }}"
                           class="form-control">

                </div>

                <div class="col-md-4">

                    <label>Total</label>

                    <input type="number"
                           name="total"
                           value="{{ $data->total }}"
                           class="form-control">

                </div>

            </div>

            <button class="btn btn-primary mt-3">

                Update

            </button>

        </form>

    </div>

</div>

@stop

