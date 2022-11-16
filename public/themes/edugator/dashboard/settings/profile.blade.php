@extends(theme('dashboard.layout'))

@section('content')

    <div class="dashboard-inline-submenu-wrap mb-4 border-bottom">
        <a href="{{route('profile_settings')}}" class="active">Profile Settings</a>
        <a href="{{route('profile_reset_password')}}" class="">Password Reset</a>
    </div>


    <div class="profile-settings-wrap">

        <h4 class="mb-3">Profile Information</h4>

        <form action="" method="post">
            @csrf

            @php
                $user = $auth_user;
                $countries = countries();
            @endphp


            <div class="profile-basic-info bg-white p-3">

                <div class="form-row">
                    <div class="form-group col-md-6 {{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="first_name" value="{{$user->first_name}}" >
                        @if ($errors->has('first_name'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('first_name') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group col-md-6 {{ $errors->has('last_name') ? ' has-error' : '' }}">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="last_name" value="{{$user->last_name}}" >
                        @if ($errors->has('last_name'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('last_name') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group col-md-8 {{ $errors->has('job_title') ? ' has-error' : '' }}">
                        <label>{{__t('job_title')}}</label>
                        <input type="text" class="form-control" name="job_title" value="{{$user->job_title}}">
                        @if ($errors->has('job_title'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('job_title') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group col-md-4 {{ $errors->has('mobile') ? ' has-error' : '' }}">
                        <label>{{__t('Mobile')}}</label>
                        <input type="text" class="form-control" name="mobile" value="{{$user->mobile}}">
                        @if ($errors->has('mobile'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('mobile') }}</strong></span>
                        @endif
                    </div>
                    @if($user->user_type=='student')
                    <?php $courses = App\Course::where('status',1)->get(); ?>
                    <div class="form-group col-md-7 {{ $errors->has('interested_course') ? ' has-error' : '' }}">
                        <label>Course Of Interest</label>
                        <select id="interested_course" class="form-control" name="interested_course" style="border-radius: 20px;" required autofocus>
                            <option>--Course of Interest--</option>
                            @foreach ($courses as $course)
                            <option {{ ($course->title==$user->interested_course)?'selected':'' }} value="{{ $course->title }}">{{ $course->title }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('interested_course'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('interested_course') }}</strong></span>
                        @endif
                    </div>
                    @endif
                    @if($user->user_type=='instructor')
                    <div class="form-group col-md-12">
                        <?php
                            $array = array();
                            if(!empty($user->area_of_expertise)){
                                $array = explode(",",$user->area_of_expertise);
                            }
                        ?>
                        <label>Area of Expertise</label><br>
                        <div class="area-of-expertise">
                            <div>
                                <input {{ (count($array) > 0 && in_array("Business",$array))?'checked':'' }} name="area_of_expertise[]" class="" type="checkbox" value="Business" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Business
                                </label>
                            </div>
                            <div>
                                <input {{ (count($array) > 0 && in_array("Marketing",$array))?'checked':'' }} name="area_of_expertise[]" class="" type="checkbox" value="Marketing" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Marketing
                                </label>
                            </div>
                            <div>
                                <input {{ (count($array) > 0 && in_array("Digital marketing",$array))?'checked':'' }} name="area_of_expertise[]" class="" type="checkbox" value="Digital marketing" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Digital marketing
                                </label>
                            </div>
                            <div>
                                <input {{ (count($array) > 0 && in_array("Accounting",$array))?'checked':'' }} name="area_of_expertise[]" class="" type="checkbox" value="Accounting" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Accounting
                                </label>
                            </div>
                            <div>
                                <input {{ (count($array) > 0 && in_array("IT & Computing",$array))?'checked':'' }} name="area_of_expertise[]" class="" type="checkbox" value="IT & Computing" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    IT & Computing
                                </label>
                            </div>
                            <div>
                                <input {{ (count($array) > 0 && in_array("Healthcare",$array))?'checked':'' }} name="area_of_expertise[]" class="" type="checkbox" value="Healthcare" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Healthcare
                                </label>
                            </div>
                            <div>
                                <input {{ (count($array) > 0 && in_array("Others",$array))?'checked':'' }} name="area_of_expertise[]" class="" type="checkbox" value="Others" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Others
                                </label>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>{{__t('phone')}}</label>
                        <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>{{__t('address')}}</label>
                        <input type="text" class="form-control" name="address" value="{{$user->address}}" >
                    </div>
                    <div class="form-group col-md-4">
                        <label>{{__t('address_2')}}</label>
                        <input type="text" class="form-control" name="address_2" value="{{$user->address_2}}" >
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>{{__t('city')}}</label>
                        <input type="text" class="form-control" name="city" value="{{$user->city}}">
                    </div>

                    <div class="form-group col-md-2">
                        <label>{{__t('zip')}}</label>
                        <input type="text" class="form-control" name="zip_code" value="{{$user->zip_code}}">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputState">{{__t('country')}}</label>

                        <select  class="form-control" name="country_id">
                            <option value="">Choose...</option>
                            @foreach($countries as $country)
                                <option value="{{$country->id}}" {{selected($user->country_id, $country->id)}} >{!! $country->name !!}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-9">
                        <label>{{__t('about_me')}}</label>
                        <textarea class="form-control" name="about_me" rows="5">{{$user->about_me}}</textarea>
                    </div>

                    <div class="form-group col-md-3">
                        <label>{{__t('profile_photo')}}</label>
                        {!! image_upload_form('photo', $user->photo) !!}
                    </div>

                </div>

            </div>


            <h4 class="my-4">Social Link </h4>


            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Website</label>
                    <input type="text" class="form-control" name="social[website]" value="{{$user->get_option('social.website')}}">
                </div>
                <div class="form-group col-md-4">
                    <label>Twitter</label>
                    <input type="text" class="form-control" name="social[twitter]" value="{{$user->get_option('social.twitter')}}" >
                </div>
                <div class="form-group col-md-4">
                    <label>Facebook</label>
                    <input type="text" class="form-control" name="social[facebook]" value="{{$user->get_option('social.facebook')}}" >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Linkedin</label>
                    <input type="text" class="form-control" name="social[linkedin]" value="{{$user->get_option('social.linkedin')}}">
                </div>
                <div class="form-group col-md-4">
                    <label>Youtube</label>
                    <input type="text" class="form-control" name="social[youtube]" value="{{$user->get_option('social.youtube')}}" >
                </div>
                <div class="form-group col-md-4">
                    <label>Instagram</label>
                    <input type="text" class="form-control" name="social[instagram]" value="{{$user->get_option('social.instagram')}}" >
                </div>
            </div>



            <button type="submit" class="btn btn-purple btn-lg"> Update Profile</button>
        </form>


    </div>


@endsection


@section('page-js')
    <script src="{{ asset('assets/js/filemanager.js') }}"></script>
@endsection
