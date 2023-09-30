@extends('partials.layout')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Detail Materi</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('siswa.course' )}}">Materi Kursus</a></li>
                    <li class="breadcrumb-item active">Detail Materi</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<!-- end page title -->
<div class="row">
    <div class="col-xl-12">
        <div class="card border shadow-none">
            <div class="card-body">
                <div class="row">
                    <div class="card">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-2">
                                @if( $materi->gambar)
                                <img class="card-img img-fluid" src="{{ asset('storage/' . $materi->gambar) }}"
                                    alt="Materi">
                                @else
                                <img class="card-img img-fluid" src="{!! url('assets/images/logobaru.png') !!}"
                                    alt="Materi">
                                @endif

                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $materi->judul }}</h5>
                                    <p class="card-text">{{ Str::limit(strip_tags($materi->isi), 80) }}</p>
                                    <p class="card-text"><small
                                            class="text-muted">{{$materi->kelasid->description}}</small></p>
                                    <form method="POST"
                                        action="{{ route('siswa.mulaibelajar', ['materi' => $materi->id]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm"><i
                                                class="fa fa-labs-alt"></i>Mulai Belajar</button>
                                    </form><br />
                                    @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs nav-tabs-custom mt-3 mb-2 ecommerce-sortby-list">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#materi" role="tab">Materi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#praktikum" role="tab">Praktikum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#kuis" role="tab">Latihan Soal</a>
                    </li>
                </ul>
                <div class="tab-content p-3 text-muted">
                    <div role="tabpanel" class="tab-pane fade show active" id="materi">
                        <div class="col-xl-12 col-sm-0 mb-4">
                            <div class="product-box">
                                <div class="product-content p-4">
                                    <div class="d-flex justify-content-between align-items-end">
                                        <div>
                                            {!! Str::limit($materi->isi, 1000) !!}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="praktikum">
                            <div class="col-xl-12 col-sm-0 mb-0">
                                <div class="d-flex justify-content-between align-items-end">
                                    <div>
                                        <div class="alert alert-danger d-flex align-items-center mt-2" role="alert">
                                            <div>
                                                <i class="bx bx-shield-quarter"></i> <small><strong>Akses Praktikum di menu Kursus Saya</strong></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="kuis">
                        <div class="col-xl-12 col-sm-0 mb-0">
                            <div class="d-flex justify-content-between align-items-end">
                                <div>
                                    <div class="alert alert-warning d-flex align-items-center mt-2" role="alert">
                                        <div>
                                            <i class="bx bx-shield-quarter"></i> <small><strong>Akses Soal Kuis di menu Kursus Saya</strong></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-success d-flex align-items-center mt-2" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img"
                            aria-label="Warning:">
                            <path
                                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                        <div>
                            <small> Klik menu <strong>Mulai Belajar</strong> untuk mulai belajar dan melihat detail
                                Materi, Praktikum serta Soal Latihan</small>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- end row -->
@endsection