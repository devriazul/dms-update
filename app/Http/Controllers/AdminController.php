<?php

namespace App\Http\Controllers;

use App\Course;
use App\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Earning;
use App\CourseUser;

class AdminController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     *
     * Landing page of dashboard
     */
    public function index(){
        $title = __a('dashboard');

        /**
         * Format Date Name
         */
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

        $sql = "SELECT SUM(total_amount) as total_amount,
              DATE(created_at) as date_format
              from payments
              WHERE status = 'success'
              AND (created_at BETWEEN '{$start_date}' AND '{$end_date}')
              GROUP BY date_format
              ORDER BY created_at ASC ;";
        $getEarnings = DB::select(DB::raw($sql));

        $total_amount = array_pluck($getEarnings, 'total_amount');
        $queried_date = array_pluck($getEarnings, 'date_format');

        $dateWiseSales = array_combine($queried_date, $total_amount);

        $chartData = array_merge($datesPeriod, $dateWiseSales);
        foreach ($chartData as $key => $salesCount){
            unset($chartData[$key]);

            $formatDate = date('d M', strtotime($key));
            //$formatDate = date('d', strtotime($key));
            $chartData[$formatDate] = $salesCount ? $salesCount : 0;
        }
        //craete total course, user, instructor
        $toral_course = Course::where('status',1)->count();
        $toral_instructor = User::where('user_type','instructor')->count();
        $toral_student = User::where('user_type','student')->count();
        $total_data = $toral_course.','.$toral_instructor.','.$toral_student;
        //craete month wise earning 
        $datayear = array();
        for ($i = 11; $i >= 0; $i--) {
            $month = Carbon::today()->startOfMonth()->subMonth($i);
            $year = Carbon::today()->startOfMonth()->subMonth($i)->format('Y');
            $monthdata = Carbon::today()->startOfMonth()->subMonth($i)->format('m');
            array_push($datayear, array(
                'month' => $month->monthName,
                'year' => $year,
                'monthdata'=>$monthdata,
                'earnings'=>Earning::where('payment_status','success')->whereYear('created_at',$year)->whereMonth('created_at',$monthdata)->sum('amount'),
                'count_instructor'=>User::where('user_type','instructor')->whereYear('created_at',$year)->whereMonth('created_at',$monthdata)->count(),
                'count_student'=>User::where('user_type','student')->whereYear('created_at',$year)->whereMonth('created_at',$monthdata)->count(),
                'count_course'=>Course::where('status',1)->whereYear('created_at',$year)->whereMonth('created_at',$monthdata)->count(),
                'enrole_course'=>CourseUser::whereYear('added_at',$year)->whereMonth('added_at',$monthdata)->count(),
            ));
        }
        $month_data = '';
        $earning_data = '';
        $instructor_data = '';
        $student_data = '';
        $course_data = '';
        $enrole_course_data = '';
        $last_month_el = end($datayear);
        foreach($datayear as $row){
            if($row['month']){
                if($last_month_el==$row){
                    $month_data .= '"'.$row['month'].'"';
                }else{
                    $month_data .= '"'.$row['month'].'"'.',';
                }
            }
            if($row['earnings'] && empty($row['earnings'])){
                if($last_month_el==$row){
                    $earning_data .= 0.0;
                }else{
                    $earning_data .= 0.0 .',';
                }
            }else{
                if($last_month_el==$row){
                    $earning_data .= $row['earnings'];
                }else{
                    $earning_data .= $row['earnings'] .',';
                }
            }
            //instructor data
            if($row['count_instructor'] && empty($row['count_instructor'])){
                if($last_month_el==$row){
                    $instructor_data .= 0.0;
                }else{
                    $instructor_data .= 0.0 .',';
                }
            }else{
                if($last_month_el==$row){
                    $instructor_data .= $row['count_instructor'];
                }else{
                    $instructor_data .= $row['count_instructor'].',';
                }
            }
            //student data
            if($row['count_student'] && empty($row['count_student'])){
                if($last_month_el==$row){
                    $student_data .= 0.0;
                }else{
                    $student_data .= 0.0 .',';
                }
            }else{
                if($last_month_el==$row){
                    $student_data .= $row['count_student'];
                }else{
                    $student_data .= $row['count_student'].',';
                }
            }
            //course data
            if($row['count_course'] && empty($row['count_course'])){
                if($last_month_el==$row){
                    $course_data .= 0.0;
                }else{
                    $course_data .= 0.0 .',';
                }
            }else{
                if($last_month_el==$row){
                    $course_data .= $row['count_course'];
                }else{
                    $course_data .= $row['count_course'].',';
                }
            }
            //enrole course data
            if($row['enrole_course'] && empty($row['enrole_course'])){
                if($last_month_el==$row){
                    $enrole_course_data .= 0.0;
                }else{
                    $enrole_course_data .= 0.0 .',';
                }
            }else{
                if($last_month_el==$row){
                    $enrole_course_data .= $row['enrole_course'];
                }else{
                    $enrole_course_data .= $row['enrole_course'].',';
                }
            }
            
        }
        //echo $month_data;exit();
        return view('admin.dashboard', compact('title', 'chartData','total_data','month_data','earning_data','instructor_data','student_data','course_data','enrole_course_data'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     *
     * Show all courses to the admin.
     */
    public function adminCourses(Request $request){
        $ids = $request->bulk_ids;
        $now = Carbon::now()->toDateTimeString();

        if ($request->bulk_action_btn){
            if(config('app.is_demo')) return back()->with('error', __a('demo_restriction'));
        }

        //Update
        if ($request->bulk_action_btn === 'update_status' && $request->status && is_array($ids) && count($ids)){
            $data = ['status' => $request->status];

            if ($request->status == 1){
                $data['published_at'] = $now;
            }

            Course::whereIn('id', $ids)->update($data);
            return back()->with('success', __a('bulk_action_success'));
        }
        if ($request->bulk_action_btn === 'mark_as_popular' && is_array($ids) && count($ids)){
            Course::whereIn('id', $ids)->update(['is_popular' => 1, 'popular_added_at' => $now]);
            return back()->with('success', __a('bulk_action_success'));
        }
        if ($request->bulk_action_btn === 'mark_as_feature' && is_array($ids) && count($ids)){
            Course::whereIn('id', $ids)->update(['is_featured' => 1, 'featured_at' => $now]);
            return back()->with('success', __a('bulk_action_success'));
        }

        if ($request->bulk_action_btn === 'remove_from_popular' && is_array($ids) && count($ids)){
            Course::whereIn('id', $ids)->update(['is_popular' => null, 'popular_added_at' => null]);
            return back()->with('success', __a('bulk_action_success'));
        }
        if ($request->bulk_action_btn === 'remove_from_feature' && is_array($ids) && count($ids)){
            Course::whereIn('id', $ids)->update(['is_featured' => null, 'featured_at' => null]);
            return back()->with('success', __a('bulk_action_success'));
        }

        //Delete
        if ($request->bulk_action_btn === 'delete' && is_array($ids) && count($ids)){
            foreach ($ids as $id){
                Course::find($id)->delete_and_sync();
            }
            return back()->with('success', __a('bulk_action_success'));
        }

        $title = __a('courses');
        $courses = Course::query()->where('status', '>', 0);
        if ($request->filter_status){
            $courses = $courses->whereStatus($request->filter_status);
        }
        if ($request->q){
            $courses = $courses->where('title', 'LIKE', "%{$request->q}%");
        }

        if ($request->filter_by === 'popular'){
            $courses = $courses->where('is_popular', 1);
            $courses = $courses->orderBy('popular_added_at', 'desc');
        }elseif($request->filter_by === 'featured'){
            $courses = $courses->where('is_featured', 1);
            $courses = $courses->orderBy('featured_at', 'desc');
        }else{
            $courses = $courses->orderBy('last_updated_at', 'desc');
        }
        $courses = $courses->paginate(20);

        return view('admin.courses.courses', compact('title', 'courses'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     *
     * Withdraw requests
     */
    public function withdrawsRequests(Request $request){
        if ($request->bulk_action_btn){
            if(config('app.is_demo')) return back()->with('error', __a('demo_restriction'));
        }

        if ($request->bulk_action_btn === 'update_status' && $request->update_status){
            Withdraw::whereIn('id', $request->bulk_ids)->update(['status' => $request->update_status]);
            return back();
        }
        if ($request->bulk_action_btn === 'delete'){
            Withdraw::whereIn('id', $request->bulk_ids)->delete();
            return back();
        }


        $title = __a('withdraws');
        $withdraws = Withdraw::query();

        if ($request->status){
            if ($request->status !== 'all'){
                $withdraws = $withdraws->where('status', $request->status);
            }
        }else{
            $withdraws = $withdraws->where('status', 'pending');
        }

        $withdraws = $withdraws->orderBy('created_at', 'desc')->paginate(50);

        return view('admin.withdraws', compact('title', 'withdraws'));
    }

}
