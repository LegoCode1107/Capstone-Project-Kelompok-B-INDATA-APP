@extends('adminlte::page')

@section('title', 'Dashboard — INDATA')

@section('content_header')
<div class="indata-page-header">
    <div>
        <h1 class="indata-page-title">Sistem Informasi Desa Tanjung Tengah</h1>
        <p class="indata-page-sub">Visualisasi & Monitoring Data — Desa Tanjung Tengah</p>
    </div>
    <div>
        <a href="{{ route('export.all.sectors') }}" class="indata-btn-export">
            <i class="fas fa-file-excel"></i> Export 5 Sektor (.XLSX)
        </a>
    </div>
</div>
@stop

@section('content')

{{-- ===== STAT CARDS ===== --}}
<div class="row indata-stats-row">

    <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
        <div class="indata-stat-card">
            <div class="indata-stat-icon indata-icon-blue">
                <i class="fas fa-road"></i>
            </div>
            <div class="indata-stat-val">{{ $totalData ?? 0 }}</div>
            <div class="indata-stat-label">Data Infrastruktur</div>
            <div class="indata-stat-desc">Fasilitas umum fisik desa</div>
            <div class="indata-stat-foot">
                Sektor Prasarana <i class="fas fa-arrow-right ml-1"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
        <div class="indata-stat-card">
            <div class="indata-stat-icon indata-icon-green">
                <i class="fas fa-building"></i>
            </div>
            <div class="indata-stat-val">{{ $totalSektor ?? 0 }}</div>
            <div class="indata-stat-label">Grup Sektor Fasilitas</div>
            <div class="indata-stat-desc">Kategori kluster fasilitas</div>
            <div class="indata-stat-foot">
                Kategori Unit <i class="fas fa-arrow-right ml-1"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
        <div class="indata-stat-card">
            <div class="indata-stat-icon indata-icon-amber">
                <i class="fas fa-users"></i>
            </div>
            <div class="indata-stat-val">{{ $totalPenduduk ?? '2.706' }}</div>
            <div class="indata-stat-label">Total Jiwa Penduduk</div>
            <div class="indata-stat-desc">Data sensus agregat terakhir</div>
            <div class="indata-stat-foot">
                Kependudukan & Sosial <i class="fas fa-arrow-right ml-1"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
        <div class="indata-stat-card">
            <div class="indata-stat-icon indata-icon-red">
                <i class="fas fa-chart-line"></i>
            </div>
            <div class="indata-stat-val">{{ $totalKomoditas ?? '10' }}</div>
            <div class="indata-stat-label">Komoditas & Pekerjaan</div>
            <div class="indata-stat-desc">Sektor pangan & mata pencaharian</div>
            <div class="indata-stat-foot">
                Ekonomi Desa <i class="fas fa-arrow-right ml-1"></i>
            </div>
        </div>
    </div>

</div>

{{-- ===== CHART + FILTER ===== --}}
<div class="row mb-4">

    <div class="col-lg-8 mb-4 mb-lg-0">
        <div class="indata-card h-100">
            <div class="indata-card-head">
                <div class="indata-card-title">
                    <div class="indata-card-icon-wrap">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    Grafik Perkembangan Volume Sektor
                </div>
                <button type="button" class="indata-collapse-btn" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
            <div class="indata-card-body">
                <div style="position:relative; height:260px; width:100%">
                    <canvas id="chartSektorDesa"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="indata-card h-100">
            <div class="indata-card-head">
                <div class="indata-card-title">
                    <div class="indata-card-icon-wrap">
                        <i class="fas fa-sliders-h"></i>
                    </div>
                    Quick Filter Data
                </div>
            </div>
            <div class="indata-card-body d-flex flex-column justify-content-center">
                <div class="indata-filter-group">
                    <label class="indata-filter-label">Saring berdasarkan tahun</label>
                    <select id="filterTahun" class="indata-select">
                        <option value="">-- Semua Tahun --</option>
                        <option value="2025">2025</option>
                        <option value="2024">2024</option>
                    </select>
                </div>
                <div class="indata-filter-group mb-0">
                    <label class="indata-filter-label">Pilih kluster sektor</label>
                    <select id="filterSektor" class="indata-select">
                        <option value="">-- Semua Sektor --</option>
                        <option value="Sumber Air Bersih">Sumber Air Bersih</option>
                        <option value="Sanitasi">Sanitasi</option>
                        <option value="Prasarana Kesehatan">Prasarana Kesehatan</option>
                        <option value="Prasarana Pendidikan">Prasarana Pendidikan</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- ===== TABEL DATA ===== --}}
