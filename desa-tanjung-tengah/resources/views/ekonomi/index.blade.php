@extends('adminlte::page')

@section('title', 'Ekonomi & Pekerjaan')

@section('content_header')

<div class="d-flex justify-content-between align-items-center">

    <h1>
        <i class="fas fa-briefcase"></i>
        Ekonomi & Pekerjaan
    </h1>

    <a href="{{ route('ekonomi.create') }}"
       class="btn btn-primary">

        <i class="fas fa-plus"></i>
        Tambah Data

    </a>

</div>

@stop

@section('content')

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<div class="card shadow">

    <div class="card-body">

        <table id="datatable"
               class="table table-bordered table-striped">

            <thead>

            <tr>

                <th>No</th>
                <th>Tahun</th>
                <th>Kategori</th>
                <th>Jenis Pekerjaan</th>
                <th>L</th>
                <th>P</th>
                <th>Total</th>
                <th width="180">Aksi</th>

            </tr>

            </thead>

            <tbody>

            @foreach($data as $row)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $row->tahun }}</td>

                    <td>{{ $row->kategori_sektor }}</td>

                    <td>{{ $row->jenis_pekerjaan }}</td>

                    <td>{{ $row->laki_laki }}</td>

                    <td>{{ $row->perempuan }}</td>

                    <td>{{ $row->total }}</td>

                    <td>

                        <a href="{{ route('ekonomi.show',$row->id) }}"
                           class="btn btn-info btn-sm">

                            <i class="fas fa-eye"></i>

                        </a>

                        <a href="{{ route('ekonomi.edit',$row->id) }}"
                           class="btn btn-warning btn-sm">

                            <i class="fas fa-edit"></i>

                        </a>

                        <form action="{{ route('ekonomi.destroy',$row->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin hapus data?')">

                                <i class="fas fa-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>

@stop

@section('js')

<script>

$(function () {

    $('#datatable').DataTable({
        responsive: true,
        autoWidth: false
    });

});

</script>

@stop
