<?php

namespace App\Http\Controllers;

use App\Models\ProduksiPangan;
use Illuminate\Http\Request;

class ProduksiPanganController extends Controller
{
    public function index()
    {
        $data = ProduksiPangan::latest()->get();

        return view(
            'produksi.index',
            compact('data')
        );
    }

    public function create()
    {
        return view('produksi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([

            'tahun' => 'required',
            'sektor' => 'required',
            'komoditas' => 'required',

        ]);

        ProduksiPangan::create(
            array_merge(
                $validated,
                $request->only([
                    'luas_ha',
                    'hasil_produksi',
                    'nilai_produksi',
                    'biaya_pupuk',
                    'biaya_bibit',
                    'biaya_obat',
                    'biaya_lainnya'
                ])
            )
        );

        return redirect()
            ->route('produksi.index')
            ->with(
                'success',
                'Data berhasil disimpan'
            );
    }

    public function show($id)
    {
        $data = ProduksiPangan::findOrFail($id);

        return view(
            'produksi.show',
            compact('data')
        );
    }

    public function edit($id)
    {
        $data = ProduksiPangan::findOrFail($id);

        return view(
            'produksi.edit',
            compact('data')
        );
    }

    public function update(
        Request $request,
        $id
    )
    {
        $data = ProduksiPangan::findOrFail($id);

        $data->update($request->all());

        return redirect()
            ->route('produksi.index')
            ->with(
                'success',
                'Data berhasil diperbarui'
            );
    }

    public function destroy($id)
    {
        ProduksiPangan::destroy($id);

        return redirect()
            ->route('produksi.index')
            ->with(
                'success',
                'Data berhasil dihapus'
            );
    }
}
