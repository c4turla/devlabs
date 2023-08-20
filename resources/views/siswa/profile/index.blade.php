@extends('partials.layout')

@section('content')
 
 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">User Profile</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">DevLabs</a></li>
                    <li class="breadcrumb-item active">User Profile</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row mb-4">
    <div class="col-xl-8">
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
                                <div class="mb-3 row">
                                    <label for="password" class="col-md-4 col-form-label">Photo</label>
                                    <div class="col-md-4">
                                        <img src="{!! url('assets/images/users/avatar-10.jpg') !!}" class="rounded-4 avatar-xl" alt="">
                                        <br />
                                        <input class="form-control d-inline" type="file" value="" id="photo" name="photo">
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
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="11">12</option>
                                            <option value="Umum">Umum</option>
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
                            </div>
                        </div>
                        <hr>
                        <div>
                            <h5 class="font-size-16 mb-4">History Course</h5>

                            <div class="table-responsive">
                                <table class="table table-nowrap table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Judul Course</th>
                                            <th scope="col">Kurikulum</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col" style="width: 120px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">01</th>
                                            <td><a href="#" class="text-dark">Brand Logo Design</a></td>
                                            <td>
                                                18 Jun, 2020
                                            </td>
                                            <td>
                                                <span class="badge text-primary bg-primary-subtle font-size-12">Open</span>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </a>
                                                
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Action</a>
                                                        <a class="dropdown-item" href="#">Another action</a>
                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">02</th>
                                            <td><a href="#" class="text-dark">Minible Admin</a></td>
                                            <td>
                                                06 Jun, 2020
                                            </td>
                                            <td>
                                                <span class="badge text-primary bg-primary-subtle font-size-12">Open</span>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </a>
                                                
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Action</a>
                                                        <a class="dropdown-item" href="#">Another action</a>
                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">03</th>
                                            <td><a href="#" class="text-dark">Chat app Design</a></td>
                                            <td>
                                                28 May, 2020
                                            </td>
                                            <td>
                                                <span class="badge text-success  bg-success-subtle font-size-12">Complete</span>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </a>
                                                
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Action</a>
                                                        <a class="dropdown-item" href="#">Another action</a>
                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">04</th>
                                            <td><a href="#" class="text-dark">Minible Landing</a></td>
                                            <td>
                                                13 May, 2020
                                            </td>
                                            <td>
                                                <span class="badge text-success  bg-success-subtle font-size-12">Complete</span>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </a>
                                                
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Action</a>
                                                        <a class="dropdown-item" href="#">Another action</a>
                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">05</th>
                                            <td><a href="#" class="text-dark">Authentication Pages</a></td>
                                            <td>
                                                06 May, 2020
                                            </td>
                                            <td>
                                                <span class="badge text-success  bg-success-subtle font-size-12">Complete</span>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </a>
                                                
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Action</a>
                                                        <a class="dropdown-item" href="#">Another action</a>
                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tasks" role="tabpanel">
                    <div>
                        <h5 class="font-size-16 mb-3">Ganti Password</h5>
                        <small> Gunakan form ini untuk <code>Ganti Password </code></small>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label for="password" class="col-md-4 col-form-label">Password Lama</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="password" value="" id="password" name="password">
                                </div>        
                            </div>
                            <div class="mb-3 row">
                                <label for="newpassword" class="col-md-4 col-form-label">Password Baru</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="password" value="" id="newpassword" name="newpassword">
                                </div>        
                            </div>
                            <div class="mb-3 row">
                                <label for="confnewpassword" class="col-md-4 col-form-label">Konfirmasi Password Baru</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="password"  id="confnewpassword" name="confnewpassword">
                                </div>        
                            </div>

                            <div class="card-footer">
                                <button class="btn btn-success" type="submit"><i class="bx bx-save me-1"></i> Simpan</button>
                                <button class="btn btn-warning" type="reset"><i class="bx bx-reset me-1"></i> Reset</button>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card overflow-hidden">
            <div class="profile-user"></div>
            <div class="card-body">
                <div class="profile-content text-center">
                    <div class="profile-user-img">
                        <img src="{!! url('assets/images/users/avatar-1.jpg') !!}" alt="" class="avatar-lg rounded-circle img-thumbnail">
                    </div>
                    <h5 class="mt-3 mb-1">{{Auth::user()->name}}</h5>
                    <p class="text-muted">{{Auth::user()->email}}</p>
                    <p class="text-muted mb-1">
                        Hi I'm Peter Kelsey!,has been the industry's standard dummy text To an English person, 
                        it will seem like simplified English, as a skeptical Cambridge.</p>
                </div>
                
            </div>
        </div>

    </div>
</div>
<!-- end row -->
@endsection