@extends('partials.layout')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Materi</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Materi</a></li>
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
                        <label for="example-email-input" class="col-md-2 col-form-label">Isi Materi</label>
                        <div class="col-md-10">
                            <textarea class="form-control" id="ckeditor-classic" name="isi"></textarea>
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

<!-- ckeditor -->
<script src="{!! url('assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') !!}"></script>
<!-- init js -->
<script src="{!! url('assets/js/pages/form-editor.init.js') !!}"></script>
<script src="{!! url('assets/js/pages/form-validation.init.js') !!}"></script>
@endsection