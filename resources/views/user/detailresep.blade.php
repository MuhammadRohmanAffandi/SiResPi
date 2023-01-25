@extends('layouts.user')
@section('r', 'active')
@section('content')
@foreach( $data as $d )
<!-- Single Post Start-->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 style="color: blueviolet;">❀❀❀❀❀❀{{ $d->kategori }}❀❀❀❀❀❀</h2>
            </div>
        </div>
    </div>
</div>
<div class="single">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-content wow fadeInUp">
                    <img src="{{ asset('foto_resep/'.$d->foto) }}" class="resep" />
                    <h2>{{ $d->judul }}</h2>
                    <!-- <div class="single-tags wow fadeInUp">
                        <a href="">{{ $d->kategori }}</a>
                    </div> -->
                    <div class="text-justify">
                        <!-- {!! $d->deskripsi !!} -->
                        {!! nl2br($d->deskripsi) !!}
                    </div>
                    <br>
                    <h2>Persiapan Bahan</h2>
                    <div>
                        {!! $d->foto2 !!}
                    </div>
                    <!-- <img src="{{ asset('foto_resep/'.$d->foto2) }}" class="resep" /> -->
                    <br>
                    <h2>Cara Pengolahan</h2>
                    <div>{!! $d->foto3 !!}</div>
                    <!-- <img src="{{ asset('foto_resep/'.$d->foto3) }}" class="resep" /> -->

                </div>


            </div>
            <!-- comment end -->

        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- comment -->
                <div class="single-bio wow fadeInUp">
                    <div class="single-bio-img">
                        <img src="{{ asset('assets/user/img/sirespi.png')}}" />
                    </div>
                    <div class="single-bio-text">
                        <h3 class="center">{{ $d->nama }}</h3>
                        <blockquote class="blockquote text-right-0">
                            <p>Bagi mereka mungkin hanya satu kata, tapi bagi kami? Satu kata itu membawa banyak arti perubahan kearah yang lebih baik.</p>
                            <footer class="blockquote-footer">Benalu<cite title="Source Title"> Quotes</cite></footer>
                        </blockquote>
                    </div>
                </div>

                <div class="single-comment wow fadeInUp">
                    <?php $a = DB::table('review as r')
                        ->join('users as u', 'u.id', '=', 'r.users_id')
                        ->join('resep as p', 'p.id', '=', 'r.resep_id')
                        ->where('r.resep_id', $d->id)->count();
                    ?>
                    <h2>{{ $a }} Ulasan</h2>

                    <ul class="comment-list">

                        @foreach( $data2 as $a)
                        <li class="comment-item">
                            <div class="comment-body">
                                <div class="comment-img">
                                    <img src="{{ asset('assets/user/img/akun.png')}}" />
                                </div>
                                <div class="comment-text">
                                    <h3><a href="">{{ $a->nama}}</a></h3>
                                    <span>{{ date('d-m-Y', strtotime($a->tanggal)) }}</span>
                                    <p>
                                        {{ $a->review }}
                                    </p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="comment-form wow fadeInUp">
                    <h2>Tinggalkan Ulasan</h2>
                    <form method="post" enctype="multipart/form-data" action="{{ url('review/save') }}">
                        @csrf
                        <input hidden name='id' value='{{ $d->id }}'>
                        <input hidden name='resep_id' value='{{ $d->id }}'>
                        <?php
                        if (function_exists('date_default_timezone_set')) date_default_timezone_set('Asia/Jakarta');
                        $tanggal_now = date('Y-m-d');
                        echo "<input hidden name='tanggal' value='$tanggal_now'>" . "</input>";
                        ?>
                        <div class="form-group">
                            <label for="message">Ulasan *</label>
                            <textarea name="review" id="message" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Kirim" class="btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Single Post End-->
@endforeach
@endsection