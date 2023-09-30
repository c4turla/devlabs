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
                   <strong>Selamat Datang di Latihan Kuis</strong>
                </div>
                <div class="card-body">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content">
                            <br/>
                            <div class="modal-body">
                                <label>Materi : {{ $materi->judul }}</label>
                                <hr>
                                <blockquote class="card-blockquote mb-0">
                                    <footer class="blockquote-footer mt-0 font-size-12">
                                        Soal Latihan : <cite title="{{ $materi->kelasid->description }}">{{
                                            $materi->kelasid->description }}</cite>
                                    </footer>
                                </blockquote>
                                <label>Jumlah Soal : {{ $totalSoal  }}</label>
                                <hr><p>
                                <small> Klik Tombol mulai untuk mulai kuis atau <i>klik Batal untuk kembali</i></small>
                                    </p>
                                    <div class="d-flex align-items-center">
                                <form method="POST" action="{{ route('siswa.startkuis', $materi->id) }}">
                                    @csrf
                                <button type="submit" class="btn btn-primary btn-sm">Mulai Kuis </button>
                                </form> &nbsp;
                                <a href="{{ url('siswa/kursus-saya' )}}" class="btn btn-danger btn-sm"> Batal</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- end page title -->
@endsection
