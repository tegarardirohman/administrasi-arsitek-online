@extends('layouts.main')

@section('title', 'Proyek Saya')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.5.0/css/select.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .pdfobject-container {
        height: 30rem;
        border: 1rem solid rgba(0, 0, 0, .1);
    }

</style>
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
                <a href="/proyek" class="nav-link  active">Proyek</a>
            </li>
            <li class="nav-item">
                <a href="/portofolio" class="nav-link">Portofolio</a>
            </li>
            <li class="nav-item">
                <a href="/portofolio" class="nav-link">Layanan</a>
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
<section id="proyek" class="pt-5 mt-5 f-section">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="">
                Proyek
                <i class="fa fa-arrow-right"></i>
                Pengerjaan proyek

                <h1 class="h2 pt-1">{{$post->pry_nama}}</h1>
                <p class="text-muted"><i class="fa fa-map-marker"></i> {{$post->alamat->nama_kota}}</p>
            </div>

            <!-- <div class="d-block">
                <h4 class="bg-red d-block bg-warning p-1">Status: Menunggu Pembayaran Tahap 1</h4>
            </div> -->
        </div>



        <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills me-3 px-4" id="v-pills-tab" role="tablist"
                aria-orientation="vertical">
                <button class="nav-link btn shadow px-5 rounded active" id="v-pills-home-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                    aria-selected="true">Tahap 1</button>
                <button class="nav-link btn shadow px-5 rounded" id="v-pills-profile-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                    aria-selected="false">Tahap 2</button>
                <button class="nav-link btn shadow px-5 rounded" id="v-pills-messages-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages"
                    aria-selected="false">Tahap 3</button>

            </div>
            <div class="tab-content w-100" id="v-pills-tabContent">
                
                
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                    aria-labelledby="v-pills-home-tab">

                    <div class="card p-2">
                        

                    @forelse($tb_hasil1 as $item)

                        @if($item->pby_status == 'belum dibayar')
                            <div class="flex-shrink-0 w-100">
                            <div class="overlay"></div>
                            <div class="p-4 position-relative text-white" style="z-index: 100">
                                <h5>Pembayaran anda sedang diproses</h5>
                                <table class="my-4">
                                    <tr>
                                        <td>Total Biaya</td>
                                        <td>:</td>
                                        <th>&nbsp; @currency($post->pry_total)</th>
                                    </tr>
                                    <tr>
                                        <td>Biaya Tahap 1</td>
                                        <td>:</td>
                                        <th>&nbsp; 30%</th>
                                    </tr>
                                    <tr>
                                        <td>Biaya</td>
                                        <td>:</td>
                                        <th>&nbsp; @currency($post->pry_total*0.3)</th>
                                    </tr>
                                </table>
                                <button data-bs-toggle="modal" data-bs-target="#pby-1" class="btn btn-dark">Lihat Pembayaran</button>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="p-2">
                                        <h6 class="fw-bold fs-5">Proyek Tahap 1</h6>
                                        <p class="text-muted fs-6">Proses pengerjaan pada tahap pertama</p>
                                        <table class="my-4">
                                            <tr>
                                                <td>Biaya</td>
                                                <td>:</td>
                                                <th>@currency($post->pry_total*0.3)</th>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td>:</td>
                                                <th>{{$item->status}}</th>
                                            </tr>
                                        </table>
                                    </div>

                                </div>
                                <div class="col-md-8">

                                    <table class="table border">
                                    <tr>
                                        <th>No</th>
                                        <th>Waktu Dimulai</th>
                                        <th>Catatan</th>
                                        <th>Status</th>
                                        <th>Lihat</th>
                                    </tr>

                                    @forelse($item->detail as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->waktu }}</td>
                                            <td>{{ $item->catatan }}</td>

                                            @if($item->det_status == 'proses')
                                                <td><span class="badge bg-warning">Proses</span></td>
                                            @elseif($item->det_status == 'revisi')
                                                <td><span class="badge bg-danger">Revisi</span></td>
                                            @elseif($item->det_status == 'dikirim')
                                                <td><span class="badge bg-primary">Dikirim</span></td>
                                            @else
                                                <td><span class="badge bg-success">Selesai</span></td>
                                            @endif

                                            <td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#PDFModal{{ $item->id_detail_desain }}">Lihat</button>
                                            </td>
                                        </tr>

                                    @empty
                                    <tr>
                                        <td>
                                            Proyek masih diproses
                                        </td>
                                    </tr>
                                        
                                    @endforelse

                                </table>
                                </div>
                            </div>

                        @endif

                        
                    
                    @empty

                    <div class="flex-shrink-0 w-100">
                        <div class="overlay"></div>
                        <div class="p-4 position-relative text-white" style="z-index: 100">
                            <h5>Anda belum melakukan pembayaran tahap 1</h5>
                            <table class="my-4">
                                <tr>
                                    <td>Total Biaya</td>
                                    <td>:</td>
                                    <th>&nbsp; @currency($post->pry_total)</th>
                                </tr>
                                <tr>
                                    <td>Biaya Tahap 1</td>
                                    <td>:</td>
                                    <th>&nbsp; 30%</th>
                                </tr>
                                <tr>
                                    <td>Biaya</td>
                                    <td>:</td>
                                    <th>&nbsp; @currency($post->pry_total*0.3)</th>
                                </tr>
                            </table>
                            <button data-bs-toggle="modal" data-bs-target="#pby-1" class="btn btn-dark">Lakukan Pembayarann</button>
                        </div>
                    
                    @endforelse

                    
                    </div>

                </div>

                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="card p-2">
                        

                        @forelse($tb_hasil2 as $item)
    
                            @if($item->pby_status == 'belum dibayar')
                                <div class="flex-shrink-0 w-100">
                                <div class="overlay"></div> 
                                <div class="p-4 position-relative text-white">
                                    <h5>Pembayaran anda sedang diproses</h5>
                                    <table class="my-4">
                                        <tr>
                                            <td>Total Biaya</td>
                                            <td>:</td>
                                            <th>&nbsp; @currency($post->pry_total)</th>
                                        </tr>
                                        <tr>
                                            <td>Biaya Tahap 2</td>
                                            <td>:</td>
                                            <th>&nbsp; 30%</th>
                                        </tr>
                                        <tr>
                                            <td>Biaya</td>
                                            <td>:</td>
                                            <th>&nbsp; @currency($post->pry_total*0.3)</th>
                                        </tr>
                                    </table>
                                    <button data-bs-toggle="modal" data-bs-target="#pby-2" class="btn btn-dark">Lihat Pembayaran</button>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="p-2">
                                            <h6 class="fw-bold fs-5">Proyek Tahap 2</h6>
                                            <p class="text-muted fs-6">Proses pengerjaan pada tahap pertama</p>
                                            <table class="my-4">
                                                <tr>
                                                    <td>Biaya</td>
                                                    <td>:</td>
                                                    <th>@currency($post->pry_total*0.3)</th>
                                                </tr>
                                                <tr>
                                                    <td>Status</td>
                                                    <td>:</td>
                                                    <th>{{$item->status}}</th>
                                                </tr>
                                            </table>
                                        </div>
    
                                    </div>
                                    <div class="col-md-8">
    
                                        <table class="table border">
                                        <tr>
                                            <th>No</th>
                                            <th>Waktu Dimulai</th>
                                            <th>Catatan</th>
                                            <th>Status</th>
                                            <th>Lihat</th>
                                        </tr>
    
                                        @forelse($item->detail as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->waktu }}</td>
                                                <td>{{ $item->catatan }}</td>
    
                                                @if($item->det_status == 'proses')
                                                    <td><span class="badge bg-warning">Proses</span></td>
                                                @elseif($item->det_status == 'revisi')
                                                    <td><span class="badge bg-danger">Revisi</span></td>
                                                @elseif($item->det_status == 'dikirim')
                                                    <td><span class="badge bg-primary">Dikirim</span></td>
                                                @else
                                                    <td><span class="badge bg-success">Selesai</span></td>
                                                @endif
    
                                                <td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#PDFModal{{ $item->id_detail_desain }}">Lihat</button>
                                                </td>
                                            </tr>
    
                                        @empty
                                        <tr>
                                            <td>
                                                Proyek masih diproses
                                            </td>
                                        </tr>
                                            
                                        @endforelse
    
                                    </table>
                                    </div>
                                </div>
    
                            @endif
                        @empty
    
                        <div class="flex-shrink-0 w-100">
                            <div class="overlay"></div>
                            <div class="p-4 position-relative text-white" style="z-index: 100">
                                <h5>Anda belum melakukan pembayaran tahap 2</h5>
                                <table class="my-4">
                                    <tr>
                                        <td>Total Biaya</td>
                                        <td>:</td>
                                        <th>&nbsp; @currency($post->pry_total)</th>
                                    </tr>
                                    <tr>
                                        <td>Biaya Tahap 1</td>
                                        <td>:</td>
                                        <th>&nbsp; 30%</th>
                                    </tr>
                                    <tr>
                                        <td>Biaya</td>
                                        <td>:</td>
                                        <th>&nbsp; @currency($post->pry_total*0.3)</th>
                                    </tr>
                                </table>
                                <button data-bs-toggle="modal" data-bs-target="#pby-2" class="btn btn-dark">Lakukan Pembayarann</button>
                            </div>
                        
                        @endforelse
    
                          
                    </div>
                    
                    
                </div>


                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    
                    <div class="card p-2">
                        
                        @forelse($tb_hasil3 as $item)
    
                            @if($item->pby_status == 'belum dibayar')
                                <div class="flex-shrink-0 w-100">
                                <div class="overlay"></div>
                                <div class="p-4 position-relative text-white" style="z-index: 100">
                                    <h5>Pembayaran anda sedang diproses</h5>
                                    <table class="my-4">
                                        <tr>
                                            <td>Total Biaya</td>
                                            <td>:</td>
                                            <th>&nbsp; @currency($post->pry_total)</th>
                                        </tr>
                                        <tr>
                                            <td>Biaya Tahap 3</td>
                                            <td>:</td>
                                            <th>&nbsp; 40%</th>
                                        </tr>
                                        <tr>
                                            <td>Biaya</td>
                                            <td>:</td>
                                            <th>&nbsp; @currency($post->pry_total*0.4)</th>
                                        </tr>
                                    </table>
                                    <button data-bs-toggle="modal" data-bs-target="#pby-3" class="btn btn-dark">Lihat Pembayaran</button>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="p-2">
                                            <h6 class="fw-bold fs-5">Proyek Tahap 3</h6>
                                            <p class="text-muted fs-6">Proses pengerjaan pada tahap terakhir</p>
                                            <table class="my-4">
                                                <tr>
                                                    <td>Biaya</td>
                                                    <td>:</td>
                                                    <th>@currency($post->pry_total*0.3)</th>
                                                </tr>
                                                <tr>
                                                    <td>Status</td>
                                                    <td>:</td>
                                                    <th>{{$item->status}}</th>
                                                </tr>
                                            </table>
                                        </div>
    
                                    </div>
                                    <div class="col-md-8">
    
                                        <table class="table border">
                                        <tr>
                                            <th>No</th>
                                            <th>Waktu Dimulai</th>
                                            <th>Catatan</th>
                                            <th>Status</th>
                                            <th>Lihat</th>
                                        </tr>
    
                                        @forelse($item->detail as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->waktu }}</td>
                                                <td>{{ $item->catatan }}</td>
    
                                                @if($item->det_status == 'proses')
                                                    <td><span class="badge bg-warning">Proses</span></td>
                                                @elseif($item->det_status == 'revisi')
                                                    <td><span class="badge bg-danger">Revisi</span></td>
                                                @elseif($item->det_status == 'dikirim')
                                                    <td><span class="badge bg-primary">Dikirim</span></td>
                                                @else
                                                    <td><span class="badge bg-success">Selesai</span></td>
                                                @endif
    
                                                <td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#PDFModal{{ $item->id_detail_desain }}">Lihat</button>
                                                </td>
                                            </tr>
    
                                        @empty
                                        <tr>
                                            <td>
                                                Proyek masih diproses
                                            </td>
                                        </tr>
                                            
                                        @endforelse
    
                                    </table>
                                    </div>
                                </div>
    
                            @endif
    
                        @empty
    
                        <div class="flex-shrink-0 w-100">
                            <div class="overlay"></div>
                            <div class="p-4 position-relative text-white" style="z-index: 100">
                                <h5>Anda belum melakukan pembayaran tahap 3</h5>
                                <table class="my-4">
                                    <tr>
                                        <td>Total Biaya</td>
                                        <td>:</td>
                                        <th>&nbsp; @currency($post->pry_total)</th>
                                    </tr>
                                    <tr>
                                        <td>Biaya Tahap 3</td>
                                        <td>:</td>
                                        <th>&nbsp; 40%</th>
                                    </tr>
                                    <tr>
                                        <td>Biaya</td>
                                        <td>:</td>
                                        <th>&nbsp; @currency($post->pry_total*0.4)</th>
                                    </tr>
                                </table>
                                <button data-bs-toggle="modal" data-bs-target="#pby-3" class="btn btn-dark">Lakukan Pembayarann</button>
                            </div>
                        
                        @endforelse
    
                        
                    </div> 
                    
                </div>

            </div>
        </div>



    </div>


