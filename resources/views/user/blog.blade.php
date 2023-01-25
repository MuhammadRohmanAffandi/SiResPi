@extends('layouts.user')
@section('b', 'active')
@section('content')
<!-- Class Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 style="color: blueviolet;">❀❀❀❀❀❀SEMUA BLOG❀❀❀❀❀❀</h2>
            </div>
        </div>
    </div>
</div>
<div class="blog class">
    <div class="container">
        <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
            <p>MAMIRE</p>

        </div>

        <div class="row blog-page">
            @foreach( $data as $d)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.0s" style="visibility: visible; animation-delay: 0s; animation-name: fadeInUp;">
                <div class="blog-item">
                    <div class="blog-img" style="height:450px; width:350px; object-fit:fill; object-position: center; overflow:hidden ;">
                        <img src="{{ asset('foto_blog/'.$d->foto) }}" class="resize" alt="Blog">
                    </div>
                    <div class="blog-text">
                        <p class="text-capitalize" style="font-weight: bold; text-align: justify; font-size: larger;">{{ $d->judul }}</p>

                        <div class="blog-meta">
                            <p><i class="far fa-list-alt"></i>{{ Str::limit($d->nama, 7, $end='...') }}</p>
                            <p><i class="far fa-calendar-alt"></i>{{ date('d-m-Y', strtotime($d->tanggal)) }}</p>
                        </div>
                        <div class="text-justify">
                            <!-- {!! $d->deskripsi !!} -->
                            {!! nl2br($d->deskripsi) !!}
                        </div>
                        <!-- <a class="btn" href="{{ url('user/blog/'.$d->id ) }}">Read More <i class="fa fa-angle-right"></i></a> -->
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Class End -->
@endsection