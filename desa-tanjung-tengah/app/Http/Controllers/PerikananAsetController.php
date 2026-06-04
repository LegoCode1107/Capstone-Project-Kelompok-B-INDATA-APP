<?php

namespace App\Http\Controllers;

use App\Models\PerikananAset;
use Illuminate\Http\Request;

class PerikananAsetController extends Controller
{
    public function index()
    {
        $data = PerikananAset::latest()->get();

        return view(
            'perikanan_aset.index',
            compact('data')
        );
    }

    public function create()
    {
        return view('perikanan_aset.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'tahun' => 'required',
            'kelompok_aset' => 'required',
            'nama_aset_infrastruktur' => 'required',

        ]);

        PerikananAset::create($request->all());

        return redirect()
            ->route('perikanan.index')
            ->with(
                'success',
                'Data berhasil disimpan'
            );
    }

    public function show($id)
    {
        $data = PerikananAset::findOrFail($id);

        return view(
            'perikanan_aset.show',
            compact('data')
        );
    }

    public function edit($id)
    {
        $data = PerikananAset::findOrFail($id);

        return view(
            'perikanan_aset.edit',
            compact('data')
        );
    }

    public function update(
        Request $request,
        $id
    )
    {
        $request->validate([

            'tahun' => 'required',
            'kelompok_aset' => 'required',
            'nama_aset_infrastruktur' => 'required',

        ]);

        $data = PerikananAset::findOrFail($id);

        $data->update($request->all());

        return redirect()
            ->route('perikanan.index')
            ->with(
                'success',
                'Data berhasil diperbarui'
            );
    }

    public function destroy($id)
    {
        $data = PerikananAset::findOrFail($id);

        $data->delete();

        return redirect()
            ->route('perikanan.index')
            ->with(
                'success',
                'Data berhasil dihapus'
            );
    }
}
