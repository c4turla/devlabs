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
                    <li class="breadcrumb-item active">Kuis</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   <strong>Nilai Latihan Kuis Anda</strong>
                </div>
                <div class="card-body">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content">
                            <br/>
                            <div class="modal-body">
                                <label>Materi : {{ $hasil->materiid->judul }}</label>
                                <hr>
                                <h3 style="text-align: center">Nilai Anda : {{ $hasil->skor  }}</h3>
                                <hr>                                    
                                <a href="{{ url('siswa/kursus-saya' )}}" class="btn btn-danger btn-sm"> Tutup</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- end page title -->
@endsection
