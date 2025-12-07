@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <!-- Judul halaman -->
    <h2 class="mb-3">Data Pribadi Mahasiswa</h2>

    <!-- Tombol tambah data -->
    <a href="{{ route('pribadi.create') }}" class="btn btn-success mb-3">
        Tambah Data
    </a>

    <!-- Pesan sukses -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <!-- Tabel data pribadi -->
    <table class="table table-bordered table-striped">
        <thead class="thead-light">
            <tr>
                <th width="50">No</th>
                <th>NIK</th>
                <th>Nama Mahasiswa</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th width="180">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($pribadi as $item)
            <tr>
                <!-- Nomor urut -->
                <td>{{ $loop->iteration }}</td>

                <!-- Menampilkan kolom -->
                <td>{{ $item->nik }}</td>
                <td>{{ $item->nama_mahasiswa }}</td>
                <td>{{ $item->tempat_lahir }}</td>
                <td>{{ $item->tanggal_lahir }}</td>

                <td>
                    <!-- Form hapus data -->
                    <form action="{{ route('pribadi.destroy', $item->id_pribadi) }}" method="POST">

                        <!-- Tombol edit -->
                        <a href="{{ route('pribadi.edit', $item->id_pribadi) }}"
                           class="btn btn-primary btn-sm">Edit</a>

                        @csrf
                        @method('DELETE')

                        <!-- Tombol delete -->
                        <button type="submit" 
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                            Delete
                        </button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-3">
        {!! $pribadi->links() !!}
    </div>

</div>
@endsection
