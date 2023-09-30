@extends('partials.layout')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Kursus Saya</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ url('siswa/kursus-saya' )}}">Kursus Saya</a></li>
                    <li class="breadcrumb-item active">Praktikum</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Detail Praktikum : <strong>{{ $praktikum->judul_praktikum }} </strong>
                </div>
                <div class="card-body">
                    <p><img src="{{ asset('storage/' . $praktikum->gambar) }}" height="450"> </p>
                    <p class="card-text">{!! $praktikum->description !!}</p>
                    <p class="card-text">{!! $praktikum->simulasi !!}</p>
                    {{-- Tampilkan konten praktikum, instruksi, gambar, atau apapun yang sesuai --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
