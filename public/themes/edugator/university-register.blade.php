<div class="container my-5 register-login-wrap">
    <div class="row align-items-center">
        <div class="col-md-6 display-hide-xs">
            <div class="login-left-box-img">
                <img src="{{theme_url('images/login-image.png')}}" alt="login-image">
            </div>
        </div>
        <div class="col-md-6">

            <h2 class="mb-5 text-center ">{{__t('University register')}} <small>or <a href="{{route('login')}}">{{__t('login')}}</a> </small> </h2>

            <div class="auth-form-wrap">

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                @endif

                <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                        
                        <div class="col-md-12">
                            <input placeholder="University Name" id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
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
                            {{-- <label class="mr-3"><input type="radio" name="user_as" value="instructor" {{old('user_as') == 'instructor' ? 'checked' : ''}} > {{__t('instructor')}} </label> --}}
                            <label class="display-none"><input type="radio" name="user_as" checked value="university" {{old('user_as') == 'university' ? 'checked' : ''}} > {{__t('university')}} </label>

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
