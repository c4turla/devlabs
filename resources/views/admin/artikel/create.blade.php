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
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Artikel</a></li>
                    <li class="breadcrumb-item active">Tambah Artikel</li>
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
                <h4 class="card-title">Tambah Artikel</h4>
                <p class="card-title-desc">Form ini digunakan untuk <code>Tambah Artikel</code>.</p>
            </div>
            <form action="{{ route('admin.simpanartikel') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="judul" class="col-md-2 col-form-label">Judul</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" value="" id="judul" name="judul">
                            @if ($errors->has('judul'))
                            <span class="text-danger">{{ $errors->first('judul') }}</span>
                            @endif
                        </div>

                    </div>
                    <div class="mb-3 row">
                        <label for="example-search-input" class="col-md-2 col-form-label">Kategori</label>
                        <div class="col-md-4">
                            <select class="form-select" name="kategori_id" id="kategori_id">
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('kategori_id'))
                            <span class="text-danger">{{ $errors->first('kategori_id') }}</span>
                            @endif
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#kategoriModal"><i class="bx bx-library me-1"></i> Tambah
                                Kategori</button>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-url-input" class="col-md-2 col-form-label">Gambar</label>
                        <div class="col-md-4">
                            <input class="form-control" type="file" value="" id="gambar" name="gambar">
                            @if ($errors->has('gambar'))
                            <span class="text-danger">{{ $errors->first('gambar') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-email-input" class="col-md-2 col-form-label">Isi Artikel</label>
                        <div class="col-md-10">
                            <textarea class="form-control" id="my-editor" name="deskripsi"></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success" type="submit"><i class="bx bx-save me-1"></i> Simpan</button>
                        <button class="btn btn-warning" type="reset"><i class="bx bx-reset me-1"></i> Reset</button>
                    </div>
                </div>
            </form>

            <div class="modal fade" id="kategoriModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Artikel</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.simpankategori') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Nama Kategori:</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Deskripsi:</label>
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                    class="bx bx-block me-1"></i> Tutup</button>
                            <button class="btn btn-primary" type="submit"><i class="bx bx-plus me-1"></i>
                                Tambah</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

<script>
    var options = {
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
</script>
<script>
    CKEDITOR.replace('my-editor', options);
</script>
@endsection
