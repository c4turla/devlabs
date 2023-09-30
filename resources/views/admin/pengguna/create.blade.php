@extends('partials.layout')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Pengguna</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.pengguna') }}">Pengguna</a></li>
                    <li class="breadcrumb-item active">Tambah Pengguna</li>
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
                <h4 class="card-title">Tambah Pengguna</h4>
                <p class="card-title-desc">Form ini digunakan untuk <code>Tambah Pengguna</code>.</p>
            </div>
            <form action="{{ route('admin.savepengguna') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="name" class="col-md-2 col-form-label">Nama Lengkap</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" id="name" name="name">
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="judul" class="col-md-2 col-form-label">Email</label>
                        <div class="col-md-6">
                            <input class="form-control" type="email"  id="email" name="email">
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="judul" class="col-md-2 col-form-label">Nomor Handphone</label>
                        <div class="col-md-4">
                            <input class="form-control" type="number"  id="nomor_hp" name="nomor_hp">
                            @if ($errors->has('nomor_hp'))
                            <span class="text-danger">{{ $errors->first('nomor_hp') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="judul" class="col-md-2 col-form-label">Password</label>
                        <div class="col-md-4">
                            <input class="form-control" type="password"  id="password" name="password">
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif                            
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-search-input" class="col-md-2 col-form-label">Level</label>
                        <div class="col-md-4">
                            <select class="form-select" name="level" id="level">
                                <option value="">Pilih Level</option>
                                <option value="admin">Admin/Instruktur</option>
                                <option value="user">User/Siswa</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-url-input" class="col-md-2 col-form-label">Photo</label>
                        <div class="col-md-4">
                            <input class="form-control" type="file" value="" id="photo" name="photo">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="judul" class="col-md-2 col-form-label">Alamat</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text"  id="alamat" name="alamat">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success" type="submit"><i class="bx bx-save me-1"></i> Simpan</button>
                        <button class="btn btn-warning" type="reset"><i class="bx bx-reset me-1"></i> Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->

@endsection