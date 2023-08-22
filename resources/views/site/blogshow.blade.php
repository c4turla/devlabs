@extends('site.layouts.master')

@section('content')
<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">BLOG</h6>
            <h1 class="mb-5">Lihat Artikel</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-8 col-md-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row g-12 justify-content-center">
                    <div class="col-lg-12 col-md-8 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="course-item bg-light">                    
                            <div class="text-left p-4 pb-2">
                                <a href="">
                                <h3 class="mb-3">{{ $artikel->judul}}</h3>
                            </a>
                            <small class="flex-fill text-center py-2">
                                <i class="fa fa-user-tie text-success me-2"></i>Administrator  &nbsp;<i class="fa fa-clock text-primary me-2"></i> {{ $artikel->created_at->format('j M, Y') }}
                            </small> 
                                <p class="info ellipsis-line-2" style="text-align: justify">{!! $artikel->deskripsi !!}</p>                       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <h5 class="mb-3">Artikel Terpopuler</h5>
                @if($randomArticleTitle->count() > 0)
                <ul>
                    @foreach($randomArticleTitle as $title)
                        <li><a href="{{ route('home.blogshow',$title->id) }}" ><strong>{{ $title->judul }}</strong></a></li>
                    @endforeach
                </ul>
            @else
                <p>Belum ada Artikel.</p>
            @endif
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

@endsection