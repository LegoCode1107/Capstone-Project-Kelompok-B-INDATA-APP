@extends('adminlte::page')

@section('title', 'Detail Produksi Pangan')

@section('content_header')
<h1>Detail Produksi Pangan</h1>
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
                <th>Sektor</th>
                <td>{{ $data->sektor }}</td>
            </tr>

            <tr>
                <th>Komoditas</th>
                <td>{{ $data->komoditas }}</td>
            </tr>

            <tr>
                <th>Luas Lahan</th>
                <td>{{ $data->luas_ha }} Ha</td>
            </tr>

            <tr>
                <th>Produksi</th>
                <td>{{ number_format($data->hasil_produksi,2) }}</td>
            </tr>

            <tr>
                <th>Nilai Produksi</th>
                <td>Rp {{ number_format($data->nilai_produksi) }}</td>
            </tr>

            <tr>
                <th>Biaya Pupuk</th>
                <td>Rp {{ number_format($data->biaya_pupuk) }}</td>
            </tr>

            <tr>
                <th>Biaya Bibit</th>
                <td>Rp {{ number_format($data->biaya_bibit) }}</td>
            </tr>

            <tr>
                <th>Biaya Obat</th>
                <td>Rp {{ number_format($data->biaya_obat) }}</td>
            </tr>

            <tr>
                <th>Biaya Lainnya</th>
                <td>Rp {{ number_format($data->biaya_lainnya) }}</td>
            </tr>

        </table>

    </div>

</div>

@stop
