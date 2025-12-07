<?php

namespace App\Http\Controllers;

use App\Models\Progdi;
use Illuminate\Http\Request;

class ProgdiController extends Controller
{
    /**
     * Menampilkan daftar data program studi.
     */
    public function index()
    {
        // Mengambil data dan mengurutkan berdasarkan id_progdi (primary key)
        $progdi = Progdi::orderBy('id_progdi', 'desc')->paginate(5);
        return view('progdis.index', compact('progdi'));
    }

    /**
     * Menampilkan form tambah data progdi.
     */
    public function create()
    {
        return view('progdis.create');
    }

    /**
     * Menyimpan data progdi baru.
     */
    public function store(Request $request)
    {
        // Validasi form
        $request->validate([
            'nm_fakultas' => 'required',
            'nm_progdi' => 'required',
        ]);

        // Insert data
        Progdi::create($request->all());

        return redirect()->route('progdis.index')
                         ->with('success', 'Data program studi berhasil disimpan.');
    }

    /**
     * Menampilkan form edit data progdi.
     */
    public function edit($id)
    {
        // Ambil data berdasarkan primary key id_progdi
        $progdi = Progdi::findOrFail($id);
        return view('progdis.edit', compact('progdi'));
    }

    /**
     * Mengupdate data progdi.
     */
    public function update(Request $request, $id)
    {
        // Validasi form
        $request->validate([
            'nm_fakultas' => 'required',
            'nm_progdi' => 'required',
        ]);

        // Update data
        $progdi = Progdi::findOrFail($id);
        $progdi->update($request->all());

        return redirect()->route('progdis.index')
                         ->with('success', 'Data program studi berhasil diperbarui.');
    }

    /**
     * Menghapus data progdi.
     */
    public function destroy($id)
    {
        // Hapus data berdasarkan id_progdi
        $progdi = Progdi::findOrFail($id);
        $progdi->delete();

        return redirect()->route('progdis.index')
                         ->with('success', 'Data program studi berhasil dihapus.');
    }
}
