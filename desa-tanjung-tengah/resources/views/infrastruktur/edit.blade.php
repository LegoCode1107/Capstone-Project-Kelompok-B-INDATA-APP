@extends('adminlte::page')

@section('title', 'Edit Data Infrastruktur & APBDES')

@section('content_header')
    <h1>Edit Data Infrastruktur & APBDES</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title text-white">Form Perubahan Data</h3>
            </div>

            <form action="{{ route('infrastruktur.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="number" name="tahun" id="tahun" class="form-control @error('tahun') is-invalid @enderror" value="{{ old('tahun', $data->tahun) }}" required>
                        @error('tahun') <span class="error invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="sektor_fasilitas">Sektor Fasilitas</label>
                        <input type="text" name="sektor_fasilitas" id="sektor_fasilitas" class="form-control @error('sektor_fasilitas') is-invalid @enderror" value="{{ old('sektor_fasilitas', $data->sektor_fasilitas) }}" required>
                        @error('sektor_fasilitas') <span class="error invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="indikator_infrastruktur">Indikator Infrastruktur</label>
                        <input type="text" name="indikator_infrastruktur" id="indikator_infrastruktur" class="form-control @error('indikator_infrastruktur') is-invalid @enderror" value="{{ old('indikator_infrastruktur', $data->indikator_infrastruktur) }}" required>
                        @error('indikator_infrastruktur') <span class="error invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <input type="text" name="satuan" id="satuan" class="form-control @error('satuan') is-invalid @enderror" value="{{ old('satuan', $data->satuan) }}" required>
                        @error('satuan') <span class="error invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="nilai_kuantititaf">Nilai Kuantitatif</label>
                        <input type="number" step="any" name="nilai_kuantititaf" id="nilai_kuantititaf" class="form-control" value="{{ old('nilai_kuantititaf', $data->nilai_kuantititaf) }}">
                    </div>

                    <div class="form-group">
                        <label for="nilai_kualitatif">Nilai Kualitatif</label>
                        <input type="text" name="nilai_kualitatif" id="nilai_kualitatif" class="form-control" value="{{ old('nilai_kualitatif', $data->nilai_kualitatif) }}">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-warning text-white">Perbarui</button>
                    <a href="{{ route('infrastruktur.index') }}" class="btn btn-default float-right">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
