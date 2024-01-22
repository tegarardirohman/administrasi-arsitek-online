@extends('layouts.main')

@section('title', 'Daftar Akun Baru')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.5.0/css/select.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('sidebar')
@parent
<nav class="navbar fixed-top navbar-dark bg-white text-black scrolled border-bottom px-5 py-3 navbar-expand-sm">
    <a href="/" class="navbar-brand">Wijaya Kencana</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuItems"
        aria-controls="menuItems" aria-expanded="false" aria-label="Toggle Navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse p-1" id="menuItems">
        <ul class="navbar-nav m-auto">
            <li class="nav-item">
                <a href="/" class="nav-link">Beranda</a>
            </li>
            <li class="nav-item">
                <a href="/proyek" class="nav-link">Proyek</a>
            </li>
            <li class="nav-item">
                <a href="/portofolio" class="nav-link">Portofolio</a>
            </li>
            <li class="nav-item">
                <a href="/layanan" class="nav-link">Layanan</a>
            </li>
            <li class="nav-item">
                <a href="/kontak" class="nav-link">Kontak</a>
            </li>
        </ul>
        <ul class="navbar-nav mr-4">

          <li class="nav-item">
                <a href="/masuk" class="nav-link">Login</a>
            </li>
            <li class="nav-item">
                <a href="/daftar" class="nav-link active">Daftar</a>
            </li>

        </ul>
    </div>
</nav>

@endsection


@section('content')

<div class="login-page bg-light pt-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                  <h3 class="mb-3">Daftar Akun Baru</h3>
                    <div class="bg-white shadow rounded">
                        <div class="row">
                            <div class="col-md-12 pe-0">
                                <div class="form-left h-100 py-5 px-5">
                                    <form action="/daftars" method="post" class="row g-4">
                                        @csrf
                                        @method('PUT')

                                            <div class="col-6">
                                                <label>Nama</label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                                                    <input name="nama" type="text" class="form-control" placeholder="Masukkan Nama" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label>No Telepon/WA</label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                                    <input name="telepon" type="tel" class="form-control" placeholder="Masukkan No Telepon/WA" required>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <label>Email<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="fa fa-at"></i></div>
                                                    <input name="email" type="email" class="form-control" placeholder="Masukkan Email" required>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <label for="" class="d-block pb-3">Jenis Kelamin</label>
                                                <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="L" required>
                                                        <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="P" required>
                                                        <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                                </div>
                                            </div>

                                        
                                            <div class="col-6">
                                                <label>Password<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="fa fa-lock"></i></div>
                                                    <input name="password" type="password" class="form-control" placeholder="Masukkan Password" required>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <label>Ulangi Password<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="fa fa-lock"></i></div>
                                                    <input name="password_confirmation" type="password" class="form-control" placeholder="Ulangi Password" required>
                                                </div>
                                            </div>


                                            @if ($errors->any())
                                            <div class="col-12">
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            @endif


                                            <div class="col-12">
                                                <button type="submit"  class="btn btn-primary px-4 float-end mt-4 w-100">Daftar</button>
                                            </div>

                                           
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
