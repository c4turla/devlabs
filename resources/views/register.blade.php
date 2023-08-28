@extends('site.layouts.master')

@section('content')

    <div class="authentication-bg min-vh-100 mb-4">
        <div class="container">
            <div class="d-flex flex-column min-vh-100 px-3 pt-4">
                <div class="row justify-content-center my-auto">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-body p-4">                                 
                                <div class="text-center mt-2">                                    
                                    <h5 class="text-primary">Registrasi Akun</h5>
                                    <p class="text-muted">Daftar Akun di DevLabs Gratis.</p>
                                </div>
                                <div class="p-2 mt-4">

                                    <form action="{{ route('registeraction') }}"  method="POST">
                                        @csrf        
                                        <div class="mb-3">
                                            <label class="form-label" for="name">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Masukan Nama Lengkap" value="{{ old('name') }}">  
                                            @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif      
                                        </div>
                
                                        <div class="mb-3">
                                            <label class="form-label" for="username">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email" value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif     
                                        </div>
                
                                        <div class="mb-3">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password"> 
                                            @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif        
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="name">Nomor HP</label>
                                            <input type="number" class="form-control" id="nomor_hp" name="nomor_hp" placeholder="628XXXX" value="{{ old('nomor_hp') }}">   
                                            @if ($errors->has('nomor_hp'))
                                            <span class="text-danger">{{ $errors->first('nomor_hp') }}</span>
                                            @endif          
                                        </div>

                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="invalidCheck" required>
                                            <label class="form-check-label" for="invalidCheck">I Accept <a href="javascript: void(0);" class="text-dark">Terms and Conditions</a></label>
                                            <div class="invalid-feedback">
                                                You must agree before submitting.
                                            </div>
                                        </div>
                                        
                                        <div class="mt-3 text-end">
                                            <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Register</button>
                                        </div>

                                        <hr>

                                        <div class="mt-4 text-center">
                                            <p class="text-muted mb-0">Sudah punya akun ? <a href="{{ url('/login') }}" class="fw-medium text-primary"> Login</a></p>
                                        </div>
                                    </form>
                                    <div class="text-center mt-5"> 
                                        <img src={{"site/img/logo.png"}} alt="" height="80">
                                    <img src={{"site/img/merdeka.png"}} alt="" height="80">
                                    </div>
                                </div>
            
                            </div>
                        </div>

                    </div><!-- end col -->
                </div><!-- end row -->

            </div>
        </div><!-- end container -->
    </div>
    <!-- end authentication section -->

    @endsection