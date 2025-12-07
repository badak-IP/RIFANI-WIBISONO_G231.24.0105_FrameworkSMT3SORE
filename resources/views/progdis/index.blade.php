@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <!-- Judul -->
    <h2 class="mb-3">Data Program Studi</h2>

    <!-- Tombol Tambah -->
    <a href="{{ route('progdis.create') }}" class="btn btn-success mb-3">
        Tambah Data
    </a>

    <!-- Pesan sukses -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <!-- Tabel data -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th width="50">No</th>
                <th>Nama Fakultas</th>
                <th>Nama Program Studi</th>
                <th width="180">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($progdi as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nm_fakultas }}</td>
                <td>{{ $item->nm_progdi }}</td>

                <td>
                    <form action="{{ route('progdis.destroy', $item->id_progdi) }}" method="POST">

                        <!-- tombol edit -->
                        <a href="{{ route('progdis.edit', $item->id_progdi) }}"
                           class="btn btn-primary btn-sm">Edit</a>

                        @csrf
                        @method('DELETE')

                        <!-- tombol delete -->
                        <button type="submit"
                                onclick="return confirm('Yakin ingin menghapus data ini?')"
                                class="btn btn-danger btn-sm">
                            Delete
                        </button>

                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div>
        {!! $progdi->links() !!}
    </div>

</div>
@endsection
