@extends('adminlte::page')

@section('title', 'Infrastruktur & APBDES')

@section('content_header')
<div class="indata-page-header">
    <div>
        <h1 class="indata-page-title">Infrastruktur & APBDES</h1>
        <p class="indata-page-sub">
            Manajemen data infrastruktur dan APBDES desa
        </p>
    </div>

    <a href="{{ route('infrastruktur.create') }}"
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

@if(session('error'))
<div class="indata-alert indata-alert-danger">
    <i class="fas fa-exclamation-circle"></i>

    {{ session('error') }}

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
                <i class="fas fa-road"></i>
            </div>

            Data Infrastruktur & APBDES

        </div>

        <div>
            <span class="indata-count-badge">
                {{ count($datas) }} Data
            </span>
        </div>

    </div>

    <div class="indata-card-body p-0">

        <div class="table-responsive">

            <table id="datatable"
                   class="table indata-table mb-0">

                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Tahun</th>
                        <th>Sektor Fasilitas</th>
                        <th>Indikator Infrastruktur</th>
                        <th>Satuan</th>
                        <th class="text-center">Nilai Kuantitatif</th>
                        <th>Nilai Kualitatif</th>
                        <th width="150" class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($datas as $row)

                    <tr>

                        <td class="indata-td-num">
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            <span class="indata-year-badge">
                                {{ $row->tahun }}
                            </span>
                        </td>

                        <td>
                            <span class="indata-sector-badge">
                                {{ $row->sektor_fasilitas }}
                            </span>
                        </td>

                        <td class="indata-td-main">
                            {{ $row->indikator_infrastruktur }}
                        </td>

                        <td>
                            <span class="indata-sector-badge">
                                {{ $row->satuan }}
                            </span>
                        </td>

                        <td class="text-center">

                            <span class="indata-total-badge">

                                @if($row->nilai_kuantitatif !== null)

                                    @if(
                                        str_contains(strtolower($row->satuan), 'rupiah')
                                        ||
                                        str_contains(strtolower($row->satuan), 'rp')
                                    )

                                        Rp {{ number_format($row->nilai_kuantitatif, 0, ',', '.') }}

                                    @else

                                        {{ number_format($row->nilai_kuantitatif) }}

                                    @endif

                                @else

                                    -

                                @endif

                            </span>

                        </td>

                        <td>
                            {{ $row->nilai_kualitatif ?? '-' }}
                        </td>

                        <td class="text-center">

                            <div class="indata-action-group">

                                <a href="{{ route('infrastruktur.show',$row->id) }}"
                                   class="indata-btn-action indata-btn-view"
                                   title="Detail">

                                    <i class="fas fa-eye"></i>

                                </a>

                                <a href="{{ route('infrastruktur.edit',$row->id) }}"
                                   class="indata-btn-action indata-btn-edit"
                                   title="Edit">

                                    <i class="fas fa-edit"></i>

                                </a>

                                <form action="{{ route('infrastruktur.destroy',$row->id) }}"
                                      method="POST"
                                      style="display:inline"
                                      onsubmit="return confirmDelete(event,'{{ $row->indikator_infrastruktur }}')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="indata-btn-action indata-btn-delete"
                                            title="Hapus">

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
    align-items:flex-start;
    flex-wrap:wrap;
    gap:12px;
    padding-bottom:20px;
    border-bottom:1px solid #e8eaf0;
}

.indata-page-title{
    font-size:20px;
    font-weight:700;
    color:#1e293b;
    margin:0 0 4px;
}

.indata-page-sub{
    color:#94a3b8;
    font-size:13px;
    margin:0;
}

.indata-btn-primary{
    display:inline-flex;
    align-items:center;
    gap:7px;
    background:#4e73df;
    color:#fff !important;
    border:none;
    padding:9px 18px;
    border-radius:9px;
    font-size:13px;
    font-weight:600;
    text-decoration:none;
}

.indata-btn-primary:hover{
    background:#3a5ec0;
    color:#fff !important;
}

/* Alert */

.indata-alert{
    display:flex;
    align-items:center;
    gap:10px;
    padding:12px 16px;
    border-radius:10px;
    margin-bottom:20px;
    font-size:13px;
    font-weight:500;
}

