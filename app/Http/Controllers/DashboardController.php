<?php

namespace App\Http\Controllers;

use App\Complete;
use App\Course;
use App\Enroll;
use App\Payment;
use App\Attempt;
use App\AssignmentSubmission;
use App\Content;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDF;

class DashboardController extends Controller
{
    public function test(){
        return "Hello world";
    }
    public function index(){
        $title = __t('dashboard');

        $user = Auth::user();
        if ($user->isInstructor) {
            $start_date = date("Y-m-01");
            $end_date = date("Y-m-t");

            $begin = new \DateTime($start_date);
            $end = new \DateTime($end_date.' + 1 day');
            $interval = \DateInterval::createFromDateString('1 day');
            $period = new \DatePeriod($begin, $interval, $end);

            $datesPeriod = array();
            foreach ($period as $dt) {
                $datesPeriod[$dt->format("Y-m-d")] = 0;
            }

            /**
             * Query This Month
             */

            $sql = "SELECT SUM(instructor_amount) as total_earning,
                DATE(created_at) as date_format
                from earnings
                WHERE instructor_id = {$user->id} AND payment_status = 'success'
                AND (created_at BETWEEN '{$start_date}' AND '{$end_date}')
                GROUP BY date_format
                ORDER BY created_at ASC ;";
            $getEarnings = DB::select(DB::raw($sql));

            $total_earning = array_pluck($getEarnings, 'total_earning');
            $queried_date = array_pluck($getEarnings, 'date_format');


            $dateWiseSales = array_combine($queried_date, $total_earning);

            $chartData = array_merge($datesPeriod, $dateWiseSales);
            foreach ($chartData as $key => $salesCount){
                unset($chartData[$key]);
                //$formatDate = date('d M', strtotime($key));
                $formatDate = date('d', strtotime($key));
                $chartData[$formatDate] = $salesCount;
            }
            $total_course = Course::where('user_id',Auth::user()->id)->count();
            $total_assignments = Content::where('user_id',Auth::user()->id)->where('item_type','lecture')->count();
            $total_quizzes = Content::where('user_id',Auth::user()->id)->where('item_type','quiz')->count();
            return view(theme('dashboard.instructor_dashboard'), compact('title','total_course','total_assignments','total_quizzes','chartData'));
        }
        $chartData = null;
        // if ($user->isInstructor || $user->isUniversity()) {
            /**
             * Format Date Name
             */
            $start_date = date("Y-m-01");
            $end_date = date("Y-m-t");

            $begin = new \DateTime($start_date);
            $end = new \DateTime($end_date . ' + 1 day');
            $interval = \DateInterval::createFromDateString('1 day');
            $period = new \DatePeriod($begin, $interval, $end);

            $datesPeriod = array();
            foreach ($period as $dt) {
                $datesPeriod[$dt->format("Y-m-d")] = 0;
            }

            /**
             * Query This Month
             */

            $sql = "SELECT SUM(instructor_amount) as total_earning,
              DATE(created_at) as date_format
              from earnings
              WHERE instructor_id = {$user->id} AND payment_status = 'success'
              AND (created_at BETWEEN '{$start_date}' AND '{$end_date}')
              GROUP BY date_format
              ORDER BY created_at ASC ;";
            $getEarnings = DB::select(DB::raw($sql));

            $total_earning = array_pluck($getEarnings, 'total_earning');
            $queried_date = array_pluck($getEarnings, 'date_format');


            $dateWiseSales = array_combine($queried_date, $total_earning);

            $chartData = array_merge($datesPeriod, $dateWiseSales);
            foreach ($chartData as $key => $salesCount) {
                unset($chartData[$key]);
                //$formatDate = date('d M', strtotime($key));
                $formatDate = date('d', strtotime($key));
                $chartData[$formatDate] = $salesCount;
            }
            $total_enrole_courses = 0;
            $total_complete_modules = 0;
            $quizzes_score = 0;
            $like_courses = 0;
            $assignment_score = '';
            $my_certicates = 0;
            $my_assignments = 0;
            $total_courses = Course::where('status',1)->count();
            $get_my_courses = Course::where('status',1)->get();
            $arr_str = '';
            $total_enroll = Enroll::where('user_id',Auth::user()->id)->count();
            $like_courses = Auth::user()->wishlist()->publish()->count();
            $my_assignments = AssignmentSubmission::where('user_id',Auth::user()->id)->count();

            $get_enroll_courses = Enroll::where('user_id',Auth::user()->id)->get();
            if($get_enroll_courses){
                foreach($get_enroll_courses as $row){
                    if(end($row)){
                        $arr_str .= $row->course_id;
                    }else{
                        $arr_str .= $row->course_id.',';
                    }
                }
                $total_enrole_courses = Enroll::whereIn('course_id',[$arr_str])->where('user_id',Auth::user()->id)->where('status','success')->count();
                $total_complete_modules = Complete::where('user_id',Auth::user()->id)->whereIn('completed_course_id',[$arr_str])->count();
                foreach($get_enroll_courses as $crow){
                    $get_course = Course::where('id',$crow->course_id)->first();
                    if($get_course){
                        $calculate = $get_course->completed_percent();
                        //dd($calculate);
                        if($calculate==100){
                            $my_certicates += 1;
                        }
                    }
                }
            }
            $course_module_result = $total_enroll.','.$like_courses.','.$total_enrole_courses;
            $get_quizzes = Attempt::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->take(5)->get();
            if($get_quizzes){
                foreach($get_quizzes as $qrow){
                    if(end($qrow)){
                        $quizzes_score .= $qrow->earned_percent;
                    }else{
                        $quizzes_score .= $qrow->earned_percent.',';
                    }
                }
            }
            $get_assignments = AssignmentSubmission::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->take(10)->get();
            if($get_assignments){
                foreach($get_assignments as $arow){
                    if(end($arow)){
                        $assignment_score .= $arow->earned_numbers;
                    }else{
                        $assignment_score .= $arow->earned_numbers.',';
                    }
                }
            }
            //dd($assignment_score);
            
        // }

        return view(theme('dashboard.dashboard'), compact('title', 'chartData','course_module_result','quizzes_score','assignment_score','get_enroll_courses','my_certicates','my_assignments'));
    }
    //certificate show 
    public function preview_certificate($id=NULL){
        $checkEnroll = Enroll::where('id',$id)->where('status','success')->first();
        if(!$checkEnroll){
            abort(404);
        }
        $getUserInfo = User::where('id',$checkEnroll->user_id)->first();
        if($getUserInfo->id != Auth::user()->id){
            return back()->with('error', 'You don,t have any permission to this certificate!');
        }
        $course = Course::where('id',$checkEnroll->course_id)->first();
        $return_date = date('F d Y',time());
        //qr code link create 
        $link = 'verify/certificate/'.$checkEnroll->id.'/preview';
        return view(theme('dashboard.certificate'),compact('getUserInfo','course','return_date','link'));
    }
    public function verify_certificate($id=NULL,$preview=NULL){
        $checkEnroll = Enroll::where('id',$id)->where('status','success')->first();
        if(!$checkEnroll){
            abort(404);
        }
        $getUserInfo = User::where('id',$checkEnroll->user_id)->first();
        
        $course = Course::where('id',$checkEnroll->course_id)->first();
        $return_date = date('F d Y',time());
        //qr code link create 
        $link = 'verify/certificate/'.$checkEnroll->id.'/preview';
        return view(theme('dashboard.verify_certificate'),compact('getUserInfo','course','return_date','link'));
    }

