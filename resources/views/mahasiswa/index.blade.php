@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Data Mahasiswa</h2>

    <!-- Pesan sukses -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <!-- Form Pencarian -->
    <form action="{{ route('mahasiswa.search') }}" method="GET" class="mb-3">
        <input type="text" name="search" value="{{ $keyword ?? '' }}" placeholder="Cari nama mahasiswa" class="form-control" style="width:300px; display:inline-block;">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <!-- Tabel Mahasiswa -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pribadi ?? [] as $p)
            <tr>
                <td>{{ $p->nim }}</td>
                <td>{{ $p->nama_mahasiswa }}</td>
                <td>{{ $p->tempat_lahir }}</td>
                <td>{{ $p->tanggal_lahir }}</td>
                <td>
                    @if($p->status ?? false)
                        <!-- Tombol sudah terdaftar mirip tombol daftar -->
                        <button class="btn btn-success btn-sm" disabled>Sudah Terdaftar</button>
                    @else
                        <a href="{{ route('mahasiswa.daftar', $p->id_pribadi) }}" class="btn btn-success btn-sm">Daftar</a>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Data tidak ditemukan</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div>
        {!! $pribadi->links() !!}
    </div>
</div>
@endsection
