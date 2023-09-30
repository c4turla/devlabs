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
                                    <h3 class="card-title">{{ $materi->judul }}</h3>
                                    <p class="card-text"><small
                                            class="text-muted">{{$materi->kelasid->description}}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs nav-tabs-custom mt-3 mb-2 ecommerce-sortby-list">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#materi" role="tab">Materi</a>
                    </li>
                </ul>
                <div class="tab-content p-3 text-muted">
                    <div role="tabpanel" class="tab-pane fade show active" id="materi">
                        <div class="col-xl-12 col-sm-0 mb-4">
                            <div class="product-box">
                                <div class="product-content p-4">
                                    <div class="d-flex justify-content-between align-items-end">
                                        <div>
                                            {!! $materi->isi !!}
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
</div>
<!-- end row -->
@endsection