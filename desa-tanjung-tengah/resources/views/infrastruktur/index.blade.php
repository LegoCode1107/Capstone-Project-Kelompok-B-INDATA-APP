@extends('adminlte::page')

@section('title', 'Infrastruktur & APBDES')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Infrastruktur & APBDES</h1>
    <a href="{{ route('infrastruktur.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Data
    </a>
</div>
@stop

@section('content')

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="card">
    <div class="card-body">
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="50">No</th>
                    <th>Tahun</th>
                    <th>Sektor Fasilitas</th>
                    <th>Indikator Infrastruktur</th>
                    <th>Satuan</th>
                    <th>Nilai Kuantitatif</th>
                    <th>Nilai Kualitatif</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($datas as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->tahun }}</td>
                    <td>{{ $row->sektor_fasilitas }}</td>
                    <td>{{ $row->indikator_infrastruktur }}</td>
                    <td><span class="badge badge-secondary">{{ $row->satuan }}</span></td>
                    <td>
                        @if($row->nilai_kuantititaf !== null)
                            {{-- Jika satuannya Rupiah, otomatis diformat ke format uang --}}
                            @if(str_contains(strtolower($row->satuan), 'rupiah') || str_contains(strtolower($row->satuan), 'rp'))
                                Rp {{ number_format($row->nilai_kuantititaf, 0, ',', '.') }}
                            @else
                                {{ number_format($row->nilai_kuantititaf) }}
                            @endif
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $row->nilai_kualitatif ?? '-' }}</td>
                    <td>
                        <a href="{{ route('infrastruktur.show', $row->id) }}" class="btn btn-info btn-sm" title="Detail">
                            <i class="fas fa-eye"></i>
                        </a>

                        <a href="{{ route('infrastruktur.edit', $row->id) }}" class="btn btn-warning btn-sm" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form action="{{ route('infrastruktur.destroy', $row->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
        "responsive": true,
        "autoWidth": false,
    });
});
</script>
@stop
