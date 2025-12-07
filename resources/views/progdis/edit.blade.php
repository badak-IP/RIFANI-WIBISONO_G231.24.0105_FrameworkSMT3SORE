@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <!-- Judul -->
    <h2 class="mb-3">Edit Program Studi</h2>

    <form action="{{ route('progdis.update', $progdi->id_progdi) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Input Fakultas -->
        <div class="mb-3">
            <label>Nama Fakultas</label>
            <input type="text" name="nm_fakultas" 
                   value="{{ $progdi->nm_fakultas }}" class="form-control" required>
        </div>

        <!-- Input Progdi -->
        <div class="mb-3">
            <label>Nama Program Studi</label>
            <input type="text" name="nm_progdi" 
                   value="{{ $progdi->nm_progdi }}" class="form-control" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('progdis.index') }}" class="btn btn-secondary">Kembali</a>

    </form>

</div>
@endsection
