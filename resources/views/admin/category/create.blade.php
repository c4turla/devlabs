@extends('partials.layout')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Kategori</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Kategori</a></li>
                    <li class="breadcrumb-item active">Tambah Kategori</li>
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
                <h4 class="card-title">Tambah Kategori</h4>
                <p class="card-title-desc">Form ini digunakan untuk <code>Tambah Kategori</code>.</p>
            </div>
            <form action="{{ route('admin.savekategori') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="name" class="col-md-2 col-form-label">Nama Kategori</label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" value="" id="name" name="name">
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                    </div>
                    <div class="mb-3 row">
                        <label for="example-search-input" class="col-md-2 col-form-label">Status</label>
                        <div class="col-md-2">
                            <select class="form-select" name="enabled" id="enabled" required>
                                <option value="">Pilih Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-url-input" class="col-md-2 col-form-label">Deskripsi</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="" id="description" name="description">
                            @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success" type="submit"><i class="bx bx-save me-1"></i> Simpan</button>
                        <button class="btn btn-warning" type="reset"><i class="bx bx-reset me-1"></i> Reset</button>
                    </div>
                </div>
            </form>

          
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->

@endsection