@extends('layouts.theme')

@php
$categories = \App\Category::parent()
    ->whereStatus(1)
    ->get();
$categoriesWithCourses = \App\Category::parent()
    ->has('courses')
    ->whereStatus(1)
    ->get();
@endphp


@section('content')
    <section class="hero__area hero__height d-flex align-items-center grey-bg-2 p-relative">
        <div class="hero__shape">
            {{-- <img class="hero-1-circle" src="{{ theme_url('images/hero-slider/hero-1-circle.png') }}" alt=""> --}}
            <img class="hero-1-circle-2" src="{{ theme_url('images/hero-slider/hero-1-circle-2.png') }}" alt="">
            <img class="hero-1-dot-2" src="{{ theme_url('images/hero-slider/hero-1-dot-2.png') }}" alt="">
        </div>
        <div class="container">
        <div class="hero__content-wrapper mt-90">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                    <div class="hero__content p-relative z-index-1">
                        <h1 class="hero__title">
                            <span>Digital</span>
                            <span class="yellow-shape">Marketing <img src="{{ theme_url('images/yellow-bg.png') }}" alt="yellow-shape"> </span> 
                            <br> School
                        </h1>
                        {{-- <h3 class="hero__title">
                            <span>From 2700+</span>
                            <span class="yellow-shape">Online <img src="{{ theme_url('images/yellow-bg.png') }}" alt="yellow-shape"> </span> 
                            Tutorial Courses
                        </h3> --}}
                        <p>Invest in yourself and your career with our comprehensive online courses. </p>
                        <p><i>Approved center</i> <b class="text-warning">OTHM</b> </p>
                        <a href="{{route('courses')}}" class="btn btn-theme-primary">Explore courses</a>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                    <div class="hero__thumb d-flex p-relative">
                    <div class="hero__thumb-shape">
                        <img class="hero-1-dot" src="{{ theme_url('images/hero-1-dot.png') }}" alt="">
                        <img class="hero-1-circle-3" src="{{ theme_url('images/hero-1-circle-3.png') }}" alt="">
                        <img class="hero-1-circle-4" src="{{ theme_url('images/hero-1-circle-4.png') }}" alt="">
                    </div>
                    <div class="hero__thumb-big mr-30">
                        <img src="{{ theme_url('images/DMS Slider image 01.webp') }}" alt="">
                        <div class="hero__quote hero__quote-animation">
                            <span>Tomorrow is our</span>
                            <h4>“When I Grow Up” Spirit Day!</h4>
                        </div>
                    </div>
                    <div class="hero__thumb-sm mt-50 d-none d-lg-block">
                        <img src="{{ theme_url('images/DMS Slider image 02.webp') }}" alt="">
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    {{-- <div class="hero-banner py-3">

        <div class="container">
            <div class="row py-5">
                <div class="col-md-12 col-lg-6">

                    <div class="hero-left-wrap">
                        <h1 class="hero-title mb-4 py-3">{{ __t('hero_title') }}</h1>
                        <p class="hero-subtitle  mb-4">
                            {!! __t('hero_subtitle') !!}
                        </p>
                        <a href="{{ route('categories') }}" class="btn btn-theme-primary btn-lg">Browse Course</a>
                    </div>

                </div>


                <div class="col-md-12 col-lg-6 hero-right-col">
                    <div class="hero-right-wrap">
                        <img src="{{ theme_url('images/banner-girl.png') }}" class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>


    </div> --}}

    {{-- <div class="dms-box-info-section py-3">
        <div class="container">
            <div class="row py-4">
                <div class="col-md-3 col-xs-12">
                    <div class="dms-info-box home-info-box">
                        <img src="{{ theme_url('images/section/Learn-The-Latest-Skills.webp') }}">
                        <h3 class="info-box-title">Learn The Latest Skills</h3>
                        <p class="info-box-desc">Digital marketing, graphic design, IT, and more.</p>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12">
                    <div class="dms-info-box home-info-box">
                        <img src="{{ theme_url('images/section/Get-Ready-For-A-Career.webp') }}">
                        <h3 class="info-box-title">Get Ready For A Career</h3>
                        <p class="info-box-desc">In high-demand fields like IT, AI and cloud engineering.</p>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12">
                    <div class="dms-info-box home-info-box">
                        <img src="{{ theme_url('images/section/Expert-Instruction.webp') }}">
                        <h3 class="info-box-title">Expert Instruction</h3>
                        <p class="info-box-desc">Every course designed by expert instructor.</p>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12">
                    <div class="dms-info-box home-info-box">
                        <img src="{{ theme_url('images/section/Earn-A-Certificate.webp') }}">
                        <h3 class="info-box-title">Earn A Certificate</h3>
                        <p class="info-box-desc">Get certified upon completing a course</p>
                    </div>
                </div>

            </div>
        </div>
    </div> --}}
    <div class="dms-box-info-section pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-xs-12">
                    <div class="border-radius-card home-info-box">
                        <img src="{{theme_url('images/skills.svg')}}">
                        <h3 class="info-box-title">Learn the latest skills</h3>
                        <p class="info-box-desc">Digital marketing, Graphics Design, IT and more.</p>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12">
                    <div class="border-radius-card home-info-box">
                        <img src="{{theme_url('images/career-goal.svg')}}">
                        <h3 class="info-box-title">Get ready for a career</h3>
                        <p class="info-box-desc">in high-demand fields like IT, AI and cloud engineering</p>
                    </div>
                </div>

                <div class="col-md-3 col-xs-12">
                    <div class="border-radius-card home-info-box">
                        <img src="{{theme_url('images/instructions.svg')}}">
                        <h3 class="info-box-title">Expert instruction</h3>
                        <p class="info-box-desc">Every course designed by expert instructor</p>
                    </div>
                </div>

                <div class="col-md-3 col-xs-12">
                    <div class="border-radius-card home-info-box">
                        <img src="{{theme_url('images/cartificate.svg')}}">
                        <h3 class="info-box-title">Earn a certificate</h3>
                        <p class="info-box-desc">Get certified upon completing a course</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- About section --}}

    <div class="home-section-wrap home-info-box-wrapper py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-xs-12">
                    <img class="border-radius-card about-us-img img-responsive" src="{{ theme_url('images/about.webp') }}" />
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="about-content-wrapper">
                        <h2>About us</h2>
                        <article>
                            Digital Marketing School offers a wide range of Digital Marketing, Business Management, Health and Social care online courses covering all aspects you need to advance your career. Our programmes are developed by expert instructors who will teach students new skills that can enhance their careers. The student can study our courses online whenever and wherever they are, and it comes with an easy understanding of all lesson details with full support from tutors. As a result, it is a learning opportunity with an advanced level of knowledge and career-focused skills. Digital Marketing School is an online learning platform that connects expert instructors with students in the UK and globally.

                        </article>
                        <a class="londondms-btn" href="#">Read More</a>
                        {{-- <div class="about-info-counter">
                            <div class="about-counter">
                                <h4>1600+</h4>
                                <strong>Student</strong>
                            </div>

                            <div class="about-counter">
                                <h4>2200+</h4>
                                <strong>Courses</strong>
                            </div>
                            <div class="about-counter">
                                <h4>250+</h4>
                                <strong>Instructor</strong>
                            </div>
                            <div class="about-counter">
                                <h4>50+</h4>
                                <strong>Universities</strong>
                            </div>

                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if ($featured_courses->count())
        <div class="home-featured-courses-wrapper py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-header-wrap">
                            <h3 class="section-title">
                                <span>
                                    {{ __t('our courses') }}
                                </span>

                                <a href="{{ route('featured_courses') }}" class="btn btn-link float-right "><i
                                        class="la la-bookmark"></i> {{ __t('courses') }}</a>
                            </h3>

                            <p class="section-subtitle">{{ __t('featured_courses_desc') }}</p>
                        </div>
                    </div>
                </div>
                <div class="popular-courses-cards-wrap mt-3">
                    <div class="row">
                        @foreach ($featured_courses as $course)
                            {!! course_card($course, 'col-md-4') !!}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="categories-wrap my-5 ">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-4 col-xs-12">
                    <div class="category-content-box">
                        <div class="swiper-pagination"></div>
                        <div class="categories-navigation">
                            <button class="swiper-button-next-1">
                                <i class="las la-angle-left"></i>
                            </button>
                            <button class="swiper-button-prev-1">
                                <i class="las la-angle-right"></i>
                            </button>
                        </div>
                        <h3 class="section-title-red">Choose Category</h3>
                        <p>Start to learn a high level of knowledge. Develop your skills with a great comprehensive online courses. 
                        </p>
                    </div>
                </div>
                <div class="col-md-8 col-xs-12">
                    <div class="swiper-container mySwiper">
                        <div class="swiper-wrapper">
                            @foreach ($categories as $category)
                                <div class="swiper-slide">
                                    <div class="category-item-name">

                                        <a href="{{ route('category_view', $category->slug) }}" class="
                                            py-4 d-block text-center text-white mb-3 category-item-link">
                                            <i class="la {{ $category->icon_class }}"></i> {{ $category->category_name }}
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="london-dms-section-white margin-minus-top">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-6 col-xs-12">
                    <div class="instructor-content-wrap">
                        <h2>Digital Marketing School</h2>
                        <h2>For Business</h2>
                        <p> Run your online business course under Digital Marketing School London and be part of our family. Get a proffesional support to market your online course. Join our 20+ instructors.</p>
                        <a href="/instructor-register">Get for business</a>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12 md-offset-1">
                    <div class="insctructor-img">
                        <img src="{{ theme_url('images/become-insctructor.png') }}" alt="">
                        <a href="/instructor-register">Become an instructor</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="london-dms-testimonial-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="sec-title-testimonial">
                        <h5>Success Stories From Our Students</h5>
                    </div>
                </div>
            </div>

            <div class="testimonial">
                <div class="swiper-container testimonial-carousel">
                    <!-- swiper slides -->
                    <div class="swiper-wrapper">
                        <div class="swiper-slide story-box">
                            <div class="user-text">
                                <p> The connection was good, and I did not face any problems. The teacher is very well organized and knowledgeable. He can quickly answer any questions from students clearly and successfully. His classes are exceptionally unique and dynamic.</p>

                                <div class="user-info-t d-flex align-items-center justify-content-between">
                                    <div class="user-info-name-t d-flex align-items-center">
                                        <div class="user-img-t">
                                            <img src="{{ theme_url('images/user-img.png') }}" alt="">
                                        </div>
                                        <div class="u-name-t ml-2">
                                            <strong>
                                                Riazul Islam
                                            </strong>
                                            <small>Marketing Student</small>
                                        </div>


                                    </div>
                                    <div class="user-quote">
                                        <i class="las la-quote-left"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide story-box">
                            <div class="user-text">
                                <p> I find it a friendly way of learning; you have contact with everybody, just like in the classroom. You can ask many questions if needed and get the answers. We were able to work in groups and see all the materials. It's an incredible journey. Thanks, Digital Marketing School </p>

                                <div class="user-info-t d-flex align-items-center justify-content-between">
                                    <div class="user-info-name-t d-flex align-items-center">
                                        <div class="user-img-t">
                                            <img src="{{ theme_url('images/user-img.png') }}" alt="">
                                        </div>
                                        <div class="u-name-t ml-2">
                                            <strong>
                                                Rimon
                                            </strong>
                                            <small>Marketing Student</small>
                                        </div>


                                    </div>
                                    <div class="user-quote">
                                        <i class="las la-quote-left"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide story-box">
                            <div class="user-text">
                                <p> I enjoyed this class and the format it was presented in. For me, I learn and retain much more through an online class due to the fact you can do the course. I found it relaxing to turn the work on the assignments and tests at my leisure and when I had the time.  </p>

                                <div class="user-info-t d-flex align-items-center justify-content-between">
                                    <div class="user-info-name-t d-flex align-items-center">
                                        <div class="user-img-t">
                                            <img src="{{ theme_url('images/user-img.png') }}" alt="">
                                        </div>
                                        <div class="u-name-t ml-2">
                                            <strong>
                                                Tanvir
                                            </strong>
                                            <small>Marketing Student</small>
                                        </div>


                                    </div>
                                    <div class="user-quote">
                                        <i class="las la-quote-left"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- !swiper slides -->

                    <!-- pagination dots -->
                    <!-- !pagination dots -->
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="swiper-pagination testimonial-pagination"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="section-gap-londondms"></div>

    {{-- @if ($popular_courses->count())
        <div class="home-section-wrap home-fatured-courses-wrapper py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-header-wrap">
                            <h3 class="section-title">
                                <span>
                                    {{ __t('popular_courses') }}
                                </span>

                                <a href="{{ route('popular_courses') }}" class="btn btn-link float-right"><i
                                        class="la la-bolt"></i> {{ __t('all_popular_courses') }}</a>
                            </h3>
                            <p class="section-subtitle">{{ __t('popular_courses_desc') }}</p>
                        </div>
                    </div>
                </div>
                <div class="popular-courses-cards-wrap mt-3">
                    <div class="row">
                        @foreach ($featured_courses as $course)
                            {!! course_card($course) !!}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif --}}



    {{-- Video section --}}

    <div class="london-dms-video-section" style="background-image: url({{ theme_url('images/video-bg.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="new-era">
                        <h2>A new era in <br />Online Education</h2>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12 d-none d-sm-block">
                    <div class="vd-thm-box">
                        {{-- <img src="{{ theme_url('images/video-thm.jpg') }}" alt="video thumnail">
                        <div class="video-btn-click">
                            <button>
                                <i class="lar la-play-circle"></i>
                            </button>
                        </div> --}}
                        <div>
                            <iframe width="533" height="300" src="https://www.youtube.com/embed/7LlM3ZjKJbs?rel=0?version=3&autoplay=0&controls=0&&showinfo=0&loop=1" title="At a glance Digital Marketing School" frameborder="0" allow="accelerometer; autoplay; loop=1; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- university section --}}

    <div class="london-dms-university">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <div class="enroll-box">
                        <h4>Start a Journey</h4>
                        <strong>Enroll Now</strong>
                        <p>Digital Marketing School is an online learning platform that connects instructors with Students globally. instructors create high-quality courses and present them in a super-easy way.</p>
                        <a href="/topics">Join A Course Now</a>
                    </div>
                </div>
                <div class="col-md-8 col-xs-12">
                    <h3 class="pt-5">Accreditations</h3>
                    <div class="swiper-container university-carousel">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide university-logo">
                                <img src="{{ theme_url('images/university-logo/ESFA logo.webp') }}" alt="">
                            </div>
                            <div class="swiper-slide university-logo">
                                <img src="{{ theme_url('images/university-logo/ICO logo.webp') }}" alt="">
                            </div>
                            <div class="swiper-slide university-logo">
                                <img src="{{ theme_url('images/university-logo/othm logo.webp') }}" alt="">
                            </div>
                            <div class="swiper-slide university-logo">
                                <img src="{{ theme_url('images/university-logo/UKRLP.webp') }}" alt="">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="section-gap-londondms"></div>


    {{-- @if ($new_courses->count())
        <div class="home-section-wrap home-new-courses-wrapper py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-header-wrap">
                            <h3 class="section-title">
                                <span>
                                    {{ __t('new_arrival') }}
                                </span>

                                <a href="{{ route('courses') }}" class="btn btn-link float-right"><i
                                        class="la la-list"></i> {{ __t('all_courses') }}</a>
                            </h3>
                            <p class="section-subtitle">{{ __t('new_arrival_desc') }}</p>
                        </div>
                    </div>
                </div>

                <div class="popular-courses-cards-wrap mt-3">
                    <div class="row">
                        @foreach ($new_courses as $course)
                            {!! course_card($course) !!}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif --}}

    @if ($posts->count())
        <div class="home-section-wrap home-blog-section-wrapper py-5">

            <div class="container">

                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="section-header-wrap">
                            <h3 class="section-title">
                                <span>
                                    {{ __t('latest_blog_text') }}
                                </span>
                            </h3>
                            <p class="section-subtitle">{{ __t('latest_blog_desc') }}</p>
                        </div>
                    </div>
                </div>


                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-lg-4 mb-4">
                            <div class="home-blog-card">
                                <a href="{{ $post->url }}">
                                    <img src="{{ $post->thumbnail_url->image_md }}" alt="{{ $post->title }}"
                                        class="img-fluid">
                                </a>
                                <div class="excerpt px-4">
                                    <h2><a href="{{ $post->url }}">{{ $post->title }}</a></h2>
                                    <div class="post-meta d-flex justify-content-between">
                                        <span>
                                            <i class="la la-user"></i>
                                            <a href="{{ route('profile', $post->user_id) }}">
                                                {{ $post->author->name }}
                                            </a>
                                        </span>
                                        <span>&nbsp;<i class="la la-calendar"></i>&nbsp;
                                            {{ $post->published_time }}</span>
                                    </div>
                                    <p class="mt-4">
                                        <a href="{{ $post->url }}"><strong>READ MORE <i class="la la-arrow-right"></i>
                                            </strong></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="btn-see-all-posts-wrapper pt-4">
                    <div class="row">
                        <div class="col-md-12 d-flex">
                            <a href="{{ route('blog') }}" class="btn btn-lg btn-theme-primary ml-auto mr-auto">
                                <i class="la la-blog"></i> See All Posts
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endif

    {{-- <div class="subscription-section-dms" style="background-image: url({{theme_url('images/news-letter.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-5">
                    <div class="subscriber-box">
                        <h3>Subscriber for latest news</h3>
                        <input type="email" name="email" id="" placeholder="Email Address...">
                        <button class="btn btn-primary subscriber-send-btn">Send</button>
                    </div>
                </div>
                <div class="col-7"></div>
            </div>
        </div>
    </div> --}}

@endsection
