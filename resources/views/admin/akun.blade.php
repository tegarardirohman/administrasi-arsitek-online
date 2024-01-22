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
            <div id="collapseMaster" class="collapse" aria-labelledby="headingMaster" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/admin/layanan">Paket</a>
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
            <div id="collapseUser" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
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
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Tegar Ardi Rohman</span>
                            <!-- <img class="img-profile rounded-circle" src="img/undraw_profile.svg"> -->
                            <i class="fa fa-user"></i>
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

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800 text-capitalize">Data {{$mode}}</h1>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">Tambah {{$mode}}</button>
                </div>


<!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-capitalize">Data {{$mode}}</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Telp/WA</th>
                                        <th>Alamat</th>
                                        <th>Pilihan</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Telp/WA</th>
                                        <th>Alamat</th>
                                        <th>Pilihan</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    @foreach($post as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                <img width="34px" height="34px" src="{{ asset('../asset/images/user/'.$item->img)}}" alt="{{$item->nama}}">
                                            </td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->gender}}</td>
                                            <td>{{$item->telp}}</td>
                                            <td>{{$item->alamat}}</td>
                                            <td class="d-flex">
                                                <btn class="btn btn-danger mr-2" href="#" data-toggle="modal"
                                                    data-target="#hapusModal{{ $item->akun_id }}">
                                                    Hapus
                                                </btn>
                                                <btn class="btn btn-warning" href="#" data-toggle="modal"
                                                    data-target="#editModal{{ $item->akun_id }}">
                                                    Edit
                                                </btn>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
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
                <h5 class="modal-title text-capitalize" id="exampleModalLabel">Tambah {{$mode}}</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/{{$mode}}/tambah" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <input type="hidden" name="mode" value="{{$mode}}">

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Masukkan Gambar</label>
                                <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                            </div>

                            <div class="form-group">
                                <label for="nama-">Nama {{$mode}}</label>
                                <input name="nama" type="text" class="form-control" id="nama-"
                                    aria-describedby="emailHelp" placeholder="Masukkan nama {{$mode}}" required>
                            </div>
                            <div class="form-group">
                                <label for="telp-">No Telp/WA {{$mode}}</label>
                                <input name="telp" type="text" class="form-control" id="telp-"
                                    aria-describedby="emailHelp" placeholder="Masukkan no telepon {{$mode}}" required>
                            </div>

                            <div class="form-group">
                                <label for="email-">Email {{$mode}}</label>
                                <input name="email" type="email" class="form-control" id="email-"
                                    aria-describedby="emailHelp" placeholder="Masukkan email {{$mode}}" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="pass-">Password {{$mode}}</label>
                                <input minlength="8" name="password" type="password" class="form-control" id="pass-"
                                    aria-describedby="emailHelp" placeholder="Masukkan password {{$mode}}" required>
                            </div>

                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="L" required>
                                <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="P" required>
                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" class="text-capitalize">Alamat {{$mode}}</label>
                                <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
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
<div class="modal fade" id="editModal{{$item->akun_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-capitalize" id="exampleModalLabel">Tambah {{$mode}}</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/{{$mode}}/edit" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <input type="hidden" name="mode" value="{{$mode}}">
                    <input type="hidden" name="id_akun" value="{{$item->akun_id}}">

                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Masukkan Gambar</label>
                                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <img class="img-fluid" src="{{asset('../asset/images/user/'.$item->img)}}" alt="{{$item->akun_id}}">
                                </div>
                            </div>
                            

                            <div class="form-group">
                                <label for="nama-{{$item->akun_id}}">Nama {{$mode}}</label>
                                <input name="nama" type="text" class="form-control" id="nama-{{$item->akun_id}}"
                                    aria-describedby="emailHelp" placeholder="Masukkan nama {{$mode}}" value="{{$item->nama}}" required>
                            </div>
                            <div class="form-group">
                                <label for="telp-{{$item->akun_id}}">No Telp/WA {{$mode}}</label>
                                <input name="telp" type="text" class="form-control" id="telp-{{$item->akun_id}}"
                                    aria-describedby="emailHelp" value="{{$item->telp}}" placeholder="Masukkan no telepon {{$mode}}" required>
                            </div>

                            <div class="form-group">
                                <label for="email-{{$item->akun_id}}">Email {{$mode}}</label>
                                <input name="email" type="email" class="form-control" id="email-{{$item->akun_id}}"
                                    aria-describedby="emailHelp" value="{{$item->email}}" placeholder="Masukkan email {{$mode}}" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="pass-{{$item->akun_id}}">Password {{$mode}}</label>
                                <input minlength="8" name="password" type="password" class="form-control" id="pass-{{$item->akun_id}}"
                                    aria-describedby="emailHelp" placeholder="Masukkan password (jika ingin diubah)">
                            </div>

                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input @if($item->gender == 'L') checked @endif class="form-check-input" type="radio" name="gender" id="l{{$item->akun_id}}" value="L" required>
                                    <label class="form-check-label" for="l{{$item->akun_id}}">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input @if($item->gender == 'P') checked @endif class="form-check-input" type="radio" name="gender" id="p{{$item->akun_id}}" value="P" required>
                                    <label class="form-check-label" for="p{{$item->akun_id}}">Perempuan</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="alamat-{{$item->akun_id}}" class="text-capitalize">Alamat {{$mode}}</label>
                                <textarea name="alamat" class="form-control" id="alamat-{{$item->akun_id}}" rows="3">{{$item->alamat}}</textarea>
                            </div>
                        </div>
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
<div class="modal fade" id="hapusModal{{$item->akun_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-capitalize" id="exampleModalLabel">Hapus Data {{$mode}}</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data ini?</p>
                <form action="/admin/{{$mode}}/hapus" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <input type="hidden" name="id_akun" value="{{$item->akun_id}}">
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


@endsection
