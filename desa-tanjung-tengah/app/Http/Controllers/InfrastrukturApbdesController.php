<?php

namespace App\Http\Controllers;

use App\Models\InfrastrukturApbdes;
use Illuminate\Http\Request;

class InfrastrukturApbdesController extends Controller
{
    public function index()
    {
        $datas = InfrastrukturApbdes::orderBy('tahun', 'desc')->paginate(10);
        return view('infrastruktur.index', compact('datas'));
    }

    public function create()
    {
        return view('infrastruktur.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|numeric',
            'sektor_fasilitas' => 'required|string',
            'indikator_infrastruktur' => 'required|string',
            'satuan' => 'required|string',
        ]);

        InfrastrukturApbdes::create($request->all());

        return redirect()->route('infrastruktur.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = InfrastrukturApbdes::findOrFail($id);
        return view('infrastruktur.edit', compact('data'));
    }

    public function show($id)
    {
        $data = InfrastrukturApbdes::findOrFail($id);
        return view('infrastruktur.show', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required|numeric',
            'sektor_fasilitas' => 'required|string',
            'indikator_infrastruktur' => 'required|string',
            'satuan' => 'required|string',
        ]);

        $data = InfrastrukturApbdes::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('infrastruktur.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = InfrastrukturApbdes::findOrFail($id);
        $data->delete();

        return redirect()->route('infrastruktur.index')->with('success', 'Data berhasil dihapus.');
    }
}
