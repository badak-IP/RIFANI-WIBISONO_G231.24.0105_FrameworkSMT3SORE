@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <!-- Judul Halaman -->
    <h2 class="mb-3">Tambah Data Pribadi Mahasiswa</h2>

    <!-- Form Input Data -->
    <form action="{{ route('pribadi.store') }}" method="POST">
        @csrf

        <!-- NIK -->
        <div class="mb-3">
            <label>NIK</label>
            <input type="text" name="nik" class="form-control" required>
        </div>

        <!-- Nama Mahasiswa -->
        <div class="mb-3">
            <label>Nama Mahasiswa</label>
            <input type="text" name="nama_mahasiswa" class="form-control" required>
        </div>

        <!-- Tempat Lahir -->
        <div class="mb-3">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" required>
        </div>

        <!-- Tanggal Lahir -->
        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" required>
        </div>

        <!-- Tombol Simpan -->
        <button class="btn btn-success">Simpan</button>

        <!-- Tombol Kembali -->
        <a href="{{ route('pribadi.index') }}" class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>
@endsection
