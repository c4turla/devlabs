@extends('partials.layout')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Tambah Kuis</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.kuis')}}">Kuis</a></li>
                    <li class="breadcrumb-item active">Tambah Kuis</li>
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
                            <strong>Tambah Soal Kuis/Latihan untuk materi ini.</strong>
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
                                        Soal Latihan : <cite title="{{ $materi->kelasid->description }}">{{
                                            $materi->kelasid->description }}</cite>
                                    </footer>
                                </blockquote>
                            </div>
                        </div>
                    </div><!-- end col -->
                    <div class="col-sm-auto">
                        <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                            <div>
                                <a href="{{ route('admin.tambahsoal',$materi->id) }}" class="btn btn-success btn-sm"><i
                                        class="fas fa-comment-medical"></i>
                                    Tambah Soal
                                </a>
                            </div>

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
                            <p class="card-text"><strong> Belum ada soal kuis / latihan untuk materi
                                    ini.</strong></p>
                        </div>
                        @else
                        @foreach ($kuis as $kuis)
                        <div class="card-body">
                            <h3 class="card-title">{{ $loop->iteration }}. {!! $kuis->soal !!}</h3>
                            @if ($kuis->gambar_soal)
                            <p><img src="{{ asset('storage/' . $kuis->gambar_soal) }}" height="150"></p>
                            @else
                            @endif
                            <div class="form-group">
                                <label>Pilihan jawaban:</label><br>
                                <label>A. {!! $kuis->pilihan_a !!}</label><br>
                                <label>B. {!! $kuis->pilihan_b !!}</label><br>
                                <label>C. {!! $kuis->pilihan_c !!}</label><br>
                                <label>D. {!! $kuis->pilihan_d !!}</label><br>
                                <label>E. {!! $kuis->pilihan_e !!}</label><br>
                                <label>Jawaban Benar : {{ $kuis->jawaban_benar }} </label> - <label>Skor Untuk
                                    Soal ini : {{ $kuis->skor }} </label> <br>
                                <a href="{{ route('admin.editkuis',$kuis->id) }}" type="button" class="btn btn-primary btn-sm" ><i class="fas fa-edit"></i> Edit</a>
                                <form action="{{ route('admin.hapuskuis', $kuis->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm swal-confirm"
                                        data-confirm-text="Apakah Anda yakin ingin menghapus soal ini?"><i
                                            class="fas fa-trash"></i>
                                        Hapus</button>
                                </form>
                            </div>
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
    CKEDITOR.replace('soal', options);
    CKEDITOR.replace('soal-edit', options);
</script>
@endsection