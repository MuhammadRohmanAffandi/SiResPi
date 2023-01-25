@extends('layouts.user')
@section('r', 'active')
@section('content')
<!-- item lama -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 style="color: blueviolet;">❁❁❁❁❁❁SEMUA RESEP❁❁❁❁❁❁</h2>
            </div>
        </div>
    </div>
</div>
<div class="blog">
    <div class="container">
        <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: zoomIn;">
            <p>SIRESPI</p>
        </div>
        <div class="row blog-page">
            @foreach( $data as $d)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.0s" style="visibility: visible; animation-delay: 0s; animation-name: fadeInUp;">
                <div class="blog-item">
                    <div class="blog-img" style="height: 200px; width: 350px; object-fit:fill; object-position: center; overflow:hidden ;">
                        <img src="{{ asset('foto_resep/'.$d->foto) }}" class="resize" alt="Blog">
                    </div>
                    <div class="blog-text">
                        <p class="text-capitalize" style="font-weight: bold; text-align: justify; font-size: larger;">{{ Str::limit($d->judul, 45, $end='...') }}</p>
                        <div class="blog-meta">
                            <p><i class="far fa-list-alt"></i>{{ Str::limit($d->nama, 10, $end='...') }}</p>
                            <p><i class="far fa-list-alt"></i>{{ $d->kategori }}</p>
                            <p><i class="far fa-calendar-alt"></i>{{ date('d-m-Y', strtotime($d->tanggal)) }}</p>

                            <?php $a = DB::table('review as r')
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
@endsection