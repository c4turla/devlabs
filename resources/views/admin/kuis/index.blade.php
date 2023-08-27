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
                    <li class="breadcrumb-item active">List Kuis</li>
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
                            <h3 class="card-title">List Kuis</h3>
                            <p class="card-title-desc">Daftar Materi Beserta Soal Latihan.</p>
                        </div>

                    </div>
                    <div class="col-sm-auto">
                        <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                            
{{--                             <div>
                                <a href="{{ route('admin.tambahkelas') }}" class="btn btn-primary"><i
                                        class="bx bx-plus me-1"></i> Tambah Kuis</a>
                            </div>
 --}}
                        </div>
                    </div>
                </div>
                <hr>

                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>Judul Materi</th>
                                <th>Kuis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($materiWithKuis as $materi)
                            <tr>
                                <th scope="row">#</th>
                                <td>{{ $materi->judul }}</td>
                                <td>
                                    @if ($materi->kuis->isEmpty())
                                        Kuis belum ada.
                                    @else
                                        Total Soal: {{ $materi->kuis->count() }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.tambahkuis',$materi->id) }}" class="btn btn-success btn-sm"><i class="fas fa-comment-medical"></i>
                                        Tambah Kuis
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                
                            @foreach ($materiWithoutKuis as $materi)
                            <tr>
                                <th scope="row">#</th>
                                <td>{{ $materi->judul }}</td>
                                <td>Kuis belum ada.</td>
                                <td>
                                    <a href="{{ route('admin.tambahkuis',$materi->id) }}" class="btn btn-success btn-sm"><i class="fas fa-comment-medical"></i>
                                        Tambah Kuis
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br/>
                    <nav aria-label="...">
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item">
                                {{ $materiWithoutKuis->links() }}
                            </li>
                        </ul>
                    </nav>
                    
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