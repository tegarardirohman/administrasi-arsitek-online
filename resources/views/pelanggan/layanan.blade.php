@extends('layouts.main')

@section('title', 'Layanan')

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
                <a href="/layanan" class="nav-link active">Layanan</a>
            </li>
            <li class="nav-item">
                <a href="/kontak" class="nav-link">Kontak</a>
            </li>
        </ul>

        <ul class="navbar-nav mr-4">
          @if(!Auth::check())
          <li class="nav-item">
                <a href="/masuk" class="nav-link">Login</a>
            </li>
            <li class="nav-item">
                <a href="/daftar" class="nav-link">Daftar</a>
            </li>
          @else
            <div class="btn-group">
                <button type="button" class="btn btn-asli dropdown-toggle" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Akun
                </button>
                <div class="dropdown-menu dropdown-menu-right px-2 py-3">
                    <div class="dropdown-item">
                        <div class="ic-user d-inline-block">
                          @if(empty(Auth::user()->img))
                            <i class="fa fa-user"></i>
                          @else
                            <img class="img-fluid rounded-circle" src="{{asset('../asset/images/user/admin_1674307854.jpg')}}" alt="">
                          @endif
                        </div> 
                        <span class="nm-pf">{{Auth::user()->nama}}</span>
                    </div>
                    <a href="/profil" class="dropdown-item" type="button">Profil saya</a>
                    <a href="/keluar" class="dropdown-item" type="button">Log out</a>
                </div>
            </div>
          @endif
        </ul>
        
    </div>
</nav>

@endsection


@section('content')



<section id="proyek" class="pt-5 mt-5">
    <div class="container">
        <div class="container">
      <h5 class="text-center pricing-table-subtitle">Paket Kami</h5>
      <h1 class="text-center pricing-table-title">Daftar Harga Paket</h1>
      <div class="row px-5">
      @foreach($post as $item)
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <img class="img-fluid object-fit-cover" src="{{asset('../asset/images/paket/'.$item->ly_img)}}" alt="">
            </div>
            <div class="mx-2 card-body">
              <h5 class="card-title my-2 ">{{$item->ly_nama}}</h5>
              <p class="text-muted mb-2">
                All the essentials for starting a business
              </p>
              <p class="h2 fw-bold">@currency($item->ly_harga)<small class="text-muted" style="font-size: 18px;">/m<sup>2</sup></small></p>
              <a href="#" class="btn btn-dark d-block mb-2 mt-3 text-capitalize">Pilih Paket</a>
            </div>
            <div class="card-footer">
              <p class="text-uppercase fw-bold" style="font-size: 12px;">Apa yang didapat?</p>
              <ol class="list-unstyled mb-0 px-4">
                <p class="my-3 fw-bold text-muted text-center">
                </p>
                @foreach($ly_item as $data)
                  @if($item->ly_id == $data->id_layanan)

                <li class="mb-3">
                  <i class="fas fa-check text-dark me-3"></i><small>{{$data->ly_item}}</small>
                </li>
                  @endif
                @endforeach
                

              </ol>
            </div>
          </div>
        </div>
      @endforeach

    </div>
</section>

    @endsection
