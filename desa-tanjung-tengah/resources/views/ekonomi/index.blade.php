@extends('adminlte::page')

@section('title', 'Ekonomi & Pekerjaan')

@section('content_header')
<div class="indata-page-header">

    <div>
        <h1 class="indata-page-title">
            <i class="fas fa-briefcase mr-2"></i>
            Ekonomi & Pekerjaan
        </h1>

        <p class="indata-page-sub">
            Data sektor ekonomi dan pekerjaan masyarakat desa
        </p>
    </div>

    <a href="{{ route('ekonomi.create') }}"
       class="indata-btn-primary">

        <i class="fas fa-plus"></i>
        Tambah Data

    </a>

</div>
@stop

@section('content')

@if(session('success'))

<div class="indata-alert indata-alert-success">

    <i class="fas fa-check-circle"></i>

    {{ session('success') }}

    <button type="button"
            class="indata-alert-close"
            onclick="this.parentElement.remove()">
        ×
    </button>

</div>

@endif

<div class="indata-card">

    <div class="indata-card-head">

        <div class="indata-card-title">

            <div class="indata-card-icon-wrap">
                <i class="fas fa-chart-line"></i>
            </div>

            Data Ekonomi & Pekerjaan

        </div>

        <span class="indata-count-badge">
            {{ count($data) }} Data
        </span>

    </div>

    <div class="indata-card-body p-0">

        <div class="table-responsive">

            <table id="datatable"
                   class="table indata-table mb-0">

                <thead>

                <tr>

                    <th width="50">No</th>
                    <th>Tahun</th>
                    <th>Kategori</th>
                    <th>Jenis Pekerjaan</th>
                    <th>Laki-Laki</th>
                    <th>Perempuan</th>
                    <th>Total</th>
                    <th width="150">Aksi</th>

                </tr>

                </thead>

                <tbody>

                @foreach($data as $row)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>

                            <span class="indata-year-badge">
                                {{ $row->tahun }}
                            </span>

                        </td>

                        <td>

                            <span class="indata-sector-badge">
                                {{ $row->kategori_sektor }}
                            </span>

                        </td>

                        <td class="font-weight-semibold">
                            {{ $row->jenis_pekerjaan }}
                        </td>

                        <td>
                            {{ number_format($row->laki_laki) }}
                        </td>

                        <td>
                            {{ number_format($row->perempuan) }}
                        </td>

                        <td>

                            <span class="indata-total-badge">
                                {{ number_format($row->total) }}
                            </span>

                        </td>

                        <td>

                            <div class="indata-action-group">

                                <a href="{{ route('ekonomi.show',$row->id) }}"
                                   class="indata-btn-action indata-btn-view">

                                    <i class="fas fa-eye"></i>

                                </a>

                                <a href="{{ route('ekonomi.edit',$row->id) }}"
                                   class="indata-btn-action indata-btn-edit">

                                    <i class="fas fa-edit"></i>

                                </a>

                                <form action="{{ route('ekonomi.destroy',$row->id) }}"
                                      method="POST"
                                      style="display:inline"
                                      onsubmit="return confirmDelete(event)">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="indata-btn-action indata-btn-delete">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @endforeach

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
    font-size:22px;
    font-weight:700;
    color:#1e293b;
    margin:0;
}

.indata-page-sub{
    color:#94a3b8;
    font-size:13px;
    margin-top:4px;
}

/* Button */

.indata-btn-primary{
    background:#4e73df;
    color:white !important;
    border:none;
    padding:10px 18px;
    border-radius:10px;
    text-decoration:none;
    font-weight:600;
}

.indata-btn-primary:hover{
    background:#3a5ec0;
}

/* Card */

.indata-card{
    background:white;
    border:1px solid #e8eaf0;
    border-radius:14px;
    overflow:hidden;
}

.indata-card-head{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:18px 22px;
    border-bottom:1px solid #edf2f7;
}

.indata-card-title{
    display:flex;
    align-items:center;
    gap:10px;
    font-weight:700;
}

.indata-card-icon-wrap{
    width:34px;
    height:34px;
    border-radius:10px;
    background:#eef1fd;
    color:#4e73df;
    display:flex;
    justify-content:center;
    align-items:center;
}

.indata-count-badge{
    background:#eef1fd;
    color:#2a4ab0;
    padding:6px 12px;
    border-radius:8px;
    font-size:12px;
    font-weight:700;
}

/* Table */

.indata-table thead{
    background:#f8fafc;
}

.indata-table thead th{
    border:none;
    color:#64748b;
    font-size:12px;
    font-weight:700;
}

.indata-table tbody td{
    vertical-align:middle;
}

/* Badge */

.indata-year-badge{
    background:#eef1fd;
    color:#2a4ab0;
    padding:6px 10px;
    border-radius:8px;
    font-weight:700;
}

.indata-sector-badge{
    background:#f1f5f9;
    color:#334155;
    padding:6px 10px;
    border-radius:8px;
}

.indata-total-badge{
    background:#dcfce7;
    color:#166534;
    padding:6px 10px;
    border-radius:8px;
    font-weight:700;
}

/* Action */

.indata-action-group{
    display:flex;
    gap:6px;
}

.indata-btn-action{
    width:34px;
    height:34px;
    border-radius:8px;
    display:flex;
    align-items:center;
    justify-content:center;
    text-decoration:none;
    border:none;
}

.indata-btn-view{
    background:#e0f2fe;
    color:#0284c7;
}

.indata-btn-edit{
    background:#fef3c7;
    color:#d97706;
}

.indata-btn-delete{
    background:#fee2e2;
    color:#dc2626;
}

/* Alert */

.indata-alert{
    display:flex;
    align-items:center;
    gap:10px;
    padding:15px;
    border-radius:10px;
    margin-bottom:20px;
}

.indata-alert-success{
    background:#dcfce7;
    color:#166534;
}

.indata-alert-close{
    margin-left:auto;
    background:none;
    border:none;
    font-size:18px;
}

/* DataTable */

.dataTables_wrapper{
    padding:15px;
}

.dataTables_filter input{
    border-radius:8px !important;
}

</style>
@stop

@section('js')
<script>

$(function () {

    $('#datatable').DataTable({
        responsive:true,
        autoWidth:false,
        pageLength:10
    });

});

function confirmDelete(e){

    if(!confirm('Yakin hapus data ini?')){
        e.preventDefault();
        return false;
    }

    return true;
}

</script>
@stop
