@extends('layouts.main')

@section('title', 'Portofolio')

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
                <a href="/portofolio" class="nav-link active">Portofolio</a>
            </li>
            <li class="nav-item">
                <a href="/layanan" class="nav-link">Layanan</a>
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

<section>
    <span></span>
</section>
<section id="project pt-5 mt-5">
    <div class="container pt-5">
        <div class="d-flex justify-content-between">
            <h2 class="h2 pop-bold pb-4 fw-bold">Portofolio Kami</h2>
            <!-- <a href="/portofolio" class="btn fw-bold pe-0">Semua portofolio >></a> -->
        </div>

        <div class="row gx-4">

        <?php $i = 0 ?>
        @foreach($pf as $pf)
            @foreach($pf_img as $pi)
            @if($pf->pf_id == $pi->pf_img_id_portofolio)

            <?php $i++ ?>

            <div class="col-md-4">
                <div class="img-pf position-relative">
                    <img class="w-100" src="{{ asset('../asset/images/portofolio/'.$pi->pf_img_img) }}"
                        alt="">
                </div>
                <div class="ket pt-2">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="fs-1 pop-bold px-2 pt-2"><?php echo ($i<10)? '0'.$i : $i; ?></div>
                        </div>
                        <div class="col-md-9">
                            <div class="ket2 w-100">
                                <h5 class="fs-6 fw-bold pb-2 pt-1">{{$pf->pf_nama}}</h5>
                                <div class="d-flex justify-content-between pe-2">
                                    <p class="fs-6 text-muted"> <i class="fa fa-map-marker"></i> {{$pf->nama_kota}}</p>
                                    <a href="/detail_portofolio/{{$pf->pf_id}}" class="text-decoration-none text-black fs-6"> Detail <i
                                            class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @break
            @endif
            @endforeach
        @endforeach

  



        </div>
    </div>
</section>


    @endsection
