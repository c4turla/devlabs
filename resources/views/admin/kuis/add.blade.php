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
                    <li class="breadcrumb-item active">Tambah Soal</li>
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
                <h4 class="card-title">Tambah Soal</h4>
                <p class="card-title-desc">Form ini digunakan untuk <code>Tambah Soal Kuis</code>.</p>
            </div>
            <form action="{{ route('admin.storekuis') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <br/>
                        <div class="modal-body">
                            <label>Materi : {{ $materi->judul }}</label>
                            <input type="hidden" name="materi_id" value="{{ $materi->id }}">
                            <hr>
                            <label>Soal</label>
                            <textarea class="my-editor form-control mb-2" name="soal" id="soal" cols="30"
                                rows="2"></textarea>
                            <label>Gambar Jika Ada</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" placeholder="Pilih Gambar"
                                    name="gambar_soal"><br />
                            </div>
                            <label>Plihan Jawaban : </label> <br>
                            <label>Masukan Jawaban A.</label>
                            <div class="col-md-8 mb-2">
                                <textarea class="form-control" placeholder="Jawaban A" name="pilihan_a" id="pilihan-a"
                                    required></textarea>
                            </div>
                            <label>Masukan Jawaban B.</label>
                            <div class="col-md-8 mb-2">
                                <textarea class="form-control" placeholder="Jawaban B" name="pilihan_b" id="pilihan-b"
                                    required></textarea>
                            </div>
                            <label>Masukan Jawaban C.</label>
                            <div class="col-md-8 mb-2">
                                <textarea class="form-control" placeholder="Jawaban C" name="pilihan_c" id="pilihan-c"
                                    required></textarea>
                            </div>
                            <label>Masukan Jawaban D.</label>
                            <div class="col-md-8 mb-2">
                                <textarea class="form-control" placeholder="Jawaban D" name="pilihan_d" id="pilihan-d"
                                    required></textarea>
                            </div>
                            <label>Masukan Jawaban E.</label>
                            <div class="col-md-8 mb-2">
                                <textarea class="form-control" placeholder="Jawaban E" name="pilihan_e" id="pilihan-e"
                                    required></textarea>
                            </div>
                            <label>Jawaban Benar : </label>
                            <div class="col-md-4 mb-2">
                                <select class="form-select" name="jawaban_benar" id="jawaban_benar" required>
                                    <option value="">Pilih Jawaban</option>
                                    <option value="A">Jawaban A</option>
                                    <option value="B">Jawaban B</option>
                                    <option value="C">Jawaban C</option>
                                    <option value="D">Jawaban D</option>
                                    <option value="E">Jawaban E</option>
                                </select>
                            </div>
                            <label>Skor Untuk Soal ini </label>
                            <div class="col-md-2 mb-2">
                                <input type="number" class="form-control" placeholder="Skor" name="skor" required>
                            </div>
                        </div>
                        <div class="card-footer mt-4">
                            <a href="{{ route('admin.tambahkuis',$materi->id) }}" class="btn btn-warning"> Kembali</a>
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