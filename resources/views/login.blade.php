@extends('site.layouts.master')

@section('content')

<div class="authentication-bg min-vh-100">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="d-flex flex-column min-vh-100 px-3 pt-4">
            <div class="row justify-content-center my-auto">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mb-3">
                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Selamat Datang !</h5>
                                <p class="text-muted">Sign in untuk lanjut ke DevLabs.</p>
                                <img src="{!! url('assets/images/logobaru.png') !!}" height="120">
                                @if(session('success'))
                                <p class="alert alert-success">{{ session('success') }}</p>
                                @endif
                                @if($errors->any())
                                @foreach($errors->all() as $err)
                                <div class="alert alert-danger alert-border-left alert-dismissible fade show"
                                    role="alert">
                                    {{ $err }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                @endforeach
                                @endif
                            </div>
                            <div class="p-2 mt-4">
                                <form action="{{ route('loginaction') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="text" class="form-control" name="email"
                                            placeholder="Masukan Email">
                                    </div>

                                    <div class="mb-3">
                                        <div class="float-end">
                                            <a href="auth-recoverpw.html" class="text-muted">Lupa Password?</a>
                                        </div>
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Masukan Password">
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                        <label class="form-check-label" for="remember">Remember me</label>
                                    </div>

                                    <div class="mt-3 text-end">
                                        <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Log
                                            In</button>
                                    </div>

                                    <hr>

                                    <div class="mt-4 text-center">
                                        <p class="mb-0">Belum punya akun ? <a href="{{ url('/register') }}"
                                                class="fw-medium text-primary"> Daftar Sekarang </a> </p>
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
    </div>
</div>
@endsection