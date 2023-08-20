@extends('partials.layout')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Kelas</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.kelas') }}">Kelas</a></li>
                    <li class="breadcrumb-item active">Edit Kelas</li>
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
                <h4 class="card-title">Edit Kelas</h4>
                <p class="card-title-desc">Form ini digunakan untuk <code>Edit Kelas</code>.</p>
            </div>
            <form action="{{ route('admin.updatekelas', $kelas) }}" method="POST" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="card-body">                    
                    <div class="mb-3 row">
                        <label for="nama_kelas" class="col-md-2 col-form-label">Nama Kelas</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" id="nama_kelas" name="nama_kelas" value="{{ $kelas->nama_kelas }}">
                        </div>

                    </div>
                    <div class="mb-3 row">
                        <label for="example-search-input" class="col-md-2 col-form-label">Kurikulum</label>
                        <div class="col-md-4">
                            <select class="form-select" name="kurikulum" id="kurikulum" required>
                                <option value="">Pilih Kurikulum</option>
                                @foreach ($kategori as $kategori)
                                <option value="{{ $kategori->id }}" {{ $kelas->kurikulum == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->name }}
                                </option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="description" class="col-md-2 col-form-label">Deskripsi</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text"  id="description" name="description" value="{{ $kelas->description }}">
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


<!-- init js -->
<script src="{!! url('assets/js/pages/form-editor.init.js') !!}"></script>
<script src="{!! url('assets/js/pages/form-validation.init.js') !!}"></script>
@endsection