@foreach($hasil_desain as $data)

        <!-- PDF Modal-->
        <div class="modal fade" id="PDFModal{{ $data->id_detail_desain }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="btn btn-outline-dark" data-bs-dismiss="modal" aria-label="Close">Kembali</button>
                        
                        @if($data->det_status == 'dikirim')
                        <div class="d-flex">
                            <button data-bs-toggle="modal" data-bs-target="#RevisiModal{{ $data->id_detail_desain }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Ajukan Revisi</button>
                            <a href="/acc/{{$data->desain_id}}/{{$data->id_detail_desain}}" class="btn btn-success ms-4"><i class="fa fa-check-circle"></i> Terima Desain</a>
                        </div>
                        @endif
                        
                    </div>
                    <div class="modal-body">
                        @if(empty($data->file))
                        Desain masih dalam proses
                        @else   
                        <div id="pdf{{ $data->id_detail_desain }}"> {{ $data->file }} </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>


        <!-- Revisi Modal-->
        <div class="modal-kedua modal fade" id="RevisiModal{{ $data->id_detail_desain }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajukan Revisi</h5>
                        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/pengerjaan_proyek/revisi" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="id_proyek" value="{{$post->pry_id}}">
                            <input type="hidden" name="id_desain" value="{{ $data->desain_id }}">

                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Catatan Revisi:</label>
                                <textarea name="catatan" class="form-control" id="exampleFormControlTextarea1" rows="8"></textarea>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                        <Button type="submit" class="btn btn-danger">Ajukan Revisi</button>
                    </div>

                    </form>

                </div>
            </div>
        </div>


        <!-- Edit Modal-->
        <div class="modal-kedua modal fade" id="EditModal{{ $data->id_detail_desain }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit File Desain</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/detail_proyek/AddFile" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <p>Silahkan upload file berupa hasil desain</p>

                            <input type="hidden" name="id_proyek" value="{{$post->pry_id}}">
                            <input type="hidden" name="id_detail_desain" value="{{ $data->id_detail_desain }}">
                            <input type="hidden" name="nama_file" value="{{$post->pry_nama}}_tahap {{$data->desain_tahap}}-{{$data->id_detail_desain}}">

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Masukkan File Desain</label>
                                <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1"
                                    required>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                        <Button type="submit" class="btn btn-primary">Edit File</button>
                    </div>

                    </form>

                </div>
            </div>
        </div>
