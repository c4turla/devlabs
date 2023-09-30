@extends('partials.layout')

@section('content')
 
 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Profile Saya</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">DevLabs</a></li>
                    <li class="breadcrumb-item active">Profil Saya</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row mb-4">
    <div class="col-xl-12">
        <div class="card mb-0">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#about" role="tab">
                        <i class="bx bx-book font-size-20"></i>
                        <span class="d-none d-sm-block">Detail</span> 
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#tasks" role="tab">
                        <i class="bx bx-lock font-size-20"></i>
                        <span class="d-none d-sm-block">Ganti Password</span> 
                    </a>
                </li>
            </ul>
            <!-- Tab content -->
            <div class="tab-content p-4">
                <div class="tab-pane active" id="about" role="tabpanel">
                    <div>
                        <div>
                            <h5 class="font-size-16 mb-4">Detail Profile</h5>
                            <div class="card-body">
                                <form action="{{ route('siswa.saveprofile') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                <div class="mb-3 row">
                                    <label for="password" class="col-md-4 col-form-label">Photo</label>
                                    <div class="col-md-2">
                                        @if(Auth::user()->photo)
                                        <img class="rounded-3 avatar-xl" alt="" src="{{ asset('storage/' . Auth::user()->photo) }}" id="preview">
                                        @else
                                        <img class="rounded-3 avatar-xl" alt="" src="{!! url('assets/images/users/noimage.png') !!}" id="preview">
                                        @endif   
                                    </div>
                                    <div class="col-md-4">
                                        <input class="form-control d-inline" type="file" id="selectImage" name="photo">
                                    </div>        
                                </div>
                                <div class="mb-3 row">
                                    <label for="name" class="col-md-4 col-form-label">Nama Lengkap</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" value="{{Auth::user()->name}}" id="name" name="name">
                                    </div>        
                                </div>
                                <div class="mb-3 row">
                                    <label for="email" class="col-md-4 col-form-label">Email</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="email" id="email" name="email" value="{{Auth::user()->email}}">
                                    </div>        
                                </div>

                                <div class="mb-3 row">
                                    <label for="email" class="col-md-4 col-form-label">No Handphone</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number"  id="nomor_hp" name="nomor_hp" value="{{Auth::user()->nomor_hp}}">
                                    </div>        
                                </div>

                                <div class="mb-3 row">
                                    <label for="kelas" class="col-md-4 col-form-label">Kelas</label>
                                    <div class="col-md-4">
                                        <select class="form-select" name="kelas" id="kelas">
                                            <option value="">Pilih Kelas</option>
                                            <option value="10" {{ Auth::user()->kelas  == 10 ? 'selected' : '' }}>10</option>
                                            <option value="11" {{ Auth::user()->kelas  == 11 ? 'selected' : '' }}>11</option>
                                            <option value="11" {{ Auth::user()->kelas  == 12 ? 'selected' : '' }}>12</option>
                                            <option value="Umum" {{ Auth::user()->kelas  == "Umum" ? 'selected' : '' }}>Umum</option>
                                        </select>
                                    </div>        
                                </div>

                                <div class="mb-3 row">
                                    <label for="alamat" class="col-md-4 col-form-label">Alamat</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text"  id="alamat" name="alamat" value="{{Auth::user()->alamat}}">
                                    </div>        
                                </div>
    
                                <div class="card-footer">
                                    <button class="btn btn-success" type="submit"><i class="bx bx-save me-1"></i> Simpan</button>
                                    <button class="btn btn-warning" type="reset"><i class="bx bx-reset me-1"></i> Reset</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tasks" role="tabpanel">
                    <form action="{{ route('change.password') }}" method="POST">
                        @csrf
                    <div>
                        <h5 class="font-size-16 mb-3">Ganti Password</h5>
                        <small> Gunakan form ini untuk <code>Ganti Password </code></small>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label for="password" class="col-md-4 col-form-label">Password Lama</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="password" value="" id="current_password" name="current_password">
                                </div>        
                            </div>
                            <div class="mb-3 row">
                                <label for="newpassword" class="col-md-4 col-form-label">Password Baru</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="password" value="" id="password" name="password">
                                </div>        
                            </div>
                            <div class="mb-3 row">
                                <label for="password_confirmation" class="col-md-4 col-form-label">Konfirmasi Password Baru</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="password"  id="password_confirmation" name="password_confirmation">
                                </div>        
                            </div>

                            <div class="card-footer">
                                <button class="btn btn-success" type="submit"><i class="bx bx-save me-1"></i> Simpan</button>
                                <button class="btn btn-warning" type="reset"><i class="bx bx-reset me-1"></i> Reset</button>
                            </div>
                        </div>           
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- end row -->
<script>
    selectImage.onchange = evt => {
        preview = document.getElementById('preview');
        preview.style.display = 'block';
        const [file] = selectImage.files
        if (file) {
            preview.src = URL.createObjectURL(file)
        }
    }
</script>
@endsection
