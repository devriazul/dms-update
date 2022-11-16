@php
    use App\Category;
    $categories = Category::whereStep(0)->with('sub_categories')->orderBy('category_name', 'asc')->get();
@endphp

    <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{get_option('enable_rtl')? 'rtl' : 'auto'}}" >
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-249293842-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-249293842-1');
    </script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-DDX08T2181"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-DDX08T2181');
    </script>
    <meta name="google-site-verification" content="cUOu-MyrN7pU9NoJkr-d-GnCXImvetGJB9zGjtTuOjo" />
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KNLLCNV');
    </script>
        <!-- End Google Tag Manager -->
    <meta charset="utf-8">
    <!-- Meta Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1886143651721437');
        fbq('track', 'PageView');
    </script>
    <script>
        "use strict";
        
        !function() {
          var t = window.driftt = window.drift = window.driftt || [];
          if (!t.init) {
            if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
            t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ], 
            t.factory = function(e) {
              return function() {
                var n = Array.prototype.slice.call(arguments);
                return n.unshift(e), t.push(n), t;
              };
            }, t.methods.forEach(function(e) {
              t[e] = t.factory(e);
            }), t.load = function(t) {
              var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
              o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
              var i = document.getElementsByTagName("script")[0];
              i.parentNode.insertBefore(o, i);
            };
          }
        }();
        drift.SNIPPET_VERSION = '0.3.1';
        drift.load('pzn5hryk28e7');
        </script>
    <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=1886143651721437&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="facebook-domain-verification" content="0qzvdcv0duqfq65vc6d3eggs4rz7fy" />
    
    @if(!empty($post->meta_description))
    <meta name="description" content="{{ $post->meta_description }}" />
    @else
    <meta name="description" content="Going abroad please contact us" />
    @endif
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{theme_url('favicon.png')}}"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>  @if( ! empty($title)) {{ $title }} | {{get_option('site_title')}}  @else {{get_option('site_title')}} @endif </title>

    <!-- all css here -->

    <!-- bootstrap v3.3.6 css -->
    {{-- <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('assets/css/line-awesome.min.css')}}">
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <link href="{{ asset('assets/plugins/select2-4.0.3/css/select2.css') }}" rel="stylesheet" />  
    
@yield('page-css')

<!-- style css -->
    <link rel="stylesheet" href="{{theme_asset('css/style.css')}}">

    <!-- modernizr css -->
    <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>


    <script type="text/javascript">
        /* <![CDATA[ */
        window.pageData = @json(pageJsonData());
        /* ]]> */
    </script>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->

    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KNLLCNV"
        height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>

</head>

<body class="{{get_option('enable_rtl')? 'rtl' : ''}}">

    <!-- Google Tag Manager (noscript) -->

    <!-- End Google Tag Manager (noscript) -->

