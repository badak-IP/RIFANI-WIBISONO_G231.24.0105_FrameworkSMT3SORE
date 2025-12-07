@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h3>Halaman Pencarian Data Pribadi Mahasiswa USM</h3>

    <!-- Form Pencarian -->
    <form action="{{ route('mahasiswa.searchPage') }}" method="GET" class="mb-4">

        <input type="text"
               name="search"
               value="{{ request('search') }}"
               placeholder="Masukkan keyword nama mahasiswa"
               class="form-control w-50 d-inline">

        <button type="submit" class="btn btn-primary">Cari</button>

        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>

    <!-- Tabel -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>NIK</th>
                <th>Nama Mahasiswa</th>
                <th>Tempat / Tanggal Lahir</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($pribadi as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nik }}</td>
                <td>{{ $item->nama_mahasiswa }}</td>
                <td>{{ $item->tempat_lahir }} / {{ $item->tanggal_lahir }}</td>

                <td>
                    @if ($item->nim)
                        <span class="badge bg-success">Sudah DU</span>
                    @else
                        <a href="{{ route('mahasiswa.daftar', $item->id_pribadi) }}"
                           class="btn btn-warning btn-sm">
                            Daftar
                        </a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
