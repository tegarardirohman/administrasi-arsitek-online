@extends('layouts.admin')

@section('title', 'Proyek')

@section('css')
<!-- Custom styles for this page -->
<link href="{{ asset('../asset/cs/vendor/datatables/dataTables.bootstrap4.min.css') }}"
    rel="stylesheet">
@endsection

@section('sidebar')
@parent

@endsection


@section('content')
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/cs/">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Admin</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="/cs/">
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
            <a class="nav-link" href="/cs/pembayaran">
                <i class="fas fa-fw fa-dollar-sign"></i>
                <span>Pembayaran</span></a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item active">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseProyek" aria-expanded="true"
                aria-controls="collapseTwo">
                <i class="fas fa-fw fa-users"></i>
                <span>Data Proyek</span>
            </a>
            <div id="collapseProyek" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/cs/proyek/diajukan">Proyek Diajukan</a>
                    <a class="collapse-item" href="/cs/proyek/berjalan">proyek Berjalan</a>
                    <a class="collapse-item" href="/cs/proyek/selesai">Proyek Selesai</a>
                    <a class="collapse-item" href="/cs/proyek/gagal">Proyek Gagal</a>
                    <a class="collapse-item" href="/cs/proyek/semua">Semua Data Proyek</a>
                </div>
            </div>
        </li>




        <!-- Heading -->
        <div class="sidebar-heading mt-4">
            Data Master
        </div>

        <li class="nav-item">
            <a class="nav-link" href="/cs/portofolio">
                <i class="fas fa-fw fa-building"></i>
                <span>Portofolio</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/cs/layanan">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Paket</span></a>
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
                    <h6 class="collapse-header">Custom Components:</h6>
                    <a class="collapse-item" href="/cs/pelanggan">Pelanggan</a>
                    <a class="collapse-item" href="/cs/cs">Costumer Service</a>
                    <a class="collapse-item" href="/cs/cs">Admin</a>
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

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800 text-capitalize">Data Proyek {{ $mode }}</h1>
                    <button class="btn btn-primary" href="#" data-toggle="modal" data-target="#TambahProyek">Tambah
                        Proyek</button>
                </div>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Proyek</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Bangunan</th>
                                        <!-- <th>P x L x Lantai</th> -->
                                        <th>Luas</th>
                                        <th>Layanan</th>
                                        <!-- <th>Nama</th>
                                        <th>Telepon</th>
                                        <th>Alamat</th> -->
                                        <th>Biaya</th>
                                        <th>Waktu</th>
                                        <!-- <th>Catatan</th> -->
                                        <th>Status</th>
                                        <th>Detail</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Proyek</th>
                                        <th>Bangunan</th>
                                        <!-- <th>P x L x Lantai</th> -->
                                        <th>Luas</th>
                                        <th>Layanan</th>
                                        <!-- <th>Nama</th>
                                        <th>Telepon</th>
                                        <th>Alamat</th> -->
                                        <th>Biaya</th>
                                        <th>Waktu</th>
                                        <!-- <th>Catatan</th> -->
                                        <th>Status</th>
                                        <th>Detail</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    @foreach($post as $item)

                                        <tr class="data-row">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->pry_nama }}</td>
                                            <td>{{ $item->nama_jenis }}</td>
                                            <!-- <td>{{ $item->pry_panjang }} x {{ $item->pry_lebar }} x
                                                {{ $item->pry_lantai }}</td> -->
                                            <td>{{ $item->pry_luas }}</td>
                                            <td>{{ $item->ly_nama }}</td>
                                            <!-- <td>{{ $item->nama }}</td>
                                            <td>{{ $item->plg_telp }}</td>
                                            <td>{{ $item->plg_alamat }}</td> -->
                                            <td>{{ $item->pry_total }}</td>
                                            <td>{{ $item->pry_tgl }}</td>
                                            <!-- <td>{{ $item->catatan }}</td> -->
                                            <td>{{ $item->pry_status }}</td>
                                            <td>
                                                <a class="btn btn-secondary" href="/cs/detail_proyek/{{$item->pry_id}}">Detail</a>
                                            </td>

                                            <td class="d-flex">
                                                <button class="btn btn-danger mr-2" id="delete-item" data-item-id="{{ $item->pry_id }}"> <i class="fa fa-trash"></i></button>
                                                <button class="btn btn-warning" data-toggle="modal" data-target="#edit-modal{{ $item->pry_id }}" data-item-id="{{ $item->pry_id }}"><i class="fa fa-edit"></i></button>
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


