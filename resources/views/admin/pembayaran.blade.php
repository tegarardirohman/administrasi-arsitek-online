@extends('layouts.admin')

@section('title', 'Pembayaran')

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

<li class="nav-item active">
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
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->nama}}</span>
                            <img class="img-profile rounded-circle" src="{{asset('../asset/images/user/'.Auth::user()->img)}}">
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
                    <h1 class="h3 mb-0 text-gray-800">Data Pembayaran</h1>
                </div>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Proyek</th>
                                        <th>Tahap</th>
                                        <th>Bank</th>
                                        <th>Nama_rek</th>
                                        <th>No_rek</th>
                                        <th>Biaya</th>
                                        <th>Status</th>
                                        <th>Bukti Pembayaran</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Proyek</th>
                                        <th>Tahap</th>
                                        <th>Bank</th>
                                        <th>Nama_rek</th>
                                        <th>No_rek</th>
                                        <th>Biaya</th>
                                        <th>Status</th>
                                        <th>Bukti Pembayaran</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    @foreach($post as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->pry_nama }}</td>
                                            <td>{{ $item->desain_tahap }}</td>
                                            <td>{{ $item->bank }}</td>
                                            <td>{{ $item->nama_rek }}</td>
                                            <td>{{ $item->no_rek }}</td>
                                            <td>{{ $item->desain_biaya }}</td>
                                            <td>
                                                @if($item->pby_status === 'diterima')
                                                    <span class="py-1 px-2 rounded text-white bg-success">{{$item->pby_status }}</span>
                                                @elseif($item->pby_status === 'diajukan')
                                                    <span class="py-1 px-2 rounded text-white bg-warning">{{$item->pby_status }}</span>
                                                @else
                                                    <span class="py-1 px-2 rounded text-white bg-danger">{{$item->pby_status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <btn class="btn btn-primary" href="#" data-toggle="modal"
                                                    data-target="#bukti{{ $item->pby_id }}">
                                                    Bukti Pembayaran
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

@foreach($post as $item)
    <div class="modal fade" id="bukti{{ $item->pby_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img class="img-fluid" src="{{ asset('../asset/images/bukti_bayar/'.$item->pby_img) }}" alt="">
                </div>
                <div class="modal-footer d-block">

                <form action="/admin/pembayaran/{{$item->pby_id}}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" name="opsi" value="ditolak" class="btn btn-danger">Tolak</button>
                    <button type="submit" name="opsi" value="diterima" class="btn btn-success float-right">Verifikasi</button>
                
                    
                </form>
                
            </div>
            </div>
        </div>
    </div>
@endforeach


@endsection
