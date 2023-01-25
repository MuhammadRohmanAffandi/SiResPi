@extends('layouts.admin')
@section('Review','active')
@section('icon','ni ni-send text-dark')
@section('name',' Ulasan')
@section('content')

<div class="container-fluid">
    <div class="card bg-default shadow">
        <div class="card-header bg-transparent border-0 text-left">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <!-- <ol class="breadcrumb breadcrumb-links breadcrumb-dark"> -->
                <!-- <li class="btn btn-outline-primary"><i class="fas fa-home"></i><a href="{{ url('review') }}" class="">Review</a></li> -->
                <!-- <li class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">Add</li> -->
                <!-- </ol> -->
            </nav>
        </div>
        <div class="table-responsive">
            <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="sort" data-sort="name">#</th>
                        <th scope="col" class="sort" data-sort="name">Users</th>
                        <th scope="col" class="sort" data-sort="budget">Resep</th>
                        <th scope="col" class="sort" data-sort="status">Review</th>
                        <th scope="col" class="sort" data-sort="status">Tanggal</th>
                        <th scope="col" class="sort" data-sort="status">Action</th>
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
                            {{ Str::limit($d->nama_resep, 25, $end='...') }}
                        </td>
                        <td>
                            {{ Str::limit($d->review, 30, $end='...') }}
                        </td>
                        <td>
                            {{ $d->tanggal }}
                        </td>
                        <td>
                            <!-- <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a> -->
                            <!-- <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow"> -->
                            <!-- <a class="dropdown-item" href="{{ url('review/edit/'.$d->id ) }}">Edit</a> -->

                            <!-- </div> -->
                            <!-- </div> -->
                            <a class="btn " href="{{ url('review/delete/'.$d->id ) }}" style="color: white;">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<!--  -->
@endsection