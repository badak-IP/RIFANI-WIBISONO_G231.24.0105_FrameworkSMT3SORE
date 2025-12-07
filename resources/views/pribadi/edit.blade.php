@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h3>Edit Data Pribadi Mahasiswa</h3>

    <form action="{{ route('pribadi.update', $pribadi->id_pribadi) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>NIK</label>
            <input type="text"
                   name="nik"
                   class="form-control"
                   value="{{ $pribadi->nik }}"
                   required>
        </div>

        <div class="mb-3">
            <label>Nama Mahasiswa</label>
            <input type="text"
                   name="nama_mahasiswa"
                   class="form-control"
                   value="{{ $pribadi->nama_mahasiswa }}"
                   required>
        </div>

        <div class="mb-3">
            <label>Tempat Lahir</label>
            <input type="text"
                   name="tempat_lahir"
                   class="form-control"
                   value="{{ $pribadi->tempat_lahir }}"
                   required>
        </div>

        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date"
                   name="tanggal_lahir"
                   class="form-control"
                   value="{{ $pribadi->tanggal_lahir }}"
                   required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('pribadi.index') }}" class="btn btn-secondary">Kembali</a>

    </form>

</div>
@endsection
