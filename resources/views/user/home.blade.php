@extends('layouts.user')
@section('h', 'active')
@section('content')
<!-- About Start -->
<div class="padding20" style="background-color: rgb(22, 22, 22);">
    <div class="about wow fadeInUp" data-wow-delay="0.3s">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6">
                    <div class="about-img">
                        <img src="{{ asset('assets/user/img/Genshin-Impact.jpg')}}" alt="Image">
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <div class="section-header text-left">
                        <p style="background-color: black;">Tentang Kami</p>
                        <h2>Selamat Datang di SIRESPI</h2>
                    </div>
                    <div class="about-text">
                        <p>
                            Salam hangat dari kami pembuat Website.
                        <div>Dengan adanya website ini, diharapkan dapat membantu masyarakat luas dalam
                            berkreasi dibidang masakan.
                        </div>
                        </p>
                        <p>
                            Dibuat oleh mahasiswa UISI (Universitas Internasional Semen Indonesia).
                            Sebagai pemenuhan penugasan mata kuliah pemrograman web.
                        </p>
                        Sekian & Terima kasih
                        <p></p>
                        <!-- <a class="btn" href="/about">Tentang Kami</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- item lama -->
<div class="blog class">
    <div class="container">
        <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
            <p>SIRESPI</p>
            <h2>RESEP</h2>
        </div>
        <div class="row">
            <div class="col-12">
                <ul id="class-filter">
                    <a href="{{ url('user/resep') }}">
                        <li class="filter">Semua</li>
                    </a>
                </ul>
            </div>
        </div>
        <div class="row blog-page">
            @foreach( $data1 as $d)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.0s" style="visibility: visible; animation-delay: 0s; animation-name: fadeInUp;">
                <div class="blog-item">
                    <div class="blog-img" style="height: 200px; width: 350px; object-fit:fill; object-position: center; overflow:hidden ;">
                        <img src="{{ asset('foto_resep/'.$d->foto) }}" class="resize" alt="Blog">
                    </div>
                    <div class="blog-text">
                        <p class="text-capitalize" style="font-weight: bold; text-align: justify; font-size: larger;">{{ Str::limit($d->judul, 40, $end='...') }}</p>
                        <!-- <h2>
                            {{ Str::limit($d->judul, 45, $end='...') }}
                        </h2> -->

                        <div class="blog-meta">
                            <p><i class="far fa-list-alt"></i>{{ Str::limit($d->nama, 10, $end='...') }}</p>
                            <p><i class="far fa-calendar-alt"></i>{{ date('d-m-Y', strtotime($d->tanggal)) }}</p>

                            <?php


                            $a = DB::table('review as r')
                                ->join('users as u', 'u.id', '=', 'r.users_id')
                                ->join('resep as p', 'p.id', '=', 'r.resep_id')
                                ->where('r.resep_id', $d->id)->count();
                            ?>

                            <p><i class="far fa-comments"></i>{{ $a }}</p>
                        </div>
                        <a class="btn" href="{{ url('user/detail/'.$d->id ) }}">Baca Lagi<i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- item lama end -->

<!-- Class Start -->
<div class="blog class">
    <div class="container">
        <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
            <p>SIRESPI</p>
            <h2>Blog</h2>
        </div>
        <div class="row">
            <div class="col-12">
                <ul id="class-filter">
                    <a href="{{ url('user/blog') }}">
                        <li class="filter">Semua</li>
                    </a>
                </ul>
            </div>
        </div>
        <div class="row blog-page">
            @foreach( $data2 as $d2)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.0s" style="visibility: visible; animation-delay: 0s; animation-name: fadeInUp;">
                <div class="blog-item">
                    <div class="blog-img" style="height:450px; width:350px; object-fit:fill; object-position: center; overflow:hidden ;">
                        <img src="{{ asset('foto_blog/'.$d2->foto) }}" class="resize" alt="Blog">
                    </div>
                    <div class="blog-text">
                        <p class="text-capitalize" style="font-weight: bold; text-align: justify; font-size: larger;">{{ Str::limit($d2->judul, 45, $end='...') }}</p>
                        <!-- <h2></h2> -->
                        <div class="blog-meta">
                            <p><i class="far fa-list-alt"></i>{{ Str::limit($d2->nama, 10, $end='...') }}</p>
                            <p><i class="far fa-calendar-alt"></i>{{ date('d-m-Y', strtotime($d2->tanggal)) }}</p>
                        </div>
                        <div class="text-justify">
                            {!! Str::limit($d2->deskripsi, 100, $end='...') !!}
                        </div>
                        <!-- <a class="btn" href="{{ url('user/blog/'.$d2->id ) }}">Read More <i class="fa fa-angle-right"></i></a> -->
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Class End -->
<div class="discount wow zoomIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="section-header text-center">
            <p>SISTEM INFORMASI RESEP PILIHAN</p>
            <h2><span>100%</span> Terjamin KENIKMATANNYA</h2>
        </div>
        <div class="container discount-text">
            <p></p>
            <!-- <q style="color: blue;">Tersedia banyak resep berkualitas, Tampilan yang tak membosankan, Anda dapat mengulas resep yang telah anda coba, dan tentunya
                anda tak kan kecewa.</q> -->
            <p class="footer"></p>
        </div>
    </div>
</div>
@endsection