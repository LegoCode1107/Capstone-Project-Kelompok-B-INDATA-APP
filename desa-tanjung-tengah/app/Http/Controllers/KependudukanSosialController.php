<?php

namespace App\Http\Controllers;

use App\Models\KependudukanSosial;
use Illuminate\Http\Request;

class KependudukanSosialController extends Controller
{
    public function index()
    {
        $data = KependudukanSosial::latest()->paginate(20);

        return view('kependudukan.index', compact('data'));
    }

    public function create()
    {
        return view('kependudukan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tahun'      => 'required|integer',
            'kategori'   => 'required|string|max:255',
            'indikator'  => 'required|string|max:255',
            'laki_laki'  => 'nullable|integer',
            'perempuan'  => 'nullable|integer',
            'total'      => 'nullable|integer',
        ]);

        KependudukanSosial::create($validated);

        return redirect()
            ->route('kependudukan.index')
            ->with('success', 'Data berhasil disimpan');
    }

    public function show(KependudukanSosial $kependudukan)
    {
        return view('kependudukan.show', [
            'data' => $kependudukan
        ]);
    }

    public function edit(KependudukanSosial $kependudukan)
    {
        return view('kependudukan.edit', [
            'data' => $kependudukan
        ]);
    }

    public function update(
        Request $request,
        KependudukanSosial $kependudukan
    ) {
        $validated = $request->validate([
            'tahun'      => 'required|integer',
            'kategori'   => 'required|string|max:255',
            'indikator'  => 'required|string|max:255',
            'laki_laki'  => 'nullable|integer',
            'perempuan'  => 'nullable|integer',
            'total'      => 'nullable|integer',
        ]);

        $kependudukan->update($validated);

        return redirect()
            ->route('kependudukan.index')
            ->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(KependudukanSosial $kependudukan)
    {
        $kependudukan->delete();

        return redirect()
            ->route('kependudukan.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
