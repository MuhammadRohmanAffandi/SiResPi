@extends('layouts.admin')
@section('content')
@foreach( $data as $d )
<!-- Page content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Edit Blog </h3>
                        </div>
                        <!-- <div class="col-4 text-right">
                            <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                        </div> -->
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('blog/update') }}" enctype="multipart/form-data">
                        @csrf
                        <input hidden type="text" name="id" value="{{ $d->id }}">
                        <input hidden type="text" name="foto_lama" value="{{ $d->foto }}">
                        <!-- <h6 class="heading-small text-muted mb-4">User information</h6> -->
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Judul</label>
                                        <input type="text" id="input-username" class="form-control"
                                            value="{{ $d->judul }}" name="judul">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Deskripsi</label>
                                        <textarea rows="4" class="form-control"
                                            name="deskripsi">{{ $d->deskripsi }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">Foto</label>
                                        <input type="file" id="input-first-name" class="form-control" name="foto">
                                    </div>
                                </div>
                                <?php
                                if(function_exists('date_default_timezone_set')) date_default_timezone_set('Asia/Jakarta');
                                $tanggal_now = date('Y-m-d');
                                echo "<input hidden name='tanggal' value='$tanggal_now'>" . "</input>";
                            ?>
                                <!-- <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-last-name">Tanggal</label>
                                        <input type="date" id="input-last-name" class="form-control" name="tanggal" value="{{ $d->tanggal }}">
                                    </div>
                                </div> -->
                            </div>
                        </div>

                        <div class="pl-lg-4">

                        </div>
                        <!-- <hr class="my-4" /> -->
                        <!-- Description -->
                        <!-- <h6 class="heading-small text-muted mb-4">About me</h6> -->
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <!-- <label class="form-control-label">About Me</label> -->
                                <input type="submit" id="input-last-name" class="btn btn-primary"
                                    placeholder="Last name" value="Simpan">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
