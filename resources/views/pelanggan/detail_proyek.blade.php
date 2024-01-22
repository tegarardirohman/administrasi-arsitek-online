@extends('layouts.main')

@section('title', 'Proyek Saya')

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
<section id="proyek" class="pt-5 mt-5">
    <div class="container">
        <div class="d-flex">
            <div class="w-100">
                Proyek
                <i class="fa fa-arrow-right"></i>
                Detail proyek

                <h1 class="h2 pt-1">Proyek Bapak SUmanto</h1>
                <p class="text-muted">Surabaya</p>
            </div>

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <div class="d-flex justify-content-center align-items-center w-100">
                    <li class="nav-item" role="presentation">
                        <button class="btn nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Tahap 1</button>
                    </li>
                    <li class="nav-item  px-2" role="presentation">
                        <div class="fa fa-arrow-right"></div>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Tahap 2</button>
                    </li>

                    <li class="nav-item px-2" role="presentation">
                        <div class="fa fa-arrow-right"></div>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">Tahap 3</button>
                    </li>
                </div>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="rounded border px-3 py-4">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="h2 fw-bold fs-5 mb-4">Proyek Interior - Kost 2 Lantai</p>

                            <div class="row mb-4 gy-3">
                                <div class="col-md-3">
                                    <div class="d-flex align-items-center">
                                        <div class="card me-1">
                                            <i class="fa fa-paperclip fs-3 p-2"></i>
                                        </div>
                                        <div>
                                            <div class="text-muted fs-6">Layanan</div>
                                            <div class="fw-bold fs-6">Interior</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="d-flex align-items-center">
                                        <div class="card me-1">
                                            <i class="fa fa-home fs-3 p-2"></i>
                                        </div>
                                        <div>
                                            <div class="text-muted fs-6">Bangunan</div>
                                            <div class="fw-bold fs-6">Rumah</div>
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
                                            <div class="fw-bold fs-6">30 m</div>
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
                                            <div class="fw-bold fs-6">30 m</div>
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
                                            <div class="fw-bold fs-6">2</div>
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
                                            <div class="fw-bold fs-6">240 m2</div>
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
                                            <div class="fw-bold fs-6">Rp. 40.000</div>
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
                                            <div class="fw-bold fs-6">Rp. 12.000.000</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card p-2">
                                <h6 class="fw-bold">Data Pemesan</h6>
                                <table>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <th>Tegar Ardi Rohman</th>
                                    </tr>
                                    <tr>
                                        <td>Telepon</td>
                                        <td>:</td>
                                        <th>0812121277634</th>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <th>Surabaya</th>
                                    </tr>
                                </table>
                            </div>

                        </div>

                        <div class="col-md-12 pt-4">
                            <h6 class="fw-bold">Catatan :</h6>
                            <div class="text-muted">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex,
                                consectetur? Suscipit, quae placeat atque ea, recusandae sapiente facilis non magni
                            </div>

                            <div class="pt-4">
                                <h6 class="fw-bold">File Tambahan</h6>
                                <div class="row gx-1">
                                    <div class="col-md-2">
                                        <img class="w-100" src="https://dummyimage.com/600x400/000/fff" alt="Image 2">
                                    </div>
                                    <div class="col-md-2">
                                        <img class="w-100" src="https://dummyimage.com/600x400/000/fff" alt="Image 2">
                                    </div>

                                </div>
                            </div>

                            <div class="pt-5">
                                <button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                                <button class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</button>
                                <button class="btn btn-dark float-end">Pembayaran <i
                                        class="fa fa-arrow-right"></i></button>
                            </div>



                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="tab-content" id="pills-tabContent">

                    <!-- belum dibayar -->
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <div class="card px-3 py-4">

                            <h6 class="fw-bold fs-5 pb-0 text-center">Progress Pengerjaan Proyek 1</h6>

                            <video class="img-fluid" autoplay loop muted>
                                <source src="{{ asset('../asset/images/proses2.mp4') }}"
                                    type="video/mp4">
                                Sedang dikerjakan
                            </video>

                            <ul class="ps-1 mt-n5">
                                <li class="card p-2 text-center">Sedang Dikerjakan</li>
                            </ul>

                            <h6 class="fw-bold">Perkiraan Selesai : </h6>
                            <ul class="ps-1">
                                <li class="card p-2 text-center">02 Desember 2022</li>
                            </ul>

                            <div class="pt-5 d-none">
                                <h6 class="fw-bold pb-2">File desain tahap 1 </h6>
                                <button class="btn btn-dark disabled w-100">Liat Hasil Desain</button>
                            </div>



                            <div class="overlay text-white opacity-100 text-center pt-5">
                                <h6 class="fs-4 fw-bold opacity-100">Proyek tahap 1 anda belum dikerjakan</h6>
                                <p class="opacity-100">Silahkan klik tombol di bawah untuk melakukan pembayaran</p>
                                <button class="btn btn-dark opacity-100" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Pembayaran tahap 1</button>
                            </div>

                        </div>
                    </div>

                    <!-- sedang dikerjakan -->
                    <div class="tab-pane fade show" id="pills-profile" role="tabpanel"
                        aria-labelledby="pills-profile-tab">
                        <div class="card px-3 py-4">

                            <h6 class="fw-bold fs-5 pb-0 text-center">Progress Pengerjaan Proyek 2</h6>

                            <video class="img-fluid" autoplay loop muted>
                                <source src="{{ asset('../asset/images/done.mp4') }}"
                                    type="video/mp4">
                                Sedang dikerjakan
                            </video>

                            <ul class="ps-1 mt-n5">
                                <li class="card p-2 text-center">Sedang Dikerjakan</li>
                            </ul>

                            <h6 class="fw-bold">Perkiraan Selesai : </h6>
                            <ul class="ps-1">
                                <li class="card p-2 text-center">02 Desember 2022</li>
                            </ul>

                            <div class="pt-3">
                                <a href="{{ asset('../asset/images/done.mp4') }}" download>
                                    <button class="btn btn-dark w-100">Liat Hasil Desain</button>
                                </a>
                            </div>

                            <h6 class="fw-bold pt-2  ">Pilih menu di bawah</h6>

                            <div class="d-flex justify-content-between">
                                <button class="btn btn-danger"  data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">Revisi</button>
                                <button class="btn btn-success">ACC</button>

                            </div>



                            <div class="overlay text-white opacity-100 text-center pt-5 d-none">
                                <h6 class="fs-4 fw-bold opacity-100">Proyek anda belum dikerjakan</h6>
                                <p class="opacity-100">Silahkan klik tombol di bawah untuk melakukan pembayaran</p>
                                <button class="btn btn-dark opacity-100">Pembayaran tahap 1</button>
                            </div>

                        </div>
                    </div>

                    <!-- selesai -->
                    <div class="tab-pane fade show" id="pills-contact" role="tabpanel"
                        aria-labelledby="pills-contact-tab">
                        <div class="card px-3 py-4">

                            <h6 class="fw-bold fs-5 pb-0 text-center">Progress Pengerjaan Proyek 3</h6>

                            <video class="img-fluid" autoplay loop muted>
                                <source src="{{ asset('../asset/images/proses2.mp4') }}"
                                    type="video/mp4">
                                Sedang dikerjakan
                            </video>

                            <ul class="ps-1 mt-n5">
                                <li class="card p-2 text-center">Sedang Dikerjakan</li>
                            </ul>

                            <h6 class="fw-bold">Perkiraan Selesai : </h6>
                            <ul class="ps-1">
                                <li class="card p-2 text-center">02 Desember 2022</li>
                            </ul>

                            <div class="pt-5 d-none">
                                <h6 class="fw-bold pb-2">File desain tahap 1 </h6>
                                <button class="btn btn-dark disabled w-100">Liat Hasil Desain</button>
                            </div>



                            <div class="overlay text-white opacity-100 text-center pt-5 d-none">
                                <h6 class="fs-4 fw-bold opacity-100">Proyek anda belum dikerjakan</h6>
                                <p class="opacity-100">Silahkan klik tombol di bawah untuk melakukan pembayaran</p>
                                <button class="btn btn-dark opacity-100">Pembayaran tahap 1</button>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- heheeeeeeeeeeeeeee -->

            </div>
        </div>

    </div>


    <!-- Modal pembayaran -->
    <div class="modal modal-lg fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                    <td class="fw-bold">Rp. 4.000.000</td>
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
                            <form class="w-100" action="">
                                <div class="form-group pb-3">
                                    <label for="bank">Pilih Bank</label>
                                    <select name="bank" id="bank" class="form-select"
                                        aria-label="Default select example" required>
                                        <option value="" selected>Pilih Jenis Bank</option>
                                        <option value="1">BRI</option>
                                        <option value="2">BCA</option>
                                        <option value="3">BNI</option>
                                    </select>
                                </div>
                                <div class="form-group pb-3">
                                    <label for="nama">Nomor Rekening</label>
                                    <input type="number" class="form-control" id="norek" aria-describedby="norek"
                                        placeholder="Masukkan nomor rekening" required>
                                </div>
                                <div class="form-group pb-3">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" aria-describedby="nama"
                                        placeholder="Masukkan nama rekening" required>
                                </div>
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Masukkan bukti
                                        pembayaran</label>
                                    <input class="form-control" type="file" id="formFileMultiple" multiple required>
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

    <!-- modal -->


    <!-- Modal lihat desain -->
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal lihat desain -->


    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- <script type="javascript" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script> -->

    <script>
        $(document).ready(function () {
            $('#example').DataTable();

        });

    </script>

    @endsection
