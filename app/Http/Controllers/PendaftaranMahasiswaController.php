<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranMahasiswa;
use App\Models\Progdi;
use Illuminate\Http\Request;

class PendaftaranMahasiswaController extends Controller
{
    /**
     * Menampilkan form untuk mengedit data mahasiswa berdasarkan ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Ambil data mahasiswa berdasarkan ID
        $mahasiswa = PendaftaranMahasiswa::findOrFail($id);
        
        // Ambil semua data program studi (progdi) untuk dropdown
        $progdi = Progdi::all();

        // Tampilkan view dengan data mahasiswa dan program studi
        return view('pendaftaran.edit', compact('mahasiswa', 'progdi'));
    }

    /**
     * Menyimpan perubahan data mahasiswa.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang dimasukkan
        $request->validate([
            'nim' => 'required|unique:pendaftaran_mahasiswa,nim,' . $id,
            'nik' => 'required',
            'nama_mahasiswa' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'id_progdi' => 'required|exists:progdis,id_progdi',
        ]);

        // Cari mahasiswa berdasarkan ID dan update data
        $mahasiswa = PendaftaranMahasiswa::findOrFail($id);
        $mahasiswa->update([
            'nim' => $request->nim,
            'nik' => $request->nik,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'id_progdi' => $request->id_progdi,
        ]);

        // Redirect ke halaman daftar mahasiswa dengan pesan sukses
        return redirect()->route('pendaftaran.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }
}
