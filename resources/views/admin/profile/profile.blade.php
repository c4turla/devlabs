@extends('partials.layout')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Pengguna</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pengguna</a></li>
                    <li class="breadcrumb-item active">Profil</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm order-2 order-sm-1">
                        <div class="d-flex align-items-start mt-3 mt-sm-0">
                            <div class="flex-shrink-0">
                                <div class="avatar-xl me-3">
                                    @if(Auth::user()->photo)
                                    <img class="rounded-3 avatar-xl" alt="" src="{{ asset('storage/' . Auth::user()->photo) }}">
                                    @else
                                    <img class="rounded-3 avatar-xl" alt="" src="{!! url('assets/images/users/noimage.png') !!}">
                                    @endif 
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div>
                                    <h5 class="font-size-16 mb-1">{{Auth::user()->name}}</h5>
                                    <p class="text-muted font-size-13"></p>

                                    <div class="d-flex flex-wrap align-items-start gap-2 gap-lg-3 text-muted font-size-13">
                                        <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>{{Auth::user()->email}}</div>
                                        <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>{{Auth::user()->nomor_hp}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-auto order-1 order-sm-2">
                        <div class="d-flex align-items-start justify-content-end gap-2">
                            <div>
                                <div class="dropdown">
                                    <button class="btn btn-link font-size-16 shadow-none text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="{{ route('admin.editprofile')}}">Edit</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <ul class="nav nav-tabs-custom card-header-tabs border-top mt-4" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link px-3 active" data-bs-toggle="tab" href="#overview" role="tab">Detail User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" data-bs-toggle="tab" href="#about" role="tab">About Apps</a>
                    </li>
                </ul>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->

        <div class="tab-content">
            <div class="tab-pane active" id="overview" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Detail User</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">Nama</th>
                                    <td>{{Auth::user()->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td>{{Auth::user()->email}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nomor Hp</th>
                                    <td>{{Auth::user()->nomor_hp}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Alamat</th>
                                    <td>{{Auth::user()->alamat}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

            </div>
            <!-- end tab pane -->

            <div class="tab-pane" id="about" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">About Apps</h5>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="pb-3">
                                <h5 class="font-size-15">Aplikasi DevLabs :</h5>
                                <div class="text-muted">
                                    <p class="mb-2">DevLabs merupakan aplikasi yang dibangun untuk sharing media pembelajaran.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end tab pane -->

        </div>
        <!-- end tab content -->
    </div>
    <!-- end col -->
    <!-- end col -->
</div>
<!-- end row -->

@endsection