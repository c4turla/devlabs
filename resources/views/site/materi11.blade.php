@extends('site.layouts.master')

@section('content')
<!-- Header Start -->
<div class="container-fluid bg-primary py-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Materi Kelas 11 </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Materi Kelas 11</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Materi Kelas 11</h6>
            </div>
            <div class="row g-8">
                @php
                $kelasMateri = $materi->groupBy('kelasid');
                @endphp

                @foreach ($kelasMateri as $kelasId => $materiPerKelas)
                @php
                $kelasData = $kelasId ; // Data kelas dalam format JSON
                $kelas = json_decode($kelasData, true); // Ubah JSON menjadi array
                $description = $kelas['description']; // Ambil atribut description
                @endphp
                <div class="card mt-4 wow fadeInUp" data-wow-delay="0.5s">
                    <h5 class="card-header">{{ $description }}</h5>
                    <div class="card-body">
                        <strong>
                            @foreach ($materiPerKelas as $item)
                            <li>{{ $item->judul }}</li>
                            @endforeach
                        </strong>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="alert alert-success d-flex align-items-center mt-5" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img"
                    aria-label="Warning:">
                    <path
                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </svg>
                <div>
                    <small> Untuk Mengakses semua materi diatas silahkan <a href="{{ url('/login') }}"> Login
                        </a> / <a href="{{ url('/register') }}">Daftar</a> gratis di website ini. </small>
                </div>
            </div>
    </div>
</div>
<!-- About End -->
@endsection