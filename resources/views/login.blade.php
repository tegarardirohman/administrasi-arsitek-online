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
                <a href="/masuk" class="nav-link active">Login</a>
            </li>
            <li class="nav-item">
                <a href="/daftar" class="nav-link">Daftar</a>
            </li>

        </ul>
    </div>
</nav>

@endsection


@section('content')

<div class="login-page bg-light">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                  <h3 class="mb-3">Masuk</h3>
                    <div class="bg-white shadow rounded">
                        <div class="row">
                            <div class="col-md-7 pe-0">
                                <div class="form-left h-100 py-5 px-5">
                                    <form action="/masuk" method="post" class="row g-4">
                                        @csrf
                                            <div class="col-12">
                                                <label>Email<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                                                    <input name="email" type="email" class="form-control" placeholder="Masukkan Email">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label>Password<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="fa fa-lock"></i></div>
                                                    <input name="password" type="password" class="form-control" placeholder="Masukkan Password">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="inlineFormCheck">
                                                    <label class="form-check-label" for="inlineFormCheck">Remember me</label>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <a href="#" class="float-end text-primary">Forgot Password?</a>
                                            </div>

                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary px-4 float-end mt-4 w-100">login</button>
                                            </div>

                                    </form>
                                </div>
                            </div>
                            <div class="col-md-5 ps-0 d-none d-md-block">
                                <img src="{{asset('../asset/images/carousel/3.png')}}" alt="img login" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
