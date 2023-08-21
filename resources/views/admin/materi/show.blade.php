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
                    <li class="breadcrumb-item active">Lihat Materi</li>
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
                <h4 class="card-title">Lihat Materi</h4>
            </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="judul" class="col-md-2 col-form-label">Judul</label>
                        <div class="col-md-8">
                            <h4>{{ $materi->judul }}</h4>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-search-input" class="col-md-2 col-form-label">Kelas</label>
                        <div class="col-md-4">
                            <select class="form-select" name="kelas" id="kelas" disabled>
                                <option value="">Pilih Kelas</option>
                                @foreach ($kelas as $kelas)
                                <option value="{{ $kelas->id }}" {{ $materi->kelas == $kelas->id ? 'selected' : '' }}>
                                    {{ $kelas->description }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-email-input" class="col-md-2 col-form-label">Isi Materi</label>
                        <div class="col-md-10">
                            {!! $materi->isi !!}
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.materi') }}" class="btn btn-primary"><i class="bx bx-arrow-back me-1"></i>Kembali</a>
                    </div>
                </div>

        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->

@endsection