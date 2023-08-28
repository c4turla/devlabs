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
                                <button type="button" class="btn btn-success btn-sm waves-effect waves-light"
                                    data-bs-toggle="modal" data-bs-target=".tambah-soal">Tambah Soal</button>
                            </div>
                            <!--  Tambah Soal Latihan -->
                            <div class="modal fade tambah-soal" tabindex="-1" role="dialog" aria-labelledby="tambahsoal"
                                aria-hidden="true">
                                <form action="{{ route('admin.storekuis') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="tambahsoal">Tambah Soal Latihan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <label>Materi : {{ $materi->judul }}</label>
                                                <input type="hidden" name="materi_id" value="{{ $materi->id }}">
                                                <hr>
                                                <label>Soal</label>
                                                <textarea class="form-control mb-2" name="soal" id="soal" rows="2"
                                                    required></textarea>
                                                <label>Gambar Jika Ada</label>
                                                <div class="col-md-6">
                                                    <input type="file" class="form-control" placeholder="Pilih Gambar"
                                                        name="gambar_soal"><br />
                                                </div>
                                                <label>Plihan Jawaban : </label> <br>
                                                <label>Masukan Jawaban A.</label>
                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control" placeholder="Jawaban A"
                                                        name="pilihan_a" required>
                                                </div>
                                                <label>Masukan Jawaban B.</label>
                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control" placeholder="Jawaban B"
                                                        name="pilihan_b" required>
                                                </div>
                                                <label>Masukan Jawaban C.</label>
                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control" placeholder="Jawaban C"
                                                        name="pilihan_c" required>
                                                </div>
                                                <label>Masukan Jawaban D.</label>
                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control" placeholder="Jawaban D"
                                                        name="pilihan_d" required>
                                                </div>
                                                <label>Masukan Jawaban E.</label>
                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control" placeholder="Jawaban E"
                                                        name="pilihan_e" required>
                                                </div>
                                                <label>Jawaban Benar : </label>
                                                <div class="col-md-4 mb-2">
                                                    <select class="form-select" name="jawaban_benar" id="jawaban_benar"
                                                        required>
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
                                                    <input type="number" class="form-control" placeholder="Skor"
                                                        name="skor" required>
                                                </div>
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
                            <p class="card-text"><strong> Belum ada soal kuis / latihan untuk materi
                                    ini.</strong></p>
                        </div>
                        @else
                        @foreach ($kuis as $kuis)
                        <div class="card-body">
                            <h3 class="card-title">{{ $loop->iteration }}. {{ $kuis->soal }}</h3>
                            @if ($kuis->gambar_soal)
                            <p><img src="{{ asset('storage/' . $kuis->gambar_soal) }}" height="150"></p>
                            @else
                            @endif
                            <div class="form-group">
                                <label>Pilihan jawaban:</label><br>
                                <label>A. {{ $kuis->pilihan_a }}</label><br>
                                <label>B. {{ $kuis->pilihan_b }}</label><br>
                                <label>C. {{ $kuis->pilihan_c }}</label><br>
                                <label>D. {{ $kuis->pilihan_d }}</label><br>
                                <label>E. {{ $kuis->pilihan_e }}</label><br>
                                <label>Jawaban Benar : {{ $kuis->jawaban_benar }} </label> - <label>Skor Untuk
                                    Soal ini : {{ $kuis->skor }} </label> <br>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $kuis->id }}"><i class="fas fa-edit"></i> Edit</button>
                                <form action="{{ route('admin.hapuskuis', $kuis->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm swal-confirm"
                                        data-confirm-text="Apakah Anda yakin ingin menghapus soal ini?"><i
                                            class="fas fa-trash"></i>
                                        Hapus</button>
                                </form>
                            </div>
                            <!-- Modal Edit untuk setiap soal -->
                            <div class="modal fade" id="editModal{{ $kuis->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="editModalLabel{{ $kuis->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editsoal">Edit Soal Latihan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Formulir untuk mengedit soal -->
                                            <form action="{{ route('admin.kuisupdate', $kuis->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="soal">Soal:</label>
                                                    <textarea class="form-control mb-2" name="soal" id="soal"
                                                        rows="2">{{ $kuis->soal }}</textarea>
                                                    <input type="hidden" class="form-control" name="materi_id" value="{{ $kuis->materi_id }}">
                                                </div>
                                                <label>Gambar Jika Ada</label>
                                                @if ($kuis->gambar_soal)
                                                <p><img src="{{ asset('storage/' . $kuis->gambar_soal) }}" height="150">
                                                </p>
                                                @else
                                                @endif
                                                <div class="col-md-6">
                                                    <input type="file" class="form-control" placeholder="Pilih Gambar"
                                                        name="gambar_soal"><br />
                                                </div>
                                                <label>Plihan Jawaban : </label> <br>
                                                <label>Masukan Jawaban A.</label>
                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control" placeholder="Jawaban A"
                                                        name="pilihan_a" required value="{{ $kuis->pilihan_a }}">
                                                </div>
                                                <label>Masukan Jawaban B.</label>
                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control" placeholder="Jawaban B"
                                                        name="pilihan_b" required value="{{ $kuis->pilihan_b }}">
                                                </div>
                                                <label>Masukan Jawaban C.</label>
                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control" placeholder="Jawaban C"
                                                        name="pilihan_c" required value="{{ $kuis->pilihan_c }}">
                                                </div>
                                                <label>Masukan Jawaban D.</label>
                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control" placeholder="Jawaban D"
                                                        name="pilihan_d" required value="{{ $kuis->pilihan_d }}">
                                                </div>
                                                <label>Masukan Jawaban E.</label>
                                                <div class="col-md-6 mb-2">
                                                    <input type="text" class="form-control" placeholder="Jawaban E"
                                                        name="pilihan_e" required value="{{ $kuis->pilihan_e }}">
                                                </div>
                                                <label>Jawaban Benar : </label>
                                                <div class="col-md-4 mb-2">
                                                    <select class="form-select" name="jawaban_benar" id="jawaban_benar"
                                                        required>
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
                                                    <input type="number" class="form-control" placeholder="Skor"
                                                        name="skor" required value="{{ $kuis->skor }}">
                                                </div>
                                                <!-- Tambahkan atribut lain yang ingin Anda ubah -->
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

@endsection