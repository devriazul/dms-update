
<footer>

    <div class="footer-top py-5">

        <div class="container">
            <div class="row">

                <div class="col-md-3">
                    <div class="footer-widget-wrap">
                        <h4>About US</h4>
                        <p class="footer-about-us-desc">
                            London DMS is a online learning platform that connect instructors with Students globally. instructors create high quality course and present them into super easy way
                        </p>
                        <p class="footer-social-icon-wrap">
                            <a href="https://www.facebook.com/londondms"><i class="la la-facebook"></i> </a>
                            <a href="#"><i class="la la-twitter"></i> </a>
                            <a href="https://www.linkedin.com/company/londondms"><i class="la la-linkedin"></i> </a>
                            <a href="#"><i class="la la-youtube"></i> </a>
                        </p>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="footer-widget-wrap contact-us-widget-wrap">
                        <h4>Contact</h4>
                        <p class="footer-address">
                            11 Beaufort Court, Admirals Way, Canary Wharf, London United Kingdom E14 9XL
                        </p>

                        <p class="mb-0"> Tel: <a href="tel:+442045171310">+442045171310</a>  
                        </p>
                        <p class="mb-0">
                            <a href="mailto: info@londondms.com">info@londondms.com</a>  </p>
                    </div>
                </div>



                <div class="col-md-6">
                    <div class="footer-widget-wrap link-widget-wrap">

                        <ul class="footer-links">
                            <li><a href="{{route('home')}}">{{__t('home')}}</a> </li>
                            <li><a href="{{route('dashboard')}}">{{__t('dashboard')}}</a> </li>
                            <li><a href="{{route('courses')}}">{{__t('courses')}}</a> </li>
                            <li><a href="{{route('popular_courses')}}">{{__t('popular_courses')}}</a> </li>
                            <li><a href="{{route('featured_courses')}}">{{__t('featured_courses')}}</a> </li>
                            <li><a href="{{route('blog')}}">{{__t('blog')}}</a> </li>
                            <li><a href="{{route('about')}}">{{__t('about_us')}}</a> </li>
                            <li><a href="{{route('register')}}">{{__t('signup')}}</a> </li>
                            <li><a href="{{route('contact')}}">Contact Us</a> </li>
                            <li><a href="{{route('help')}}">Help & Suppot</a> </li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="footer-bottom py-5">

        <div class="container">

            <div class="row">
                <div class="col-md-6">
                    <div class="footer-bottom-contents-wrap d-flex">

                        <div class="footer-bottom-left d-flex align-items-center">
                            
                            <div>
                                <span>Copyright © <?php echo date("Y"); ?> London DMS. All rights reserved.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="footer-bottom-right flex-grow-1 text-right">
                    <ul class="footer-bottom-right-links">
                        <li>
                            <a href="{{route('post_proxy', get_option('terms_of_use_page'))}}">
                                {{__t('terms_of_use')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('post_proxy', get_option('privacy_policy_page'))}}">
                                {{__t('privacy_policy')}} &amp; {{__t('cookie_policy')}}
                            </a>
                        </li>

                    </ul>
                </div>
                </div>
            </div>

        </div>
    </div>


</footer>


<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    {{ csrf_field() }}
</form>

@if( ! auth()->check() && request()->path() != 'login')
    @include(theme('template-part.login-modal-form'))
@endif

<!-- jquery latest version -->
<script src="{{asset('assets/js/vendor/jquery-1.12.0.min.js')}}"></script>
<!-- bootstrap js -->
{{-- <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script> --}}

