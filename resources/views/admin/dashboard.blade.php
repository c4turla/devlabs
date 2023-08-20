@extends('partials.layout')

@section('content')
@php
    use Illuminate\Support\Carbon;
@endphp

 
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
    <div class="col-xl-4">
        <div class="card bg-primary">
            <div class="card-body">
                <div class="text-center py-3">
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
                        <h3 class="text-white">DevLabs Dashboard</h3>

                        <h3 class="text-white mb-0"> Selamat Datang, {{Auth::user()->name}}!</h3>

                        <p class="text-white-50 px-4 mt-4">Silahkan pilih menu yang anda inginkan. Untuk edit profile klik menu dibawah ini.</p>
                        
                        <div class="mt-4 pt-2 mb-2">
                            <a href="{{ route('profile') }}" class="btn btn-success">Lihat Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="avatar">
                            <span class="avatar-title bg-primary-subtle rounded">
                                <i class="mdi mdi-shopping-outline text-primary font-size-24"></i>
                            </span>
                        </div>
                        <p class="text-muted mt-4 mb-0">Today Orders</p>
                        <h4 class="mt-1 mb-0">3,89,658 <sup class="text-success fw-medium font-size-14"><i class="mdi mdi-arrow-down"></i> 10%</sup></h4>
                        <div>
                            <div class="py-3 my-1">
                                <div id="mini-1" data-colors='["#3980c0"]'></div>
                            </div>
                            <ul class="list-inline d-flex justify-content-between justify-content-center mb-0">
                                <li class="list-inline-item"><a href="" class="text-muted">Day</a></li>
                                <li class="list-inline-item"><a href="" class="text-muted">Week</a></li>
                                <li class="list-inline-item"><a href="" class="text-muted">Month</a></li>
                                <li class="list-inline-item"><a href="" class="text-muted">Year</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="avatar">
                            <span class="avatar-title bg-success-subtle rounded">
                                <i class="mdi mdi-eye-outline text-success font-size-24"></i>
                            </span>
                        </div>
                        <p class="text-muted mt-4 mb-0">Today Visitor</p>
                        <h4 class="mt-1 mb-0">1,648,29 <sup class="text-danger fw-medium font-size-14"><i class="mdi mdi-arrow-down"></i> 19%</sup></h4>
                        <div>
                            <div class="py-3 my-1">
                                <div id="mini-2" data-colors='["#33a186"]'></div>
                            </div>
                            <ul class="list-inline d-flex justify-content-between justify-content-center mb-0">
                                <li class="list-inline-item"><a href="" class="text-muted">Day</a></li>
                                <li class="list-inline-item"><a href="" class="text-muted">Week</a></li>
                                <li class="list-inline-item"><a href="" class="text-muted">Month</a></li>
                                <li class="list-inline-item"><a href="" class="text-muted">Year</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="avatar">
                            <span class="avatar-title bg-primary-subtle rounded">
                                <i class="mdi mdi-rocket-outline text-primary font-size-24"></i>
                            </span>
                        </div>
                        <p class="text-muted mt-4 mb-0">Total Expense</p>
                        <h4 class="mt-1 mb-0">6,48,249 <sup class="text-success fw-medium font-size-14"><i class="mdi mdi-arrow-down"></i> 22%</sup></h4>
                        <div>
                            <div class="py-3 my-1">
                                <div id="mini-3" data-colors='["#3980c0"]'></div>
                            </div>
                            <ul class="list-inline d-flex justify-content-between justify-content-center mb-0">
                                <li class="list-inline-item"><a href="" class="text-muted">Day</a></li>
                                <li class="list-inline-item"><a href="" class="text-muted">Week</a></li>
                                <li class="list-inline-item"><a href="" class="text-muted">Month</a></li>
                                <li class="list-inline-item"><a href="" class="text-muted">Year</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="avatar">
                            <span class="avatar-title bg-success-subtle rounded">
                                <i class="mdi mdi-account-multiple-outline text-success font-size-24"></i>
                            </span>
                        </div>
                        <p class="text-muted mt-4 mb-0">New Users</p>
                        <h4 class="mt-1 mb-0">$5,265,3 <sup class="text-danger fw-medium font-size-14"><i class="mdi mdi-arrow-down"></i> 18%</sup></h4>
                        <div>
                            <div class="py-3 my-1">
                                <div id="mini-4" data-colors='["#33a186"]'></div>
                            </div>
                            <ul class="list-inline d-flex justify-content-between justify-content-center mb-0">
                                <li class="list-inline-item"><a href="" class="text-muted">Day</a></li>
                                <li class="list-inline-item"><a href="" class="text-muted">Week</a></li>
                                <li class="list-inline-item"><a href="" class="text-muted">Month</a></li>
                                <li class="list-inline-item"><a href="" class="text-muted">Year</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-8">
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

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <div class="align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">User Registrasi</h4>
                </div>
            </div>

            <div class="card-body px-0 pt-2">
                <div class="table-responsive px-3" data-simplebar style="max-height: 393px;">
                    <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                        <tbody>
                            @foreach ($topRecords as $record)
                            <tr>
                                <td style="width: 20px;"><i class="icon-xs icon me-2 text-success" data-feather="users"></i></td>
                                <td>
                                    <h6 class="font-size-15 mb-1">{{ $record->name }}</h6>
                                    <p class="text-muted font-size-13 mb-0"><i class="mdi mdi-email"></i> {{ $record->email }}</p>
                                </td>
                                <td><span class="badge text-success  bg-success-subtle font-size-12">{{ \Carbon\Carbon::parse($record->created_at)->format('j F Y') }}</span></td>
                                <td>
                                    <div class="dropdown">
                                        <a class="text-muted dropdown-toggle font-size-20" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Hapus</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- enbd table-responsive-->
            </div>
        </div>
    </div>
</div>


@endsection