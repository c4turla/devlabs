@extends('partials.layout')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Materi</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">Materi</li>
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
                    <div class="col-md-8">
                        <div>
                            <h5>Pilih Materi Berdasarkan Kurikulum</h5>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-inline float-md-end">
                            <div class="search-box ms-2">
                                <div class="position-relative">
                                    <form action="{{ route('siswa.course') }}" method="GET">
                                        <input type="text" class="form-control bg-light border-light rounded"
                                            placeholder="Search..." name="search" value="{{ $search }}">
                                        <i class="bx bx-search search-icon"></i>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <ul class="nav nav-tabs nav-tabs-custom mt-3 mb-2 ecommerce-sortby-list">
                    @foreach($kategori as $subcategory)
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#{{ $subcategory->id }}" role="tab">{{
                            $subcategory->name }}</a>
                    </li>
                    @endforeach
                </ul>

                <div class="tab-content p-3 text-muted">
                    @foreach($kategori as $subcategory)
                    @php
                    $index = $loop->index;
                    @endphp
                    <div role="tabpanel" class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                        id="{{ $subcategory->id }}">
                        <ul>
                            @foreach($subcategory->kelas as $kelas)
                            <strong>{{ $kelas->nama_kelas }}</strong>
                                @foreach($kelas->materi as $materi)
                                <div class="col-xl-12 col-sm-0 mb-4">
                                    <div class="product-box">   
                                        <div class="product-content p-4">
                                            <div class="d-flex justify-content-between align-items-end">
                                                <div>
                                                    <h5 class="mb-1"><a href="#"
                                                            class="text-dark font-size-16">Judul Materi : {{ $materi->judul }}</a></h5>
                                                    <p class="text-muted font-size-13">{{ $materi->kelasid->description }}</p>
                                                </div>    
                                                <div>
                                                    <ul class="list-inline mb-0 text-muted product-color">
                                                        <a class="btn btn-success btn-sm" href="#"><i class="fas fa-eye"></i> Lihat</a>
                                                    </ul>
                                                </div>
                                            </div>
    
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>



    </div>

</div>
<!-- end row -->
@endsection