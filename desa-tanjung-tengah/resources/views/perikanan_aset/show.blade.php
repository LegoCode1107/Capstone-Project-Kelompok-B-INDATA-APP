@extends('adminlte::page')

@section('title','Detail Perikanan & Aset')

@section('content_header')

<h1>
    Detail Data Perikanan & Aset
</h1>

@stop

@section('content')

<div class="card card-info">

    <div class="card-header">

        <h3 class="card-title">

            Informasi Detail

        </h3>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th width="250">Tahun</th>
                <td>{{ $data->tahun }}</td>
            </tr>

            <tr>
                <th>Kelompok Aset</th>
                <td>{{ $data->kelompok_aset }}</td>
            </tr>

            <tr>
                <th>Nama Aset Infrastruktur</th>
                <td>{{ $data->nama_aset_infrastruktur }}</td>
            </tr>

            <tr>
                <th>Satuan Ukuran</th>
                <td>{{ $data->satuan_ukuran }}</td>
            </tr>

            <tr>
                <th>Volume / Jumlah</th>
                <td>{{ $data->volume_jumlah }}</td>
            </tr>

            <tr>
                <th>Dibuat</th>
                <td>{{ $data->created_at }}</td>
            </tr>

            <tr>
                <th>Diupdate</th>
                <td>{{ $data->updated_at }}</td>
            </tr>

        </table>

    </div>

    <div class="card-footer">

        <a href="{{ route('perikanan.index') }}"
           class="btn btn-secondary">

            Kembali

        </a>

    </div>

</div>

@stop
