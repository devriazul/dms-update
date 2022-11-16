<div class="container my-5 register-login-wrap">
    <div class="row align-items-center">
        <div class="col-md-6 display-hide-xs">
            <div class="login-left-box-img">
                <img src="{{theme_url('images/login-image.png')}}" alt="login-image">
            </div>
        </div>
        <div class="col-md-6">

            <h2 class="mb-5 text-center ">{{__t('Instructor register')}} <small>or <a href="{{route('login')}}">{{__t('login')}}</a> </small> </h2>

            <div class="auth-form-wrap">

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                @endif

                <form class="form-horizontal" role="form" method="POST" action="{{ route('instructor_register_post') }}">
                    {{ csrf_field() }}

                    <div class="form-group row {{ $errors->has('first_name') ? ' has-error' : '' }}">
                        
                        <div class="col-md-12">
                            <input placeholder="First Name" id="first_name" type="text" class="form-control" name="first name" value="{{ old('first_name') }}" required autofocus>

                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('last_name') ? ' has-error' : '' }}">
                        
                        <div class="col-md-12">
                            <input placeholder="Last Name" id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                            @if ($errors->has('last_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('country_id') ? ' has-error' : '' }}">
                        
                        <div class="col-md-12">
                            <select onchange="getPhoneCodeById()" id="select_country" class="form-control" name="country_id" style="border-radius: 20px;" required autofocus>
                                <option>--Select Country--</option>
                                @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                                
                            </select>
                            @if ($errors->has('country_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('country_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('mobile') ? ' has-error' : '' }}">
                        
                        <div class="col-md-12">
                            <input placeholder="Mobile" id="select_phone" type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" required autofocus>

                            @if ($errors->has('mobile'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('mobile') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="form-check">
                                <input name="area_of_expertise[]" class="form-check-input" type="checkbox" value="Business" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Business
                                </label>
                            </div>
                            <div class="form-check">
                                <input name="area_of_expertise[]" class="form-check-input" type="checkbox" value="Marketing" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Marketing
                                </label>
                            </div>
                            <div class="form-check">
                                <input name="area_of_expertise[]" class="form-check-input" type="checkbox" value="Digital marketing" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Digital marketing
                                </label>
                            </div>
                            <div class="form-check">
                                <input name="area_of_expertise[]" class="form-check-input" type="checkbox" value="Accounting" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Accounting
                                </label>
                            </div>
                            <div class="form-check">
                                <input name="area_of_expertise[]" class="form-check-input" type="checkbox" value="IT & Computing" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    IT & Computing
                                </label>
                            </div>
                            <div class="form-check">
                                <input name="area_of_expertise[]" class="form-check-input" type="checkbox" value="Healthcare" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Healthcare
                                </label>
                            </div>
                            <div class="form-check">
                                <input name="area_of_expertise[]" class="form-check-input" type="checkbox" value="Others " id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Others
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                        
                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email Address">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
                    
                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row ">
                        
                        <div class="col-md-12">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                        </div>
                    </div>

                    <div class="form-group row ">
                       
                        <div class="col-md-12">
                            {{-- <label class="mr-3"><input type="radio" name="user_as" value="student" {{old('user_as') ? (old('user_as') == 'student') ? 'checked' : '' : 'checked' }}> {{__t('student')}} </label> --}}
                            <label class="mr-3 display-none"><input type="radio" checked name="user_as" value="instructor" {{old('user_as') == 'instructor' ? 'checked' : ''}} > {{__t('instructor')}} </label>
                            {{-- <label><input type="radio" name="user_as" value="university" {{old('user_as') == 'university' ? 'checked' : ''}} > {{__t('university')}} </label> --}}

                        </div>
                    </div>

                    <div class="form-group row ">
                        <div class="col-md-10 offset-md-1">
                            <button type="submit" class="btn btn-primary dms-login-btn"> {{__t('register')}} </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
