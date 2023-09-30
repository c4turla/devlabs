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

                        <p class="text-white-50 mt-4">Silahkan pilih menu yang anda inginkan. Lengkapi profile anda
                            dengan klik menu dibawah ini.</p>

                        <div class="mt-4 pt-2 mb-1">
                            <a href="{{ route('siswa.profile') }}" class="btn btn-success">Lihat Profile <i
                                    class="mdi mdi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="col-xl-12">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h2>Sekilas Tentang Devlabs</h2>
                <hr>
                <div class="row">
                    <div class="card">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-2">
                                <img class="card-img img-fluid" src="{!! url('assets/images/logobaru.png') !!}"
                                    alt="Logo">
                            </div>
                            <div class="col-md-9">
                                <div class="card-body">
                                    <p class="card-title-desc"><strong>Devlabs</strong> merupakan Media pembelajaran
                                        Digital Era 5.0 yang
                                        memadukan <i>e-learning</i> dan laboratoriun virtual dalam bentuk simulasi.</p>
                                    <br />
                                    <p class="card-title-desc">
                                        <strong>Devlabs</strong> sebagai pioneer pembelajaran kimia berbasis digital yg
                                        memudahkan pelajari
                                        maupun pengguna lainnya dapat mengakases pembelajaran kimia tanpa dibatasi waktu
                                        dan
                                        tempat, prinsip belajar kapanpun dan dimanapun yang sejalan dengan prinsip
                                        Merdeka
                                        Bejalar.
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end card header -->
        </div>
    </div>
</div>

<div class="col-xl-12">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h2>Tim Pengembang</h2>
            </div><!-- end card header -->
            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="align-items-center">
                                <div>
                                    <img src="{!! url('assets/images/users/Pengembang1.png') !!}" alt="Pengembang 1"
                                        class="img-fluid." width="100%" height="250">
                                </div>
                                <br />
                                <div class="flex-1 ms-3">
                                    <h5 class="font-size-16 mb-1"><a href="#" class="text-dark">Muh. Alim Marhadi,
                                            S.Pd.,M.Pd</a></h5>
                                    <p class="text-muted mb-0">Dosen Universitas Halu Oleo</p>
                                </div>
                            </div>
                            <p class="mt-3 text-muted">Jurusan Pendidikan Kimia, FKIP Universitas Halu Oleo</p>
                            <p><i class="bx bx-user me-1"></i> Alamat : Jl. Dewi Sartika, Kel. Abeli Kec. Abeli</p>
                            <p><i class="bx bx-mail-send me-1"></i> Email :<a href="mailto:alim.marhadi@uho.ac.id"> alim.marhadi@uho.ac.id</a></p>

                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="align-items-center">
                                <div>
                                    <img src="{!! url('assets/images/users/Pengembang2.png') !!}" alt="Pengembang 2"
                                        class="img-fluid. " width="100%" height="250">
                                </div>
                                <br />
                                <div class="flex-1 ms-3">
                                    <h5 class="font-size-16 mb-1"><a href="#" class="text-dark">Maysara., S.Pd.,M.Pd</a>
                                    </h5>
                                    <p class="text-muted mb-0">Dosen Universitas Halu Oleo</p>
                                </div>
                            </div>
                            <p class="mt-3 text-muted">Jurusan Pendidikan Kimia, FKIP Universitas Halu Oleo</p>
                            <p><i class="bx bx-user me-1"></i> Alamat : BTN Kendari Permai Blok L4 No 20 Kel. Padaleu, Kec. Kambu</p>
                            <p><i class="bx bx-mail-send me-1"></i> Email :<a href="mailto:maysara.fkip@uho.ac.id"> maysara.fkip@uho.ac.id</a></p>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="align-items-center">
                                <div>
                                    <img src="{!! url('assets/images/users/Pengembang3.png') !!}" alt="Pengembang 1"
                                        class="img-fluid." width="100%" height="250">
                                </div>
                                <br />
                                <div class="flex-1 ms-3">
                                    <h5 class="font-size-16 mb-1"><a href="#" class="text-dark">Fatahu, S.Pd., M Si</a></h5>
                                    <p class="text-muted mb-0">Dosen Universitas Halu Oleo</p>
                                </div>
                            </div>
                            <p class="mt-3 text-muted">Jurusan Pendidikan Kimia, FKIP Universitas Halu Oleo</p>
                            <p><i class="bx bx-user me-1"></i> Alamat : BTN Kendari Permai Blok B5 No.10</p>
                            <p><i class="bx bx-mail-send me-1"></i> Email :<a href="mailto:fatahu@uho.ac.id"> fatahu@uho.ac.id</a></p>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="align-items-center">
                                <div>
                                    <img src="{!! url('assets/images/users/Pengembang4.png') !!}" alt="Pengembang 1"
                                        class="img-fluid." width="100%" height="250">
                                </div>
                                <br />
                                <div class="flex-1 ms-3">
                                    <h5 class="font-size-16 mb-1"><a href="#" class="text-dark">Sulastri</a></h5>
                                    <p class="text-muted mb-0">Mahasiswa Universitas Halu Oleo</p>
                                </div>
                            </div>
                            <p class="mt-3 text-muted">Jurusan Pendidikan Kimia, FKIP Universitas Halu Oleo</p>
                            <p><i class="bx bx-user me-1"></i> Alamat : BTN Griya Asri Bukit Lepo-lepo indah Blok B</p>
                            <p><i class="bx bx-mail-send me-1"></i> Email :<a href="mailto:sulastri21050@gmail.com"> sulastri21050@gmail.com</a></p>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>

        </div>
    </div>
</div>





@endsection