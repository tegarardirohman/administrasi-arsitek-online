@extends('layouts.main')

@section('title', 'Proyek Saya')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.5.0/css/select.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="{{asset('../../asset/js/jquery-3.6.1.min.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<style>
    .select2 {
        width: 100% !important;
        margin-top: 0.5rem;
    }
</style>
@endsection

@section('sidebar')
@parent
<nav class="navbar navbar-dark bg-white text-black scrolled shadow px-5 py-3 navbar-expand-sm">
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
                <a href="/proyek" class="nav-link  active">Proyek</a>
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

@if(Auth::check())
<section id="proyek" class="pt-5">
    <div class="container">
        <div class="d-flex justify-content-between">
            <h1 class="h2">Proyek Saya</h1>
            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i
                    class="fa fa-plus"></i> Tambah Proyek Baru</button>
        </div>

        <div class="p-2 mt-5 mb-2">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <div class="d-flex justify-content-left w-100 mb-2 border-bottom pb-3">
                    <li class="nav-item" role="presentation">
                        <button class="btn nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true"><i class="fa fa-envelope"></i> Diajukan</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="btn nav-link" id="pills-home-tab2" data-bs-toggle="pill"
                            data-bs-target="#pills-home2" type="button" role="tab" aria-controls="pills-home2"
                            aria-selected="true"><i class="fa fa-cog fa-spin"></i> Proyek berjalan</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false"><i class="fa fa-check-circle"></i> Proyek Selesai</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false"><i class="fa fa-times-circle"></i> Gagal</button>
                    </li>
                </div>


            </ul>
            <div class="tab-content" id="pills-tabContent">

                <!-- diajukan -->
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    
                @forelse($post as $item)
                
                    <div class="rounded border px-3 py-4 mb-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between">
                                    <p class="h2 fw-bold fs-4 mb-4">{{$item->pry_nama}}</p>
                                    <p class="text-white bg-danger p-2 fw-bold">Status: {{$item->pry_status}}</p>
                                </div>

                                <div class="row mb-4 gy-3">
                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-bank fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Layanan</div>
                                                <div class="fw-bold fs-6">{{$item->ly_nama}}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-home fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Jenis Bangunan</div>
                                                <div class="fw-bold fs-6">{{$item->nama_jenis}}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-arrows-h fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Panjang</div>
                                                <div class="fw-bold fs-6">{{$item->pry_panjang}} m</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-arrows-v fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Lebar</div>
                                                <div class="fw-bold fs-6">{{$item->pry_lebar}} m</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-arrow-up fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Jumlah Lantai</div>
                                                <div class="fw-bold fs-6">{{$item->pry_lantai}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-arrows-alt fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Luas</div>
                                                <div class="fw-bold fs-6">{{$item->pry_luas}} m2</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-dollar fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Biaya per m2</div>
                                                <div class="fw-bold fs-6">{{$item->ly_harga}}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-dollar fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Total Biaya</div>
                                                <div class="fw-bold fs-6">@currency($item->pry_total)</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card p-2">
                                    <h6 class="fw-bold">Data Pemesan</h6>
                                    <table>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <th>{{Auth::User()->nama}}</th>
                                        </tr>
                                        <tr>
                                            <td>Telepon</td>
                                            <td>:</td>
                                            <th>{{Auth::User()->telp}}</th>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <th>{{$item->alamat->nama_kota}}</th>
                                        </tr>
                                    </table>
                                </div>
                                <div class="card p-2 mt-2">
                                    <h6 class="fw-bold">File Tambahan </h6>
                                    <div class="row gx-1">

                                        @if(!empty($item->file))

                                        <div class="col-md-4">
                                            <img class="w-100" src="{{asset('../asset/file/'.$item->file)}}"
                                                alt="Image 2">
                                        </div>

                                        @else
                                        
                                        Tidak ada file tambahan

                                        @endif

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="card p-2">
                                    <h6 class="fw-bold">Catatan :</h6>
                                    <div class="text-muted">
                                        {{$item->catatan}}
                                    </div>
                                </div>

                                <div class="pt-3">
                                    <a href="del_proyek/{{$item->pry_id}}" class="btn btn-danger"><i class="fa fa-trash"></i>
                                        Hapus</a>
                                    <button data-bs-toggle="modal" data-bs-target="#edit{{$item->pry_id}}" class="btn btn-primary float-end"><i
                                            class="fa fa-pencil"></i>
                                        Edit</button>
                                </div>
                            </div>

                        </div>

                    </div>
                @empty
                Anda belum memiliki data proyek diajukan
                  
                @endforelse

                </div>


                <!-- berjalan -->
                <div class="tab-pane fade show" id="pills-home2" role="tabpanel" aria-labelledby="pills-home-tab2">
                    
                @forelse($post_berjalan as $item)
                    <div class="rounded border px-3 py-4 mb-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between">
                                    <p class="h2 fw-bold fs-4 mb-4">{{$item->pry_nama}}</p>
                                    <p class="text-white bg-primary p-2 fw-bold">Status: {{$item->pry_status}}</p>
                                </div>

                                <div class="row mb-4 gy-3">
                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-bank fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Layanan</div>
                                                <div class="fw-bold fs-6">{{$item->ly_nama}}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-home fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Jenis Bangunan</div>
                                                <div class="fw-bold fs-6">{{$item->nama_jenis}}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-arrows-h fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Panjang</div>
                                                <div class="fw-bold fs-6">{{$item->pry_panjang}} m</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-arrows-v fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Lebar</div>
                                                <div class="fw-bold fs-6">{{$item->pry_lebar}} m</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-arrow-up fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Jumlah Lantai</div>
                                                <div class="fw-bold fs-6">{{$item->pry_lantai}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-arrows-alt fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Luas</div>
                                                <div class="fw-bold fs-6">{{$item->pry_luas}} m2</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-dollar fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Biaya per m2</div>
                                                <div class="fw-bold fs-6">{{$item->ly_harga}}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-dollar fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Total Biaya</div>
                                                <div class="fw-bold fs-6">@currency($item->pry_total)</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card p-2">
                                    <h6 class="fw-bold">Data Pemesan</h6>
                                    <table>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <th>{{Auth::User()->nama}}</th>
                                        </tr>
                                        <tr>
                                            <td>Telepon</td>
                                            <td>:</td>
                                            <th>{{Auth::User()->telp}}</th>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <th>{{$item->alamat->nama_kota}}</th>
                                        </tr>
                                    </table>
                                </div>
                                <div class="card p-2 mt-2">
                                    <h6 class="fw-bold">File Tambahan </h6>
                                    <div class="row gx-1">

                                        @if(!empty($item->file))

                                        <div class="col-md-4">
                                            <img class="w-100" src="{{asset('../asset/file/'.$item->file)}}"
                                                alt="Image 2">
                                        </div>

                                        @else
                                        
                                        Tidak ada file tambahan

                                        @endif

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="card p-2">
                                    <h6 class="fw-bold">Catatan :</h6>
                                    <div class="text-muted">
                                        {{$item->catatan}}
                                    </div>
                                </div>

                                <div class="pt-3">
                                    <a href="/pengerjaan_proyek/{{$item->pry_id}}" class="btn btn-dark float-end w-100">Lihat pengerjaan
                                        proyek <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>

                        </div>

                    </div>

                    @empty
                    Anda belum memiliki proyek berjalan

                    @endforelse


                </div>


                <!-- sedang selesai -->
                <div class="tab-pane fade show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                @forelse($post_selesai as $item)
                <div class="rounded border px-3 py-4 mb-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between">
                                    <p class="h2 fw-bold fs-4 mb-4">{{$item->pry_nama}}</p>
                                    <p class="text-white bg-success p-2 fw-bold">Status: {{$item->pry_status}}</p>
                                </div>

                                <div class="row mb-4 gy-3">
                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-bank fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Layanan</div>
                                                <div class="fw-bold fs-6">{{$item->ly_nama}}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-home fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Jenis Bangunan</div>
                                                <div class="fw-bold fs-6">{{$item->nama_jenis}}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-arrows-h fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Panjang</div>
                                                <div class="fw-bold fs-6">{{$item->pry_panjang}} m</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-arrows-v fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Lebar</div>
                                                <div class="fw-bold fs-6">{{$item->pry_lebar}} m</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-arrow-up fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Jumlah Lantai</div>
                                                <div class="fw-bold fs-6">{{$item->pry_lantai}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-arrows-alt fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Luas</div>
                                                <div class="fw-bold fs-6">{{$item->pry_luas}} m2</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-dollar fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Biaya per m2</div>
                                                <div class="fw-bold fs-6">{{$item->ly_harga}}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-dollar fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Total Biaya</div>
                                                <div class="fw-bold fs-6">@currency($item->pry_total)</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card p-2">
                                    <h6 class="fw-bold">Data Pemesan</h6>
                                    <table>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <th>{{Auth::User()->nama}}</th>
                                        </tr>
                                        <tr>
                                            <td>Telepon</td>
                                            <td>:</td>
                                            <th>{{Auth::User()->telp}}</th>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <th>{{$item->alamat->nama_kota}}</th>
                                        </tr>
                                    </table>
                                </div>
                                <div class="card p-2 mt-2">
                                    <h6 class="fw-bold">File Tambahan </h6>
                                    <div class="row gx-1">

                                        @if(!empty($item->file))

                                        <div class="col-md-4">
                                            <img class="w-100" src="{{asset('../asset/file/'.$item->file)}}"
                                                alt="Image 2">
                                        </div>

                                        @else
                                        
                                        Tidak ada file tambahan

                                        @endif

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="card p-2">
                                    <h6 class="fw-bold">Catatan :</h6>
                                    <div class="text-muted">
                                        {{$item->catatan}}
                                    </div>
                                </div>

                                <div class="pt-3">
                                    <a href="/pengerjaan_proyek/{{$item->pry_id}}" class="btn btn-dark float-end w-100">Lihat pengerjaan
                                        proyek <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>

                        </div>

                    </div>

                    @empty
                    Anda belum memiliki proyek selesai

                    @endforelse
                </div>

                <!-- Gagal -->
                <div class="tab-pane fade show" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                @forelse($post_ditolak as $item)
                <div class="rounded border px-3 py-4 mb-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between">
                                    <p class="h2 fw-bold fs-4 mb-4">{{$item->pry_nama}}</p>
                                    <p class="text-white bg-danger p-2 fw-bold">Status: {{$item->pry_status}}</p>
                                </div>

                                <div class="row mb-4 gy-3">
                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-bank fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Layanan</div>
                                                <div class="fw-bold fs-6">{{$item->ly_nama}}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-home fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Jenis Bangunan</div>
                                                <div class="fw-bold fs-6">{{$item->nama_jenis}}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-arrows-h fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Panjang</div>
                                                <div class="fw-bold fs-6">{{$item->pry_panjang}} m</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-arrows-v fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Lebar</div>
                                                <div class="fw-bold fs-6">{{$item->pry_lebar}} m</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-arrow-up fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Jumlah Lantai</div>
                                                <div class="fw-bold fs-6">{{$item->pry_lantai}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-arrows-alt fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Luas</div>
                                                <div class="fw-bold fs-6">{{$item->pry_luas}} m2</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-dollar fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Biaya per m2</div>
                                                <div class="fw-bold fs-6">{{$item->ly_harga}}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center">
                                            <div class="card me-1">
                                                <i class="fa fa-dollar fs-3 p-2"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted fs-6">Total Biaya</div>
                                                <div class="fw-bold fs-6">@currency($item->pry_total)</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card p-2">
                                    <h6 class="fw-bold">Data Pemesan</h6>
                                    <table>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <th>{{Auth::User()->nama}}</th>
                                        </tr>
                                        <tr>
                                            <td>Telepon</td>
                                            <td>:</td>
                                            <th>{{Auth::User()->telp}}</th>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <th>{{$item->alamat->nama_kota}}</th>
                                        </tr>
                                    </table>
                                </div>
                                <div class="card p-2 mt-2">
                                    <h6 class="fw-bold">File Tambahan </h6>
                                    <div class="row gx-1">

                                        @if(!empty($item->file))

                                        <div class="col-md-4">
                                            <img class="w-100" src="{{asset('../asset/file/'.$item->file)}}"
                                                alt="Image 2">
                                        </div>

                                        @else
                                        
                                        Tidak ada file tambahan

                                        @endif

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="card p-2">
                                    <h6 class="fw-bold">Catatan :</h6>
                                    <div class="text-muted">
                                        {{$item->catatan}}
                                    </div>
                                </div>

                                <div class="pt-3">
                                    <a href="/pengerjaan_proyek/{{$item->pry_id}}" class="btn btn-dark float-end w-100">Lihat pengerjaan
                                        proyek <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>

                        </div>

                    </div>

                    @empty
                    Anda belum memiliki proyek gagal

                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@else

<section class="pt-5">
    <div class="container pt-5">
        <div class="text-center">
            <h2 class="h4">Anda Belum Login</h2>
            <p>Untuk mengajukan proyek baru, anda harus login terlebih dahulu.</p>
            <a href="/masuk" class="btn btn-primary">Login</a>
        </div>
    </div>
</section>
@endif

<!-- tambah proyek -->

<!-- Modal -->
<div class="modal_select modal modal-lg fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-none">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah proyek</h5>
                <h2 class="fs-5"><span id="per">1</span> / <span id="totadl">8</span></h2>
            </div>

            <!-- form tambah proyek -->
            <form action="/tambah_proyek" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @if(Auth::check())
                <input type="hidden" name="pelanggan" value="{{Auth::user()->akun_id}}">
                @endif

                <div class="modal-body">
                    <div class="modal-split text-center">
                        <h2 class="pb-2">Proyek Baru</h2>
                        <p class="fs-4 fw-bold">Ingin jasa arsitek dari CV. Wijaya Kencana Consultant?</p>
                        <p>Silahkan isi pertanyaan-pertanyaan berikut untuk konsultasi gratis dan mendapatkan pelayanan
                            yang efisien dan memuaskan.</p>
                    </div>

                    <div class="modal-split pb-3  text-center">
                        <h2 class="pb-5">Pilih jenis Layanan</h2>
                        <div class="d-flex justify-content-between px-4">
                            <div class="container parent">
                                <div class="row">
                                    @foreach($ly as $lyn)
                                    <div class='col text-center'>
                                        <input type="radio" name="layanan" id="img{{$lyn->ly_id}}" class="d-none imgbgchk" value="{{$lyn->ly_id}}" required>
                                        <label for="img{{$lyn->ly_id}}">
                                            <img src="{{asset('../asset/images/paket/'.$lyn->ly_img)}}" alt="{{$lyn->ly_nama}}">
                                            {{$lyn->ly_nama}}
                                            <p class="strong">@currency($lyn->ly_harga)</p>
                                            <div class="tick_container">
                                                <div class="tick"><i class="fa fa-check"></i></div>
                                            </div>
                                        </label>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- jenis bangunan -->
                    <div class="modal-split px-5 text-center">
                        <h2 class="pb-5">Pilih Jenis Bangunan</h2>
                        <div class="form-check">
                            <select required id="jenis_bangunan" name="jenis_bangunan" class="form-select" aria-label="Default select example">
                                <option selected>Plih Jenis Bangunan</option>
                                @foreach($jbs as $jb)
                                <option value="{{$jb->id_jenis}}">{{$jb->nama_jenis}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- style desain -->
                    <div class="modal-split  text-center">
                        <h2 class="">Masukkan Style Desain</h2>
                        <p class="pb-5">Pilih style yang anda sukai</p>
                        <div class="row gx-5 gy-5 mb-4">

                        @foreach($styles as $style)
                            <div class="col-md-4">
                                <div class="card border-0">
                                    <input id="style-input{{$style->id_style}}" name="style[]" value="{{$style->id_style}}" type="checkbox" class="d-none img-check" required>
                                    <label for="style-input{{$style->id_style}}" class="d-relative" style="height: 133px">
                                        <img class="img-label object-fit-cover" style="height: 133px; object-fit: cover" src="{{asset('../asset/images/style/'.$style->img_style)}}"
                                            alt="{{$style->nama_style}}">
                                            {{$style->nama_style}}
                                        <div class="tick_container">
                                            <div class="tick"><i class="fa fa-check"></i></div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                        @endforeach

                        </div>
                    </div>

                    <!-- luas bangunan -->
                    <div class="modal-split text-left px-5">
                        <h2 class="pb-2 text-center">Masukkan Luas Bangunan</h2>
                        <div class="form-group pb-3">
                            <label for="panjang">Panjang Tanah</label>
                            <input type="number" name="panjang" class="form-control" id="panjang" aria-describedby="panjang"
                                placeholder="Masukkan panjang tanah" required>
                        </div>
                        <div class="form-group  pb-3">
                            <label for="lebar">Lebar Tanah</label>
                            <input type="number" name="lebar" class="form-control" id="lebar" aria-describedby="panjang"
                                placeholder="Masukkan lebar tanah" required>
                        </div>
                        <div class="form-group  pb-3">
                            <label for="lantai">Jumlah Lantai</label>
                            <input type="number" name="jumlah_lantai" class="form-control" id="jumlah" aria-describedby="panjang"
                                placeholder="Masukkan jumlah lantai" required>
                            <small id="jumlah_lantai" class="form-text text-muted">Masukkan jumlah lantai yang akan
                                didesain.</small>
                        </div>
                    </div>

                    <!-- catatan -->
                    <div class="modal-split text-left px-5">
                        <h2 class="pb-2 text-center">Masukkan Catatan Proyek</h2>
                        <div class="form-group pb-3">
                            <label class="d-block fw-bold" for="catatan">Catatan : </label>
                            <textarea class="w-100" name="catatan" id="catatan" cols="40" rows="8"
                                placeholder="masukkan catatan"></textarea>
                        </div>
                    </div>

                    <!-- file tambahan -->
                    <div class="modal-split text-left px-5">
                        <h2 class="pb-5 text-center">Masukkan file tambahan jika ada</h2>
                        <div class="form-group pb-3">
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Contoh gambar denah (optional)</label>
                                <input class="form-control" name="file" type="file" id="formFileMultiple" multiple>
                            </div>
                        </div>
                    </div>

                    <!-- lengkapi data berikut -->
                    <div class="modal-split text-left px-5">
                        <h2 class="pb-5 text-center">Alamat</h2>
                        <div class="form-group pb-3">
                        <label for="kota">Kota/Kabupaten</label>
                            <select id="kota" name="alamat" class="form-select select_cari" aria-label="Default select example" required>
                                <option selected>Plih Alamat</option>
                                @foreach($alamats as $alamat)
                                <option value="{{$alamat->id_kota}}">{{$alamat->nama_kota}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary me-auto" data-bs-dismiss="modal">Batal</button>
                    <!-- <button type="button" class="btn btn-primary" id="tambah2-tab" data-bs-toggle="pill" data-bs-target="#tambah2" type="button" role="tab" aria-controls="tambah2" aria-selected="true">Selanjutnya</button> -->
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Edit Proyek-->
@foreach($posts as $data)
<div class="modal fade" id="edit{{$data->pry_id}}" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEdit">Edit Data Proyek</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!-- form -->
            <form action="/edit_proyek" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="hidden" name="id_proyek" value="{{$data->pry_id}}">
                @if(Auth::check())
                <input type="hidden" name="pelanggan" value="{{Auth::user()->akun_id}}">
                @endif

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Jenis Bangunan</label>
                                <select name="jenis_bangunan" class="form-control" id="edit_jenis_bangunan">

                                    <option id="edit_jenis_bangunan" value="{{$data->pry_jenis_bangunan}}"> {{$data->nama_jenis}} </option>

                                    @foreach($jbs as $item)

                                        <option value="{{ $item->id_jenis }}">{{ $item->nama_jenis }}</option>

                                    @endforeach
                                </select>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <label for="edit_panjang">Panjang Bangunan</label>
                                    <input name="panjang" type="number" min="1" class="form-control"
                                    id="edit_panjang" placeholder="Contoh: 12" value="{{$data->pry_panjang}}">
                                </div>
                                <div class="col">
                                    <label for="edit_lebar">Lebar Bangunan</label>
                                    <input name="lebar" type="number" min="1" class="form-control"
                                    id="edit_lebar" placeholder="Contoh: 12" value="{{$data->pry_lebar}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="edit_lantai">Jumlah Lantai</label>
                                <input name="jumlah_lantai" type="number" min="1" class="form-control"
                                    id="edit_lantai" placeholder="Contoh: 12" value="{{$data->pry_lantai}}">
                            </div>

                            <div class="form-group">
                                <label for="edit_layanan">Pilih Layanan</label>
                                <select name="layanan" class="form-control" id="exampleFormControlSelect1">
                                    <option id="edit_layanan" value="{{$data->pry_ly_id}}"> {{$data->ly_nama}} </option>

                                    @foreach($ly as $item)

                                        <option value="{{ $item->ly_id }}">{{ $item->ly_nama }}</option>

                                    @endforeach

                                </select>
                            </div>

                           

                        </div>
                        <div class="col-md-6">

                        <label for="">Pilih Style</label>
                        <div class="row">
                        @foreach($styles as $item)
                        
                        <div class="col-md-4">
                            <div class="form-check">
                                <input 

                                @foreach($pStyle as $style2)
                            
                                @if($item->id_style == $style2->id_style && $style2->id_proyek == $data->pry_id)
                                    checked
                                    
                                @endif
                            @endforeach
                                
                                
                                name='style[]' class="form-check-input" type="checkbox" value="{{$item->id_style}}" id="style{{$item->id_style}}">
                                <label class="form-check-label" for="style{{$item->id_style}}">
                                    {{$item->nama_style}}
                                </label>
                            </div>
                        </div>
                        @endforeach

                        </div>
                        

                            <div class="form-group">
                                <label for="edit_catatan">Catatan</label>
                                <textarea name="catatan" class="form-control" id="edit_catatan" rows="3">{{$data->catatan}}</textarea>
                            </div>

                            <div class="input-group mb-3 mt-4">
                                <div class="input-group-prepend">
                                    <label for="">File </label>
                                </div>
                                <div class="custom-file">

                                    @if(empty($data->file))
                                    <input name="file_proyek[]" type="file" class="custom-file-input" id="edit_file" multiple>
                                    <label class="custom-file-label" for="edit_file">Pilih file (bisa multiple)</label>
                                    @else
                                    <input name="file" type="file" class="custom-file-input" id="edit_file" value="ada_file">
                                    <label class="custom-file-label" for="edit_file"> {{$data->file}} {{$data->pry_id}}</label>
                                    @endif
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" value="submit" type="submit">Edit Data</button>
                   
                </div>


            </form>
            <!-- endform -->
        </div>
    </div>
</div>
@endforeach
<!-- edit modal -->


<!-- Modal -->
<!-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header border-none">
            <h5 class="modal-title" id="staticBackdropLabel">Tambah proyek</h5>
            <h2 class="fs-5">1/9</h2>
        </div>
        <div class="modal-body text-center">
            <h2>Proyek Baru</h2>
            <p class="fs-3 fw-bold">Ingin jasa arsitek atau pengawasan?</p>
            <p>Silahkan isi pertanyaan-pertanyaan berikut untuk konsultasi gratis dan mendapatkan pelayanan yang efisien dan memuaskan.</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary me-auto" data-bs-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-primary" id="tambah2-tab" data-bs-toggle="pill" data-bs-target="#tambah2" type="button" role="tab" aria-controls="tambah2" aria-selected="true">Selanjutnya</button>
        </div>
    </div>
  </div>
</div> -->

<script src="{{asset('../asset/plugin/select2/select2.min.css')}}"></script>
<script src="{{asset('../asset/plugin/select2/select2.min.js')}}"></script>

<!-- <script type="javascript" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script> -->

<script>
    // $(document).ready(function() {
    //     $('.select_cari').select2();
    // });

    $('.select_cari').select2({
        dropdownParent: $('.modal_select')
    });


    // $(document).ready(function () {
    //     $('#example').DataTable();

    // });

    $(document).ready(function () {
        prep_modal();
    });

    function prep_modal() {
        $(".modal").each(function () {

            var element = this;
            var pages = $(this).find('.modal-split');
            $("#total").text(pages.length)

            if (pages.length != 0) {
                pages.hide();
                pages.eq(0).show();

                var b_button = document.createElement("button");
                b_button.setAttribute("type", "button");
                b_button.setAttribute("class", "btn btn-primary");
                b_button.setAttribute("style", "display: none;");
                b_button.innerHTML = "Back";

                var n_button = document.createElement("button");
                n_button.setAttribute("type", "button");
                n_button.setAttribute("class", "btn btn-primary");
                n_button.innerHTML = "Next";

                $(this).find('.modal-footer').append(b_button).append(n_button);


                var page_track = 0;

                $(n_button).click(function () {

                    this.blur();

                    if (page_track == 0) {
                        $(b_button).show();
                    }

                    if (page_track == pages.length - 2) {
                        $(n_button).text("Kirim");
                    }

                    if (page_track == pages.length - 1) {
                        $(element).find("form").submit();
                    }

                    if (page_track < pages.length - 1) {
                        page_track++;

                        pages.hide();
                        pages.eq(page_track).show();
                        $("#per").text(page_track + 1)
                    }

                    $("#per").text(page_track + 1)

                });

                $(b_button).click(function () {

                    if (page_track == 1) {
                        $(b_button).hide();
                    }

                    if (page_track == pages.length - 1) {
                        $(n_button).text("Next");
                    }

                    if (page_track > 0) {
                        page_track--;

                        pages.hide();
                        pages.eq(page_track).show();
                    }

                    $("#per").text(page_track + 1)


                });

            }

        });
    }

</script>

@endsection
