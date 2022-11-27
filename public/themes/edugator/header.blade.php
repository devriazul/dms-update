@php
    use App\Category;
    $categories = Category::whereStep(0)->with('sub_categories')->orderBy('category_name', 'asc')->get();
    $countries = App\Country::all();
    $courses = App\Course::where('status',1)->get();
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

<div class="container ">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/"><i class="las la-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="dropbtn nav-link"><i class="las la-hand-point-right"></i> About</a>
                            <div class="dropdown-content">
                                <a href="{{route('about')}}"><i class="las la-home"></i> About DMS</a>
                                <a href="{{route('team')}}"><i class="las la-user"></i> Our Team</a>
                            </div>
                          </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a href="{{route('courses')}}" class="dropbtn nav-link"><i class="las la-table"></i> Courses</a>
                            <div class="dropdown-content">
                                @foreach($categories as $category)
                                    <a href="{{route('category_view', $category->slug)}}">
                                        <i class="la {{$category->icon_class}}"></i> 
                                             {{$category->category_name}}
                                            @if($category->sub_categories->count())
                                            @endif
                                        </a>
                                @endforeach
                                <a class="nav-link" href="#"><i class="las la-building"></i> Professional Course</a>
                            </div>
                          </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('blog')}}"> <span><i class="las la-book"></i></span> Blogs</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{route('help')}}"><i class="las la-question"></i> Help</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact')}}"><span><i class="las la-map"></i></span> Contact</a>
                    </li> --}}
                    <li class="nav-item">
                        <div class="dropdown">
                            <a href="{{route('contact')}}" class="dropbtn nav-link"><i class="las la-map"></i> Contact</a>
                            <div class="dropdown-content">
                                {{-- <a href="{{route('about')}}"><i class="las la-map"></i> Contact Us</a> --}}
                                <a href="{{route('help')}}"><i class="las la-question"></i> Help & Support</a>
                            </div>
                          </div>
                    </li>
                  </ul>
                  <ul class="navbar-nav mr-0 ">
                    <li class="nav-item main-nav-right-menu mx-2">
                        <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary my-2 my-sm-0" type="submit"><i class="la la-search"></i></button>
                    </li>
                    <li class="nav-item main-nav-right-menu mx-2">
                        <button data-toggle="modal" data-target="#exampleModal1" class="btn btn-primary my-2 my-sm-0" type="submit">Apply now</button>
                    </li>
                    @if (Auth::guest())
                        <li class="nav-item main-nav-right-menu mx-2">
                            <a class=" btn btn-primary my-2 my-sm-0" href="{{route('login')}}"> <i class="la la-sign-in"></i> {{__t('login')}}</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link btn btn-theme-primary btn-signup-outline" href="{{route('register')}}"> <i class="la la-user-plus"></i> {{__t('signup')}}</a>
                        </li> --}}
                      
                  @else
                        <li class="nav-item main-nav-right-menu nav-item-user-profile">
                            <a class="nav-link profile-dropdown-toogle my-2 my-sm-0" href="javascript:;">
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
            </nav>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title my-2" id="exampleModalLabel">Find a course</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="header-search-wrap my-2 my-lg-0  ml-2">
                        <form action="{{route('courses')}}" class="form-inline " method="get">
                            <input class="form-control" type="search" name="q" value="{{request('q')}}" placeholder="Search">
                            <button class="btn my-2 my-sm-0 header-search-btn" type="submit"><i class="la la-search"></i></button>
                        </form>
                    </div>
                    <div class="categories-menu pt-5 px-2">
                        <p class="text-muted">Suggested</p>
                        @foreach($categories as $category)
                            <div>
                                <a class="btn btn-primary my-1" href="{{route('category_view', $category->slug)}}">
                                    {{$category->category_name}}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header mx-auto">
                    <h3 class="modal-title" id="exampleModalLabel">Apply Now</h3>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md-12 p-3">
                            <form action="{{ route('store_apply_now') }}" method="post" id="createPostForm" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input name="full_name" value="{{ old('full_name') }}" type="text" class="form-control" id="exampleInputName" placeholder="Full Name">
                                    {!! $errors->has('full_name')? '<p class="help-block text-danger">'.$errors->first('full_name').'</p>':'' !!}
                                  </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Email address</label>
                                  <input name="email" value="{{ old('email') }}" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                  {!! $errors->has('email')? '<p class="help-block text-danger">'.$errors->first('email').'</p>':'' !!}
                                </div>
                                
                                <div class="form-group">
                                    <label for="country">Country of Residence: </label>
                                    <select onchange="getPhoneCodeFromHeader()" id="select_country" name="country" class="form-control get-country-data-header" placeholder="Select Country" data-live-search="true">
                                        <option>Select Country</option>
                                        @if(count($countries) > 0)
                                            @foreach($countries as $country)
                                                <option value="{{ $country->name }}">{{ $country->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    {!! $errors->has('country')? '<p class="help-block text-danger">'.$errors->first('country').'</p>':'' !!}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Contact Number</label>
                                    <input name="phone" type="text" class="form-control get-phone-code-header" id="select_phone" placeholder="Place your number">
                                    {!! $errors->has('phone')? '<p class="help-block text-danger">'.$errors->first('phone').'</p>':'' !!}
                                  </div>
                                <div class="form-group">
                                    <label for="course">Course of Interest</label>
                                    <select name="contact_reason" class="form-control">
                                        <option value="">Select Course</option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->title }}">{{ $course->title }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->has('contact_reason')? '<p class="help-block text-danger">'.$errors->first('contact_reason').'</p>':'' !!}
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputFile">Your Message</label>
                                  <textarea name="message" class="form-control" name="" id="" cols="30" rows="3"></textarea>
                                  {!! $errors->has('message')? '<p class="help-block text-danger">'.$errors->first('message').'</p>':'' !!}
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    
                </div>
            </div>
        </div>
    </div>
    
</div>



