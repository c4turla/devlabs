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
                   <strong>Latihan Kuis : {{ $materi->judul }}</strong>
                </div>
                <div class="card-body">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content">
                            <br/>
                            <form method="POST" action="{{ route('proses.jawaban') }}">
                                @csrf
                            <input type="hidden" name="id_materi" value="{{ $materi->id }}">
                            @foreach ($kuis as $key => $item)
                            <div class="modal-body">
                                <h3 class="card-title">{{ $loop->iteration }}. {!! $item->soal !!}</h3>
                                @if ($item->gambar_soal)
                                <p><img src="{{ asset('storage/' . $item->gambar_soal) }}" height="150"></p>
                                @endif
                                <input type="hidden" name="id_soal[]" value="{{ $item->id }}">
                                <div class="form-group mb-5">
                                    <label>Pilihan jawaban:</label><br>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="pilihan_a{{ $key }}" name="jawaban[{{ $key }}]" class="custom-control-input" value="A">
                                        <label class="custom-control-label" for="pilihan_a{{ $key }}">A. {!! $item->pilihan_a !!}</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="pilihan_b{{ $key }}" name="jawaban[{{ $key }}]" class="custom-control-input" value="B">
                                        <label class="custom-control-label" for="pilihan_b{{ $key }}">B. {!! $item->pilihan_b !!}</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="pilihan_c{{ $key }}" name="jawaban[{{ $key }}]" class="custom-control-input" value="C">
                                        <label class="custom-control-label" for="pilihan_c{{ $key }}">C. {!! $item->pilihan_c !!}</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="pilihan_d{{ $key }}" name="jawaban[{{ $key }}]" class="custom-control-input" value="D">
                                        <label class="custom-control-label" for="pilihan_d{{ $key }}">D. {!! $item->pilihan_d !!}</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="pilihan_e{{ $key }}" name="jawaban[{{ $key }}]" class="custom-control-input" value="E">
                                        <label class="custom-control-label" for="pilihan_e{{ $key }}">E. {!! $item->pilihan_e !!}</label>
                                    </div>
                                </div>
                            </div>                            
                            @endforeach
                            <hr>
                            <div class="col-md-4">
                            <button type="submit" class="btn btn-primary" id="selesai-button">Selesai</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

<!-- end page title -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const selesaiButton = document.getElementById('selesai-button');
    if (selesaiButton) {
        selesaiButton.addEventListener('click', function (event) {
            event.preventDefault(); // Mencegah formulir mengirimkan permintaan

            Swal.fire({
                title: 'Apakah Anda yakin dengan jawaban Anda?',
                text: 'Anda tidak dapat mengubahnya setelah dikirim.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Kirim Jawaban!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna menekan "Ya, Kirim Jawaban!", lanjutkan dengan mengirimkan formulir
                    const form = event.target.closest('form');
                    form.submit();
                }
            });
        });
    }
});

</script>
@endsection
