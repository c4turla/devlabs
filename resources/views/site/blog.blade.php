@extends('site.layouts.master')

@section('content')
<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">BLOG</h6>
            <h1 class="mb-5">Daftar Semua Artikel</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-8 col-md-12 wow fadeInUp" data-wow-delay="0.1s">
                <h5>Artikel Terbaru</h5>
                <div class="row g-4 justify-content-center">
                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="course-item bg-light">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid" src={{"site/img/course-1.jpg"}} alt="">
                            </div>                    
                            <div class="text-left p-4 pb-2">
                                <a href="">
                                <h6 class="mb-3">AI-Based learning is the future of Corporate Training</h6>
                            </a>
                            <small class="flex-fill text-center py-2">
                                <i class="fa fa-user-tie text-success me-2"></i>John Doe  &nbsp;<i class="fa fa-clock text-primary me-2"></i> 22 Juli 2023
                            </small> 
                                <p class="info ellipsis-line-2" style="text-align: justify">The corporate world is slowly stepping into the dimension of Artificial Intelligence. This technology is transforming their training at an accelerated...</p>                       
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="course-item bg-light">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid" src={{"site/img/course-2.jpg"}} alt="">
                            </div>
                            <div class="text-left p-4 pb-2">
                                <a href="">
                                <h6 class="mb-3">4 Ways To Maximize Student Participation In Online Learning</h6>
                            </a>
                            <small class="flex-fill text-center py-2">
                                <i class="fa fa-user-tie text-success me-2"></i>Administrator  &nbsp;<i class="fa fa-clock text-primary me-2"></i> 22 Juli 2023
                            </small> 
                                <p class="info ellipsis-line-2" style="text-align: justify">Why Participation Is Important in Online LearningParticipation in all education learning environments is essential, most significantly because it rein...</p>                       
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="course-item bg-light">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid" src={{"site/img/course-3.jpg"}} alt="">
                            </div>
                            <div class="text-left p-4 pb-2">
                                <a href="">
                                <h6 class="mb-3">Parent Power: Will We Choose Pitchforks or Partnerships?</h6>
                            </a>
                            <small class="flex-fill text-center py-2">
                                <i class="fa fa-user-tie text-success me-2"></i>John Doe  &nbsp;<i class="fa fa-clock text-primary me-2"></i> 22 Juli 2023
                            </small> 
                                <p class="info ellipsis-line-2" style="text-align: justify">After two tumultuous years of intermittent school closures, parents and caregivers are claiming their power within the education system in a new way. ...</p>                       
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="course-item bg-light">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid" src={{"site/img/course-3.jpg"}} alt="">
                            </div>
                            <div class="text-left p-4 pb-2">
                                <a href="">
                                <h6 class="mb-3">Parent Power: Will We Choose Pitchforks or Partnerships?</h6>
                            </a>
                            <small class="flex-fill text-center py-2">
                                <i class="fa fa-user-tie text-success me-2"></i>John Doe  &nbsp;<i class="fa fa-clock text-primary me-2"></i> 22 Juli 2023
                            </small> 
                                <p class="info ellipsis-line-2" style="text-align: justify">After two tumultuous years of intermittent school closures, parents and caregivers are claiming their power within the education system in a new way. ...</p>                       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <h5>Artikel Terpopuler</h5>
               
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

@endsection