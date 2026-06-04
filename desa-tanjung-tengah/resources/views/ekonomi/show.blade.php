@extends('adminlte::page')

@section('title', 'Detail Data')

@section('content_header')

<h1>Detail Ekonomi & Pekerjaan</h1>

@stop

@section('content')

<div class="card">

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th width="250">Tahun</th>
                <td>{{ $data->tahun }}</td>
            </tr>

            <tr>
                <th>Kategori Sektor</th>
                <td>{{ $data->kategori_sektor }}</td>
            </tr>

            <tr>
                <th>Jenis Pekerjaan</th>
                <td>{{ $data->jenis_pekerjaan }}</td>
            </tr>

            <tr>
                <th>Laki-Laki</th>
                <td>{{ $data->laki_laki }}</td>
            </tr>

            <tr>
                <th>Perempuan</th>
                <td>{{ $data->perempuan }}</td>
            </tr>

            <tr>
                <th>Total</th>
                <td>{{ $data->total }}</td>
            </tr>

        </table>

        <a href="{{ route('ekonomi.index') }}"
           class="btn btn-secondary">

            Kembali

        </a>

    </div>

</div>

@stop