<div class="main-navbar-wrap">


    <nav class="navbar navbar-expand-lg navbar-light bg-light dms-desktop-menu">

        <div class="container">
            <a class="navbar-brand site-main-logo" href="{{route('home')}}">
                @php
                    $logoUrl = media_file_uri(get_option('site_logo'));
                @endphp

                @if($logoUrl)
                    <img src="{{media_file_uri(get_option('site_logo'))}}" alt="{{get_option('site_title')}}" />
                @else
                    <img src="{{asset('assets/images/teachify-lms-logo.svg')}}" alt="{{get_option('site_title')}}" />
                @endif
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbarContent" aria-controls="mainNavbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbarContent">
                <ul class="navbar-nav categories-nav-item-wrapper mt-2 mt-lg-0" style="font-weight:400">
                    <li class="nav-item nav-categories-item">
                        <a class="nav-link" href="/"> <span><i class="las la-home"></i> Home</a>
                    </li>
                    <li class="nav-item nav-categories-item">
                        <a class="nav-link" href=""> <span><i class="las la-hand-point-right"></i></span> About</a>

                        <div class="categories-menu">
                            <ul class="categories-ul-first py-3">
                                <li>
                                    <a href="{{route('about')}}"><span><i class="las la-home"></i></span> About DMS</a>
                                </li>
                                <li>
                                    <a href="{{route('team')}}"><span><i class="las la-user"></i></span> Our Team</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item nav-categories-item">
                        <a class="nav-link" href="{{route('courses')}}"> <span><i class="las la-table"></i></span> Courses</a>

                        <div class="categories-menu">
                            <ul class="categories-ul-first">
                                {{-- <li>
                                    <a href="{{route('courses')}}">
                                        <i class="la la-th-list"></i> {{__t('All Courses')}}
                                    </a>
                                </li> --}}
                                @foreach($categories as $category)
                                    <li>
                                        <a href="{{route('category_view', $category->slug)}}">
                                            <i class="la {{$category->icon_class}}"></i> {{$category->category_name}}

                                            @if($category->sub_categories->count())
                                                <i class="la la-angle-right"></i>
                                            @endif
                                        </a>
                                        @if($category->sub_categories->count())
                                            <ul class="level-sub">
                                                @foreach($category->sub_categories as $subCategory)
                                                    <li><a href="{{route('category_view', $subCategory->slug)}}">{{$subCategory->category_name}}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </li>
                    {{-- <li class="nav-item nav-categories-item">
                        <a class="nav-link" href="{{route('blog')}}"> <span><i class="las la-book"></i></span> Blogs</a>
                    </li> --}}
                    <li class="nav-item nav-categories-item">
                        <a class="nav-link" href="{{route('help')}}"> <span><i class="las la-question"></i></span> Faq</a>
                    </li>
                    <li class="nav-item nav-categories-item">
                        <a class="nav-link" href="{{route('contact')}}"> <span><i class="las la-map"></i></span> Contact</a>
                    </li>

                </ul>

                {{-- <div class="header-search-wrap my-2 my-lg-0  ml-2">
                    <form action="{{route('courses')}}" class="form-inline " method="get">
                        <input class="form-control" type="search" name="q" value="{{request('q')}}" placeholder="Search">
                        <button class="btn my-2 my-sm-0 header-search-btn" type="submit"><i class="la la-search"></i></button>
                    </form>
                </div> --}}

                <div class="header-search-wrap my-2 my-lg-0  ml-2">
                    <button class="openBtn" onclick="openSearch()"><i class="la la-search"></i></button>
                </div>

                <ul class="navbar-nav main-nav-auth-profile-wrap justify-content-end mt-2 mt-lg-0 flex-grow-1">

                    {{-- <li class="nav-item dropdown mini-cart-item">
                        {!! view_template_part('template-part.minicart') !!}
                    </li> --}}

                    @if (Auth::guest())
                        <li class="nav-item mr-2 ml-2">
                            <a class="nav-link btn btn-login-outline" href="{{route('login')}}"> <i class="la la-sign-in"></i> {{__t('login')}}</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link btn btn-theme-primary btn-signup-outline" href="{{route('register')}}"> <i class="la la-user-plus"></i> {{__t('signup')}}</a>
                        </li> --}}
                        
                    @else
                        <li class="nav-item main-nav-right-menu nav-item-user-profile">
                            <a class="nav-link profile-dropdown-toogle" href="javascript:;">
                                <span class="top-nav-user-name">
                                    {!! $auth_user->get_photo !!}
                                </span>
                            </a>
                            <div class="profile-dropdown-menu pt-0">

                                <div class="profile-dropdown-userinfo bg-light p-3">
                                    <p class="m-0">{{ $auth_user->name }}</p>
                                    <small>{{$auth_user->email}}</small>
                                </div>

                                @include(theme('dashboard.sidebar-menu'))
                            </div>
                        </li>
                    @endif

                </ul>

            </div>
        </div>

    </nav>

    <header class="dms-mobile-menu">
        <nav id="cssmenu">
          <div class="logo">
            <a class="navbar-brand site-main-logo" href="{{route('home')}}">
                @php
                    $logoUrl = media_file_uri(get_option('site_logo'));
                @endphp

                @if($logoUrl)
                    <img src="{{media_file_uri(get_option('site_logo'))}}" alt="{{get_option('site_title')}}" />
                @else
                    <img src="{{asset('assets/images/teachify-lms-logo.svg')}}" alt="{{get_option('site_title')}}" />
                @endif
            </a>
            </div>
          <div id="head-mobile"></div>
          <div class="dms-button"></div>
          <ul>
            @foreach($categories as $category)
            <li>
                <a href="{{route('category_view', $category->slug)}}">
                    <i class="la {{$category->icon_class}}"></i> {{$category->category_name}}

                    {{-- @if($category->sub_categories->count())
                        <i class="la la-angle-right"></i>
                    @endif --}}

                </a>
                @if($category->sub_categories->count())
                    <ul class="level-sub">
                        @foreach($category->sub_categories as $subCategory)
                            <li><a href="{{route('category_view', $subCategory->slug)}}">{{$subCategory->category_name}}</a></li>
                        @endforeach
                    </ul>
                @endif
            </li>
            @endforeach
            {{-- <li class="active"><a href="#">HOME</a></li>
            <li><a href="#">ABOUT</a></li>
            <li>
              <a href="#">PRODUCTS</a>
              <ul>
                <li>
                  <a href="#">Product 1</a>
                  <ul>
                    <li><a href="#">Sub Product</a></li>
                    <li><a href="#">Sub Product</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#">Product 2</a>
                  <ul>
                    <li><a href="#">Sub Product</a></li>
                    <li><a href="#">Sub Product</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#">BIO</a></li>
            <li><a href="#">VIDEO</a></li>
            <li><a href="#">GALLERY</a></li>
            <li><a href="#">CONTACT</a></li> --}}
          </ul>
          {{-- cart --}}
          <div class="cart-mobile">
            <li class="nav-item dropdown mini-cart-item">
                {!! view_template_part('template-part.minicart') !!}
            </li>
          </div>
            <div class="d-flex justify-content-between align-items-center mobile-menu-auth-info">

                @if (Auth::guest())
                    <li class="nav-item">
                        <a class="nav-link btn btn-login-outline" href="{{route('login')}}"> <i class="la la-sign-in"></i> {{__t('login')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-theme-primary btn-signup-outline" href="{{route('register')}}"> <i class="la la-user-plus"></i> {{__t('signup')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-theme-primary btn-signup-outline btn-search-dms" href="#"> <i class="la la-search"></i> {{__t('search')}}</a>
                    </li>
                @else
                    <li class="nav-item after-loggin">
                      <a class="nav-link btn btn-theme-primary btn-signup-outline btn-search-dms" href="#"> <i class="la la-search"></i> {{__t('search')}}</a>
                    </li>
                    <li class="nav-item after-loggin after-login-user">
                        <a class="nav-link profile-dropdown-toogle" href="javascript:;">
                            <span class="top-nav-user-name">
                                {!! $auth_user->get_photo !!}
                            </span>
                        </a>
                        <div class="profile-dropdown-menu pt-0">

                            <div class="profile-dropdown-userinfo bg-light p-3">
                                <p class="m-0">{{ $auth_user->name }}</p>
                                <small>{{$auth_user->email}}</small>
                            </div>

                            @include(theme('dashboard.sidebar-menu'))
                        </div>
                    </li>
                    
                @endif

            </div>
        </nav>
        <div class="header-search-wrap my-2 my-lg-0  ml-2">
            <form action="{{route('courses')}}" class="form-inline " method="get">
                <input class="form-control" type="search" name="q" value="{{request('q')}}" placeholder="Search">
                <button class="btn my-2 my-sm-0 header-search-btn" type="submit"><i class="la la-search"></i></button>
            </form>
        </div>
      </header>

</div>