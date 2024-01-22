@extends('layouts.admin')

@section('title', 'Layanan Wijaya Kencana Consultant')

@section('css')
<!-- Custom styles for this page -->
<link href="{{ asset('../asset/admin/vendor/datatables/dataTables.bootstrap4.min.css') }}"
    rel="stylesheet">
@endsection

@section('sidebar')
@parent

@endsection


@section('content')
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin/">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Admin</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="/admin/">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Transaksi
        </div>

        <li class="nav-item">
            <a class="nav-link" href="/admin/pembayaran">
                <i class="fas fa-fw fa-dollar-sign"></i>
                <span>Pembayaran</span></a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseProyek" aria-expanded="true"
                aria-controls="collapseTwo">
                <i class="fas fa-fw fa-users"></i>
                <span>Data Proyek</span>
            </a>
            <div id="collapseProyek" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/admin/proyek/diajukan">Proyek Diajukan</a>
                    <a class="collapse-item" href="/admin/proyek/berjalan">proyek Berjalan</a>
                    <a class="collapse-item" href="/admin/proyek/selesai">Proyek Selesai</a>
                    <a class="collapse-item" href="/admin/proyek/gagal">Proyek Gagal</a>
                    <a class="collapse-item" href="/admin/proyek/semua">Semua Data Proyek</a>
                </div>
            </div>
        </li>

        <!-- Heading -->
        <div class="sidebar-heading mt-4">
            Data Master
        </div>

        
        <li class="nav-item">
            <a class="nav-link" href="/admin/portofolio">
                <i class="fas fa-fw fa-building"></i>
                <span>Portofolio</span></a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true"
                aria-controls="collapseMaster">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Data Master</span>
            </a>
            <div id="collapseMaster" class="collapse show" aria-labelledby="headingMaster" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/admin/layanan">Layanan</a>
                    <a class="collapse-item" href="/admin/item_layanan">Item Layanan</a>
                    <a class="collapse-item" href="/admin/jenis_bangunan">Jenis Bangunan</a>
                    <a class="collapse-item" href="/admin/style">Style</a>
                    <a class="collapse-item" href="/admin/kota">Kota</a>

                </div>
            </div>
        </li>

        <!-- Heading -->
        <div class="sidebar-heading mt-4">
            Data Pengguna
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true"
                aria-controls="collapseTwo">
                <i class="fas fa-fw fa-users"></i>
                <span>Pengguna</span>
            </a>
            <div id="collapseUser" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/admin/akun/pelanggan">Pelanggan</a>
                    <a class="collapse-item" href="/admin/akun/cs">Costumer Service</a>
                    <a class="collapse-item" href="/admin/akun/admin">Admin</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>


    </ul>
    <!-- End of Sidebar -->


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                            aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>




                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                            <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

 
                <!-- Data layanan -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Layanan</h6>
                    </div>
                    <div class="card-body">

                    <div class="row">
                        @foreach($post as $item)
                        <div class="col-md-4 mb-3 px-4">

                                <div class="menu-price p-1">
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#hapusModal{{$item->ly_id}}">Hapus</button>
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$item->ly_id}}">Edit</button>
                                </div>
                            <div class="card shadow">
                                
                                <div class="head-price">
                                    <img class="img-fluid w-100" src="{{ asset('../asset/images/paket/'.$item->ly_img) }}" alt="">
                                </div>
                                <div class="harga-price text-center">
                                    <h2 class="h5 pt-2 font-weight-bold text-dark"> {{$item->ly_nama}}</h2>
                                    <h2 class="h5 text-center py-2 font-weight-bold">@currency($item->ly_harga)</h2>
                                </div>
                                <div class="body-price p-3">
                                <button class="btn btn-primary w-100" type="button" data-toggle="collapse" data-target="#item{{$item->ly_id}}" aria-expanded="false" aria-controls="item{{$item->ly_id}}">
                                    Lihat item
                                </button>

                                <div class="collapse" id="item{{$item->ly_id}}">
                                    <div class="card card-body">

                                        <ul class="list-group list-group-flush">
                                    
                                    @foreach($ly_item as $data)
                                    @if($item->ly_id == $data->id_layanan)

                                    <li class="list-group-item rounded-0">{{$data->ly_item}}</li>

                                    @endif
                                    @endforeach
                                        </ul>
                                    </div>
                                    </div>
                                </div>
