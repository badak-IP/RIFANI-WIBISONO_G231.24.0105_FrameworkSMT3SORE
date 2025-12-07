@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Daftar Mahasiswa Baru</h2>

    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf

        <input type="hidden" name="id_pribadi" value="{{ $pribadi->id_pribadi }}">

        <div class="form-group mb-2">
            <label>NIK</label>
            <input type="text" class="form-control" value="{{ $pribadi->nik }}" readonly>
        </div>

        <div class="form-group mb-2">
            <label>Nama Mahasiswa</label>
            <input type="text" class="form-control" value="{{ $pribadi->nama_mahasiswa }}" readonly>
        </div>

        <div class="form-group mb-2">
            <label>Program Studi</label>
            <select name="id_progdi" class="form-control" required>
                <option value="">-- Pilih Program Studi --</option>
                @foreach($progdi as $p)
                    <option value="{{ $p->id_progdi }}">{{ $p->nm_progdi }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-2">
            <label>NIM</label>
            <input type="text" name="nim" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Daftar</button>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