@endforeach

    <!-- end modal show hasil desain -->


    <!-- Modal pembayaran 1-->
    <div class="modal modal-lg fade" id="pby-1" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row  pt-3 px-2">
                        <div class="col-md-6">
                            <h2 class="pop-bold fs-3">Pembayaran Tahap 1 </h2>
                            <p class="text-muted">Silahkan isi form di bagian kanan berdasarkan data-data di bawah ini
                                agar proyek anda segera dapat dikerjakan. </p>
                            <h4 class="h5 pt-4">Data Pembayaran: </h4>
                            <table class="ms-4 w-100">
                                <tr>
                                    <td>Nama Bank</td>
                                    <td>:</td>
                                    <td>BRI</td>
                                </tr>
                                <tr>
                                    <td>Nomor Rekening</td>
                                    <td>:</td>
                                    <td>0008928379823</td>
                                </tr>
                                <tr>
                                    <td>Nama Rekening</td>
                                    <td>:</td>
                                    <td>CV. Wijaya Kencana Consultant</td>
                                </tr>
                                <tr>
                                    <td>Biaya</td>
                                    <td>:</td>
                                    <td class="fw-bold">@currency($post->pry_total*0.3)</td>
                                </tr>
                            </table>

                            <h4 class="h5 pt-4">CATATAN: </h4>
                            <ul class="text-muted">
                                <li class="fs-6">Konfirmasi membutuhkan waktu 1-2 hari kerja.</li>
                                <li class="fs-6">Dimohon menggunakan foto bukti pembayaran yang jelas.</li>
                                <li class="fs-6">Proyek anda akan langsung dikerjakan ketika pembayaran sudah
                                    diverifikasi</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h3>Form Pembayaran</h3>

                            <form class="w-100" action="/bayar" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="tahap" value="1">
                                <input type="hidden" name="id_proyek" value="{{$id_proyek}}">
                                <input type="hidden" name="biaya" value="{{$post->pry_total}}">
                                
                                <div class="form-group pb-3">
                                    <label for="bank">Pilih Bank</label>
                                    <select name="bank" id="bank" class="form-select"
                                        aria-label="Default select example" required>
                                        <option value="" selected>- Pilih Jenis Bank -</option>
                                        <option value="BRI">BRI</option>
                                        <option value="BCA">BCA</option>
                                        <option value="BNI">BNI</option>
                                    </select>
                                </div>
                                <div class="form-group pb-3">
                                    <label for="nama">Nomor Rekening</label>
                                    <input name="no_rek" type="number" class="form-control" id="norek" aria-describedby="norek"
                                        placeholder="Masukkan nomor rekening" required>
                                </div>
                                <div class="form-group pb-3">
                                    <label for="nama">Nama</label>
                                    <input name="nama_rek" type="text" class="form-control" id="nama" aria-describedby="nama"
                                        placeholder="Masukkan nama rekening" required>
                                </div>
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Masukkan bukti
                                        pembayaran</label>
                                    <input name="img_bukti" class="form-control" type="file" id="formFileMultiple" required>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary float-start"
                                        data-bs-dismiss="modal">Batal</button>
                                    <input class="btn btn-dark float-right" type="submit" value="Kirim Pembayaran">
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal pembayaran -->

       <!-- Modal pembayaran 2-->
       <div class="modal modal-lg fade" id="pby-2" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row  pt-3 px-2">
                        <div class="col-md-6">
                            <h2 class="pop-bold fs-3">Pembayaran Tahap 2 </h2>
                            <p class="text-muted">Silahkan isi form di bagian kanan berdasarkan data-data di bawah ini
                                agar proyek anda segera dapat dikerjakan. </p>
                            <h4 class="h5 pt-4">Data Pembayaran: </h4>
                            <table class="ms-4 w-100">
                                <tr>
                                    <td>Nama Bank</td>
                                    <td>:</td>
                                    <td>BRI</td>
                                </tr>
                                <tr>
                                    <td>Nomor Rekening</td>
                                    <td>:</td>
                                    <td>0008928379823</td>
                                </tr>
                                <tr>
                                    <td>Nama Rekening</td>
                                    <td>:</td>
                                    <td>CV. Wijaya Kencana Consultant</td>
                                </tr>
                                <tr>
                                    <td>Biaya</td>
                                    <td>:</td>
                                    <td class="fw-bold">@currency($post->pry_total*0.3)</td>
                                </tr>
                            </table>

                            <h4 class="h5 pt-4">CATATAN: </h4>
                            <ul class="text-muted">
                                <li class="fs-6">Konfirmasi membutuhkan waktu 1-2 hari kerja.</li>
                                <li class="fs-6">Dimohon menggunakan foto bukti pembayaran yang jelas.</li>
                                <li class="fs-6">Proyek anda akan langsung dikerjakan ketika pembayaran sudah
                                    diverifikasi</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h3>Form Pembayaran</h3>

                            <form class="w-100" action="/bayar" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="tahap" value="2">
                                <input type="hidden" name="id_proyek" value="{{$id_proyek}}">
                                <input type="hidden" name="biaya" value="{{$post->pry_total}}">
                                
                                <div class="form-group pb-3">
                                    <label for="bank">Pilih Bank</label>
                                    <select name="bank" id="bank" class="form-select"
                                        aria-label="Default select example" required>
                                        <option value="" selected>- Pilih Jenis Bank -</option>
                                        <option value="1">BRI</option>
                                        <option value="2">BCA</option>
                                        <option value="3">BNI</option>
                                    </select>
                                </div>
                                <div class="form-group pb-3">
                                    <label for="nama">Nomor Rekening</label>
                                    <input name="no_rek" type="number" class="form-control" id="norek" aria-describedby="norek"
                                        placeholder="Masukkan nomor rekening" required>
                                </div>
                                <div class="form-group pb-3">
                                    <label for="nama">Nama</label>
                                    <input name="nama_rek" type="text" class="form-control" id="nama" aria-describedby="nama"
                                        placeholder="Masukkan nama rekening" required>
                                </div>
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Masukkan bukti
                                        pembayaran</label>
                                    <input name="img_bukti" class="form-control" type="file" id="formFileMultiple" required>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary float-start"
                                        data-bs-dismiss="modal">Batal</button>
                                    <input class="btn btn-dark float-right" type="submit" value="Kirim Pembayaran">
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal pembayaran -->

       <!-- Modal pembayaran 3-->
       <div class="modal modal-lg fade" id="pby-3" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row  pt-3 px-2">
                        <div class="col-md-6">
                            <h2 class="pop-bold fs-3">Pembayaran Tahap 3 </h2>
                            <p class="text-muted">Silahkan isi form di bagian kanan berdasarkan data-data di bawah ini
                                agar proyek anda segera dapat dikerjakan. </p>
                            <h4 class="h5 pt-4">Data Pembayaran: </h4>
                            <table class="ms-4 w-100">
                                <tr>
                                    <td>Nama Bank</td>
                                    <td>:</td>
                                    <td>BRI</td>
                                </tr>
                                <tr>
                                    <td>Nomor Rekening</td>
                                    <td>:</td>
                                    <td>0008928379823</td>
                                </tr>
                                <tr>
                                    <td>Nama Rekening</td>
                                    <td>:</td>
                                    <td>CV. Wijaya Kencana Consultant</td>
                                </tr>
                                <tr>
                                    <td>Biaya</td>
                                    <td>:</td>
                                    <td class="fw-bold">@currency($post->pry_total*0.4)</td>
                                </tr>
                            </table>

                            <h4 class="h5 pt-4">CATATAN: </h4>
                            <ul class="text-muted">
                                <li class="fs-6">Konfirmasi membutuhkan waktu 1-2 hari kerja.</li>
                                <li class="fs-6">Dimohon menggunakan foto bukti pembayaran yang jelas.</li>
                                <li class="fs-6">Proyek anda akan langsung dikerjakan ketika pembayaran sudah
                                    diverifikasi</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h3>Form Pembayaran</h3>

                            <form class="w-100" action="/bayar" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="tahap" value="3">
                                <input type="hidden" name="id_proyek" value="{{$id_proyek}}">
                                <input type="hidden" name="biaya" value="{{$post->pry_total}}">
                                
                                <div class="form-group pb-3">
                                    <label for="bank">Pilih Bank</label>
                                    <select name="bank" id="bank" class="form-select"
                                        aria-label="Default select example" required>
                                        <option value="" selected>- Pilih Jenis Bank -</option>
                                        <option value="BRI">BRI</option>
                                        <option value="BCA">BCA</option>
                                        <option value="BNI">BNI</option>
                                    </select>
                                </div>
                                <div class="form-group pb-3">
                                    <label for="nama">Nomor Rekening</label>
                                    <input name="no_rek" type="number" class="form-control" id="norek" aria-describedby="norek"
                                        placeholder="Masukkan nomor rekening" required>
                                </div>
                                <div class="form-group pb-3">
                                    <label for="nama">Nama</label>
                                    <input name="nama_rek" type="text" class="form-control" id="nama" aria-describedby="nama"
                                        placeholder="Masukkan nama rekening" required>
                                </div>
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Masukkan bukti
                                        pembayaran</label>
                                    <input name="img_bukti" class="form-control" type="file" id="formFileMultiple" required>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary float-start"
                                        data-bs-dismiss="modal">Batal</button>
                                    <input class="btn btn-dark float-right" type="submit" value="Kirim Pembayaran">
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal pembayaran -->

    <script src="{{ asset('../asset/js/pdfobject.min.js') }}"></script>

@foreach($hasil_desain as $data)

        <script>
            PDFObject.embed("{{ asset('../asset/file/hasil_desain/'.$data->file) }}",
                "#pdf{{ $data->id_detail_desain }}");
        </script>

@endforeach

<script>
    $(document).on('show.bs.modal', '.modal', function() {
    const zIndex = 1040 + 10 * $('.modal:visible').length;
    $(this).css('z-index', zIndex);
    setTimeout(() => $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack'));
    });
</script>
@endsection





