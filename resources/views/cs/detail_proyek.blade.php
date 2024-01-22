@extends('layouts.admin')

@section('title', 'Detail Proyek')

@section('css')
<!-- Custom styles for this page -->
<link href="{{ asset('../asset/cs/vendor/datatables/dataTables.bootstrap4.min.css') }}"
    rel="stylesheet">

<style>
    .pdfobject-container {
        height: 30rem;
        border: 1rem solid rgba(0, 0, 0, .1);
    }

</style>
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
                    <div class="p-2">
                        <a href="/cs/proyek/berjalan">Proyek</a> / {{ $post->pry_nama }}
                    </div>
                </div>


                <div class="card p-2 pt-4">
                    <h1 class="h5 font-weight-bold p-2">{{ $post->pry_nama }}</h1>

                    <div class="row px-2">
                        <div class="col-md-4 pl-3">
                            <div class="card p-2 mb-2">
                                <table width="100%">
                                    <tr>
                                        <th>Bangunan</th>
                                        <td>: </td>
                                        <td>{{ $post->nama_jenis }}</td>
                                    </tr>
                                    <tr>
                                        <th>P*L*Lantai</th>
                                        <td>: </td>
                                        <td>{{ $post->pry_panjang }} * {{ $post->pry_lebar }} *
                                            {{ $post->pry_lantai }}</td>
                                    </tr>
                                    <tr>
                                        <th>Luas</th>
                                        <td>: </td>
                                        <td>{{ $post->pry_luas }} m <sup>2</sup></td>
                                    </tr>
                                    <tr>
                                        <th>Layanan</th>
                                        <td>: </td>
                                        <td>{{ $post->ly_nama }} </td>
                                    </tr>
                                    <tr>
                                        <th>Total Biaya</th>
                                        <td>: </td>
                                        <td>Rp. {{ $post->pry_total }} </td>
                                    </tr>
                                    <tr>
                                        <th>Tgl Proyek</th>
                                        <td>: </td>
                                        <td>{{ $post->pry_tgl }} </td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>: </td>
                                        <td>{{ $post->pry_status }} </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="card p-2 mb-2">
                                <h6 class="font-weight-bold">Style</h6>
                                <div class="row">

                                @foreach($style as $d)
                                    <div class="col-md-6">
                                        <li>
                                        {{$d->nama_style}}
                                        </li>
                                    </div>
                                
                                @endforeach
                                </div>
                            </div>

                            <div class="card p-2">
                                <table>
                                    <tr>
                                        <th>Nama</th>
                                        <td> : </td>
                                        <td>{{ $post->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td> : </td>
                                        <td>{{ $post->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Telepon</th>
                                        <td> : </td>
                                        <td>{{ $post->plg_telp }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td> : </td>
                                        <td>{{ $post->plg_alamat }}</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="card p-2 mt-3">
                                <h6 class="font-weight-bold">Catatan: </h6>
                                <div class="p-1">{{ $post->catatan }}</div>
                            </div>
                            <div class="card p-2 mt-3">
                                <h6 class="font-weight-bold">File Tambahan: </h6>
                                <!-- <div class="card p-1">{{ $post->catatan }}</div> -->
                                <div class="card p-2">

                                    @if(!empty($file_proyek->file))
                                        <img src="{{ asset('../asset/file/'.$file_proyek->file) }}"
                                            alt="{{ $file_proyek->file }}">
                                    @else
                                        Tidak ada file tambahan

                                    @endif
                                </div>

                            </div>


                        </div>
                        <div class="col-md-8">
                            <div class="card p-2 mb-3">
                                <h2 class="h5 font-weight-bold">Pengerjaan Proyek</h2>
                            </div>

                            <div class="card p-2">
                                <table class="table border">
                                    <tr>
                                        <th>Tahap</th>
                                        <th>Biaya</th>
                                        <th>Waktu Dimulai</th>
                                        <th>Status</th>
                                        <th>Pengerjaan</th>
                                    </tr>

                                    @foreach($hasil_desain as $item)
                                        <tr>
                                            <td>{{ $item->desain_tahap }}</td>
                                            <td>@currency($item->desain_biaya)</td>
                                            <td>{{ $item->desain_waktu }}</td>

                                            @if($item->status == 'proses')
                                                <td><span class="badge badge-warning">Proses</span></td>
                                            @elseif($item->status == 'revisi')
                                                <td><span class="badge badge-danger">Revisi</span></td>
                                            @elseif($item->status == 'dikirim')
                                                <td><span class="badge badge-primary">Dikirim</span></td>
                                            @else
                                                <td><span class="badge badge-success">Selesai</span></td>
                                            @endif

                                            <td><button class="btn btn-primary" href="#" data-toggle="modal"
                                                    data-target="#proyekModal{{ $item->desain_id }}">Lihat</button>
                                            </td>
                                        </tr>

                                    @endforeach

                                </table>
                            </div>

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


@foreach($hasil_desain as $item)
    <div class="modal fade" id="proyekModal{{ $item->desain_id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">

                        {{ (empty($item->file))? "Anda Belum Mengirim File Desain" : "Detail Pengerjaan Proyek"; }}

                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>Waktu</th>
                            <th>Catatan</th>
                            <th>Status</th>
                            <th>Hasil Desain</th>

                        </tr>
                        @foreach($hasil_desain as $data)
                            @if($item->desain_id == $data->id_hasil_desain)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->waktu }}</td>
                                    <td>{{ $data->catatan }}</td>

                                    @if($item->status == 'proses')
                                        <td><span class="badge badge-warning">Proses</span></td>
                                    @elseif($item->status == 'revisi')
                                        <td><span class="badge badge-danger">Revisi</span></td>
                                    @elseif($item->status == 'dikirim')
                                        <td><span class="badge badge-primary">Dikirim</span></td>
                                    @else
                                        <td><span class="badge badge-success">Selesai</span></td>
                                    @endif

                                    @if(!empty($data->file))
                                        <td><button class="btn btn-primary" href="#" data-toggle="modal"
                                                data-target="#PDFModal{{ $data->id_detail_desain }}">Lihat
                                                Desain</button></td>
                                    @else
                                        <td><button class="btn btn-danger" href="#" data-toggle="modal"
                                                data-target="#UploadModal{{ $data->id_detail_desain }}">Upload
                                                Desain</button></td>
                                    @endif
                                </tr>

                            @endif

                        @endforeach

                    </table>


                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>

                </form>


            </div>
        </div>
    </div>

@endforeach



@foreach($hasil_desain as $data)
    @if($item->desain_id == $data->id_hasil_desain)

        <!-- PDF Modal-->
        <div class="modal fade" id="PDFModal{{ $data->id_detail_desain }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="btn btn-outline-dark" data-dismiss="modal" aria-label="Close">Kembali</button>
                        
                        @if($data->status == 'dikirim')
                        <div class="d-flex">
                            <form action="/cs/detail_proyek/DeleteFile" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" name="id_detail_desain" value="{{$data->id_detail_desain}}" class="btn btn-danger mr-2">Hapus</button>
                            </form>
                            <button class="btn btn-primary" href="#" data-toggle="modal"
                                                data-target="#EditModal{{ $data->id_detail_desain }}">Edit File</button>
                        </div>
                        @endif
                        
                    </div>
                    <div class="modal-body">
                        <div id="pdf{{ $data->id_detail_desain }}">pdf</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upload Modal-->
        <div class="modal-kedua modal fade" id="UploadModal{{ $data->id_detail_desain }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload File Desain</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/cs/detail_proyek/AddFile" method="POST" enctype="multipart/form-data">
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
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <Button type="submit" class="btn btn-primary">Upload File</button>
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
                        <form action="/cs/detail_proyek/AddFile" method="POST" enctype="multipart/form-data">
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
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <Button type="submit" class="btn btn-primary">Edit File</button>
                    </div>

                    </form>

                </div>
            </div>
        </div>




    @endif
@endforeach



@endsection


@section('js')
<script src="{{ asset('../asset/js/pdfobject.min.js') }}"></script>

@foreach($hasil_desain as $data)
    @if($item->desain_id == $data->id_hasil_desain)

        <script>
            PDFObject.embed("{{ asset('../asset/file/hasil_desain/'.$data->file) }}",
                "#pdf{{ $data->id_detail_desain }}");

        </script>

    @endif
@endforeach

<script>
$(document).on('show.bs.modal', '.modal', function() {
  const zIndex = 1040 + 10 * $('.modal:visible').length;
  $(this).css('z-index', zIndex);
  setTimeout(() => $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack'));
});
</script>

@endsection