<!-- Tambah Proyek-->
<div class="modal fade" id="TambahProyek" tabindex="-1" role="dialog" aria-labelledby="modalTambah" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambah">Tambah Data Proyek</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!-- form -->

            <form action="/cs/proyek/tambah" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Jenis Bangunan</label>
                                <select name="jenis_bangunan" class="form-control" id="exampleFormControlSelect1">
                                    <option>- Pilih jenis bangunan -</option>

                                    @foreach($jenis_bangunan as $item)

                                        <option value="{{ $item->id_jenis }}">{{ $item->nama_jenis }}</option>

                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Panjang Bangunan</label>
                                <input name="panjang" type="text" min="1" class="form-control"
                                    id="exampleFormControlInput1" placeholder="Contoh: 12">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Lebar Bangunan</label>
                                <input name="lebar" type="text" min="1" class="form-control"
                                    id="exampleFormControlInput1" placeholder="Contoh: 12">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Jumlah Lantai</label>
                                <input name="jumlah_lantai" type="text" min="1" class="form-control"
                                    id="exampleFormControlInput1" placeholder="Contoh: 12">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Pilih Layanan</label>
                                <select name="layanan" class="form-control" id="exampleFormControlSelect1">
                                    <option>- Pilih Layanan -</option>

                                    @foreach($layanan as $item)

                                        <option value="{{ $item->ly_id }}">{{ $item->ly_nama }}</option>

                                    @endforeach

                                </select>
                            </div>

                        </div>
                        <div class="col-md-6">
                        <label for="">Pilih Style</label>
                        <div class="row">
                        @foreach($style as $item)
                        <div class="col-md-4">
                            <div class="form-check">
                                <input name='style[]' class="form-check-input" type="checkbox" value="{{$item->id_style}}" id="style{{$item->id_style}}">
                                <label class="form-check-label" for="style{{$item->id_style}}">
                                    {{$item->nama_style}}
                                </label>
                            </div>
                        </div>
                        @endforeach
                        </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Pilih Pelanggan</label>
                                <select name="pelanggan" class="form-control" id="exampleFormControlSelect1">
                                    <option>- Pilih pelanggan -</option>

                                    @foreach($akun as $item)

                                        <option value="{{ $item->akun_id }}">{{ $item->nama }}</option>

                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Catatan</label>
                                <textarea name="catatan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">File Pendukung</span>
                                </div>
                                <div class="custom-file">
                                    <input name="file" type="file" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Pilih file </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" value="submit" type="submit">Tambah Data</button>
                   
                </div>


            </form>
            <!-- endform -->
        </div>
    </div>
</div>



