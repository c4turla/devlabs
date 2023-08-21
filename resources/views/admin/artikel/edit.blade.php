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
                    <li class="breadcrumb-item active">Edit Artikel</li>
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
                <h4 class="card-title">Edit Artikel</h4>
                <p class="card-title-desc">Form ini digunakan untuk <code>Edit Artikel</code>.</p>
            </div>
            <form action="{{ route('admin.updateartikel', $artikel) }}" method="POST" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="judul" class="col-md-2 col-form-label">Judul</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" value="{{ $artikel->judul }}" id="judul" name="judul">
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
                                @foreach ($kategori as $kategori)
                                <option value="{{ $kategori->id }}" {{ $artikel->kategori_id == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->name }}
                                </option>
                                @endforeach
                            </select>
                            @if ($errors->has('kategori_id'))
                            <span class="text-danger">{{ $errors->first('kategori_id') }}</span>
                            @endif
                        </div>

                    </div>

                    <div class="mb-3 row">
                        <label for="example-url-input" class="col-md-2 col-form-label">Gambar (Maks 2MB)</label>

                        <div class="col-md-4">   
                            <div class="col-md-2">
                                <img src="{{ asset('storage/' . $artikel->gambar) }}" width="100" alt="">
                            </div>
                            <br>                         
                            <input class="form-control" type="file" id="gambar" name="gambar" >
                            @if ($errors->has('gambar'))
                            <span class="text-danger">{{ $errors->first('gambar') }}</span>
                            @endif
                        </div>

                    </div>
                    <div class="mb-3 row">
                        <label for="example-email-input" class="col-md-2 col-form-label">Isi Artikel</label>
                        <div class="col-md-10">
                            <textarea class="form-control" id="my-editor" name="deskripsi">{{ $artikel->deskripsi }}</textarea>
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
