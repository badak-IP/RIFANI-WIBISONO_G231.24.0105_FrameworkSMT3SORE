@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <!-- Judul -->
    <h2 class="mb-3">Tambah Program Studi</h2>

    <form action="{{ route('progdis.store') }}" method="POST">
        @csrf

        <!-- Input Fakultas -->
        <div class="mb-3">
            <label>Nama Fakultas</label>
            <input type="text" name="nm_fakultas" class="form-control" required>
        </div>

        <!-- Input Progdi -->
        <div class="mb-3">
            <label>Nama Program Studi</label>
            <input type="text" name="nm_progdi" class="form-control" required>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('progdis.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

</div>
@endsection
