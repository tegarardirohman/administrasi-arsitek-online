@extends('layouts.main')

@section('title', 'Beranda')

@section('sidebar')
@parent
<nav class="navbar fixed-top navbar-dark px-5 py-1 navbar-expand-sm">
    <a href="" class="navbar-brand">Wijaya Kencana</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuItems"
        aria-controls="menuItems" aria-expanded="false" aria-label="Toggle Navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse p-1" id="menuItems">
        <ul class="navbar-nav m-auto">
            <li class="nav-item">
                <a href="" class="nav-link active">Beranda</a>
            </li>
            <li class="nav-item">
                <a href="/proyek" class="nav-link">Proyek</a>
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

<section id="header" class="pt-5">
    <div class="overlay"></div>
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-6 car-text">
                <h2 class="h1 text-uppercase fw-bold">
                    Kami Realisasikan Imajinasi Anda
                </h2>
                <p>CV. Wijaya Kencana Consultant merupakan konsultan desain dan perencana yang telah menyelesaikan lebih
                    dari 100 desain. Kami menyediakan jasa konsultan dengan tenaga profesional dengan pengerjaan yang
                    mudah dan cepat.</p>
                <a href="/proyek" class="btn btn-light text-black rounded-0 p-2 px-3">Proyek Baru</a>
                <a href="/kontak" class="btn btn-outline-light ms-3 rounded-0 p-2">Hubungi Kami</a>
            </div>
 
        </div>
    </div>
</section>

<section id="project">
    <div class="container">
        <div class="d-flex justify-content-between">
            <h2 class="h2 pop-bold pb-4 fw-bold">Portofolio Kami</h2>
            <a href="/portofolio" class="btn fw-bold pe-0">Semua portofolio >></a>
        </div>

        <div class="row gx-4">
        <?php $i = 0 ?>
        @foreach($portofolio as $pf)
            @foreach($pf_img as $pi)
            @if($pf->pf_id == $pi->pf_img_id_portofolio)
            <?php $i++ ?>
            <div class="col-md-4">
                <div class="img-pf position-relative">
                    <img style="filter: brightness(80%)" class="img-fluid" src="{{ asset('../asset/images/portofolio/'.$pi->pf_img_img) }}"
                        alt="{{$pi->pf_id}}">
                </div>
                <div class="ket pt-2 d-flex justify-content-between">
                    <span class="fw-bold">{{$pf->pf_nama}}</span>
                    <!-- <div>{{$pf->pf_nama}}</div> -->
                    <a href="/detail_portofolio/{{$pf->pf_id}}" class="text-decoration-none text-black"> Detail <i
                                            class="fa fa-chevron-right"></i></a>


                    <div class="row d-none">
                        <div class="col-md-3">
                            <div class="fs-4 pop-bold px-2 pt-2">0<?php echo $i?></div>
                        </div>
                        <div class="col-md-9">
                            <div class="ket2 w-100">
                                <h5 class="h5 fs-5 fw-bold">{{$pf->pf_nama}}</h5>
                                <div class="d-flex justify-content-between pe-2">
                                    <p class="fs-6"> <i class="fa fa-map-marker"></i> {{$pf->nama_kota}}</p>
                                    <a href="/detail_portofolio/{{$pf->pf_id}}" class="text-decoration-none text-black"> Detail <i
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

<section id="record" class="bg-parallax"
    style="background-image:url({{ asset('../asset/images/carousel/bg-1.jpg') }})">
    <div class="container">
        <div class="overlay"></div>
        <h2 class="fw-bold pop-bold text-white pb-5 fs-1">Percayakan Desain Bangunan Anda ke Kami</h2>
        <p class="text-white">Kami adalah sebuah perusahaan arsitektur yang berdedikasi untuk memberikan solusi desain
            yang inovatif, estetis, dan sesuai dengan kebutuhan Anda. Kami memiliki tim yang terdiri dari arsitek dan
            desainer profesional yang memiliki pengalaman luas dalam berbagai proyek arsitektur.</p>
    </div>
</section>


