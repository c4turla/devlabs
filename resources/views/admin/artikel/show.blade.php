@extends('partials.layout')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Artikel</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Blog</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.artikel') }}">Artikel</a></li>
                    <li class="breadcrumb-item active">Lihat Artikel</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Lihat Artikel</h4>
            </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="judul" class="col-md-2 col-form-label">Judul</label>
                        <div class="col-md-6">
                           <h5> {{ $artikel->judul }} </h5>
                        </div>

                    </div>
                    <div class="mb-3 row">
                        <label for="example-search-input" class="col-md-2 col-form-label">Kategori</label>
                        <div class="col-md-4">
                            <select class="form-select" name="kategori_id" id="kategori_id" disabled>
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $kategori)
                                <option value="{{ $kategori->id }}" {{ $artikel->kategori_id == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="mb-3 row">
                        <label for="example-url-input" class="col-md-2 col-form-label">Gambar</label>

                        <div class="col-md-4">   
                            <div class="col-md-2">
                                <img src="{{ asset('storage/' . $artikel->gambar) }}" width="200" alt="">
                            </div>
                        </div>

                    </div>
                    <div class="mb-3 row">
                        <label for="example-email-input" class="col-md-2 col-form-label">Isi Artikel</label>
                        <div class="col-md-10">
                            {!! $artikel->deskripsi !!}
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary" href="{{ route('admin.artikel') }}"><i class="bx bx-arrow-back me-1"></i> Kembali</a>
                    </div>
                </div>
        </div>
    </div> <!-- end col -->
</div>

@endsection
