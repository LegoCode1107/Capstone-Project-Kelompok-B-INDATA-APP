@extends('adminlte::page')

@section('title', 'Perikanan & Aset')

@section('content_header')

<div class="row">

    <div class="col-md-6">

        <h1>

            <i class="fas fa-fish text-primary"></i>

            Data Perikanan & Aset Infrastruktur

        </h1>

    </div>

    <div class="col-md-6 text-right">

        <a href="{{ route('perikanan.create') }}"
           class="btn btn-success">

            <i class="fas fa-plus-circle"></i>

            Tambah Data

        </a>

    </div>

</div>

@stop

@section('content')

@if(session('success'))

<div class="alert alert-success alert-dismissible fade show">

    <button type="button"
            class="close"
            data-dismiss="alert">

        <span>&times;</span>

    </button>

    <i class="fas fa-check-circle"></i>

    {{ session('success') }}

</div>

@endif

<div class="card card-outline card-primary">

    <div class="card-header">

        <h3 class="card-title">

            <i class="fas fa-table"></i>

            Data Perikanan & Aset Infrastruktur Desa Tanjung Tengah

        </h3>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table id="datatable"
                   class="table table-bordered table-striped table-hover">

                <thead>

                    <tr>

                        <th width="50">No</th>

                        <th width="100">Tahun</th>

                        <th>Kelompok Aset</th>

                        <th>Nama Aset Infrastruktur</th>

                        <th width="150">Satuan Ukuran</th>

                        <th width="150">Volume / Jumlah</th>

                        <th width="180">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($data as $row)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $row->tahun }}
                        </td>

                        <td>
                            {{ $row->kelompok_aset }}
                        </td>

                        <td>
                            {{ $row->nama_aset_infrastruktur }}
                        </td>

                        <td>
                            {{ $row->satuan_ukuran ?? '-' }}
                        </td>

                        <td>
                            {{ number_format($row->volume_jumlah ?? 0,2) }}
                        </td>

                        <td>

                            <a href="{{ route('perikanan.show',$row->id) }}"
                               class="btn btn-info btn-sm">

                                <i class="fas fa-eye"></i>

                            </a>

                            <a href="{{ route('perikanan.edit',$row->id) }}"
                               class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i>

                            </a>

                            <form action="{{ route('perikanan.destroy',$row->id) }}"
                                  method="POST"
                                  style="display:inline-block">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">

                                    <i class="fas fa-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7"
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

$(function () {

    $('#datatable').DataTable({

        responsive: true,

        autoWidth: false,

        pageLength: 10,

        language: {

            search: "Cari :",

            lengthMenu: "Tampilkan _MENU_ data",

            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",

            zeroRecords: "Data tidak ditemukan",

            emptyTable: "Belum ada data",

            paginate: {

                previous: "Sebelumnya",

                next: "Berikutnya"

            }

        }

    });

});

</script>

@stop
