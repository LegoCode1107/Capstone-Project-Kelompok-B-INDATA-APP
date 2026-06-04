```php
@extends('adminlte::page')

@section('title', 'Detail Data')

@section('content_header')

<h1>Detail Kependudukan</h1>

@stop

@section('content')

<div class="card">

    <div class="card-body">

        <table class="table">

            <tr>
                <th>Tahun</th>
                <td>{{ $data->tahun }}</td>
            </tr>

            <tr>
                <th>Kategori</th>
                <td>{{ $data->kategori }}</td>
            </tr>

            <tr>
                <th>Indikator</th>
                <td>{{ $data->indikator }}</td>
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

    </div>

</div>

@stop
```
