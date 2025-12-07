<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Pribadi;
use App\Models\Progdi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // INDEX
    public function index()
    {
        $pribadi = Pribadi::leftJoin('mahasiswa', 'pribadis.id_pribadi', '=', 'mahasiswa.id_pri')
            ->select(
                'pribadis.id_pribadi',
                'pribadis.nik',
                'pribadis.nama_mahasiswa',
                'pribadis.tempat_lahir',
                'pribadis.tanggal_lahir',
                'mahasiswa.nim',
                'mahasiswa.status'
            )
            ->paginate(5);

        return view('mahasiswa.index', compact('pribadi'));
    }

    // SEARCH
    public function search(Request $request)
    {
        $keyword = $request->search;

        $pribadi = Pribadi::leftJoin('mahasiswa', 'pribadis.id_pribadi', '=', 'mahasiswa.id_pri')
            ->select(
                'pribadis.id_pribadi',
                'pribadis.nik',
                'pribadis.nama_mahasiswa',
                'pribadis.tempat_lahir',
                'pribadis.tanggal_lahir',
                'mahasiswa.nim',
                'mahasiswa.status'
            )
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('pribadis.nama_mahasiswa', 'LIKE', "%$keyword%");
            })
            ->paginate(5);

        return view('mahasiswa.index', compact('pribadi', 'keyword'));
    }

    // FORM DAFTAR
    public function daftar($id_pribadi)
    {
        $pribadi = Pribadi::findOrFail($id_pribadi);
        $progdi  = Progdi::all();

        return view('mahasiswa.daftar', compact('pribadi', 'progdi'));
    }

    // SIMPAN MAHASISWA
    public function store(Request $request)
    {
        $request->validate([
            'nim'        => 'required|unique:mahasiswa,nim',   // SUDAH DIBENERIN
            'id_pribadi' => 'required',
            'id_progdi'  => 'required',
        ]);

        Mahasiswa::create([
            'nim'    => $request->nim,
            'id_pri' => $request->id_pribadi,
            'id_pro' => $request->id_progdi,
            'status' => 'Sudah Terdaftar',
        ]);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa berhasil didaftarkan dan status menjadi "Sudah Terdaftar".');
    }

    // SHOW MAHASISWA
    public function show($id)
    {
        $mahasiswa = Mahasiswa::with(['pribadi', 'progdi'])->findOrFail($id);
        return view('mahasiswa.show', compact('mahasiswa'));
    }
}
