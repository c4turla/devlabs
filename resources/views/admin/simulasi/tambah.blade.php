@extends('partials.layout')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Tambah Simulasi</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.simulasi')}}">Simulasi</a></li>
                    <li class="breadcrumb-item active">Tambah Simulasi</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm">
                        <div class="mb-4">
                            <strong>Tambah Simulasi Praktikum/Latihan untuk materi ini.</strong>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-transparent border-bottom">
                                Judul Materi
                            </div>
                            <div class="card-body">
                                <blockquote class="card-blockquote mb-0">
                                    <p>{{ $materi->judul }}</p>
                                    <footer class="blockquote-footer mt-0 font-size-12">
                                        Simulasi Latihan : <cite title="{{ $materi->kelasid->description }}">{{
                                            $materi->kelasid->description }}</cite>
                                    </footer>
                                </blockquote>
                            </div>
                        </div>
                    </div><!-- end col -->
                    <div class="col-sm-auto">
                        <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                            <div>
                                <button type="button" class="btn btn-warning btn-sm waves-effect waves-light"
                                    data-bs-toggle="modal" data-bs-target=".tambah-soal"><i class="fas fa-plus-square"></i> Tambah Simulasi</button>
                            </div>
                            <!--  Tambah Soal Latihan -->
                            <div class="modal fade tambah-soal" tabindex="-1" role="dialog" aria-labelledby="tambahsoal"
                                aria-hidden="true">
                                <form action="{{ route('admin.storesimulasi') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="tambahsoal">Tambah Simulasi Latihan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <label>Materi : {{ $materi->judul }}</label>
                                                <input type="hidden" name="materi_id" value="{{ $materi->id }}">
                                                <hr>
                                                <label>Judul Simulasi :</label>
                                                <div class="col-md-8 mb-2">
                                                    <input type="text" class="form-control" placeholder="Masukan Judul Simulasi" name="judul_praktikum" required>
                                                </div>
                                                <label>Simulasi</label>
                                                <textarea class="form-control mb-2" name="simulasi" id="simulasi" rows="2"
                                                    required></textarea>
                                                <label>Gambar Jika Ada</label>
                                                <div class="col-md-6">
                                                    <input type="file" class="form-control" placeholder="Pilih Gambar"
                                                        name="gambar"><br />
                                                </div>
                                                <label>Deskripsi</label>
                                                <textarea class="form-control" id="my-editor" name="description"></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-success"> <i
                                                        class="fas fa-save"></i>
                                                    Simpan</button>
                                            </div>
                                </form>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if ($kuis->isEmpty())
                        <div class="card-body text-center">
                            <p class="card-text"><strong> Belum ada simulasi praktikum / latihan untuk materi
                                    ini.</strong></p>
                        </div>
                        @else
                        @foreach ($kuis as $kuis)
                        <div class="card-body">
                            <h3 class="card-title">Judul Simulasi : {{ $kuis->judul_praktikum }}</h3>
                            @if ($kuis->gambar)
                            <p><img src="{{ asset('storage/' . $kuis->gambar) }}" height="150"></p>
                            @else
                            @endif
                            <label>Simulasi:</label><br>
                            <label>{!! $kuis->simulasi !!}</label><br>

                            <label>Deskripsi:</label><br>
                            <label>{!! $kuis->description !!}</label><br>
 
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $kuis->id }}"><i class="fas fa-edit"></i> Edit</button>
                                <form action="{{ route('admin.hapussimulasi', $kuis->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm swal-confirm"
                                        data-confirm-text="Apakah Anda yakin ingin menghapus simulasi ini?"><i
                                            class="fas fa-trash"></i>
                                        Hapus</button>
                                </form>
                            <!-- Modal Edit untuk setiap soal -->
                            <div class="modal fade" id="editModal{{ $kuis->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="editModalLabel{{ $kuis->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editsoal">Edit Simulasi Praktikum / Latihan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Formulir untuk mengedit soal -->
                                            <form action="{{ route('admin.simulasiupdate', $kuis->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label>Judul Simulasi :</label>
                                                <div class="col-md-8 mb-2">
                                                    <input type="text" class="form-control" placeholder="Masukan Judul Simulasi" name="judul_praktikum" required value="{{ $kuis->judul_praktikum }}">
                                                </div>
                                                <label>Simulasi</label>
                                                <textarea class="form-control mb-2" name="simulasi" id="simulasi" rows="2"
                                                    required>{{ $kuis->simulasi }}</textarea>
                                                    <input type="hidden" class="form-control" name="materi_id" value="{{ $kuis->materi_id }}">
                                                </div>
                                                <label>Gambar Jika Ada</label>
                                                @if ($kuis->gambar)
                                                <p><img src="{{ asset('storage/' . $kuis->gambar) }}" height="150">
                                                </p>
                                                @else
                                                @endif
                                                <div class="col-md-6">
                                                    <input type="file" class="form-control" placeholder="Pilih Gambar"
                                                        name="gambar"><br />
                                                </div>
                                                <label>Deskripsi</label>
                                                <textarea class="form-control" id="my-editor" name="description">{{ $kuis->description }}</textarea>
                                               
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-success"> <i class="fas fa-save"></i>
                                                Simpan</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal Edit untuk setiap soal -->
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div><!-- end col -->
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('.swal-confirm').click(function (e) {
            e.preventDefault();
            var form = this.closest('form');
            Swal.fire({
                title: $(this).data('confirm-text') || 'Apakah Anda yakin?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
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