<div class="indata-card">
    <div class="indata-card-head">
        <div class="indata-card-title">
            <div class="indata-card-icon-wrap">
                <i class="fas fa-table"></i>
            </div>
            Rincian Data Infrastruktur Terintegrasi
        </div>
    </div>
    <div class="indata-card-body p-0">
        <div class="table-responsive">
            <table id="tblData" class="table indata-table mb-0">
                <thead>
                    <tr>
                        <th>Tahun</th>
                        <th>Sektor</th>
                        <th>Indikator</th>
                        <th>Satuan</th>
                        <th class="text-center">Nilai Kuantitatif</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($infrastruktur as $item)
                    <tr>
                        <td>
                            <span class="indata-year-badge">{{ $item->tahun }}</span>
                        </td>
                        <td>
                            <span class="indata-sector-badge">{{ $item->sektor_fasilitas }}</span>
                        </td>
                        <td class="indata-td-main">{{ $item->indikator_infrastruktur }}</td>
                        <td><code class="indata-code">{{ $item->satuan }}</code></td>
                        <td class="text-center indata-td-val">
                            {{ $item->nilai_kuantititaf ?? $item->nilai_kuantitatif ?? '-' }}
                        </td>
                        <td>
                            @if(isset($item->nilai_kualitatif) && trim($item->nilai_kualitatif) != '')
                                @php $kual = strtolower($item->nilai_kualitatif); @endphp
                                <span class="indata-status-badge {{ ($kual == 'baik' || $kual == 'ya') ? 'indata-badge-ok' : 'indata-badge-warn' }}">
                                    {{ $item->nilai_kualitatif }}
                                </span>
                            @else
                                <span class="text-muted">—</span>
                            @endif
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
    /* ====== PAGE BACKGROUND ====== */
    .content-wrapper {
        background: #f5f6fa !important;
    }

    /* ====== PAGE HEADER ====== */
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

    .indata-btn-export {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #1e2a4a;
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

    .indata-btn-export:hover {
        background: #2a3a60;
        color: #fff !important;
        text-decoration: none;
    }

    /* ====== STAT CARDS ====== */
    .indata-stat-card {
        background: #ffffff;
        border: 1px solid #e8eaf0;
        border-radius: 14px;
        padding: 20px;
        height: 100%;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .indata-stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 24px rgba(0,0,0,0.07);
    }

    .indata-stat-icon {
        width: 44px;
        height: 44px;
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        margin-bottom: 14px;
    }

    .indata-icon-blue  { background: #eef1fd; color: #4e73df; }
    .indata-icon-green { background: #eaf6f0; color: #1aab6d; }
    .indata-icon-amber { background: #fef3e2; color: #e08c00; }
    .indata-icon-red   { background: #fdeaea; color: #e04040; }

    .indata-stat-val {
        font-size: 30px;
        font-weight: 700;
        color: #1e293b;
        line-height: 1;
        font-family: 'Segoe UI', sans-serif;
    }

    .indata-stat-label {
        font-size: 13px;
        font-weight: 600;
        color: #334155;
        margin: 8px 0 3px;
    }

    .indata-stat-desc {
        font-size: 11.5px;
        color: #94a3b8;
    }

    .indata-stat-foot {
        margin-top: 16px;
        padding-top: 12px;
        border-top: 1px solid #f0f2f7;
        font-size: 12px;
        color: #4e73df;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    /* ====== CARDS ====== */
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

    .indata-card-body {
        padding: 20px;
    }

    .indata-collapse-btn {
        background: transparent;
        border: 1px solid #e2e8f0;
        border-radius: 7px;
        width: 28px;
        height: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #94a3b8;
        font-size: 12px;
        cursor: pointer;
        transition: background 0.15s;
    }

    .indata-collapse-btn:hover {
        background: #f1f5f9;
        color: #4e73df;
    }

    /* ====== FILTER ====== */
    .indata-filter-group {
        margin-bottom: 16px;
    }

    .indata-filter-label {
        display: block;
        font-size: 12px;
        font-weight: 600;
        color: #64748b;
        margin-bottom: 6px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .indata-select {
        width: 100%;
        padding: 9px 14px;
        border: 1px solid #e2e8f0;
        border-radius: 9px;
        font-size: 13.5px;
        color: #334155;
        background: #f8fafc;
        appearance: none;
        transition: border-color 0.15s;
    }

    .indata-select:focus {
        border-color: #4e73df;
        outline: none;
        background: #fff;
    }

    /* ====== TABLE ====== */
    .indata-table thead tr {
        background: #f8fafc;
    }

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

    .indata-table tbody tr {
        transition: background 0.12s;
    }

    .indata-table tbody tr:hover {
        background: #f8fafc;
    }

    .indata-table tbody td {
        padding: 13px 16px;
        border-bottom: 1px solid #f8fafc;
        font-size: 13.5px;
        color: #334155;
        vertical-align: middle;
    }

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
        white-space: nowrap;
    }

    .indata-td-main {
        color: #1e293b;
        font-weight: 500;
    }

    .indata-td-val {
        font-weight: 700;
        color: #1e293b;
    }

    .indata-code {
        background: #f1f5f9;
        color: #4e73df;
        padding: 2px 8px;
        border-radius: 5px;
        font-size: 12px;
        font-weight: 600;
    }

    .indata-status-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 7px;
        font-size: 12px;
        font-weight: 600;
    }

    .indata-badge-ok   { background: #eaf6f0; color: #0f6e3a; }
    .indata-badge-warn { background: #fef3e2; color: #a06000; }

    /* ====== RESPONSIVE ====== */
    @media (max-width: 576px) {
        .indata-page-header { flex-direction: column; }
        .indata-btn-export  { width: 100%; justify-content: center; }
    }
</style>
@stop

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('chartSektorDesa');
    if (!ctx) return;

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Sumber Air Bersih', 'Sanitasi', 'Prasarana Kesehatan', 'Prasarana Pendidikan', 'Jalan & Jembatan'],
            datasets: [{
                label: 'Volume Data',
                data: [12, 18, 8, 14, 10],
                backgroundColor: [
                    'rgba(78,115,223,0.85)',
                    'rgba(26,171,109,0.85)',
                    'rgba(224,140,0,0.85)',
                    'rgba(78,115,223,0.5)',
                    'rgba(224,64,64,0.75)',
                ],
                borderRadius: 7,
                borderSkipped: false,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#1e2a4a',
                    titleFont: { size: 12, weight: '600', family: 'Segoe UI' },
                    bodyFont:  { size: 12, family: 'Segoe UI' },
                    padding: 10,
                    cornerRadius: 8,
                }
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: {
                        font: { size: 11, family: 'Segoe UI' },
                        color: '#94a3b8',
                        maxRotation: 20,
                    }
                },
                y: {
                    grid: { color: '#f0f2f7', lineWidth: 1 },
                    ticks: {
                        font: { size: 11, family: 'Segoe UI' },
                        color: '#94a3b8',
                        stepSize: 5,
                    },
                    beginAtZero: true,
                }
            }
        }
    });

    // Quick filter (opsional - hubungkan ke DataTable jika perlu)
    document.getElementById('filterTahun')?.addEventListener('change', function () {
        if (window.tblDataTable) window.tblDataTable.column(0).search(this.value).draw();
    });

    document.getElementById('filterSektor')?.addEventListener('change', function () {
        if (window.tblDataTable) window.tblDataTable.column(1).search(this.value).draw();
    });

    // Init DataTable
    if ($.fn.DataTable) {
        window.tblDataTable = $('#tblData').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.19/i18n/Indonesian.json'
            },
            pageLength: 10,
            responsive: true,
        });
    }
});
</script>
@stop
