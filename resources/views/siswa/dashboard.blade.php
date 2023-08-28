@extends('partials.layout')

@section('content')
 
 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Welcome !</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">DevLabs</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-12">
        <div class="card bg-primary">
            <div class="card-body">
                <div class="text-left py-2">
                    <ul class="bg-bubbles ps-0">
                        <li><i class="bx bx-grid-alt font-size-24"></i></li>
                        <li><i class="bx bx-tachometer font-size-24"></i></li>
                        <li><i class="bx bx-store font-size-24"></i></li>
                        <li><i class="bx bx-cube font-size-24"></i></li>
                        <li><i class="bx bx-cylinder font-size-24"></i></li>
                        <li><i class="bx bx-command font-size-24"></i></li>
                        <li><i class="bx bx-hourglass font-size-24"></i></li>
                        <li><i class="bx bx-pie-chart-alt font-size-24"></i></li>
                        <li><i class="bx bx-coffee font-size-24"></i></li>
                        <li><i class="bx bx-polygon font-size-24"></i></li>
                    </ul>
                   <div class="main-wid position-relative">
                        <h3 class="text-white">DevLabs Academy</h3>

                        <h3 class="text-white mb-0"> Selamat Datang, {{Auth::user()->name}}!</h3>

                        <p class="text-white-50 mt-4">Silahkan pilih menu yang anda inginkan. Lengkapi profile anda dengan klik menu dibawah ini.</p>
                        
                        <div class="mt-4 pt-2 mb-1">
                            <a href="{{ route('siswa.profile') }}" class="btn btn-success">Lihat Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap align-items-center mb-0">
                    <h5 class="card-title mb-0">Statistik Pengunjung</h5>
                    <div class="ms-auto">
                        <div class="dropdown">
                            <a class="dropdown-toggle text-reset" href="#" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted font-size-12">Sort By:</span> <span class="fw-medium">Weekly<i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                <a class="dropdown-item" href="#">Monthly</a>
                                <a class="dropdown-item" href="#">Yearly</a>
                            </div>
                        </div>
                    </div>
                </div>

               <div class="row align-items-center">
                <div class="col-xl-8">
                    <div>
                         <div id="sales-statistics" data-colors='["#eff1f3","#eff1f3","#eff1f3","#eff1f3","#33a186","#3980c0","#eff1f3","#eff1f3","#eff1f3", "#eff1f3"]' class="apex-chart"></div>
                    </div>
                  </div>
                   <div class="col-xl-4">
                       <div class="">
                            <div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex">
                                        <i class="mdi mdi-circle font-size-10 mt-1 text-primary"></i>
                                        <div class="flex-1 ms-2">
                                            <p class="mb-0">Product Order</p>
                                            <h5 class="mt-1 mb-0 font-size-16">43,541.58</h5>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="badge text-primary bg-primary-subtle">25.4%<i class="mdi mdi-arrow-down ms-2"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3 border-top pt-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex">
                                        <i class="mdi mdi-circle font-size-10 mt-1 text-primary"></i>
                                        <div class="flex-1 ms-2">
                                            <p class="mb-0">Product Pending</p>
                                            <h5 class="mt-1 mb-0 font-size-16">17,351.12</h5>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="badge text-primary bg-primary-subtle">17.4%<i class="mdi mdi-arrow-down ms-2"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3 border-top pt-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex">
                                        <i class="mdi mdi-circle font-size-10 mt-1 text-success"></i>
                                        <div class="flex-1 ms-2">
                                            <p class="mb-0">Product Cancelled</p>
                                            <h5 class="mt-1 mb-0 font-size-16">32,569.74</h5>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="badge text-success  bg-success-subtle">16.3%<i class="mdi mdi-arrow-up ms-1"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3 border-top pt-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex">
                                        <i class="mdi mdi-circle font-size-10 mt-1 text-primary"></i>
                                        <div class="flex-1 ms-2">
                                            <p class="mb-0">Product Delivered</p>
                                            <h5 class="mt-1 mb-0 font-size-16">67,356.24</h5>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="badge text-primary bg-primary-subtle">65.7%<i class="mdi mdi-arrow-up ms-1"></i></span>
                                    </div>
                                </div>
                            </div>
                       </div>
                   </div>
                   
               </div>

            </div>
        </div>
    </div>

</div>


@endsection