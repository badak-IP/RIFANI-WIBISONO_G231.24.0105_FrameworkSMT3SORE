<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi Laravel 9</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

<!-- Navbar utama -->
<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container d-flex justify-content-center">

        <!-- Judul aplikasi -->
        <span class="navbar-text text-white font-weight-bold mx-2">
            .: SIMA :.
        </span>

        <span class="text-white mx-2">|</span>

        <!-- Home -->
        <a class="nav-link d-inline p-0 text-white mx-2"
           href="{{ route('home.index') }}">
            Home
        </a>

        <span class="text-white mx-2">|</span>

        <!-- Data Progdi (sudah diperbaiki: progdis.index) -->
        <a class="nav-link d-inline p-0 text-white mx-2"
           href="{{ route('progdis.index') }}">
            Data Progdi
        </a>

        <span class="text-white mx-2">|</span>

        <!-- Data Pribadi -->
        <a class="nav-link d-inline p-0 text-white mx-2"
           href="{{ route('pribadi.index') }}">
            Data Pribadi
        </a>

        <span class="text-white mx-2">|</span>

        <!-- Data Mahasiswa -->
        <a class="nav-link d-inline p-0 text-white mx-2"
           href="{{ route('mahasiswa.index') }}">
            Data Mahasiswa
        </a>

    </div>
</nav>

<!-- Tempat isi setiap halaman -->
<div class="container">
    @yield('content')
</div>

</body>
</html>