<section id="whyus" class="pt-5 mt-5">
    <div class="container">


            <div class="col-md-12">
                <h2 class="h2 pb-5 text-center fw-bold">Mengapa Kami?</h2>

                <div class="row gx-4 text-left">
                    <div class="col-md-4 why-item">
                        <div class="p-4 pt-2 shadow rounded">
                            <div class="text-wrap d-inline-block p-3 mb-2">
                                <i class="fa fa-3x fa-diamond px-2"></i>
                            </div>
                            <h5 class="fw-bold">Profesional</h5>
                            <p class="p-why text-muted">Tenaga ahli dan profesional di bidangnya masing-masing.</p>
                        </div>
                    </div>

                    <div class="col-md-4 why-item">
                        <div class="p-4 pt-2 shadow rounded">
                            <div class="text-wrap d-inline-block p-3 mb-2">
                                <i class="fa fa-3x fa-building px-2"></i>
                            </div>
                            <h5 class="fw-bold">Mengoptimalkan Lahan</h5>
                            <p class="p-why text-muted">Sehingga dapat membuat desain yang efisien dan hemat biaya.</p>
                        </div>
                    </div>

                    <div class="col-md-4 why-item">
                        <div class="p-4 pt-2 shadow rounded">
                            <div class="text-wrap d-inline-block p-3 mb-2">
                                <i class="fa fa-3x fa-cube px-2"></i>
                            </div>
                            <h5 class="fw-bold">Perencanaan Struktur Baik</h5>
                            <p class="p-why text-muted">Proses pembangunan lebih cepat dengan struktur yang baik.</p>
                        </div>
                    </div>

                    <div class="col-md-4 why-item">
                        <div class="p-4 pt-2 shadow rounded">
                            <div class="text-wrap d-inline-block p-3 mb-2">
                                <i class="fa fa-3x fa-phone px-2"></i>
                            </div>
                            <h5 class="fw-bold">Pemesanan Mudah</h5>
                            <p class="p-why text-muted">Dengan sistem online akan menjangkau Anda dimanapun dan kapanpun.</p>
                        </div>
                    </div>

                    <div class="col-md-4 why-item">
                        <div class="p-4 pt-2 shadow rounded">
                            <div class="text-wrap d-inline-block p-3 mb-2">
                                <i class="fa fa-3x fa-envelope px-2"></i>
                            </div>
                            <h5 class="fw-bold">Pelayanan Ramah</h5>
                            <p class="p-why text-muted">Kami senantiasa memberikan saran dan solusi terbaik atas permasalahan Anda.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4 why-item">
                        <div class="p-4 pt-2 shadow rounded">
                            <div class="text-wrap d-inline-block p-3 mb-2">
                                <i class="fa fa-3x fa-institution px-2"></i>
                            </div>
                            <h5 class="fw-bold">Legalitas Kami Jelas</h5>
                            <p class="p-why text-muted">Perusahaan kami terdaftar dan legal sehingga semua transaksi Anda aman.</p>
                        </div>
                    </div>




                </div>
        </div>
    </div>
</section>


