<?php

namespace App\Http\Controllers;

use App\Mail\SendPasswordResetLink;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;
use App\Country;
use App\Course;

class AuthController extends Controller
{

    public function login(){
        $title = __t('login');
        return view_template('login', compact('title'));
    }

    public function loginPost(Request $request){
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $this->validate($request, $rules);

        $credential = [
            'email'     => $request->email,
            'password'     => $request->password
        ];

        if ( Auth::attempt($credential, $request->remember_me)){
            $auth = Auth::user();

            if ($request->_redirect_back_to){
                return redirect($request->_redirect_back_to);
            }

            if ($auth->isAdmin()){
                return redirect()->intended(route('admin'));
            }else{
                return redirect()->intended(route('dashboard'));
            }
        }

        return redirect()->back()->with('error', __t('login_failed'))->withInput($request->input());
    }


    public function register(){
        $countries = Country::all();
        $courses = Course::where('status',1)->get();
        $title = __t('signup');
        return view_template('register', compact('title','countries','courses'));
    }
    
    public function instructor_register(){
        $title = __t('signup');
        $countries = Country::all();
        return view_template('instructor-register', compact('title','countries'));
    }
    
    public function university_register(){
        $title = __t('signup');
        return view_template('university-register', compact('title'));
    }
    //instructor resgister post 
    public function instructorRegisterPost(Request $request){
        $rules = [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'mobile' => 'required|max:30',
            'country_id' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ];

        $this->validate($request, $rules);
        $get_area_of_expertises = $request->area_of_expertise;
        $str_array = '';
        if(count($get_area_of_expertises) > 0){
            $last_ele = end($get_area_of_expertises);
            foreach($get_area_of_expertises as $row){
                if($row==$last_ele){
                    $str_array .= $row;
                }else{
                    $str_array .= $row.',';
                }
            }
        }
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'name' => $request->first_name.' '.$request->last_name,
            'mobile' => $request->mobile,
            'country_id' => $request->country_id,
            'area_of_expertise' => $str_array,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_type' => $request->user_as,
            'active_status' => 1
        ]);
        if ($user){
            $this->loginPost($request);
            Session::flash('success','Successfully Registered!');
        }
        return back()->with('error', __t('failed_try_again'))->withInput($request->input());
    }


    public function registerPost(Request $request){
        $rules = [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'mobile' => 'required|max:30',
            'interested_course' => 'required',
            'country_id' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ];

        $this->validate($request, $rules);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'name' => $request->first_name.' '.$request->last_name,
            'mobile' => $request->mobile,
            'interested_course' => $request->interested_course,
            'country_id' => $request->country_id,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_type' => $request->user_as,
            'active_status' => 1
        ]);
        if ($user){
            $this->loginPost($request);
            Session::flash('success','Successfully Registered!');
        }
        return back()->with('error', __t('failed_try_again'))->withInput($request->input());
    }

    public function logoutPost(){
        Auth::logout();
        return redirect('login');
    }

    public function forgotPassword(){
        $title = __t('forgot_password');
        return view(theme('auth.forgot_password'), compact('title'));
    }

    public function sendResetToken(Request $request){
        $this->validate($request, ['email' => 'required']);

        $email = $request->email;

        $user = User::whereEmail($email)->first();
        if ( ! $user){
            return back()->with('error', __t('email_not_found'));
        }

        $user->reset_token = str_random(32);
        $user->save();

        try {
            Mail::to($email)->send(new SendPasswordResetLink($user));
        }catch (\Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    public function passwordResetForm(){
        $title = __t('reset_your_password');
        return view(theme('auth.reset_form'), compact('title'));
    }

    public function passwordReset(Request $request, $token){
        if(config('app.is_demo')){
            return redirect()->back()->with('error', 'This feature has been disable for demo');
        }
        $rules = [
            'password'  => 'required|confirmed',
            'password_confirmation'  => 'required',
        ];
        $this->validate($request, $rules);

        $user = User::whereResetToken($token)->first();
        if ( ! $user){
            return back()->with('error', __t('invalid_reset_token'));
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect(route('login'))->with('success', __t('password_reset_success'));
    }

    /**
     * Social Login Settings
     */

    public function redirectFacebook(){
        return Socialite::driver('facebook')->redirect();
    }
    public function redirectGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function redirectTwitter(){
        return Socialite::driver('twitter')->redirect();
    }
    public function redirectLinkedIn(){
        return Socialite::driver('linkedin')->redirect();
    }

    public function callbackFacebook(){
        try {
            $socialUser = Socialite::driver('facebook')->user();
            $user = $this->getSocialUser($socialUser, 'facebook');
            auth()->login($user);
            return redirect()->intended(route('dashboard'));
        } catch (\Exception $e){
            return redirect(route('login'))->with('error', $e->getMessage());
        }
    }

    public function callbackGoogle(){
        try {
            $socialUser = Socialite::driver('google')->user();
            $user = $this->getSocialUser($socialUser, 'google');
            auth()->login($user);
            return redirect()->intended(route('dashboard'));
        } catch (\Exception $e){
            return redirect(route('login'))->with('error', $e->getMessage());
        }
    }
    public function callbackTwitter(){
        try {
            $socialUser = Socialite::driver('twitter')->user();
            $user = $this->getSocialUser($socialUser, 'twitter');
            auth()->login($user);
            return redirect()->intended(route('dashboard'));
        } catch (\Exception $e){
            return redirect(route('login'))->with('error', $e->getMessage());
        }
    }
    public function callbackLinkedIn(){
        try {
            $socialUser = Socialite::driver('linkedin')->user();
            $user = $this->getSocialUser($socialUser, 'linkedin');
            auth()->login($user);
            return redirect()->intended(route('dashboard'));
        } catch (\Exception $e){
            return redirect(route('login'))->with('error', $e->getMessage());
        }
    }

    public function getSocialUser($providerUser, $provider = ''){
        $user = User::whereProvider($provider)->whereProviderUserId($providerUser->getId())->first();

        if ($user) {
            return $user;
        } else {

            $user = User::whereEmail($providerUser->getEmail())->first();
            if ($user) {

                $user->provider_user_id = $providerUser->getId();
                $user->provider = $provider;
                $user->save();

            }else{
                $user = User::create([
                    'email'             => $providerUser->getEmail(),
                    'name'              => $providerUser->getName(),
                    'user_type'         => 'user',
                    'active_status'     => 1,
                    'provider_user_id'  => $providerUser->getId(),
                    'provider'          => $provider,
                ]);
            }

            return $user;
        }
    }

}
