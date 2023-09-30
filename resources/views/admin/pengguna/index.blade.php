@extends('partials.layout')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Pengguna</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                    <li class="breadcrumb-item active">Pengguna</li>
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
                            <h3 class="card-title">List Pengguna</h3>
                            <p class="card-title-desc">Daftar Seluruh Pengguna.</p>
                        </div>

                    </div>
                    <div class="col-sm-auto">
                        <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">

                            <div>
                                <a href="{{ route('admin.tambahpengguna') }}" class="btn btn-primary"><i
                                        class="bx bx-plus me-1"></i> Tambah Pengguna</a>
                            </div>

                        </div>
                    </div>
                </div>
                <hr>

                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Level</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td><a href="">{{ $user->name }}</a></td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->nomor_hp }}</td>
                                <td>{{ $user->level }}</td>
                                <td>{{ $user->alamat }}</td>
                                <td>                                    
                                    <form action="{{ route('admin.deletepengguna', $user->user_id) }}" method="POST" class="d-inline">
                                        <a href="{{ route('admin.editpengguna',$user->user_id) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-sm swal-confirm" data-confirm-text="Apakah Anda yakin ingin menghapus data ini?"><i class="fas fa-trash"></i>
                                            Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br/>
                    <nav aria-label="...">
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item">
                                {!! $users->links() !!}
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