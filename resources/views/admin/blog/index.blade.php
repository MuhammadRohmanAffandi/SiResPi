@extends('layouts.admin')
@section('Blog','active')
@section('icon','ni ni-single-copy-04 text-orange')
@section('name',' Blog')
@section('content')

<div class="container-fluid">
    <div class="card bg-default shadow">
        <div class="card-header bg-transparent border-0 text-right">
            <nav aria-label="breadcrumb">
                <ol>
                    <!-- <li class="btn btn-outline-primary"><i class="fas fa-home"></i><a href="{{ url('blog') }}" class="">Blog</a></li> -->
                    <li class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">Tambahkan</li>
                </ol>
            </nav>
        </div>
        <div class="table-responsive">
            <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="sort" data-sort="name">#</th>
                        <th scope="col" class="sort" data-sort="name">Pengguna</th>
                        <th scope="col" class="sort" data-sort="budget">Judul</th>
                        <th scope="col" class="sort" data-sort="status">Deskripsi</th>
                        <th scope="col" class="sort" data-sort="status">Tanggal</th>
                        <th scope="col" class="sort" data-sort="status">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach( $data as $d )
                    <tr>
                        <th>
                            <div class="media align-items-center">
                                <span class="name mb-0 text-sm">{{ $loop->iteration }}</span>
                            </div>
                        </th>
                        <td class="budget">
                            {{ Str::limit($d->nama, 10, $end='...') }}
                        </td>
                        <td class="budget">
                            {{ Str::limit($d->judul, 30, $end='...') }}
                        </td>
                        <td>
                            {{ Str::limit($d->deskripsi, 20, $end='...') }}
                        </td>
                        <td>
                            {{ date('d-m-Y', strtotime($d->tanggal)) }}
                        </td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="{{ url('blog/edit/'.$d->id ) }}">Ubah</a>
                                    <a class="dropdown-item" href="{{ url('blog/delete/'.$d->id ) }}">Hapus</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="container-fluid">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Blog</h5>
                </div>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <br>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <form enctype="multipart/form-data" method="POST" action="{{ url('blog/save') }}">
                                @csrf
                                <!-- Foto -->
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label text-md-left" for="exampleInputFile">Foto</label>
                                    <div class="col-lg-10">
                                        <input type="file" id="input-first-name" class="form-control" name="foto" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Judul" class="col-md-2 col-form-label text-md-left ">Judul</label>
                                    <div class="col-lg-10">
                                        <input id="name" type="text" class="form-control" name="judul" value="" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="deskripsi" class="col-md-2 col-form-label text-md-left">Deskripsi</label>
                                    <div class="col-lg-10">
                                        <textarea name="deskripsi" rows="9" cols="80" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <?php
                                if (function_exists('date_default_timezone_set')) date_default_timezone_set('Asia/Jakarta');
                                $tanggal_now = date('Y-m-d');
                                echo "<input hidden name='tanggal' value='$tanggal_now'>" . "</input>";
                                ?>
                                <div class="form-group text-md-right">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection