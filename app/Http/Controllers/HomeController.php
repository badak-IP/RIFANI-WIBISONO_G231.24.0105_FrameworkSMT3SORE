<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $calon = DB::table('pribadis')->count();
        $du = DB::table('mahasiswa')->count(); // ← sudah diperbaiki

        $data = [
            'labels' => ['Jumlah Calon', 'Daftar Ulang'],
            'data' => [$calon, $du]
        ];

        return view('home.index', compact('data'));
    }
}
