@extends('layouts.main')

@section('title', 'Kontak Kami')

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
                <a href="/portofolio" class="nav-link">Portofolio</a>
            </li>
            <li class="nav-item">
                <a href="/layanan" class="nav-link">Layanan</a>
            </li>
            <li class="nav-item">
                <a href="/kontak" class="nav-link active">Kontak</a>
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
<section id="cs" class="mt-5">
    <div class="container mt-5">
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


<section class="ftco-section pt-1">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Hubungi Kami</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-10 col-md-12">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-md-7 d-flex align-items-stretch">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4">Get in touch</h3>
									<div id="form-message-warning" class="mb-4"></div> 
				      		<div id="form-message-success" class="mb-4">
				            Your message was sent, thank you!
				      		</div>
									<form method="POST" id="contactForm" name="contactForm">
										<div class="row gy-4">
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" class="form-control" name="name" id="name" placeholder="Name">
												</div>
											</div>
											<div class="col-md-6"> 
												<div class="form-group">
													<input type="email" class="form-control" name="email" id="email" placeholder="Email">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<textarea name="message" class="form-control" id="message" cols="30" rows="7" placeholder="Message"></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="Send Message" class="btn btn-primary">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-md-5 d-flex align-items-stretch">
								<div class="info-wrap bg-primary w-100 p-lg-5 p-4">
									<h3 class="mb-4 mt-md-4">Hubungi Kami</h3>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-map-marker"></span>
				        		</div>
				        		<div class="text ps-3">
					            <p><span>Address:</span> Dsn. Sukorame, Desa Sukorame RT 06 RW. 08, Gandusari, Trenggalek.</p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-phone"></span>
				        		</div>
				        		<div class="text ps-3">
					            <p><span>Phone:</span> <a href="tel://1234567920">+628-3133-7678</a></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-paper-plane"></span>
				        		</div>
				        		<div class="text ps-3">
					            <p><span>Email:</span> <a href="mailto:info@yoursite.com">wijayakencana@gmail.com</a></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-globe"></span>
				        		</div>
				        		<div class="text ps-3">
					            <p><span>Website</span> <a href="#">yoursite.com</a></p>
					          </div>
				          </div>
			          </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


    @endsection
