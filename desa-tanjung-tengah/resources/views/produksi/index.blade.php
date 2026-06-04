@extends('adminlte::page')

@section('title', 'Produksi Pangan')

@section('content_header')

<div class="row mb-3">

    <div class="col-md-6">

        <h1>
            <i class="fas fa-seedling text-success"></i>
            Produksi Pangan
        </h1>

    </div>

    <div class="col-md-6 text-right">

        <a href="{{ route('produksi.create') }}"
           class="btn btn-success">

            <i class="fas fa-plus"></i>
            Tambah Data

        </a>

    </div>

</div>

@stop

@section('content')

@if(session('success'))

<div class="alert alert-success alert-dismissible">

    <button type="button"
            class="close"
            data-dismiss="alert">

        <span>&times;</span>

    </button>

    {{ session('success') }}

</div>

@endif

<div class="card card-outline card-success">

    <div class="card-header">

        <h3 class="card-title">

            Data Produksi Pangan Desa Tanjung Tengah

        </h3>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table id="datatable"
                   class="table table-bordered table-striped">

                <thead>

                    <tr>

                        <th width="50">No</th>
                        <th>Tahun</th>
                        <th>Sektor</th>
                        <th>Komoditas</th>
                        <th>Luas (Ha)</th>
                        <th>Produksi</th>
                        <th>Nilai Produksi</th>
                        <th width="150">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($data as $row)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $row->tahun }}</td>

                        <td>{{ $row->sektor }}</td>

                        <td>{{ $row->komoditas }}</td>

                        <td>{{ $row->luas_ha ?? 0 }}</td>

                        <td>{{ $row->hasil_produksi ?? 0 }}</td>

                        <td>

                            Rp {{ number_format($row->nilai_produksi ?? 0,0,',','.') }}

                        </td>

                        <td>

                            <a href="{{ route('produksi.show',$row->id) }}"
                               class="btn btn-info btn-sm">

                                <i class="fas fa-eye"></i>

                            </a>

                            <a href="{{ route('produksi.edit',$row->id) }}"
                               class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i>

                            </a>

                            <form action="{{ route('produksi.destroy',$row->id) }}"
                                  method="POST"
                                  style="display:inline-block">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin hapus data ini?')">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8"
                            class="text-center">

                            Belum ada data

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@stop

@section('js')

<script>

$(document).ready(function(){

    if ($.fn.DataTable.isDataTable('#datatable')) {

        $('#datatable').DataTable().destroy();

    }

    $('#datatable').DataTable({

        responsive: true,

        autoWidth: false,

        pageLength: 10,

        language: {

            search: "Cari :",

            lengthMenu: "Tampilkan _MENU_ data",

            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",

            zeroRecords: "Data tidak ditemukan",

            paginate: {

                previous: "Sebelumnya",

                next: "Berikutnya"

            }

        }

    });

});

</script>

@stop
