<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Profiles;
use App\Courses;
use App\CourseReg;
use App\CourseStatus;
use App\Fee;
use App\Session;
use App\Attendance;
use App\Result;
use App\WeightResult;
use App\StudentFee;
use Carbon\Carbon;
use View;
use Auth;
use Hash;
use Illuminate\Support\Facades\Input;
//use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $total_crhrs;
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function changepasswordstud(){
        return view('changepasswordstud');
    }

    public function changedpasswordstud(Request $request){
        $this->validate($request,[
            'cpassword' => 'required', 
            'password' => 'required|string|min:8|confirmed'
        ]);
        $temp_id = Auth::user()->id;
        $c_pass = $request->input('cpassword');
        $newPassword = Auth::user()->password;
        if(Hash::check($c_pass,$newPassword)){
            $data = array(
                'password' => bcrypt($request->input('password'))
            );

            Profiles::where('id',$temp_id)->update($data);
            return redirect('/home')->with('info','Your password is successfully changed!'); 

        }else{
            return redirect('changepasswordstud')->with('info','Sorry, Incorrect Current Password!');
        }
    }

    public function courses()
    {
        $id = Auth::user()->id;
        $profiles = Profiles::find($id);
        $temp_stud = $profiles['id'];
        $course_regs = CourseReg::whereRaw('stud_id=? ')->setBindings([$temp_stud])->get();
        $cs = CourseStatus::whereRaw('stud_id=?')->setBindings([$id])->get();
        $dt = Carbon::now()->toDateString();
        
        


        if(count($course_regs) > 0){
            foreach($course_regs->all() as $course){
                $this->total_crhrs+=$course->cr_hrs;
                $temp_session = $course->session_name;
                View::share ( 'total_crhrs', $this->total_crhrs );
            }
            $sess = Session::whereRaw('session_name=?')->setBindings([$temp_session])->get();
            if(count($sess) > 0){
                foreach($sess as $s){
                    $temp_coursedue = $s->course_duedate;
                    View::share ( 'temp_coursedue', $temp_coursedue);
                }
            }
        }else{
            $this->total_crhrs=0;
            View::share ( 'total_crhrs', $this->total_crhrs );
        }
        if(count($course_regs) > 0){
        if($temp_coursedue <= $dt){
            if(count($cs) > 0){
                foreach($cs as $c){
                    if($c->c_status == 0){
                        return view('courses2',['course_regs' => $course_regs]);
                    }
                    if($c->c_status == 1){
                        return view('courses',['course_regs' => $course_regs]);
                    }
                }
            }
        }else{
            $this->coursestatus();
            return view('courses3');
        }
        }else{
            return view('courses4');
        
    }
        
        
        
    

        /*else{
            $coursereg = CourseReg::whereRaw('stud_id=? ')->setBindings([$temp_stud])->get();
                
            $temp_crhrs= $coursereg['total_crhrs'];
            View::share ( 'total_crhrs', $temp_crhrs );
            return view('courses2',['course_reg' => $coursereg]);
        }*/    
        
    }

    public function addsubject(){
        $id = Auth::user()->id;
        $profiles = Profiles::find($id);
        $temp_sem = $profiles['semester'];
        $temp_pro = $profiles['program'];
        $se1 = Session::all();
            foreach($se1->all() as $se){
                $tempse = $se->session_name;
            }
        $courses = Courses::whereRaw('program=? and session_name=? and semester_id between 1 and ?')->setBindings([$temp_pro,$tempse,$temp_sem])->get();
        return view('addsubject',['courses' => $courses]);
    }

    public function addedsubject(Request $request){
        $this->validate($request,[
            'course_title' => 'required'
        ]);
 
        
        $temp_stud = Auth::user()->id;    
        $coursereg = CourseReg::whereRaw('stud_id=?')->setBindings([$temp_stud])->get();
        $temp_crhrs = 0;
        if(count($coursereg) > 0){
            foreach($coursereg->all() as $course){
                $temp_crhrs+=$course->cr_hrs;
                if($course->course_title == $request->input('course_title')){
                    return redirect('/addsubject')->with('info','This course is already added!');
                }
            }
        }

            $course_regs = new CourseReg;
            $profiles = Profiles::find($temp_stud);
            $temp_pro = $profiles['program'];
            $course_regs->course_title = $request->input('course_title');
            $temp_title = $course_regs->course_title;
            $getcc = Courses::whereRaw('course_title = ? and program = ?')->setBindings([$temp_title,$temp_pro])->get();
            if(count($getcc) > 0){
                foreach($getcc->all() as $get){
                    $insert_code = $get->code;
                    $insert_crhrs = $get->cr_hrs;
                    $insert_session = $get->session_name;    
                }
            }
            $check =$temp_crhrs + $insert_crhrs; 
            if($check > 19){
                return redirect('/courses2')->with('info','Sorry you cannot add more course. The maximum limit of credit hours is 19!');
            }else{
                $course_regs->code = $insert_code;
                $course_regs->cr_hrs = $insert_crhrs;
                $course_regs->stud_id = $temp_stud;
                $course_regs->session_name = $insert_session;
                $course_regs->save();

                return redirect('/courses2')->with('info','New Course is successfully added!');
            }
        

    }

    public function dropsubject($id){
        
        CourseReg::where('id',$id)->delete();
        return redirect('/courses2')->with('info','Course droped successfully!');
    }    


    public function editbystud(){
        $id = Auth::user()->id;
        $profiles = Profiles::find($id);
        return view('editbystud', ['profiles' => $profiles]);
    }

    public function editedbystud(Request $request){
        $id = Auth::user()->id;
        $this->validate($request,[
            'address' => 'required',
            'city' => 'required',
            'phone' => "required|unique:profiles,phone,$id"
        ]);
        $data = array(

            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'phone' => $request->input('phone')
        );

        Profiles::where('id',$id)->update($data);
            
        return redirect('/home')->with('info','Your profile is successfully updated!');
    }

    public function coursestatus(){
        $id = Auth::user()->id;    
        $cs = CourseStatus::whereRaw('stud_id=?')->setBindings([$id])->get();
        $data = array(
            'c_status' => 1
        );
        CourseStatus::where('stud_id',$id)->update($data);
        $course_regs = CourseReg::whereRaw('stud_id=? ')->setBindings([$id])->get();
        
        
        if(count($course_regs) > 0){
            foreach($course_regs->all() as $course){
                $this->total_crhrs+=$course->cr_hrs;
                View::share ( 'total_crhrs', $this->total_crhrs );
            }
        }else{
            $this->total_crhrs=0;
            View::share ( 'total_crhrs', $this->total_crhrs );
        }
        
        return view('courses',['course_regs' => $course_regs])->with('info','Successfully registered please pay your fees before due date!');

    }



    public function studfee(){

        $temp_stud = Auth::user()->id;    
        $coursereg = CourseReg::whereRaw('stud_id=?')->setBindings([$temp_stud])->get();
        $cs = CourseStatus::whereRaw('stud_id=?')->setBindings([$temp_stud])->get();
        $dt = Carbon::now()->toDateString();

        $temp_crhrs = 0;

        if(count($cs) > 0){
            foreach($cs as $c){
                if($c->c_status == 0){
                    return view('studfee2');
                }
                if($c->c_status == 1){

                    if(count($coursereg) > 0){
                        foreach($coursereg->all() as $course){
                            $temp_crhrs+=$course->cr_hrs;
                            $temp_session = $course->session_name;
                            View::share ( 'temp_session', $temp_session);
                        }
                    }
                    $sess = Session::whereRaw('session_name=?')->setBindings([$temp_session])->get();
                    if(count($sess) > 0){
                        foreach($sess as $s){
                            $temp_feedue = $s->fee_duedate;
                            
                            View::share ( 'temp_feedue', $temp_feedue);
                        }
                    }
                    $temp_program = Auth::user()->program;
                    $temp_iid = Auth::user()->id;
                    $se = Auth::user()->semester;
                    $temp_id = $se."-".$temp_iid;
                    View::share ( 'temp_id', $temp_id);
                    
                    $fee = Fee::whereRaw('session_name=? and program=?')->setBindings([$temp_session,$temp_program])->get();
                    
                    if(count($fee) > 0){
                        foreach($fee as $f){

                            $temp_unifee = $temp_crhrs * $f->ch_fee;
                            $temp_regfee = $f->reg_fee;
                            $temp_others = $f->others;
                            $total_amount = $temp_unifee+$temp_regfee+$temp_others;
                            View::share ( 'temp_unifee', $temp_unifee);
                            View::share ( 'temp_regfee', $temp_regfee);
                            View::share ( 'temp_others', $temp_others);
                            View::share ( 'total_amount', $total_amount);
                            
                        }
                    }
 

                    if(Auth::user()->faculity == "Basic and Applied Sciences"){
                        
                        $temp_bank = "Al Baraka Bank (Pakistan)Ltd.";
                        $ac_no = "0120218518013";
                        View::share ( 'temp_bank', $temp_bank);
                        View::share ( 'ac_no', $ac_no);

                    }else{
                        $temp_bank = "HABIB BANK LIMITED";
                        $ac_no = "5006-00173192-03";
                        View::share ( 'temp_bank', $temp_bank);
                        View::share ( 'ac_no', $ac_no);
                    }
                    
                    if($temp_feedue >= $dt){
                        return view('studfee',['coursereg'=>$coursereg]);
                    }else{
                        $sff = StudentFee::where('id',$temp_stud)->get();
                        if(count($sff) > 0){
                            foreach($sff as $sf){
                                $temp_feecheck = $sf->remain;
                            }
                            if($temp_feecheck == 0){
                                return view('studfee5');
                            }else{
                                return view('studfee6');
                            }
                        }else{
                            return view('studfee3');
                        }
                        
                        
                    }
                    
                }
            }
        }else{
            return view('studfee4');
        }

        
    }

    public function fullfee()
    {
        
        //$pdf = PDF::loadView('studfee');
        //return $pdf->download('studfee.pdf');

        
    }

    public function installment($data)
    {
        $temp_stud = Auth::user()->id;    
        $coursereg = CourseReg::whereRaw('stud_id=?')->setBindings([$temp_stud])->get();
        if(count($coursereg) > 0){
            foreach($coursereg->all() as $course){
                $temp_session = $course->session_name;
                View::share ( 'temp_session', $temp_session);
            }
        }
        $sess = Session::whereRaw('session_name=?')->setBindings([$temp_session])->get();
        if(count($sess) > 0){
            foreach($sess as $s){
                $temp_feedue = $s->fee_duedate;
                $temp_instaldue = $s->instal_duedate;
                View::share ( 'temp_instaldue', $temp_instaldue);
                View::share ( 'temp_feedue', $temp_feedue);
            }
        }
        $inst = $data/2;
        View::share ( 'inst', $inst);
        return view('installment',['data'=>$data]);

    }

    public function rollnoslip(){

        $id = Auth::user()->id;
        $profiles = Profiles::find($id);
        $temp_stud = $profiles['id'];
        $course_regs = CourseReg::whereRaw('stud_id=? ')->setBindings([$temp_stud])->get();
        $attend = Attendance::whereRaw('id=?')->setBindings([$temp_stud])->get();
        if(count($attend) > 0){
            foreach($attend as $att){
                if($att->attend_perc == "prevent"){
                    return view('rollnoslip2');
                }else{
                    
                    foreach($course_regs as $cr){
                        $temp_session = $cr->session_name;
                        View::share ( 'temp_session', $temp_session);

                    }
                    $sessions = Session::whereRaw('session_name=?')->setBindings([$temp_session])->get();
                    foreach($sessions as $s){
                        $temp_examdate = $s->exam_date;
                        View::share ( 'temp_examdate', $temp_examdate);
                    }
                    
                    return view('rollnoslip',['course_regs' => $course_regs]);
                }
            }
        }else{
            return view('rollnoslip3');
        }
        
    }

    public function studresults(){
        $id = Auth::user()->id;
        $profiles = Profiles::find($id);
        $temp_stud = $profiles['id'];
        $results = Result::whereRaw('stud_id=? ')->setBindings([$temp_stud])->get();
        $w_result = WeightResult::whereRaw('stud_id=? ')->setBindings([$temp_stud])->get();

        if(count($w_result) > 0){
            return view('studresults',['results'=>$results],['w_result'=>$w_result]);
        }else{
            return view('studresults2');
        }

        
    }



    public function store(Request $request)
    {
        /*$user = new StudentProfile;
        $user->name = Input::get('name');
        $user->fathername = Input::get('fathername');
        $user->email = Input::get('email');
        $user->mobile = Input::get('mobile');
        $user->gender = Input::get('gender');
        $user->faculty = Input::get('faculty');
        $user->department = Input::get('department');
        $user->program = Input::get('program');
        $user->batch = Input::get('batch');
        $user->semester = Input::get('semester');
        $user->save();
        /*$u_fac = $user->faculty;
        $check_faculties = Faculties::where('id', 2)->get();
        if(count($check_faculties) > 0){
            foreach($check_faculties->all() as $check_facultie){
                $c_fac=$check_facultie->faculity_name;
            }
        }

        if($c_fac == $u_fac){
            return ("Mun");
        }
        $faculty_departments = FacultyDepartment::all();
        $departments = Departments::all();
        if( $user->faculty == "Arabic" && $user->department == "Department of Linguistics" && $user->program == "BS Arabic" && $user->semester == "1")
        {
            //$course= new Courses;
            
            return view('confirmation', ['faculty_departments' => $faculty_departments],['departments' => $departments]);
        }

        return ("confirmation");*/
    }

}