    public function profileSettings(){
        $title = __t('profile_settings');
        return view(theme('dashboard.settings.profile'), compact('title'));
    }

    public function profileSettingsPost(Request $request){
        // $rules = [
        //     'name'      => 'required',
        //     'job_title' => 'max:220',
        // ];
        // $this->validate($request, $rules);
        //return $request->all();
        $select = '';
        $name = '';
        $name = $request->input('first_name').' '.$request->input('last_name');
        $input = array_except($request->input(), ['_token', 'social']);
        if(Auth::user()->user_type=='instructor'){
            $arr_area = $request->input('area_of_expertise');
            if(count($arr_area) > 0){
                $endval = end($arr_area);
                foreach($arr_area as $row){
                    if($endval==$row){
                        $select .= $row;
                    }else{
                        $select .= $row.',';
                    }
                }
            }
        }
        $user = Auth::user();
        $user->update($input);
        $user->update(['name'=>$name,'area_of_expertise'=>$select]);
        $user->update_option('social', $request->social);

        return back()->with('success', __t('success'));
    }

    public function resetPassword(){
        $title = __t('reset_password');
        return view(theme('dashboard.settings.reset_password'), compact('title'));
    }

    public function resetPasswordPost(Request $request){
        if(config('app.is_demo')){
            return redirect()->back()->with('error', 'This feature has been disable for demo');
        }
        $rules = [
            'old_password'  => 'required',
            'new_password'  => 'required|confirmed',
            'new_password_confirmation'  => 'required',
        ];
        $this->validate($request, $rules);

        $old_password = clean_html($request->old_password);
        $new_password = clean_html($request->new_password);

        if(Auth::check()) {
            $logged_user = Auth::user();

            if(Hash::check($old_password, $logged_user->password)) {
                $logged_user->password = Hash::make($new_password);
                $logged_user->save();
                return redirect()->back()->with('success', __t('password_changed_msg'));
            }
            return redirect()->back()->with('error', __t('wrong_old_password'));
        }
    }

    public function enrolledCourses(){
        $title = __t('enrolled_courses');
        return view(theme('dashboard.enrolled_courses'), compact('title'));
    }

    public function myReviews(){
        $title = __t('my_reviews');
        return view(theme('dashboard.my_reviews'), compact('title'));
    }

    public function wishlist(){
        $title = __t('wishlist');
        return view(theme('dashboard.wishlist'), compact('title'));
    }

    public function purchaseHistory(){
        $title = __t('purchase_history');
        return view(theme('dashboard.purchase_history'), compact('title'));
    }

    public function purchaseView($id){
        $title = __a('purchase_view');
        $payment = Payment::find($id);
        return view(theme('dashboard.purchase_view'), compact('title', 'payment'));
    }

}
