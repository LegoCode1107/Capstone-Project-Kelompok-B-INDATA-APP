@extends('adminlte::page')

@section('title', 'Tambah Data Infrastruktur & APBDES')

@section('content_header')
    <h1>Tambah Data Infrastruktur & APBDES</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Input Data</h3>
            </div>

            <form action="{{ route('infrastruktur.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="number" name="tahun" id="tahun" class="form-control @error('tahun') is-invalid @enderror" value="{{ old('tahun', date('Y')) }}" required>
                        @error('tahun') <span class="error invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="sektor_fasilitas">Sektor Fasilitas</label>
                        <input type="text" name="sektor_fasilitas" id="sektor_fasilitas" class="form-control @error('sektor_fasilitas') is-invalid @enderror" value="{{ old('sektor_fasilitas') }}" placeholder="Contoh: Sumber Air Bersih / Sanitasi" required>
                        @error('sektor_fasilitas') <span class="error invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="indikator_infrastruktur">Indikator Infrastruktur</label>
                        <input type="text" name="indikator_infrastruktur" id="indikator_infrastruktur" class="form-control @error('indikator_infrastruktur') is-invalid @enderror" value="{{ old('indikator_infrastruktur') }}" placeholder="Contoh: Jumlah Sumur Gali / Jumlah Anggaran" required>
                        @error('indikator_infrastruktur') <span class="error invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <input type="text" name="satuan" id="satuan" class="form-control @error('satuan') is-invalid @enderror" value="{{ old('satuan') }}" placeholder="Contoh: Unit / KK / Rupiah (Rp)" required>
                        @error('satuan') <span class="error invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="nilai_kuantititaf">Nilai Kuantitatif <small class="text-muted">(Kosongkan jika data kualitatif)</small></label>
                        <input type="number" step="any" name="nilai_kuantititaf" id="nilai_kuantititaf" class="form-control" value="{{ old('nilai_kuantititaf') }}" placeholder="Contoh: 40 atau 1389199075">
                    </div>

                    <div class="form-group">
                        <label for="nilai_kualitatif">Nilai Kualitatif <small class="text-muted">(Kosongkan jika data kuantitatif)</small></label>
                        <input type="text" name="nilai_kualitatif" id="nilai_kualitatif" class="form-control" value="{{ old('nilai_kualitatif') }}" placeholder="Contoh: Baik / Ya / Tidak">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('infrastruktur.index') }}" class="btn btn-default float-right">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