{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="{{ asset('assets/plugins/select2-4.0.3/js/select2.min.js') }}"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  
<!-- Initialize Swiper -->
<script>
  @if(Session::has('success'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true,
    "timeOut": "10000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
  }
      toastr.success("{{ session('success') }}");
  @endif
  
  @if(Session::has('error'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true,
    "timeOut": "10000",
    "positionClass": "toast-top-right",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
  }
      toastr.error("{{ session('error') }}");
  @endif
  
  @if(Session::has('info'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true,
    "timeOut": "10000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
  }
      toastr.info("{{ session('info') }}");
  @endif
  
  @if(Session::has('warning'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true,
    "timeOut": "10000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
  }
      toastr.warning("{{ session('warning') }}");
  @endif
  </script> 
<script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 3,
      spaceBetween: 15,
      /* pagination: {
        el: ".swiper-pagination",
        type: 'bullets',
        clickable: true,
      }, */
      autoplay: {
        delay: 5000,
        },
        loop: true,
      navigation: {
        nextEl: '.swiper-button-next-1',
        prevEl: '.swiper-button-prev-1',
      },
        // Responsive breakpoints
        breakpoints: {
            // when window width is >= 320px
            320: {
            slidesPerView: 2,
            spaceBetween: 15
            },
            // when window width is >= 480px
            480: {
            slidesPerView: 3,
            spaceBetween: 15
            },
            // when window width is >= 640px
            640: {
            slidesPerView: 3,
            spaceBetween: 15
            }
        }
    });
    //testimonial-carousel
    var swiper = new Swiper(".testimonial-carousel", {
      slidesPerView: 3,
      spaceBetween: 15,
      pagination: {
        el: ".swiper-pagination",
        // type: 'bullets',
        clickable: true,
      },
      autoplay: {
        delay: 10000,
        },
        loop: true,
      /* navigation: {
        nextEl: '.swiper-button-next-1',
        prevEl: '.swiper-button-prev-1',
      }, */
        // Responsive breakpoints
        breakpoints: {
            // when window width is >= 320px
            320: {
            slidesPerView: 1,
            spaceBetween: 20
            },
            // when window width is >= 480px
            480: {
            slidesPerView: 2,
            spaceBetween: 15
            },
            // when window width is >= 640px
            640: {
            slidesPerView: 3,
            spaceBetween: 15
            }
        }
    });
    //university-carousel
    var swiper = new Swiper(".university-carousel", {
      slidesPerView: 4,
      spaceBetween: 15,
      pagination: {
        el: ".swiper-pagination",
        // type: 'bullets',
        clickable: true,
      },
      autoplay: {
        delay: 5000,
        },
        loop: true,
      /* navigation: {
        nextEl: '.swiper-button-next-1',
        prevEl: '.swiper-button-prev-1',
      }, */
        // Responsive breakpoints
        breakpoints: {
            // when window width is >= 320px
            320: {
            slidesPerView: 2,
            spaceBetween: 5
            },
            // when window width is >= 480px
            480: {
            slidesPerView: 3,
            spaceBetween: 0
            },
            // when window width is >= 640px
            640: {
            slidesPerView: 4,
            spaceBetween: 0
            }
        }
    });
    

  </script>


@yield('page-js')

<!-- main js -->
<script src="{{theme_asset('js/main.js')}}"></script>


<script>
      (function ($) {
        $.fn.menumaker = function (options) {
          var cssmenu = $(this),
            settings = $.extend(
              {
                format: "dropdown",
                sticky: false,
              },
              options
            );
          return this.each(function () {
            $(this)
              .find(".dms-button")
              .on("click", function () {
                $(this).toggleClass("menu-opened");
                var mainmenu = $(this).next("ul");
                if (mainmenu.hasClass("open")) {
                  mainmenu.slideToggle().removeClass("open");
                } else {
                  mainmenu.slideToggle().addClass("open");
                  if (settings.format === "dropdown") {
                    mainmenu.find("ul").show();
                  }
                }
              });
            cssmenu.find("li ul").parent().addClass("has-sub");
            multiTg = function () {
              cssmenu
                .find(".has-sub")
                .prepend('<span class="submenu-dms-button"></span>');
              cssmenu.find(".submenu-dms-button").on("click", function () {
                $(this).toggleClass("submenu-opened");
                if ($(this).siblings("ul").hasClass("open")) {
                  $(this).siblings("ul").removeClass("open").slideToggle();
                } else {
                  $(this).siblings("ul").addClass("open").slideToggle();
                }
              });
            };
            if (settings.format === "multitoggle") multiTg();
            else cssmenu.addClass("dropdown");
            if (settings.sticky === true) cssmenu.css("position", "fixed");
            resizeFix = function () {
              var mediasize = 1000;
              if ($(window).width() > mediasize) {
                cssmenu.find("ul").show();
              }
              if ($(window).width() <= mediasize) {
                cssmenu.find("ul").hide().removeClass("open");
              }
            };
            resizeFix();
            return $(window).on("resize", resizeFix);
          });
        };
      })(jQuery);

      (function ($) {
        $(document).ready(function () {
          $("#cssmenu").menumaker({
            format: "multitoggle",
          });
          $("a.btn-search-dms").click(function(){
            $(".header-search-wrap").toggle();
          });
        });
      })(jQuery);
    </script>
    <script>
      function getPhoneCodeFromHeader(){
				var country_name = $('.get-country-data-header').val();
				$.get("{{ URL::to('get-code-by-country') }}/"+country_name,function(data,status){
					if(data['result']['key']===101){
						alert(data['result']['val']);
					}
					if(data['result']['key']===200){
						console.log(data['result']['val']);
						$('.get-phone-code-header').val(data['result']['val']);
					}
				});
			}
      function getPhoneCode(){
				var country_name = $('.get-country-data').val();
				$.get("{{ URL::to('get-code-by-country') }}/"+country_name,function(data,status){
					if(data['result']['key']===101){
						alert(data['result']['val']);
					}
					if(data['result']['key']===200){
						console.log(data['result']['val']);
						$('.get-phone-code').val(data['result']['val']);
					}
				});
			}
      function getPhoneCodeById(){
				var country_id = $('.get-country-data').val();
				$.get("{{ URL::to('get-code-by-country-id') }}/"+country_id,function(data,status){
					if(data['result']['key']===101){
						alert(data['result']['val']);
					}
					if(data['result']['key']===200){
						console.log(data['result']['val']);
						$('.get-phone-code').val(data['result']['val']);
					}
				});
			}
      function getCategoryData(){
          var categoty = $('#category_id').val();
          if(categoty !== null){
            window.location.href = '{{ URL::to('blog') }}/'+categoty
          }
      }
      function getSearchResult(){
        var title = $('#serach_item').val();
        window.location.href = '{{ URL::to('search-blog') }}/'+title
      }
    </script>
    <!-- Start of Async Drift Code -->

  <!-- End of Async Drift Code -->
    <script>
      $(document).ready(function(){
          $(".social-button").attr("target","_blank");
      });
    </script>
    @if(Session::has('check_apply_now_data'))
    <script>
      $(document).ready(function(){
          $('#exampleModal1').modal('show');
      });
    </script>
    @endif
    
</body>
</html>
