@extends('layouts.user')
@section('a', 'active')
@section('content')

<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 style="color: pink;">✾✾✾✾✾✾✾✾✾✾✾✾✾✾✾</h2>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->
<!-- Team Start -->
<div class="team">
    <div class="container">
        <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
            <p>Tentang Kami</p>
            <h2>Anggota Grup</h2>
        </div>

        <div class="row justify-content-md-center">
            <div class="row">
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="assets/user/img/aku.png" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h5 class="card-title text-center">Muhammad Anjasmara Arya Pratama</h5>
                            <p class="card-text text-center">UISI/ Informatika/ 3011910026</p>
                            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="assets/user/img/alya.png" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h5 class="card-title text-center">Alya Nur Rahma Eka Pratiwi</h5>
                            <p class="card-text text-center">UISI/ Informatika/ 3011910010</p>
                            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->
<div class="container" style="margin-bottom: 10%;"></div>
@endsection