.indata-alert-success{
    background:#eaf6f0;
    color:#0f6e3a;
    border:1px solid #c6e8d6;
}

.indata-alert-danger{
    background:#fdeaea;
    color:#a32d2d;
    border:1px solid #f7c1c1;
}

.indata-alert-close{
    margin-left:auto;
    background:none;
    border:none;
    font-size:18px;
    cursor:pointer;
}

/* Card */

.indata-card{
    background:#fff;
    border:1px solid #e8eaf0;
    border-radius:14px;
    overflow:hidden;
}

.indata-card-head{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:16px 20px;
    border-bottom:1px solid #f0f2f7;
}

.indata-card-title{
    display:flex;
    align-items:center;
    gap:10px;
    font-size:14px;
    font-weight:700;
    color:#1e293b;
}

.indata-card-icon-wrap{
    width:30px;
    height:30px;
    background:#eef1fd;
    border-radius:8px;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#4e73df;
}

.indata-count-badge{
    background:#f1f5f9;
    color:#64748b;
    padding:4px 12px;
    border-radius:20px;
    font-size:12px;
    font-weight:600;
}

/* Table */

.indata-table thead tr{
    background:#f8fafc;
}

.indata-table thead th{
    font-size:11px;
    font-weight:700;
    color:#94a3b8;
    text-transform:uppercase;
    letter-spacing:1px;
    padding:13px 16px;
    border:none;
}

.indata-table tbody td{
    padding:12px 16px;
    vertical-align:middle;
    border-top:none;
    border-bottom:1px solid #f1f5f9;
}

.indata-table tbody tr:hover{
    background:#f8fafc;
}

.indata-td-main{
    font-weight:500;
    color:#1e293b;
}

.indata-td-num{
    color:#94a3b8;
    font-weight:600;
}

.indata-year-badge{
    background:#eef1fd;
    color:#2a4ab0;
    padding:4px 10px;
    border-radius:7px;
    font-size:12px;
    font-weight:700;
}

.indata-sector-badge{
    background:#f1f5f9;
    color:#334155;
    padding:4px 10px;
    border-radius:7px;
    font-size:12px;
}

.indata-total-badge{
    background:#eef1fd;
    color:#2a4ab0;
    padding:4px 12px;
    border-radius:7px;
    font-size:13px;
    font-weight:700;
}

/* Action */

.indata-action-group{
    display:inline-flex;
    gap:6px;
}

.indata-btn-action{
    width:32px;
    height:32px;
    border:none;
    border-radius:8px;
    display:flex;
    align-items:center;
    justify-content:center;
    text-decoration:none;
}

.indata-btn-view{
    background:#e6f1fb;
    color:#185fa5;
}

.indata-btn-edit{
    background:#fef3e2;
    color:#a06000;
}

.indata-btn-delete{
    background:#fdeaea;
    color:#a32d2d;
}

/* DataTable */

.dataTables_wrapper .dataTables_filter input{
    border:1px solid #e2e8f0;
    border-radius:9px;
    padding:6px 12px;
    background:#f8fafc;
}

.dataTables_wrapper .dataTables_length select{
    border:1px solid #e2e8f0;
    border-radius:9px;
    padding:5px 10px;
}

.dataTables_wrapper .paginate_button.current{
    background:#4e73df !important;
    color:white !important;
    border:none !important;
}

@media(max-width:576px){

    .indata-page-header{
        flex-direction:column;
    }

    .indata-btn-primary{
        width:100%;
        justify-content:center;
    }

}

</style>
@stop

@section('js')
<script>

$(function () {

    $('#datatable').DataTable({
        responsive:true,
        pageLength:10,
        order:[[1,'desc']],
        language:{
            search:'',
            searchPlaceholder:'Cari data...',
            lengthMenu:'Tampilkan _MENU_ baris',
            info:'Menampilkan _START_–_END_ dari _TOTAL_ data',
            infoEmpty:'Tidak ada data',
            zeroRecords:'Data tidak ditemukan',
            paginate:{
                previous:'‹',
                next:'›'
            }
        }
    });

});

function confirmDelete(e,nama){

    e.preventDefault();

    const form = e.target;

    if(confirm('Hapus data "' + nama + '" ?\nTindakan ini tidak dapat dibatalkan.')){
        form.submit();
    }

}

</script>
@stop
