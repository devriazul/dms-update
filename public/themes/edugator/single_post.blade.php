@extends('layouts.theme')

@section('content')
<script src="https://kit.fontawesome.com/8627852623.js" crossorigin="anonymous"></script>
    <div class="blog-breadcrumb-wrapper">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-12">

                    <nav aria-label="breadcrumb">
                        <ol class='breadcrumb mb-0 bg-white p-0'>
                            <li class='breadcrumb-item'>
                                <a href='{{route('blog')}}'>
                                    <i class='la la-home'></i>  {{__t('blog_home')}}
                                </a>
                            </li>

                            <li class='breadcrumb-item active'>{{$title}}</li>
                        </ol>
                    </nav>

                </div>
            </div>
        </div>
    </div>

    <div class="blog-post-page-header bg-dark-blue text-white text-center py-5">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h1 class="mb-3">{{$title}}</h1>

                    {{-- <p>Published time : {{$post->published_time}}</p> --}}
                </div>
            </div>
        </div>
    </div>


    <div class="blog-post-container-wrap py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    @if($post->feature_image)
                        <div class="post-feature-image-wrap mb-5">
                            <img src="{{$post->thumbnail_url->image_lg}}" alt="{{$post->title}}" class="img-fluid">
                        </div>
                    @endif

                    <div class="post-content">
                        {!! clean_html($post->post_content) !!}
                    </div>

                </div>


                <div class="col-md-3">
                    <div class="course-filter-wrap box-shadow p-3 mb-4">
                        <label for=""><b>Blog Search</b></label>
                        <div class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                              <input id="serach_item" type="text" class="form-control" placeholder="Type keyword">
                              <button onclick="getSearchResult()" class="btn btn-primary my-2" type="submit" class="btn btn-default">Search</button>
                            </div>
                            
                        </div>
                    </div>
                    <div class="course-filter-wrap box-shadow p-3 mb-4">
                        <label for=""><b>Blog Category</b></label>
                        <ul onchange="getCategoryData()" class="py-2" name="" id="category_id">
                            @if($categories->count())
                                @foreach ($categories as $category)
                                <li value=""><a href="{{ route('blog',$category->slug) }}">{{ $category->title }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="box-shadow">
                        <div class="blog-author-wrap border py-4">
                            <label class="mx-3" for=""><b>Share Post</b></label>
                            <div class="social_button" style="display: flex">
                                <div class="facebook-share">
                                    {!! Share::page('https://londondms.com/'.$post->slug,$post->title)
                                                ->facebook() !!}
                                </div>
                                <div class="twitter-share">
                                    {!! Share::page('https://londondms.com/'.$post->slug,$post->title)
                                                ->twitter() !!}
                                </div>
                                <div class="linkedin-share">
                                    {!! Share::page('https://londondms.com/'.$post->slug,$post->title)
                                                ->linkedin() !!}
                                </div>
                                <div class="whatsapp-share">
                                    {!! Share::page('https://londondms.com/'.$post->slug,$post->title)
                                                ->whatsapp() !!}
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="box-shadow p-3 mb-4">
                        <label for=""><b>Related Blog</b></label>
                        <div class="row">
                            <div class="col-md-3">
                                <img src="https://londondms.com/uploads/images/image_lg/what-is-a-level-3-diploma-in-health-and-social-care.png" alt="" srcset="" class="img-fluid">
                            </div>
                            <div class="col-md-9">
                                <p>What Is A Level 3 Diploma <a href="">Read more..</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="box-shadow">
                        <div class="blog-author-wrap border p-3">
                            <label for=""><b>Author</b></label>
    
                            @php
                                $instructor = $post->author;
                                $courses_count = $instructor->courses()->publish()->count();
                                $students_count = $instructor->student_enrolls->count();
                                $instructor_rating = $instructor->get_rating;
                            @endphp
    
                            <div class="course-single-instructor-wrap d-flex">
    
                                <div class="instructor-stats">
                                    <div class="profile-image py-3">
                                        <a href="{{route('profile', $instructor->id)}}">
                                            {!! $instructor->get_photo !!}
                                        </a>
                                    </div>
                                    <div class="instructor-details">
                                        <a href="{{route('profile', $instructor->id)}}">
                                            <h4 class="instructor-name">{{$instructor->name}}</h4>
                                            <ul class="social mb-0 list-inline mt-3">
                                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
                                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
                                                <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                        </a>
        
                                        @if($instructor->job_title)
                                            <h5 class="instructor-designation">{{$instructor->job_title}}</h5>
                                        @endif
        
                                        @if($instructor->about_me)
                                            <div class="profle-about-me-text mt-4">
                                                <div class="content-expand-wrap">
                                                    <div class="content-expand-inner">
                                                        {!! nl2br(clean_html($instructor->about_me)) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
    
                                    {{-- @if($instructor_rating->rating_count)
                                        <div class="profile-rating-wrap d-flex">
                                            {!! star_rating_generator($instructor_rating->rating_avg) !!}
                                            <p class="m-0 ml-2">({{$instructor_rating->rating_avg}})</p>
                                        </div>
                                    @endif
    
                                    <p class="instructor-stat-value mb-1">
                                        <i class="la la-play-circle"></i>
                                        <strong>{{$courses_count}}</strong> {{__t('courses')}}
                                    </p>
                                    <p class="instructor-stat-value mb-1">
                                        <i class="la la-user-circle"></i>
                                        <strong>{{$students_count}}</strong> {{__t('students')}}
                                    </p>
                                    <p class="instructor-stat-value mb-1">
                                        <i class="la la-comments"></i>
                                        <strong>{{$instructor_rating->rating_count}} </strong> {{__t('reviews')}}
                                    </p> --}}
                                    
                                </div>
    
                                
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button
        type="button"
        class="btn btn-danger btn-floating btn-lg"
        id="btn-back-to-top"
        >
        <i class="fas fa-arrow-up"></i>
    </button>

    <script src="{{theme_asset('js/backToTop.js')}}"></script>

    <script src="https://kit.fontawesome.com/8627852623.js" crossorigin="anonymous"></script>

@endsection
