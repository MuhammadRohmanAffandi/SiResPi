<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="img/logoMamire.png">
    <link rel="icon" href="{{ asset('assets/admin/img/brand/minisirespi.png') }}" type="image/png">
    <title>SIRESPi - SISTEM INFORMASI RESEP MASAKAN</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/user/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/user/lib/flaticon/font/flaticon.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/user/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/user/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/user/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/user/css/my.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Top Bar Start -->
    <div class="top-bar d-none d-md-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="top-bar-left">
                        <div class="text">
                            <i class="far fa-clock"></i>
                            <p><span id="tanggalwaktu"></span></p>
                        </div>
                        <div class="text">
                            <i class="fa fa-phone-alt"></i>
                            <h2>+62 819 7719 5444</h2>
                            <p>Admin</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="top-bar-right">
                        <div class="social">
                            <a href=""><i class="fab fa-whatsapp"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Bar End -->

    <!-- Nav Bar Start -->
    <div class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a href="{{ url('/') }}" class="navbar-brand">S<span>I</span>R<span>E</span>S<span>P</span>I</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto">
                    <form class="form" method="get" action="{{ url('user/search') }}">
                        <div class="input-group px-3">
                            <!-- <div class="input-group-prepend">
                                <a class="nav-item nav-link " type="submit">Cari</a>
                            </div> -->
                            <input name="search" id="search" type="text" class="form-control" placeholder="Pencarian" aria-label="" aria-describedby="basic-addon1">
                        </div>
                    </form>
                    <a href="{{ url('/') }}" class="nav-item nav-link @yield('h')">Home</a>
                    <a href="{{ url('user/resep') }}" class="nav-item nav-link @yield('r')">Resep</a>
                    <a href="{{ url('user/blog') }}" class="nav-item nav-link @yield('b')">Blog</a>
                    <div class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Kategori</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ url('user/breakfast') }}" class="dropdown-item">Breakfast</a>
                            <a href="{{ url('user/main') }}" class="dropdown-item">Main</a>
                            <a href="{{ url('user/dessert') }}" class="dropdown-item">Desserts</a>
                            <a href="{{ url('user/beverage') }}" class="dropdown-item">Beverage</a>
                        </div>
                    </div>
                    <!-- <a href="{{ url('/about') }}" class="nav-item nav-link @yield('a')">About</a> -->


                    @if(isset(Auth::user()->id))
                    <div class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle " data-toggle="dropdown">{{ Auth::user()->name }}</a>
                        @else
                        <a class="nav-link dropdown" href="{{ route('login') }}">Masuk</a>
                        @endif
                        @if(isset(Auth::user()->id))
                        <div class="dropdown-menu dropdown-menu-right ">
                            <a href="{{ route('logout') }}" class="dropdown-item">Keluar</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Nav Bar End -->




    <!-- Hero Start -->
    <div class="hero" style="margin-bottom: 0%;">
        <div class="container">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-12 col-md-6">
                        <div class="hero-text">
                            <blockquote class="blockquote text-center">
                                <h2 class="mb-0" style="color: blueviolet;">Platform penyedia resep masakan dan minuman pilihan yang tidak akan membuat anda merasa kecewa, dengan begitu banyaknya olahan resep yang telah teruji kenikmatannya.</h2>
                                <!-- <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer> -->
                            </blockquote>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 d-none d-md-block">
                        <div class="padding20">
                            <div class="hero-image">
                                <img src="{{ asset('assets/user/img/sirespi.png')}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    @section('content')
    @show

    <!-- Discount Start -->

    <!-- Discount End -->


    <!-- Footer Start -->
    <div class="footer wow fadeIn" data-wow-delay="0.3s" style="margin-top: 0%;">
        <div class="container-fluid">
            <div class="container">
                <div class="footer-info">
                    <a href="index.html" class="footer-logo">S<span>I</span>R<span>E</span>S<span>P</span>I</a>
                    <h3>Universitas Internasional Semen Indonesia (UISI)</h3>
                    <div class="footer-menu">
                        <p>Analisis Kebutuhan Sistem Informasi</p>
                        <p>Informatika</p>
                    </div>
                    <div class="footer-social">
                        <a href=""><i class="fab fa-whatsapp"></i></a>
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                        <a href=""><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="container copyright">
                <div class="row">
                    <div class="col-md-6">
                        <p>&copy; <a href="#">SIRESPI</a>, Beberapa gambar diambil dari freepik.</p>
                    </div>
                    <div class="col-md-6">
                        <p>TEMPLATE Designed By <a href="https://htmlcodex.com">HTML Codex</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/user/lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('assets/user/lib/wow/wow.min.js')}}"></script>
    <script src="{{ asset('assets/user/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('assets/user/lib/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset('assets/user/lib/lightbox/js/lightbox.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('assets/user/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{ asset('assets/user/mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/user/js/main.js')}}"></script>


    <script>
        var tw = new Date();
        if (tw.getTimezoneOffset() == 0)(a = tw.getTime() + (7 * 60 * 60 * 1000))
        else(a = tw.getTime());
        tw.setTime(a);
        var tahun = tw.getFullYear();
        var hari = tw.getDay();
        var bulan = tw.getMonth();
        var tanggal = tw.getDate();
        var hariarray = new Array("Minggu,", "Senin,", "Selasa,", "Rabu,", "Kamis,", "Jum'at,", "Sabtu,");
        var bulanarray = new Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
            "September", "Oktober", "Nopember", "Desember");
        document.getElementById("tanggalwaktu").innerHTML = hariarray[hari] + " " + tanggal + " " + bulanarray[bulan] +
            " " + tahun + " Jam " + ((tw.getHours() < 10) ? "0" : "") + tw.getHours() + ":" + ((tw.getMinutes() < 10) ?
                "0" : "") + tw.getMinutes();
    </script>
</body>

</html>