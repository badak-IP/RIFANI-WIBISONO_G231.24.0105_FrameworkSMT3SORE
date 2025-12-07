<?php

namespace App\Http\Controllers;

use App\Models\Pribadi;
use Illuminate\Http\Request;

class PribadiController extends Controller
{
    // INDEX
    public function index()
    {
        // modul: pakai pagination 5
        $pribadi = Pribadi::orderBy('id_pribadi', 'desc')->paginate(5);

        return view('pribadi.index', compact('pribadi'));
    }

    // FORM TAMBAH
    public function create()
    {
        return view('pribadi.create');
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'nama_mahasiswa' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        Pribadi::create($request->all());

        return redirect()->route('pribadi.index')
            ->with('success', 'Data pribadi berhasil ditambahkan.');
    }

    // EDIT
    public function edit($id)
    {
        $pribadi = Pribadi::findOrFail($id);

        return view('pribadi.edit', compact('pribadi'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required',
            'nama_mahasiswa' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        $pribadi = Pribadi::findOrFail($id);
        $pribadi->update($request->all());

        return redirect()->route('pribadi.index')
            ->with('success', 'Data pribadi berhasil diperbarui.');
    }

    // DELETE
    public function destroy($id)
    {
        Pribadi::findOrFail($id)->delete();

        return redirect()->route('pribadi.index')
            ->with('success', 'Data pribadi berhasil dihapus.');
    }
}
