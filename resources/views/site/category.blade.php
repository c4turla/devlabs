@extends('site.layouts.master')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Kategori</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Kategori</li>
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
            <div class="row g-5">
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <ul class="nav nav-tabs">
                        @foreach ($kategori as $subcategory)
                            <li class="nav-item">
                                <a href="#{{ $subcategory->slug }}" class="nav-link "
                                    data-bs-toggle="tab">{{ $subcategory->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        @foreach ($kategori as $subcategory)
                            @php
                                $index = $loop->index;
                            @endphp
                            <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" id="{{ $subcategory->slug }}">
             
                                    @foreach ($subcategory->kelas as $kelas)
                                    <div class="card mt-4">
                                        <h5 class="card-header">{{ $kelas->nama_kelas }}</h5>
                                        <div class="card-body">
                                          <strong> 
                                            @foreach ($kelas->materi as $materi)
                                            <li>{{ $materi->judul }}</li>
                                        @endforeach</strong>
                                        </div>
                                      </div>
                                    @endforeach
                     
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
        </div>
    </div>
    <!-- About End -->
@endsection
