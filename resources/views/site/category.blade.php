@extends('site.layouts.master')

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-primary py-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Kategori</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Kategori</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#home" class="nav-link active" data-bs-toggle="tab">Kurikulum 2013</a>
                    </li>
                    <li class="nav-item">
                        <a href="#merdeka" class="nav-link" data-bs-toggle="tab">Kurikulum Merdeka</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="home">
                        <h3 class="mt-4">List Materi Kurikulum 2013 Revisi</h3>
                        <hr>
                        <!-- Kelas 10 -->
                        <strong>Kelas 10</strong>
                        <ul>
                            <li>Hakikat ilmu kimia, metode ilmiah, keselamatan dan keamanan kimia dilaboratorium, serta
                                peran kimia dalam kehidupan</li>
                            <li>Struktur atom</li>
                            <li>Hubungan konfigurasi elektron dalam tabel periodik unsur</li>
                            <li>Kemiripan sifat unsur dan kepriodikan unsur </li>
                            <li>Ikatan kimia, bentuk molekul dan interaksi antar molekul</li>
                            <li>Bentuk molekul</li>
                            <li>Larutan elektrolit dan larutan nonelektrolit</li>
                            <li>Reaksi oksidasi dan reduksi serta tata nama senyawa</li>
                            <li>Hukum-hukum dasar kimia dan stoikiometri </li>
                            <!-- ... (tambahkan poin-poin lainnya) -->
                        </ul>

                        <!-- Kelas 11 -->
                        <strong>Kelas 11</strong>
                        <ul>
                            
                            <li>Senyawa hidrokarbon</li>
                            <li>Minyak bumi</li>
                            <li>Pembakaran hidrokarbon</li>
                            <li>Termokimia</li>
                            <li>Laju reaksi dan faktor-faktor ynga mempengaruhi</li> 
                            <li>Hukum laju reaksi dan penentuan laju reaksi</li>
                            <li>Kesetimbangan kimia dan pergeseran kesetimbangan</li>
                            <li>Pergeseran kesetimbangan dan faktor-faktor yang mempengaruhinya</li>
                            <li>Asam dan basa</li>
                            <li>Kesetimbangan ion dan pH larutan garam</li>
                            <li>Kesetimbangan ion dan pH larutan penyangga</li>
                            <li>Titrasi sistem koloid</li>

                            <!-- ... (tambahkan poin-poin lainnya) -->
                        </ul>

                        <!-- Kelas 12 -->
                        <strong>Kelas 12</strong>
                        <ul>
                            <li>Sifat koligatof larutan</li>
                            <li>Sifat koligatif larutan elektrolit dan larutan nonelektrolit</li>
                            <li>Sel volta</li>
                            <li>Kimia unsur</li>
                            <li>Struktur, tata nama, sifat, isomer, identifikasi dan kegunaan senyawa</li>
                            <li>Benzene dan turunannya</li>
                            <li>Struktur, tata nama, sifat, penggunaan dan penggolongan makromolekul</li> 
                            <!-- ... (tambahkan poin-poin lainnya) -->
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="merdeka">
                        <h3 class="mt-4">List Materi Kurikulum Merdeka</h3>
                        <hr>
                        <!-- Kelas 10 -->
                        <strong>Kelas 10</strong>
                        <ul>
                            <li>Kimia hijau dalam pembangunan berkelanjutan 2030</li>
                            <li>Hukum dasar kimia disekitar kita: Reaksi kimia</li>
                            <li>Hukum dasar kimia disekitar kita: Hukum perbandingan massa</li>
                            <li>Hukum dasar kimia disekitar kita: Hukum perbandingan volume </li>
                            <li>Struktur atom-keunggulan nanomaterial: Nanoteknologi</li>
                            <li>Struktur atom-keunggulan nanomaterial: Struktur atom</li>
                            <li>Struktur atom-keunggulan nanomaterial: Nanomaterial</li>
                            <li>Pemanasan global dan perubahan iklim</li>
                        </ul>

                        <!-- Kelas 11 -->
                        <strong>Kelas 11</strong>
                        <ul>
                            <li>Struktur atom dan sistem periodik unsur</li>
                            <li>Bentuk molekul dan gaya antarmolekul</li>
                            <li>Stoikiometri/</li>
                            <li>Hidrokarbon</li>
                            <li>Minyak bumi</li>
                            <li>Termokimia</li>
                            <li>Laju reaksi</li>
                            <li>Kesetimbangan kimia</li>
                            <li>Kelarutan dan hasil kali kelarutan</li>

                        </ul>

                        <!-- Kelas 12 -->
                        <strong>Kelas 12</strong>
                        <ul>
                            
                            <li> Asam-basa</li>
                            <li>Hidrolisis garam</li>
                            <li>Larutan penyangga</li>
                            <li>Reduksi dan oksidasi</li>
                            <li>Elektrokimia</li>
                            <li>Titrasi asam-basa</li>
                            <li>Sifat koligatif larutan</li>
                            <li>Senyawa turunan alkana</li>
                            <li>Benzene dan turunannya</li>
                            <li>Kolid</li>
                            <li>Makromolekul</li> 
                            <!-- ... (tambahkan poin-poin lainnya) -->
                        </ul>                        
                    </div>
                    <div class="alert alert-success d-flex align-items-center mt-5" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                          </svg>
                        <div>
                            <small> Untuk Mengakses semua materi diatas silahkan <a href="{{ url('/login') }}"> Login </a> / <a href="{{ url('/register') }}">Daftar</a> gratis di website ini. </small>
                        </div>
                      </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

@endsection