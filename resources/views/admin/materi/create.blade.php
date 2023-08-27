@extends('partials.layout')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Materi</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.materi') }}">Materi</a></li>
                    <li class="breadcrumb-item active">Tambah Materi</li>
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
                <h4 class="card-title">Tambah Materi</h4>
                <p class="card-title-desc">Form ini digunakan untuk <code>Tambah Materi</code>.</p>
            </div>
            <form action="{{ route('admin.savemateri') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="judul" class="col-md-2 col-form-label">Judul</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" value="" id="judul" name="judul">
                            <input type="hidden" name="penulis" value="{{Auth::user()->name}}">
                            @if ($errors->has('judul'))
                            <span class="text-danger">{{ $errors->first('judul') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-search-input" class="col-md-2 col-form-label">Kelas</label>
                        <div class="col-md-4">
                            <select class="form-select" name="kelas" id="kelas">
                                <option value="">Pilih Kelas</option>
                                @foreach ($kelass as $kelas)
                                <option value="{{ $kelas->id }}">{{ $kelas->description }}</option>
                                @endforeach
                            </select>
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
                        <label for="example-email-input" class="col-md-2 col-form-label">Isi Materi</label>
                        <div class="col-md-10">
                            <textarea class="form-control" id="my-editor" name="isi"></textarea>
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