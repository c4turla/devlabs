       <!-- ========== Left Sidebar Start ========== -->
       <div class="vertical-menu">

        <!-- LOGO -->
        <div class="navbar-brand-box">
            <a href="{{ url('/siswa/dashboard') }}" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="assets/images/logo-sm.svg" alt="" height="22"> 
                </span>
                <span class="logo-lg">
                    <img src="assets/images/logo-sm.svg" alt="" height="22"> <span class="logo-txt">DevLabs</span>
                </span>
            </a>

            <a href="{{ url('/siswa/dashboard') }}" class="logo logo-light">
                <span class="logo-lg">
                    <img src="assets/images/logo-sm.svg" alt="" height="22"> <span class="logo-txt">DevLabs</span>
                </span>
                <span class="logo-sm">
                    <img src="assets/images/logo-sm.svg" alt="" height="22">
                </span>
            </a>
        </div>

        <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn">
            <i class="fa fa-fw fa-bars"></i>
        </button>

        <div data-simplebar class="sidebar-menu-scroll">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title" data-key="t-menu">Menu</li>

                    <li>
                        <a href="{{ url('/siswa/dashboard') }}">
                            <i class="bx bx-tachometer icon nav-icon"></i>
                            <span class="menu-item" data-key="t-dashboards">Dashboard</span>
                        </a>
                    </li>

                    <li class="menu-title" data-key="t-applications">Menu Saya</li>

                    <li>
                        <a href="{{ url('/siswa/profile') }}">
                            <i class="bx bxs-user-detail icon nav-icon"></i>
                            <span class="menu-item" data-key="t-calendar">Profil Saya</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/siswa/course') }}">
                            <i class="bx bx-receipt icon nav-icon"></i>
                            <span class="menu-item" data-key="t-chat">Materi Kursus</span>
                            <span class="badge rounded-pill bg-danger" data-key="t-hot">Hot</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/siswa/kursus-saya') }}">
                            <i class="bx bx-customize icon nav-icon"></i>
                            <span class="menu-item" data-key="t-chat">Kursus Saya</span>
                        </a>
                    </li>
{{--                     <li>
                        <a href="{{ url('/siswa') }}">
                            <i class="bx bx-git-compare icon nav-icon"></i>
                            <span class="menu-item" data-key="t-chat">Praktikum</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/siswa') }}">
                            <i class="bx bxs-spreadsheet icon nav-icon"></i>
                            <span class="menu-item" data-key="t-chat">Kuis</span>
                        </a>
                    </li> --}}

{{-- 
                    <li class="menu-title" data-key="t-pages">Pages</li>
        
                    <li>
                        <a href="#">
                            <i class="bx bx-user-circle icon nav-icon"></i>
                            <span class="menu-item" data-key="t-vertical">Setting</span>
                        </a>
                    </li> --}}
                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>