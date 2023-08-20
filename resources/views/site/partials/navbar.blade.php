<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <img src={{"site/img/logo.png"}} height="50" width="50">
        <h1 class="m-0 text-primary"> DevLabs</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ url('/') }}" class="nav-item nav-link {{{ (Request::is('/') ? 'active' : '') }}}">Home</a>
            <a href="{{ url('/about') }}" class="nav-item nav-link {{{ (Request::is('about') ? 'active' : '') }}}">Tentang Kami</a>
            <a href="{{ url('/course') }}" class="nav-item nav-link {{{ (Request::is('course') ? 'active' : '') }}}">Kategori</a>
            <a href="{{ url('/blog') }}" class="nav-item nav-link {{{ (Request::is('blog') ? 'active' : '') }}}">Blog</a>
            <a href="{{ url('/contact') }}" class="nav-item nav-link {{{ (Request::is('contact') ? 'active' : '') }}}">Kontak Kami</a>
        </div>
        @guest
        <a href="{{ url('/login') }}" class="btn btn-xs btn-warning py-4 px-lg-4" >Login</a>        
        <a href="{{ url('/register') }}" class="btn btn-primary py-4 px-lg-3 d-none d-lg-block">Daftar<i class="fa fa-arrow-right ms-3"></i></a>
        @endguest
    </div>
</nav>
<!-- Navbar End -->