@extends('adminlte::page')

@section('title', 'Produksi Pangan')

@section('content_header')
<div class="indata-page-header">

    <div>
        <h1 class="indata-page-title">
            Produksi Pangan
        </h1>

        <p class="indata-page-sub">
            Data produksi pangan Desa Tanjung Tengah
        </p>
    </div>

    <a href="{{ route('produksi.create') }}"
       class="indata-btn-primary">

        <i class="fas fa-plus"></i>
        Tambah Data

    </a>

</div>
@stop

@section('content')

@if(session('success'))

<div class="indata-alert indata-alert-success">

    <i class="fas fa-check-circle mr-2"></i>

    <div>
        {{ session('success') }}
    </div>

</div>

@endif

<div class="indata-card">

    <div class="indata-card-head">

        <div class="indata-card-title">

            <div class="indata-card-icon-wrap">

                <i class="fas fa-seedling"></i>

            </div>

            Data Produksi Pangan

        </div>

    </div>

    <div class="indata-card-body">

        <div class="table-responsive">

            <table id="datatable"
                   class="table indata-table">

                <thead>

                    <tr>

                        <th width="60">No</th>
                        <th>Tahun</th>
                        <th>Sektor</th>
                        <th>Komoditas</th>
                        <th>Luas (Ha)</th>
                        <th>Produksi</th>
                        <th>Nilai Produksi</th>
                        <th width="180">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($data as $row)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>
                            <span class="indata-year-badge">
                                {{ $row->tahun }}
                            </span>
                        </td>

                        <td>{{ $row->sektor }}</td>

                        <td>
                            <strong>{{ $row->komoditas }}</strong>
                        </td>

                        <td>
                            {{ number_format($row->luas_ha ?? 0,2,',','.') }}
                        </td>

                        <td>
                            {{ number_format($row->hasil_produksi ?? 0,2,',','.') }}
                        </td>

                        <td>

                            <span class="indata-money-badge">

                                Rp {{ number_format($row->nilai_produksi ?? 0,0,',','.') }}

                            </span>

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

                        <td colspan="8" class="text-center text-muted">

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

@section('css')
<style>

.content-wrapper{
    background:#f5f6fa !important;
}

/* Header */

.indata-page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap:wrap;
    gap:15px;
    margin-bottom:20px;
}

.indata-page-title{
    margin:0;
    font-size:22px;
    font-weight:700;
    color:#1e293b;
}

.indata-page-sub{
    margin:4px 0 0;
    font-size:13px;
    color:#94a3b8;
}

/* Card */

.indata-card{
    background:#fff;
    border:1px solid #e8eaf0;
    border-radius:14px;
    overflow:hidden;
}

.indata-card-head{
    padding:18px 22px;
    border-bottom:1px solid #edf2f7;
}

.indata-card-title{
    display:flex;
    align-items:center;
    gap:10px;
    font-size:15px;
    font-weight:700;
    color:#1e293b;
}

.indata-card-icon-wrap{
    width:36px;
    height:36px;
    border-radius:10px;
    background:#eef1fd;
    color:#4e73df;
    display:flex;
    justify-content:center;
    align-items:center;
}

.indata-card-body{
    padding:22px;
}

/* Table */

.indata-table{
    margin-bottom:0;
}

.indata-table thead th{
    background:#f8fafc;
    color:#475569;
    font-weight:700;
    border-bottom:2px solid #e2e8f0;
}

.indata-table td{
    vertical-align:middle;
}

/* Badge */

.indata-year-badge{
    background:#eef1fd;
    color:#2a4ab0;
    padding:5px 10px;
    border-radius:8px;
    font-weight:700;
}

.indata-money-badge{
    background:#dcfce7;
    color:#166534;
    padding:6px 12px;
    border-radius:8px;
    font-weight:700;
}

/* Buttons */

.indata-btn-primary{
    background:#4e73df;
    color:white !important;
    border-radius:10px;
    padding:10px 18px;
    text-decoration:none;
    font-weight:600;
}

.indata-btn-primary:hover{
    background:#3a5ec0;
}

/* Alert */

.indata-alert{
    display:flex;
    align-items:center;
    gap:10px;
    padding:14px 18px;
    border-radius:10px;
    margin-bottom:20px;
}

.indata-alert-success{
    background:#dcfce7;
    border:1px solid #bbf7d0;
    color:#166534;
}

</style>
@stop

@section('js')
<script>

$(function () {

    if ($.fn.DataTable.isDataTable('#datatable')) {
        $('#datatable').DataTable().destroy();
    }

    $('#datatable').DataTable({
        responsive:true,
        autoWidth:false,
        pageLength:10,
        language:{
            search:"Cari :",
            lengthMenu:"Tampilkan _MENU_ data",
            info:"Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            zeroRecords:"Data tidak ditemukan",
            emptyTable:"Belum ada data",
            paginate:{
                previous:"Sebelumnya",
                next:"Berikutnya"
            }
        }
    });

});

</script>
@stop