<!-- Edit Proyek-->
@foreach($post as $data)
<div class="modal fade" id="edit-modal{{$data->pry_id}}" tabindex="-1" role="dialog" aria-labelledby="modalTambah" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambah">Edit Data Proyek</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!-- form -->

            <form action="/cs/proyek/edit" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="hidden" name="id_proyek" value="{{$data->pry_id}}">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Jenis Bangunan</label>
                                <select name="jenis_bangunan" class="form-control" id="edit_jenis_bangunan">

                                    <option id="edit_jenis_bangunan" value="{{$data->pry_jenis_bangunan}}"> {{$data->nama_jenis}} </option>

                                    @foreach($jenis_bangunan as $item)

                                        <option value="{{ $item->id_jenis }}">{{ $item->nama_jenis }}</option>

                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="edit_panjang">Panjang Bangunan</label>
                                <input name="panjang" type="number" min="1" class="form-control"
                                    id="edit_panjang" placeholder="Contoh: 12" value="{{$data->pry_panjang}}">
                            </div>
                            <div class="form-group">
                                <label for="edit_lebar">Lebar Bangunan</label>
                                <input name="lebar" type="number" min="1" class="form-control"
                                    id="edit_lebar" placeholder="Contoh: 12" value="{{$data->pry_lebar}}">
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

                                    @foreach($layanan as $item)

                                        <option value="{{ $item->ly_id }}">{{ $item->ly_nama }}</option>

                                    @endforeach

                                </select>
                            </div>

                        </div>
                        <div class="col-md-6">
                        <label for="">Pilih Style</label>
                        <div class="row">

                        @foreach($style as $item)
                        
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
                                <label for="edit_pelanggan">Pilih Pelanggan</label>
                                <select name="pelanggan" class="form-control" id="exampleFormControlSelect1">
                                    <option id="edit_pelanggan" value="{{$data->pry_id_akun}}"> {{$data->nama}} </option>

                                    @foreach($akun as $item)

                                        <option value="{{ $item->akun_id }}">{{ $item->nama }}</option>

                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="edit_catatan">Catatan</label>
                                <textarea name="catatan" class="form-control" id="edit_catatan" rows="3">{{$data->catatan}}</textarea>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">File Pendukung</span>
                                </div>
                                <div class="custom-file">

                                    @if(empty($data->file))
                                    <input name="file" type="file" class="custom-file-input" id="edit_file" value="">
                                    <label class="custom-file-label" for="edit_file">Pilih file {{$data->pry_id}}</label>
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



<!-- Delete Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit-modal-label">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="attachment-body-content">
        <p class="text-center">
            Apakah anda yakin ingin menghapus data ini?
        </p>
        <form action="/cs/proyek/delete" id="edit-form" class="form-horizontal" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="del_id_proyek" id="del_id_proyek" value="">
            <input type="hidden" name="mode" value="{{ $mode }}">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Hapus</button>

        </form>
      </div>
    </div>
  </div>
</div>
<!-- Delete Modal -->

@endsection

@section('js')

<Script>

$(document).ready(function() {

//    delete
  $(document).on('click', "#delete-item", function() {
    
    $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

    var options = {
      'backdrop': 'static'
    };
    $('#delete-modal').modal(options)
  })

  // on modal show
  $('#delete-modal').on('show.bs.modal', function() {
    var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 
    var row = el.closest(".data-row");

    // get the data
    var id = el.data('item-id');
    var name = row.children(".name").text();
    var description = row.children(".description").text();

    // fill the data in the input fields
    $("#del_id_proyek").val(id);


    $("#modal-input-name").val(name);
    $("#modal-input-description").val(description);

  })

  // on modal hide
  $('#delete-modal').on('hide.bs.modal', function() {
    $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
    $("#edit-form").trigger("reset");
  })

})


// edit proyek
$(document).ready(function() {

$(document).on('click', "#edit-item", function() {
    $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
    
    var options = {
      'backdrop': 'static'
    };
    $('#edit-modal').modal(options)
  })

  // on modal show
  $('#edit-modal').on('show.bs.modal', function() {
    var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 
    var row = el.closest(".data-row");

    // get the data
    var id = el.data('item-id');
    var name = row.children(".name").text();
    var description = row.children(".description").text();

    // fill the data in the input fields
    $("#del_id_proyek").val(id);


    $("#modal-input-name").val(name);
    $("#modal-input-description").val(description);

  })

  // on modal hide
  $('#edit-modal').on('hide.bs.modal', function() {
    $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
    $("#edit-form").trigger("reset");
  })
})  
</script>

@endsection