<!-- 
                                <div class="footer-price p-2">
                                    footer
                                </div> -->
                            </div>
                        </div>

                        @endforeach


                    </div>
                        
                    </div>
                </div>





            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Wijaya Kencana Consultant 2023</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>


<!-- Tambah Modal-->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Layanan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/layanan/tambah" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <div class="form-group mb-3">
                        <label for="exampleFormControlFile1">Masukkan gambar
                        </label>
                        <input type="file" name="img_layanan" class="form-control-file" id="exampleFormControlFile1">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Nama Layanan</label>
                            <input name="nama" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Masukkan nama">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="harga">Harga</label><br>
                            <input name="harga" type="number" min="1" class="form-control" id="harga"
                                aria-describedby="emailHelp" placeholder="Masukkan harga">
                           
                        </div>
                    </div>


                    <label for="">Pilih item</label>
                    <div class="form-row px-4">

                    @foreach($ly_items as $item)
                    <div class="form-check col-md-6">
                        <input name='layanan_item[]' value="{{$item->ly_item_id}}" class="form-check-input" type="checkbox" id="{{$item->ly_item_id}}">
                        <label class="form-check-label" for="{{$item->ly_item_id}}">
                            {{$item->ly_item}}
                        </label>
                    </div>
                    @endforeach
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button class="btn btn-primary" type="submit">Tambah Data</button>
            </div>

            </form>
        </div>
    </div>
</div>



@foreach($post as $item)
<!-- Edit Modal-->
<div class="modal fade" id="editModal{{$item->ly_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Layanan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/layanan/edit" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <input type="hidden" name="id_layanan" value="{{$item->ly_id}}">

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group mb-3">
                                <label for="exampleFormControlFile1">Masukkan gambar
                                </label>
                                <input type="file" name="img_layanan" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img class="img-fluid w-50" src="{{ asset('../asset/images/paket/'.$item->ly_img) }}" alt="">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Nama Layanan</label>
                            <input name="nama" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Masukkan nama" value="{{$item->ly_nama}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="harga">Harga</label><br>
                            <input name="harga" type="number" min="1" class="form-control" id="harga"
                                aria-describedby="emailHelp" placeholder="Masukkan harga" value="{{$item->ly_harga}}" required>
                           
                        </div>
                    </div>


                    <label for="">Pilih item</label>
                    <div class="form-row px-4">

                    @foreach($ly_items as $item2)
                        
                        <div class="form-check col-md-6">
                            <input 
                                    
                        @foreach($relasi as $data)
                            @if($item2->ly_item_id == $data->id_layanan_item && $data->id_layanan == $item->ly_id)            
                                checked
                            @endif
                        @endforeach    
                            name='layanan_item[]' value="{{$item2->ly_item_id}}" class="form-check-input" type="checkbox" id="chk{{$item2->ly_item_id}}">
                            <label class="form-check-label" for="chk{{$item2->ly_item_id}}">
                                {{$item2->ly_item}}
                            </label>
                        </div>

                    @endforeach
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button class="btn btn-primary" type="submit">Edit Data</button>
            </div>

            </form>
        </div>
    </div>
</div>

@endforeach

@foreach($post as $item)
<!-- Hapus Modal-->
<div class="modal fade" id="hapusModal{{$item->ly_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Layanan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data ini?</p>
                <form action="/admin/layanan/hapus" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <input type="hidden" name="id_layanan" value="{{$item->ly_id}}">

                    
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button class="btn btn-danger" type="submit">Hapus Data</button>
            </div>

            </form>
        </div>
    </div>
</div>

@endforeach



@endsection

@section('js')
<link href="{{ asset('../asset/plugin/summernote.min.css') }}" rel="stylesheet">
<!-- include summernote css/js -->
<script src="{{ asset('../asset/plugin/summernote.min.js') }}"></script>

<!-- select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        $('.summernote').summernote();
        $('#summernote').summernote('code', 'html_tags_string_from_db');
        $('.select2').select2();

        $('.select2').select2({
            dropdownParent: $('#tambahModal')
        });

    });

</script>

@endsection
