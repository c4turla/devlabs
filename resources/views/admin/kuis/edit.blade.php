@extends('partials.layout')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">List Kuis</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Kuis</a></li>
                    <li class="breadcrumb-item active">Edit Soal</li>
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
                <h4 class="card-title">Edit Soal</h4>
                <p class="card-title-desc">Form ini digunakan untuk <code>Edit Soal Kuis</code>.</p>
            </div>
            <form action="{{ route('admin.kuisupdate', $kuis->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <br/>
                        <div class="modal-body">
                            <label>Materi : {{ $kuis->materiid->judul }}</label>
                            <input type="hidden" name="materi_id" value="{{ $kuis->materiid->id }}">
                            <hr>
                            <label>Soal</label>
                            <textarea class="my-editor form-control mb-2" name="soal" id="soal" cols="30"
                                rows="2">{{ $kuis->soal }}</textarea>
                            <label>Gambar Jika Ada</label>
                            <div class="col-md-6">
                                @if ($kuis->gambar_soal)
                                <p><img src="{{ asset('storage/' . $kuis->gambar_soal) }}" height="150">
                                </p>
                                @else
                                @endif
                                <input type="file" class="form-control" placeholder="Pilih Gambar"
                                    name="gambar_soal"><br />
                            </div>
                            <label>Plihan Jawaban : </label> <br>
                            <label>Masukan Jawaban A.</label>
                            <div class="col-md-8 mb-2">
                                <textarea class="form-control" placeholder="Jawaban A" name="pilihan_a" id="pilihan-a"
                                    required>{{ $kuis->pilihan_a }}</textarea>
                            </div>
                            <label>Masukan Jawaban B.</label>
                            <div class="col-md-8 mb-2">
                                <textarea class="form-control" placeholder="Jawaban B" name="pilihan_b" id="pilihan-b"
                                    required>{{ $kuis->pilihan_b }}</textarea>
                            </div>
                            <label>Masukan Jawaban C.</label>
                            <div class="col-md-8 mb-2">
                                <textarea class="form-control" placeholder="Jawaban C" name="pilihan_c" id="pilihan-c"
                                    required>{{ $kuis->pilihan_c }}</textarea>
                            </div>
                            <label>Masukan Jawaban D.</label>
                            <div class="col-md-8 mb-2">
                                <textarea class="form-control" placeholder="Jawaban D" name="pilihan_d" id="pilihan-d"
                                    required>{{ $kuis->pilihan_d }}</textarea>
                            </div>
                            <label>Masukan Jawaban E.</label>
                            <div class="col-md-8 mb-2">
                                <textarea class="form-control" placeholder="Jawaban E" name="pilihan_e" id="pilihan-e"
                                    required>{{ $kuis->pilihan_e }}</textarea>
                            </div>
                            <label>Jawaban Benar : </label>
                            <div class="col-md-4 mb-2">
                                <select class="form-select" name="jawaban_benar" id="jawaban_benar" required>
                                    <option value="">Pilih Jawaban</option>
                                    <option value="A" {{ $kuis->jawaban_benar === 'A' ? 'selected' :
                                        '' }}>Jawaban A</option>
                                    <option value="B" {{ $kuis->jawaban_benar === 'B' ? 'selected' :
                                        '' }}>Jawaban B</option>
                                    <option value="C" {{ $kuis->jawaban_benar === 'C' ? 'selected' :
                                        '' }}>Jawaban C</option>
                                    <option value="D" {{ $kuis->jawaban_benar === 'D' ? 'selected' :
                                        '' }}>Jawaban D</option>
                                    <option value="E" {{ $kuis->jawaban_benar === 'E' ? 'selected' :
                                        '' }}>Jawaban E</option>
                                </select>
                            </div>
                            <label>Skor Untuk Soal ini </label>
                            <div class="col-md-2 mb-2">
                                <input type="number" class="form-control" placeholder="Skor" name="skor" required value="{{ $kuis->skor }}">
                            </div>
                        </div>
                        <div class="card-footer mt-4">
                            <a href="{{ route('admin.tambahkuis',$kuis->materiid->id) }}" class="btn btn-warning"> Kembali</a>
                            <button type="submit" class="btn btn-success"> <i class="fas fa-save"></i>
                                Simpan</button>
                        </div>
            </form>
        </div>
    </div>
    <hr>

</div>
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
    CKEDITOR.replace('soal', options);
    CKEDITOR.replace('pilihan-a', options);
    CKEDITOR.replace('pilihan-b', options);
    CKEDITOR.replace('pilihan-c', options);
    CKEDITOR.replace('pilihan-d', options);
    CKEDITOR.replace('pilihan-e', options);
</script>

@endsection