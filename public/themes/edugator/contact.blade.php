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
        <div class="row justify-content-center m-3">
            @if(Session::has('contact_success'))
            <div style="margin-top: 30px;" class="col-md-12 alert alert-success">
                <strong>Success!</strong> {{ session('contact_success') }}
            </div>
            @endif
            <div class="col-md-6 py-3 course-widget">
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
                        <select onchange="getPhoneCode()" id="" name="country" class="form-control get-country-data">
                            <option value="">Select Country</option>
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
                    {{-- <div class="checkbox">
                      <label>
                        <input name="is_receiving_info" type="checkbox"> I consent to receiving information (by email or phone) about the courses and services offered by Londondms.
                      </label>
                    </div> --}}
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
            <div class="col-md-6 py-5">
                <div class="display-hide-xs">
                    {{-- <div class="login-left-box-img">
                        <img src="{{theme_url('images/contact-us.webp')}}" alt="login-image">
                    </div> --}}
                    <div style="width: 100%">
                        <iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=11%20Beaufort%20Court,%20Admirals%20Way,%20Canary%20Wharf,%20London%20United%20Kingdom%20E14%209XL+(London%20School%20of%20marketing)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.maps.ie/distance-area-calculator.html">measure area map</a></iframe></div>
                </div>
            </div>
        </div>
    </div>
@endsection
