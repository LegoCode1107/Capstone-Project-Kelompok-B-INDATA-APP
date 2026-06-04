@extends('adminlte::page')

@section('title', 'Kependudukan & Sosial — INDATA')

@section('content_header')
<div class="indata-page-header">
    <div>
        <h1 class="indata-page-title">Kependudukan & Sosial</h1>
        <p class="indata-page-sub">Manajemen data kependudukan dan sosial desa</p>
    </div>
    <a href="{{ route('kependudukan.create') }}" class="indata-btn-primary">
        <i class="fas fa-plus"></i> Tambah Data
    </a>
</div>
@stop

@section('content')

@if(session('success'))
<div class="indata-alert indata-alert-success">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
    <button type="button" class="indata-alert-close" onclick="this.parentElement.remove()">×</button>
</div>
@endif

@if(session('error'))
<div class="indata-alert indata-alert-danger">
    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
    <button type="button" class="indata-alert-close" onclick="this.parentElement.remove()">×</button>
</div>
@endif

<div class="indata-card">
    <div class="indata-card-head">
        <div class="indata-card-title">
            <div class="indata-card-icon-wrap"><i class="fas fa-users"></i></div>
            Data Kependudukan & Sosial
        </div>
        <div class="indata-card-tools">
            <span class="indata-count-badge">{{ count($data) }} data</span>
        </div>
    </div>

    <div class="indata-card-body p-0">
        <div class="table-responsive">
            <table id="datatable" class="table indata-table mb-0">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Tahun</th>
                        <th>Kategori</th>
                        <th>Indikator</th>
                        <th class="text-center">Laki-Laki</th>
                        <th class="text-center">Perempuan</th>
                        <th class="text-center">Total</th>
                        <th class="text-center" width="140">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td class="indata-td-num">{{ $loop->iteration }}</td>
                        <td><span class="indata-year-badge">{{ $row->tahun }}</span></td>
                        <td><span class="indata-sector-badge">{{ $row->kategori }}</span></td>
                        <td class="indata-td-main">{{ $row->indikator }}</td>
                        <td class="text-center indata-td-val">{{ number_format($row->laki_laki) }}</td>
                        <td class="text-center indata-td-val">{{ number_format($row->perempuan) }}</td>
                        <td class="text-center">
                            <span class="indata-total-badge">{{ number_format($row->total) }}</span>
                        </td>
                        <td class="text-center">
                            <div class="indata-action-group">
                                <a href="{{ route('kependudukan.show', $row->id) }}"
                                   class="indata-btn-action indata-btn-view" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('kependudukan.edit', $row->id) }}"
                                   class="indata-btn-action indata-btn-edit" title="Edit Data">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('kependudukan.destroy', $row->id) }}"
                                      method="POST" style="display:inline"
                                      onsubmit="return confirmDelete(event, '{{ $row->indikator }}')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="indata-btn-action indata-btn-delete" title="Hapus Data">
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
    .content-wrapper { background: #f5f6fa !important; }

    /* Page header */
    .indata-page-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: wrap;
        gap: 12px;
        padding-bottom: 20px;
        margin-bottom: 4px;
        border-bottom: 1px solid #e8eaf0;
    }
    .indata-page-title {
        font-size: 20px;
        font-weight: 700;
        color: #1e293b;
        margin: 0 0 4px;
        font-family: 'Segoe UI', sans-serif;
    }
    .indata-page-sub {
        font-size: 13px;
        color: #94a3b8;
        margin: 0;
    }
    .indata-btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: #4e73df;
        color: #fff !important;
        border: none;
        padding: 9px 18px;
        border-radius: 9px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: background 0.15s;
        white-space: nowrap;
    }
    .indata-btn-primary:hover {
        background: #3a5ec0;
        color: #fff !important;
        text-decoration: none;
    }

    /* Alert */
    .indata-alert {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 16px;
        border-radius: 10px;
        font-size: 13.5px;
        font-weight: 500;
        margin-bottom: 20px;
        position: relative;
    }
    .indata-alert-success { background: #eaf6f0; color: #0f6e3a; border: 1px solid #c6e8d6; }
    .indata-alert-danger  { background: #fdeaea; color: #a32d2d; border: 1px solid #f7c1c1; }
    .indata-alert-close {
        margin-left: auto;
        background: transparent;
        border: none;
        font-size: 18px;
        cursor: pointer;
        color: inherit;
        opacity: 0.6;
        line-height: 1;
        padding: 0 4px;
    }
    .indata-alert-close:hover { opacity: 1; }

    /* Card */
    .indata-card {
        background: #ffffff;
        border: 1px solid #e8eaf0;
        border-radius: 14px;
        overflow: hidden;
    }
    .indata-card-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 16px 20px;
        border-bottom: 1px solid #f0f2f7;
    }
    .indata-card-title {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
        font-weight: 700;
        color: #1e293b;
        font-family: 'Segoe UI', sans-serif;
    }
    .indata-card-icon-wrap {
        width: 30px;
        height: 30px;
        background: #eef1fd;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #4e73df;
        font-size: 13px;
        flex-shrink: 0;
    }
    .indata-card-body { padding: 20px; }
    .indata-count-badge {
        background: #f1f5f9;
        color: #64748b;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    /* Table */
    .indata-table thead tr { background: #f8fafc; }
    .indata-table thead th {
        font-size: 11px;
        font-weight: 700;
        color: #94a3b8;
        letter-spacing: 1px;
        text-transform: uppercase;
        padding: 13px 16px;
        border-bottom: 1px solid #f0f2f7;
        border-top: none;
        white-space: nowrap;
    }
    .indata-table tbody tr { transition: background 0.12s; }
    .indata-table tbody tr:hover { background: #f8fafc; }
    .indata-table tbody td {
        padding: 12px 16px;
        border-bottom: 1px solid #f5f6fa;
        font-size: 13.5px;
        color: #334155;
        vertical-align: middle;
    }
    .indata-table tbody tr:last-child td { border-bottom: none; }

    .indata-td-num  { color: #94a3b8; font-size: 13px; font-weight: 600; }
    .indata-td-main { color: #1e293b; font-weight: 500; }
    .indata-td-val  { font-weight: 600; color: #1e293b; }

    .indata-year-badge {
        background: #eef1fd;
        color: #2a4ab0;
        padding: 3px 10px;
        border-radius: 7px;
        font-size: 12px;
        font-weight: 700;
    }
    .indata-sector-badge {
        background: #f1f5f9;
        color: #334155;
        padding: 4px 10px;
        border-radius: 7px;
        font-size: 12px;
        font-weight: 500;
    }
    .indata-total-badge {
        background: #eef1fd;
        color: #2a4ab0;
        padding: 4px 12px;
        border-radius: 7px;
        font-size: 13px;
        font-weight: 700;
    }

    /* Action buttons */
    .indata-action-group {
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .indata-btn-action {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        border: none;
        cursor: pointer;
        text-decoration: none;
        transition: background 0.15s, transform 0.1s;
    }
    .indata-btn-action:hover { transform: translateY(-1px); text-decoration: none; }
    .indata-btn-view   { background: #e6f1fb; color: #185fa5; }
    .indata-btn-view:hover { background: #cce0f5; color: #0c447c; }
    .indata-btn-edit   { background: #fef3e2; color: #a06000; }
    .indata-btn-edit:hover { background: #fde8bc; color: #7a4800; }
    .indata-btn-delete { background: #fdeaea; color: #a32d2d; }
    .indata-btn-delete:hover { background: #f9cccc; color: #791f1f; }

    /* DataTable override */
    .dataTables_wrapper .dataTables_filter input {
        border: 1px solid #e2e8f0;
        border-radius: 9px;
        padding: 6px 12px;
        font-size: 13px;
        color: #334155;
        background: #f8fafc;
        outline: none;
        margin-left: 8px;
    }
    .dataTables_wrapper .dataTables_filter input:focus {
        border-color: #4e73df;
        background: #fff;
    }
    .dataTables_wrapper .dataTables_length select {
        border: 1px solid #e2e8f0;
        border-radius: 9px;
        padding: 5px 10px;
        font-size: 13px;
        color: #334155;
        background: #f8fafc;
        margin: 0 6px;
    }
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter { font-size: 13px; color: #64748b; padding: 14px 20px; }
    .dataTables_wrapper .dataTables_paginate { padding: 10px 20px; }
    .dataTables_wrapper .paginate_button {
        border-radius: 8px !important;
        font-size: 13px !important;
        padding: 4px 10px !important;
        margin: 0 2px !important;
        border: none !important;
        color: #64748b !important;
    }
    .dataTables_wrapper .paginate_button.current,
    .dataTables_wrapper .paginate_button.current:hover {
        background: #4e73df !important;
        color: #fff !important;
        border: none !important;
    }
    .dataTables_wrapper .paginate_button:hover {
        background: #f1f5f9 !important;
        color: #4e73df !important;
        border: none !important;
    }

    @media (max-width: 576px) {
        .indata-page-header { flex-direction: column; }
        .indata-btn-primary { width: 100%; justify-content: center; }
    }
</style>
@stop

@section('js')
<script>
$(function () {
    $('#datatable').DataTable({
        responsive: true,
        language: {
            search: '',
            searchPlaceholder: 'Cari data...',
            lengthMenu: 'Tampilkan _MENU_ baris',
            info: 'Menampilkan _START_–_END_ dari _TOTAL_ data',
            infoEmpty: 'Tidak ada data',
            zeroRecords: 'Data tidak ditemukan',
            paginate: {
                previous: '‹',
                next: '›',
            }
        },
        pageLength: 10,
        order: [[1, 'desc']],
    });
});

function confirmDelete(e, nama) {
    e.preventDefault();
    const form = e.target;
    if (confirm('Hapus data "' + nama + '"?\nTindakan ini tidak dapat dibatalkan.')) {
        form.submit();
    }
}
</script>
@stop