<section id="cs">
    <div class="container">
        <div class="row">
            <div class="col-md-4 pt-5">
                <h3 class="fw-bold pt-5">Hubungi Kami</h3>
                <p>Untuk fast respon, hubungi kami melalui whatsapp atau telepon. Kami </p>
            </div>
            <div class="col-md-8">
                <div class="row">
                @foreach($cs as $item)
                    <div class="col-md-4">
                        <!-- <div class="img-cs">
                            <img class="img-fluid" src="{{asset('../asset/images/user/'.$item->img)}}" alt="{{$item->nama}}">
                        </div> -->
                        <div class="shadow p-2">
                            <div class="img-cs">
                                <img class="img-fluid" src="{{asset('../asset/images/user/'.$item->img)}}" alt="{{$item->nama}}">
                            </div>
                            <div class="body-cs">
                                <h5 class="p-1">{{$item->nama}}</h5>
                                <a href="https://wa.me/{{$item->telp}}" class="btn btn-success d-block py-2">
                                    <i class="fa fa-phone"></i> {{$item->telp}}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <section id="#hub-kami" >
    <div class="container">
        <h2 class="h2 pop-bold pb-3 text-left ">Fitur Kami</h2>
        <div class="w-100">
            <p class="text-left ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo quo perferendis
                exercitationem quis dolorum aspernatur impedit, est ipsa commodi? Libero fugiat amet laudantium error.
                Soluta aut voluptatem corrupti praesentium quos!</p>
        </div>
        <div class="row gy-4">
            <div class="col-md-3">
                <div class="card p-2">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe incidunt, debitis ut dolorum adipisci
                    doloremque iste provident error minima dolore est, fugit accusamus. Esse dicta tempore qui facere
                    hic perferendis.
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-2">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe incidunt, debitis ut dolorum adipisci
                    doloremque iste provident error minima dolore est, fugit accusamus. Esse dicta tempore qui facere
                    hic perferendis.
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-2">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe incidunt, debitis ut dolorum adipisci
                    doloremque iste provident error minima dolore est, fugit accusamus. Esse dicta tempore qui facere
                    hic perferendis.
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-2">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe incidunt, debitis ut dolorum adipisci
                    doloremque iste provident error minima dolore est, fugit accusamus. Esse dicta tempore qui facere
                    hic perferendis.
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-2">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe incidunt, debitis ut dolorum adipisci
                    doloremque iste provident error minima dolore est, fugit accusamus. Esse dicta tempore qui facere
                    hic perferendis.
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-2">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe incidunt, debitis ut dolorum adipisci
                    doloremque iste provident error minima dolore est, fugit accusamus. Esse dicta tempore qui facere
                    hic perferendis.
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-2">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe incidunt, debitis ut dolorum adipisci
                    doloremque iste provident error minima dolore est, fugit accusamus. Esse dicta tempore qui facere
                    hic perferendis.
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-2">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe incidunt, debitis ut dolorum adipisci
                    doloremque iste provident error minima dolore est, fugit accusamus. Esse dicta tempore qui facere
                    hic perferendis.
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- <section>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-xl-8 text-center">
                <h3 class="mb-4">Apa kata pelanggan kami?</h3>
                <p class="mb-4 pb-2 mb-md-5 pb-md-0">
                    Kami memahami bahwa setiap klien memiliki kebutuhan yang berbeda. Oleh karena itu, kami selalu siap
                    untuk memberikan saran dan solusi yang sesuai dengan kebutuhan dan keinginan Anda. Bagaimana
                    pendapat mereka yang sudah merasakan jasa kami?
                </p>
            </div>
        </div>

        <div class="row text-center d-flex align-items-stretch">
            <div class="col-md-4 mb-5 mb-md-0 d-flex align-items-stretch">
                <div class="card testimonial-card">
                    <div class="card-up" style="background-color: #252525;"></div>
                    <div class="avatar mx-auto bg-white">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(1).webp"
                            class="rounded-circle img-fluid" />
                    </div>
                    <div class="card-body">
                        <h4 class="mb-4">Maria Smantha</h4>
                        <hr />
                        <p class="dark-grey-text mt-4">
                            <i class="fas fa-quote-left pe-2"></i>
                            Jasa arsitek Wijaya Kencana sangat membantu saya dalam merancang dan membangun rumah impian
                            saya. Desain yang diusulkan sangat sesuai dengan keinginan saya dan proses pembangunan
                            berjalan lancar tanpa ada kendala. Saya sangat puas dengan hasil akhirnya.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-5 mb-md-0 d-flex align-items-stretch">
                <div class="card testimonial-card">
                    <div class="card-up" style="background-color: #252525;"></div>
                    <div class="avatar mx-auto bg-white">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(2).webp"
                            class="rounded-circle img-fluid" />
                    </div>
                    <div class="card-body">
                        <h4 class="mb-4">Lisa Cudrow</h4>
                        <hr />
                        <p class="dark-grey-text mt-4">
                            <i class="fas fa-quote-left pe-2"></i>
                            Saya sangat puas dengan jasa arsitek Wijaya Kencana. Desain yang diusulkan sangat sesuai
                            dengan keinginan saya dan proses pembangunan berjalan lancar tanpa ada kendala. Terima kasih
                            banyak atas bantuannya.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-0 d-flex align-items-stretch">
                <div class="card testimonial-card">
                    <div class="card-up" style="background-color: #252525;"></div>
                    <div class="avatar mx-auto bg-white">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(9).webp"
                            class="rounded-circle img-fluid" />
                    </div>
                    <div class="card-body">
                        <h4 class="mb-4">John Smith</h4>
                        <hr />
                        <p class="dark-grey-text mt-4">
                            <i class="fas fa-quote-left pe-2"></i>
                            Jasa arsitek Wijaya Kencana sangat membantu saya dalam merancang dan membangun rumah impian
                            saya. Desain yang diusulkan sangat sesuai dengan keinginan saya dan proses pembangunan
                            berjalan lancar tanpa ada kendala. Saya sangat puas dengan hasil akhirnya.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="pt-5 mt-5">
    <div class="container  px-5">
        <h2 class="pb-3 text-center">Frequently Ask Question</h2>
        <div class="accordion px-5" id="accordionExample">
            <div class="accordion-item">
                <h6 class="accordion-header fs-5" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Apa yang membuat jasa arsitek Wijaya Kencana berbeda dengan jasa arsitek lainnya?
                    </button>
                </h6>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Jasa arsitek Wijaya Kencana memiliki kemampuan yang luar biasa dalam merancang desain bangunan
                        yang sesuai dengan kebutuhan dan keinginan klien, memberikan saran dan solusi terbaik bagi para
                        klien yang membutuhkan bantuan dalam merancang dan membangun suatu bangunan, mampu
                        mengoptimalkan lahan dan ruangan dengan baik, memiliki pengetahuan yang luas terkait dengan
                        teknis pembangunan dan peraturan yang berlaku, serta memiliki perencanaan yang terstruktur
                        dengan baik sehingga dapat mempercepat proses pembangunan dan menghindari terjadinya kendala
                        atau masalah di kemudian hari.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h6 class="accordion-header fs-5" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Apa saja layanan yang ditawarkan oleh jasa arsitek Wijaya Kencana?
                    </button>
                </h6>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Jasa arsitek Wijaya Kencana menawarkan layanan seperti merancang desain bangunan, memberikan
                        saran dan solusi terbaik bagi klien, membantu dalam proses perencanaan dan pelaksanaan
                        pembangunan, serta membantu dalam mengoptimalkan lahan dan ruangan dengan baik.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h6 class="accordion-header fs-5" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Berapa biaya yang harus dikeluarkan untuk menggunakan jasa arsitek Wijaya Kencana?
                    </button>
                </h6>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Biaya jasa arsitek Wijaya Kencana dapat disesuaikan dengan kebutuhan dan keinginan klien. Anda
                        dapat menghubungi Wijaya Kencana untuk mengetahui lebih lanjut mengenai biaya yang harus
                        dikeluarkan.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->


<script>
    $(window).scroll(function () {
        $('nav').toggleClass('bg-white shadow scrolled', $(this).scrollTop() > 50);
    });

</script>
@endsection
