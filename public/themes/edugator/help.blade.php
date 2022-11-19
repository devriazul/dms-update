@extends('layouts.theme')

@section('content')

    <div class="blog-post-page-header bg-dark-blue text-white text-center py-5">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h1 class="mb-3">{{$title}}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            @if(Session::has('contact_success'))
            <div class="col-md-12 alert alert-success">
                <strong>Success!</strong> {{ session('contact_success') }}
            </div>
            @endif
            <div class="col-md-6 p-5">
              <div class="py-3">
                <h2>Contact</h2>
            </div>
              <form action="{{ URL::to('contact-store') }}" method="post" id="createPostForm" enctype="multipart/form-data">
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
                      <select onchange="getPhoneCode()" id="select_country" name="country" class="form-control get-country-data" placeholder="Select Country" data-live-search="true">
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
                      <input name="phone" type="text" class="form-control get-phone-code" id="select_phone" placeholder="Place your number">
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
                    <textarea name="message" class="form-control" name="" id="" cols="30" rows="4">{{ old('message') }}</textarea>
                    {!! $errors->has('message')? '<p class="help-block text-danger">'.$errors->first('message').'</p>':'' !!}
                  </div>
                  <div class="checkbox">
                    <label>
                      <input name="privacy_policy" type="checkbox"> I accept the privacy and policy
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input name="is_receiving_info" type="checkbox"> I consent to receiving information (by email or phone) about the courses and services offered by Londondms.
                    </label>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-md-6 py-5">
                <div class="display-hide-xs">
                    <div class="py-3">
                        <h2>FAQ?</h2>
                    </div>
                    <div id="accordion">
                        <div class="card">
                          <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                               Q: Can I do a course from home?
                              </button>
                            </h5>
                          </div>
                      
                          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                              You can do a course from home. We offer various Level 3 methods on our platform. In addition, courses like Diploma in Health & Social Care, Diploma in Business Management, Diploma in Business & Management, etc., ate available in our virtual learning environment.
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" id="headingten">
                            <h5 class="mb-0">
                              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseten" aria-expanded="false" aria-controls="collapseten">
                                Q: Can I enroll an online course at any time? 
                              </button>
                            </h5>
                          </div>
                          <div id="collapseten" class="collapse" aria-labelledby="headingten" data-parent="#accordion">
                            <div class="card-body">
                              Are you anxious to get started? Or procrastinating, waiting for the enrollment deadline to roll on so you can put it off longer? Whatever your situation or desires are, you can find a course that will fit your needs, either now or later. Your start time may depend on several factors. So, do not hesitate; to sign up today to get the classes you want.
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Q: Is online Learning the best choice for me?
                              </button>
                            </h5>
                          </div>
                          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                              There are numerous causes to at least think about it, without any doubt. There are two kinds of learners: Those who have just graduated from high school and who have established adults who are sincerely interested in returning to school to finish their degree. As everyone’s situation is different from others, starting an associate degree or going back to school to obtain a degree can be difficult for someone. Why do you inquire? Our day-to-day activities dictate how we utilize our time, what we can afford to do, and what our priorities should be. Therefore, when considering the choice of online schooling versus the traditional brick-and-mortar university, you must ask yourself which is best for your situation.
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Q: How long is a Level 3 course?
                              </button>
                            </h5>
                          </div>
                          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                              Level 3 qualification is a Key Stage 5 education in the years 12 and 13. You need two years to study Level 3 programs with a core of 3 units. You can choose A Levels with three subjects per unit or a mixed program of A Levels and Extended Certifications.
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" id="headingfour">
                            <h5 class="mb-0">
                              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                Q: Which Level 3 course is best for a job in the UK?
                              </button>
                            </h5>
                          </div>
                          <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordion">
                            <div class="card-body">
                              If you want to get the Level 3 qualification to get a job, you must go for a course with better job opportunities in the UK. If you look at the UK’s workforce, you will see there’s high demand in medicine & dentistry, veterinary, allied medicine subjects, law, architecture, etc. 
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" id="headingfive">
                            <h5 class="mb-0">
                              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                                Q: Do universities accept Level 3 diplomas?
                              </button>
                            </h5>
                          </div>
                          <div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordion">
                            <div class="card-body">
                              Universities in the UK accept Level 3 diplomas. If you fulfil the requirements for admission to a university, you will obtain your Level 3 diploma qualification. UCAS points will help you get into a university.
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" id="headingsix">
                            <h5 class="mb-0">
                              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                                Q: Will my online degree be the same as the traditional degree?
                              </button>
                            </h5>
                          </div>
                          <div id="collapsesix" class="collapse" aria-labelledby="headingsix" data-parent="#accordion">
                            <div class="card-body">
                              When you spend your hard-earned money and dedicate your valuable time to earning a college degree, you must be sure that an online degree will be acceptable to prospective employers, right? Who wants to go through the rigorous process of earning a degree only to find out it’s not worth the paper it’s written on? Nobody. Nor would you want it to be unacceptable to future employers. Therefore, you must be assured that your online degree credentials are taken seriously. Perhaps, you are wondering if your online diploma is considered as valuable as those earned from a traditional brick-and-mortar university. The short answer to that concern is yes. First, however, let us tell you why that is true. 
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" id="headingseven">
                            <h5 class="mb-0">
                              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                                Q: Do Online Courses Cost More or Less?
                              </button>
                            </h5>
                          </div>
                          <div id="collapseseven" class="collapse" aria-labelledby="headingseven" data-parent="#accordion">
                            <div class="card-body">
                              You may wonder if online courses are more or less expensive than the traditional brick-and-mortar classroom experience. The truth is that this is a difficulty for most prospective students. However, there are many reasons to consider broad exploration on your part should be directed before enrolling on a course of any kind if school tuition matters for you.
                              Online schools are generally less expensive, much more than a college or university that requires your presence. However, with that being said, it may only sometimes apply. For example, some schools offer their coursework only through the online format. 
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" id="headingeight">
                            <h5 class="mb-0">
                              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
                                Q: What technical skills do online students need?
                              </button>
                            </h5>
                          </div>
                          <div id="collapseeight" class="collapse" aria-labelledby="headingeight" data-parent="#accordion">
                            <div class="card-body">
                              Online learning platforms are generally designed to be user-friendly such as intuitive controls, clear instructions, and tutorial guidelines through new tasks or assignments. On the other hand, students must need basic computer skills to access these courses. For example, using a keyboard and a mouse; running computer programs, using the Internet; sending and receiving email; using word processing programs. Most online courses publish such requirements on their websites. If not, an admissions adviser can help.
                              The Students who do not meet a course mentioned basic technical skills requirements are not without recourse. Online learning platforms habitually offer classes and simulations that help students initiate computer bits of knowledge before beginning their studies.
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" id="headingnine">
                            <h5 class="mb-0">
                              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsenine" aria-expanded="false" aria-controls="collapsenine">
                                Q: What are some of the merits and demerits of online classes?
                              </button>
                            </h5>
                          </div>
                          <div id="collapsenine" class="collapse" aria-labelledby="headingnine" data-parent="#accordion">
                            <div class="card-body">
                              Online learning courses have merits and demerits, just as everything else. In any case, regarding something as significant as one's schooling, you must take care of business the first time. You should choose the school and course format that best suits your educational needs and personality. Due to the popularity of online learning, more and more students are opting for this suited to attend college or a university. Why would that be? Put, convenience and flexibility are needed because everyone has different obligations. As our everyday lives existences direct our timetables, online learning allows students to pick when they go to class rather than the customary physical school that runs when you will follow.
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection
