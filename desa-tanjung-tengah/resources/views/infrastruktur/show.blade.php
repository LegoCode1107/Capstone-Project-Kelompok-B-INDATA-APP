@extends('adminlte::page')

@section('title', 'Detail Data Infrastruktur & APBDES')

@section('content_header')
    <h1>Detail Data Infrastruktur & APBDES</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Informasi Lengkap Indikator</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover table-striped">
                    <tbody>
                        <tr>
                            <th width="30%">ID Data</th>
                            <td>{{ $data->id }}</td>
                        </tr>
                        <tr>
                            <th>Tahun</th>
                            <td><span class="badge badge-primary font-md">{{ $data->tahun }}</span></td>
                        </tr>
                        <tr>
                            <th>Sektor Fasilitas</th>
                            <td>{{ $data->sektor_fasilitas }}</td>
                        </tr>
                        <tr>
                            <th>Indikator Infrastruktur</th>
                            <td><strong>{{ $data->indikator_infrastruktur }}</strong></td>
                        </tr>
                        <tr>
                            <th>Satuan</th>
                            <td><span class="badge badge-secondary">{{ $data->satuan }}</span></td>
                        </tr>
                        <tr>
                            <th>Nilai Kuantitatif</th>
                            <td>
                                @if($data->nilai_kuantititaf !== null)
                                    @if(str_contains(strtolower($data->satuan), 'rupiah') || str_contains(strtolower($data->satuan), 'rp'))
                                        Rp {{ number_format($data->nilai_kuantititaf, 0, ',', '.') }}
                                    @else
                                        {{ number_format($data->nilai_kuantititaf) }}
                                    @endif
                                @else
                                    <em class="text-muted">Tidak ada data (N/A)</em>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Nilai Kualitatif</th>
                            <td>
                                @if(($data->nilai_kualitatif))
                                    {{ $data->nilai_kualitatif }}
                                @else
                                    <em class="text-muted">Tidak ada data (N/A)</em>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Dibuat Pada</th>
                            <td>{{ $data->created_at ? $data->created_at->format('d F Y H:i') : '-' }}</td>
                        </tr>
                        <tr>
                            <th>Terakhir Diperbarui</th>
                            <td>{{ $data->updated_at ? $data->updated_at->format('d F Y H:i') : '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="{{ route('infrastruktur.edit', $data->id) }}" class="btn btn-warning text-white">
                    <i class="fas fa-edit"></i> Edit Data
                </a>
                <a href="{{ route('infrastruktur.index') }}" class="btn btn-default float-right">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
</div>
@stop
