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
                    <li class="breadcrumb-item active">Edit Pengguna</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Edit Pengguna</h4><br />
                    <div class="flex-shrink-0">
                        <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#profile" role="tab"
                                    aria-selected="true" >
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Profile</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link " data-bs-toggle="tab" href="#password" role="tab"
                                    aria-selected="false" tabindex="-1">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">Ganti Password</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="tab-content text-muted">
                        <div class="tab-pane active show" id="profile" role="tabpanel">
                            <form action="{{ route('admin.updatepengguna', $user) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('patch')
                                @csrf
                                <div class="mb-3 row">
                                    <label for="name" class="col-md-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" id="name" name="name"
                                            value="{{ $user->name }}">
                                        @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="judul" class="col-md-2 col-form-label">Email</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="email" id="email" name="email"
                                            value="{{ $user->email }}">
                                        @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="judul" class="col-md-2 col-form-label">Nomor Handphone</label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="number" id="nomor_hp" name="nomor_hp"
                                            value="{{ $user->nomor_hp }}">
                                        @if ($errors->has('nomor_hp'))
                                        <span class="text-danger">{{ $errors->first('nomor_hp') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-search-input" class="col-md-2 col-form-label">Level</label>
                                    <div class="col-md-4">
                                        <select class="form-select" name="level" id="level">
                                            <option value="">Pilih Level</option>
                                            <option value="admin" {{ $user->level == "admin" ? 'selected' : ''
                                                }}>Admin/Instruktur</option>
                                            <option value="user" {{ $user->level == "user" ? 'selected' : ''
                                                }}>User/Siswa</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-url-input" class="col-md-2 col-form-label">Photo</label>
                                    <div class="col-md-4">
                                        <div class="col-md-2">
                                            @if($user->photo)
                                            <img src="{{ asset('storage/' . $user->photo) }}" width="100" alt="">
                                            @else
                                            <img class="rounded-3 avatar-xl" alt=""
                                                src="{!! url('assets/images/users/noimage.png') !!}" id="preview">
                                            @endif

                                        </div>
                                        <br>
                                        <input class="form-control" type="file" value="" id="photo" name="photo">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="judul" class="col-md-2 col-form-label">Alamat</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" id="alamat" name="alamat"
                                            value="{{ $user->alamat }}">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-success" type="submit"><i class="bx bx-save me-1"></i>
                                        Simpan</button>
                                    <button class="btn btn-warning" type="reset"><i class="bx bx-reset me-1"></i>
                                        Reset</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="password" role="tabpanel">
                            <form action="{{ route('admin.gantipassword', $user->user_id) }}" method="POST">
                                @method('PUT')
                                @csrf
                            <div class="mb-3 row">
                                <label for="name" class="col-md-2 col-form-label">Passowrd Lama</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="password" id="password" name="password"
                                        value="">
                                    @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="judul" class="col-md-2 col-form-label">Password Baru</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="password" id="newpassword" name="newpassword"
                                        value="">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="judul" class="col-md-2 col-form-label">Konfirmasi Password Baru</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="password" id="confpassword" name="confpassword"
                                        value="">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-success" type="submit"><i class="bx bx-save me-1"></i>
                                    Simpan</button>
                                <button class="btn btn-warning" type="reset"><i class="bx bx-reset me-1"></i>
                                    Reset</button>
                            </div>
                        </form>
                        </div>
                    </div>

                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->

            @endsection