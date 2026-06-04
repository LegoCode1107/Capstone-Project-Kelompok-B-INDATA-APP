<?php

namespace App\Http\Controllers;

use App\Models\EkonomiPekerjaan;
use Illuminate\Http\Request;

class EkonomiPekerjaanController extends Controller
{
    public function index()
    {
        $data = EkonomiPekerjaan::latest()->get();

        return view(
            'ekonomi.index',
            compact('data')
        );
    }

    public function create()
    {
        return view('ekonomi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tahun'            => 'required|integer',
            'kategori_sektor'  => 'required|string|max:255',
            'jenis_pekerjaan'  => 'required|string|max:255',
            'laki_laki'        => 'nullable|integer',
            'perempuan'        => 'nullable|integer',
            'total'            => 'nullable|integer',
        ]);

        EkonomiPekerjaan::create($validated);

        return redirect()
            ->route('ekonomi.index')
            ->with(
                'success',
                'Data berhasil disimpan'
            );
    }

    public function show($id)
    {
        $data = EkonomiPekerjaan::findOrFail($id);

        return view(
            'ekonomi.show',
            compact('data')
        );
    }

    public function edit($id)
    {
        $data = EkonomiPekerjaan::findOrFail($id);

        return view(
            'ekonomi.edit',
            compact('data')
        );
    }

    public function update(
        Request $request,
        $id
    ) {
        $validated = $request->validate([
            'tahun'            => 'required|integer',
            'kategori_sektor'  => 'required|string|max:255',
            'jenis_pekerjaan'  => 'required|string|max:255',
            'laki_laki'        => 'nullable|integer',
            'perempuan'        => 'nullable|integer',
            'total'            => 'nullable|integer',
        ]);

        $data = EkonomiPekerjaan::findOrFail($id);

        $data->update($validated);

        return redirect()
            ->route('ekonomi.index')
            ->with(
                'success',
                'Data berhasil diperbarui'
            );
    }

    public function destroy($id)
    {
        $data = EkonomiPekerjaan::findOrFail($id);

        $data->delete();

        return redirect()
            ->route('ekonomi.index')
            ->with(
                'success',
                'Data berhasil dihapus'
            );
    }
}
