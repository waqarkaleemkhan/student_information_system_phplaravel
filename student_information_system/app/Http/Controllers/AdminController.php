<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profiles;
use App\CourseReg;
use App\Courses;
use App\Session;
use App\StudentFee;
use App\CourseStatus;
use App\Fee;
use App\Attendance;
use App\Result;
use App\WeightResult;
use App\Admin;
use Input;
use Mail;
use Auth;
use File;
use Hash;
use DB;
use View;
use App\Mail\verifyEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{

    use RegistersUsers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public $total_crhrs;
    public function __construct()
    {
       $this->middleware('auth:admin');
       $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        $profiles = Profiles::all();
        return view('admin.home', ['profiles' => $profiles]);
    }


    public function coursereporter(){
        return view('admin.coursereporter');
    }

    public function feereporter(){
        return view('admin.feereporter');
    }

    public function resultreporter(){
        return view('admin.resultreporter');
    }



    public function reports(){
        return view('admin.reports');
    }

    public function feereport(){
        return view('admin.feereport');
    }

    public function coursereport(){
        return view('admin.coursereport');
    }

    public function resultreport(){
        return view('admin.resultreport');
    }

    public function resultreportered(Request $request){
        $faculity = $request->input('faculity');
        $department = $request->input('department');
        $program = $request->input('program');
        $gender = $request->input('gender');
        $batch = $request->input('batch');
        $semester = $request->input('semester');
        $course_group = $request->input('course_group');
        $sort = $request->input('sort');
        $checker = $request->input('checker');
        $grades = $request->input('grades');
        $fee_status = $request->input('fee_status');
        $sortby = $request->input('sortby');
        $cr3 = 3;
        $cr4 = 4;
        if($grades =="A"){
            $marks = 80;
        }else if($grades == "B+"){
            $marks = 75;
        }else if($grades =="B"){
            $marks = 70;
        }else if($grades == "C+"){
            $marks = 65;
        }else if($grades =="C"){
            $marks = 60;
        }else if($grades == "D+"){
            $marks = 55;
        }else if($grades =="D"){
            $marks = 50;
        }else if($grades == "F"){
            $marks = 49;
        }else{
            $marks = 0;
        }

        if($course_group == "core"){

                $students = Profiles::whereRaw('faculity=? and department=? and program=? and gender=? and batch=? and semester=?')->setBindings([$faculity,$department,$program,$gender,$batch,$semester])->orderByRaw($sortby." ".$sort)->get();
                if(count($students) > 0){
                    
                    foreach($students as $s){
                        $studentresults = Result::whereRaw('cr_hrs=? and stud_id=? and marks'.$checker.'?')->setBindings([$cr4,$s->id,$marks])->get();
        
                            foreach($studentresults as $c){
                                $studresultdetails[] = [
                                    'stud_id' => $s->id
                                ];
                            }
                    }
                    
                }else{
                    $message = "No students records found";
                    View::share ( 'message', $message);
                    return view('admin.resultreporter');
                }

        }

        if($course_group == "other"){
            
            $students = Profiles::whereRaw('faculity=? and department=? and program=? and gender=? and batch=? and semester=?')->setBindings([$faculity,$department,$program,$gender,$batch,$semester])->orderByRaw($sortby." ".$sort)->get();
                
                if(count($students) > 0){
                    
                    foreach($students as $s){
                        $studentresults = Result::whereRaw('cr_hrs=? and stud_id=? and marks'.$checker.'?')->setBindings([$cr3,$s->id,$marks])->get();
        
                            foreach($studentresults as $c){
                                $studresultdetails[] = [
                                    'stud_id' => $s->id
                                ];
                            }
                    }
                    
                }else{
                    $message = "No students records found";
                    View::share ( 'message', $message);
                    return view('admin.resultreporter');
                }
            
        }

        
        $sids = array();
        foreach ($studresultdetails as $std) {
            $sids[] = $std['stud_id'];
        }
        $uniqueSids = array_unique($sids);

        $data = array(
            "faculity" => $faculity,
            "department" => $department,
            "program" => $program,
            "gender" => $gender,
            "batch" => $batch,
            "semester" => $semester,
            "course_group" => $course_group,
            "sort" => $sort,
            "sortby" => $sortby,
            "checker" => $checker,
            "grades" => $grades,
            "fee_status" => $fee_status
        );
        
        if($fee_status == "paid"){

            $profiles = StudentFee::whereRaw('id=? and remain=0')->setBindings([$uniqueSids])->get();
            if(count($profiles) > 0){
                return view('admin.resultreportered',['profiles'=>$profiles],['data'=>$data]);
            }else{
                $message = "No students records found";
                    View::share ( 'message', $message);
                    return view('admin.resultreporter');
            }
        }else{

            $profiles = StudentFee::whereRaw('id=? and remain>0')->setBindings([$uniqueSids])->get();
            if(count($profiles) > 0){
                return view('admin.resultreportered',['profiles'=>$profiles],['data'=>$data]);
            }else{
                $message = "No students records found";
                    View::share ( 'message', $message);
                    return view('admin.resultreporter');
            }
            
        }
        
        
    }

    public function feereportered(Request $request){
        $faculity = $request->input('faculity');
        $department = $request->input('department');
        $program = $request->input('program');
        $gender = $request->input('gender');
        $batch = $request->input('batch');
        $semester = $request->input('semester');
        $fee_status = $request->input('fee_status');
        $sort = $request->input('sort');
        //$studcourse = array();
        $fee_status2 = 0;
        if($fee_status == "clear"){

            $students = Profiles::whereRaw('faculity=? and department=? and program=? and gender=? and batch=? and semester=?')->setBindings([$faculity,$department,$program,$gender,$batch,$semester])->orderByRaw("reg ".$sort)->get();
            if(count($students) > 0){
            foreach($students as $student){
                    $sf = StudentFee::whereRaw('id=? and remain=?')->setBindings([$student->id,$fee_status2])->get();
                    if(count($sf) > 0){
                        foreach($sf as $c){
                            $studfeedetails[] = [  
                                'id' => $c->id,
                                'name'=> $c->name,  
                                'reg' => $c->reg,
                                'total_fee' => $c->total_fee,
                                'paid' => $c->paid,
                                'remain' => $c->remain,
                            ];
                        }
                    }else{
                        $message = "No students records found";
                        View::share ( 'message', $message);
                        return view('admin.feereporter');   
                    }    
                    
                }
            }else{
                $message = "No students records found";
                View::share ( 'message', $message);
                return view('admin.feereporter');
            }
        }

        if($fee_status == "remain"){

            $students = Profiles::whereRaw('faculity=? and department=? and program=? and gender=? and batch=? and semester=?')->setBindings([$faculity,$department,$program,$gender,$batch,$semester])->orderByRaw("reg ".$sort)->get();
            if(count($students) > 0){
            foreach($students as $student){
                    $sf = StudentFee::whereRaw('id=? and remain>?')->setBindings([$student->id,$fee_status2])->get();
                    if(count($sf) > 0){
                        foreach($sf as $c){
                            $studfeedetails[] = [  
                                'id' => $c->id,
                                'name'=> $c->name,  
                                'reg' => $c->reg,
                                'total_fee' => $c->total_fee,
                                'paid' => $c->paid,
                                'remain' => $c->remain,
                            ];
                        }
                    }else{
                        $message = "No students records found";
                        View::share ( 'message', $message);
                        return view('admin.feereporter');   
                    }
                        
                    
                }
            }else{
                $message = "No students records found";
                View::share ( 'message', $message);
                return view('admin.feereporter');
            }
        }

        $data = array(
            "faculity" => $faculity,
            "department" => $department,
            "program" => $program,
            "gender" => $gender,
            "batch" => $batch,
            "semester" => $semester,
            "fee_status" => $fee_status,
            "sort" => $sort
        );

        return view('admin.feereportered',['data' => $data],['studfeedetails' => $studfeedetails]);
        
            
       
        
    }

    public function coursereportered(Request $request){
        $faculity = $request->input('faculity');
        $department = $request->input('department');
        $program = $request->input('program');
        $gender = $request->input('gender');
        $batch = $request->input('batch');
        $semester = $request->input('semester');
        $c_name = $request->input('c_name');
        $sort = $request->input('sort');
        //$studcourse = array();


        $students = Profiles::whereRaw('faculity=? and department=? and program=? and gender=? and batch=? and semester=?')->setBindings([$faculity,$department,$program,$gender,$batch,$semester])->orderByRaw("reg ".$sort)->get();
        if(count($students) > 0){
            foreach($students as $student){
                
                $course = CourseReg::whereRaw('stud_id=? and course_title=?')->setBindings([$student->id,$c_name])->get();
                if(count($course) > 0){
                    foreach($course as $c){
                        $studcourse[] = [  
                            'stud_id' => $c['stud_id']  
                        ];
                    }
                }else{
                    $message = "No course found with specified course name field";
                    View::share ( 'message', $message);
                    return view('admin.coursereporter');
                }    
                
            }
        }else{
            $message = "No students records found";
            View::share ( 'message', $message);
            return view('admin.coursereporter');
        }
        foreach($studcourse as $sc){
            $profiles = Profiles::whereRaw('id=?')->setBindings([$sc['stud_id']])->get();
            foreach($profiles as $pro){
                $studlist[] = [  
                    'id' => $pro['id'],
                    'name'=> $pro['name'],  
                    'reg' => $pro['reg'],
                ];
            }
            
        }

        $data = array(
            "faculity" => $faculity,
            "department" => $department,
            "program" => $program,
            "gender" => $gender,
            "batch" => $batch,
            "semester" => $semester,
            "c_name" => $c_name,
            "sort" => $sort
        );
        

        return view('admin.coursereportered',['data' => $data],['studlist' => $studlist]);
        
            
       
        
    }

    public function feereported(Request $request){
        $this->validate($request,[
            'faculity' => 'required',
            'department' => 'required',
            'program' => 'required',
            'gender' => 'required',
            'batch' => 'required',
            'semester' => 'required'
        ]);
        
        $faculity = $request->input('faculity');
        $department = $request->input('department');
        $program = $request->input('program');
        $gender = $request->input('gender');
        $batch = $request->input('batch');
        $semester = $request->input('semester');

        $total_fees = 0;
        $total_paids = 0;
        $total_remains = 0;

        $sf = StudentFee::all();
        if(count($sf) > 0){
            foreach($sf->all() as $s){

                $profiles = Profiles::whereRaw('id=? and faculity = ? and department=? and program=? and gender=? and batch=? and semester=?')->setBindings([$s->id,$faculity,$department,$program,$gender,$batch,$semester])->get();
                if(count($profiles) > 0){
                foreach($profiles as $pro){
                   $sfff = StudentFee::whereRaw('id=?')->setBindings([$pro->id])->get();
                   foreach($sfff as $sff){
                    $studfee[] = [  
                        'id' => $sff['id'],
                        'name'=> $sff['name'],  
                        'reg' => $sff['reg'],
                        'doj' => $sff['doj'],
                        'total_fee' => $sff['total_fee'],
                        'paid' => $sff['paid'],
                        'remain' => $sff['remain']
                    ];
                    $total_fees += $sff['total_fee'];
                    $total_paids += $sff['paid'];
                    $total_remains += $sff['remain'];
                   }
                   
                }
                
            }
            }

        }
        //dd($studfee);
        
        
        if($total_fees == 0){
            return view('admin.feereportlist2');    
        }
        $data = array(
            "faculity" => $faculity,
            "department" => $department,
            "program" => $program,
            "gender" => $gender,
            "batch" => $batch,
            "semester" => $semester,
            "total_fees" => $total_fees,
            "total_paids" => $total_paids,
            "total_remains" => $total_remains
        );
        
        return view('admin.feereportlist',['data' => $data],['studfee' => $studfee]);
        
    }

    public function coursereported(Request $request){
        $this->validate($request,[
            'faculity' => 'required',
            'department' => 'required',
            'program' => 'required',
            'gender' => 'required',
            'batch' => 'required',
            'semester' => 'required'
        ]);
        
        $faculity = $request->input('faculity');
        $department = $request->input('department');
        $program = $request->input('program');
        $gender = $request->input('gender');
        $batch = $request->input('batch');
        $semester = $request->input('semester');

        $data = array(
            "faculity" => $faculity,
            "department" => $department,
            "program" => $program,
            "gender" => $gender,
            "batch" => $batch,
            "semester" => $semester,
        );
      
        $profiles = Profiles::whereRaw('faculity = ? and department=? and program=? and gender=? and batch=? and semester=?')->setBindings([$faculity,$department,$program,$gender,$batch,$semester])->get();

        if(count($profiles) > 0){
            foreach($profiles as $pro){
                $studcourses[] = [  
                    'id' => $pro['id'],
                    'name'=> $pro['name'],  
                    'reg' => $pro['reg'],
                ];
            }
            return view('admin.coursereportlist',['data' => $data],['studcourses' => $studcourses]);
              
        }else{
            return view('admin.coursereportlist2');
        }

        /*$courseregs = CourseReg::select('stud_id')->distinct()->get();
        
        if(count($courseregs) > 0){
            foreach($courseregs as $cr){
                $profiles = Profiles::whereRaw('id=? and faculity = ? and department=? and program=? and gender=? and batch=? and semester=?')->setBindings([$cr->stud_id,$faculity,$department,$program,$gender,$batch,$semester])->get();
                if(count($profiles) > 0){
                    foreach($profiles as $pro){

                        $studcourses[] = [  
                            'id' => $pro['id'],
                            'name'=> $pro['name'],  
                            'reg' => $pro['reg'],
                        ];
                    }
                }
            }
        }else{
            return view('admin.coursereportlist2');
        }

        $data = array(
            "faculity" => $faculity,
            "department" => $department,
            "program" => $program,
            "gender" => $gender,
            "batch" => $batch,
            "semester" => $semester,
        );        
        return view('admin.coursereportlist',['data' => $data],['studcourses' => $studcourses]);
        */
        
    }

    public function resultreported(Request $request){
        $this->validate($request,[
            'faculity' => 'required',
            'department' => 'required',
            'program' => 'required',
            'gender' => 'required',
            'batch' => 'required',
            'semester' => 'required'
        ]);
        
        $faculity = $request->input('faculity');
        $department = $request->input('department');
        $program = $request->input('program');
        $gender = $request->input('gender');
        $batch = $request->input('batch');
        $semester = $request->input('semester');

        $data = array(
            "faculity" => $faculity,
            "department" => $department,
            "program" => $program,
            "gender" => $gender,
            "batch" => $batch,
            "semester" => $semester,
        );
      
        $profiles = Profiles::whereRaw('faculity = ? and department=? and program=? and gender=? and batch=? and semester=?')->setBindings([$faculity,$department,$program,$gender,$batch,$semester])->get();

        if(count($profiles) > 0){
            foreach($profiles as $pro){
                $studresults[] = [  
                    'id' => $pro['id'],
                    'name'=> $pro['name'],  
                    'reg' => $pro['reg'],
                ];
            }
            return view('admin.resultreportlist',['data' => $data],['studresults' => $studresults]);
              
        }else{
            return view('admin.resultreportlist2');
        }
        
    }

    public function readcourses($id){
        $cr = CourseReg::whereRaw('stud_id=?')->setBindings([$id])->get();
        $pro = Profiles::whereRaw('id=?')->setBindings([$id])->get();
        return view('admin.readcourse',['cr' => $cr],['pro' => $pro]);
    }

    public function readresults($id){
        $results = Result::whereRaw('stud_id=?')->setBindings([$id])->get();
        $wresults = WeightResult::whereRaw('stud_id=?')->setBindings([$id])->get();
        $pro = Profiles::whereRaw('id=?')->setBindings([$id])->get();
        View::share ( 'wresults', $wresults);
        return view('admin.readresults',['results' => $results],['pro' => $pro]);
    }

    public function searchhomebatch(Request $request){
        $this->validate($request,[
            'search' => 'required'
        ]);
        $keyword = $request->input('search');
        $profiles = Profiles::whereRaw('batch = ?')->setBindings([$keyword])->get();
        return view('admin.searchhome',['profiles' => $profiles]);
        
    }

    public function searchhomesemester(Request $request){
        $this->validate($request,[
            'search' => 'required'
        ]);
        $keyword = $request->input('search');
        $profiles = Profiles::whereRaw('semester = ?')->setBindings([$keyword])->get();
        return view('admin.searchhome',['profiles' => $profiles]);
        
    }

    public function searchresultname(Request $request){
        $this->validate($request,[
            'search' => 'required'
        ]);
        $keyword = $request->input('search');
        $attends = attendance::whereRaw('name = ?')->setBindings([$keyword])->get();
        return view('admin.searchresult',['at' => $attends]);
        
    }

    public function searchfeereg(Request $request){
        $this->validate($request,[
            'search' => 'required'
        ]);
        $keyword = $request->input('search');
        $sf = StudentFee::whereRaw('reg = ?')->setBindings([$keyword])->get();
        return view('admin.searchfeereg',['sf' => $sf]);
        
    }


    public function changepassword(){
        return view('admin.changepassword');
    }

    public function changedpassword(Request $request){
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

            Admin::where('id',$temp_id)->update($data);
            return redirect('admin/changepassword')->with('info2','Your password is successfully changed!'); 

        }else{
            return redirect('admin/changepassword')->with('info','Sorry, Incorrect Current Password!');
        }
    }
    

    public function add(Request $request){
        $this->validate($request,[
            'image' => 'required',
            'name' => 'required|max:120',
            'father_name' => 'required|max:120',
            'email' => 'required|email|unique:profiles,email',
            'dob' => 'required|before:"2000-01-01"',
            'gender' => 'required',
            'nationality' => 'required',
            'cnic' => 'required|digits:13|numeric|unique:profiles,cnic',
            'domicile' => 'required',
            'reg' => 'required|unique:profiles,reg',
            'faculity' => 'required',
            'department' => 'required',
            'program' => 'required',
            'batch' => 'required',
            'semester' => 'required',
            'address' => 'required',
            'city' => 'required',
            'phone' => 'required|unique:profiles,phone',
            'password'
        ]);

        
        
        if ($request->hasFile('image')) {
            
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString()); 
            $filename= $timestamp. '-' .$request->image->getClientOriginalName();
            $request->image->storeAs('public/upload',$filename);
            
        }
            $profiles = new Profiles;
            $profiles->image=$filename;
            $profiles->name = $request->input('name');
            $profiles->father_name = $request->input('father_name');
            $profiles->email = $request->input('email');
            $profiles->dob = $request->input('dob');
            $profiles->gender = $request->input('gender');
            $profiles->nationality = $request->input('nationality');
            $profiles->cnic = $request->input('cnic');
            $profiles->domicile = $request->input('domicile');
            $profiles->reg = $request->input('reg');
            $profiles->faculity = $request->input('faculity');
            $profiles->department = $request->input('department');
            $profiles->program = $request->input('program');
            $profiles->batch = $request->input('batch');
            $profiles->semester = $request->input('semester');
            $profiles->address = $request->input('address');
            $profiles->city = $request->input('city');
            $profiles->phone = $request->input('phone');

            $password = $this->passGen();
            $hash_password = password_hash($password,PASSWORD_DEFAULT);
            $profiles->password=$hash_password;

            $eemail = $profiles->email;
            $ename = $profiles->name;
            $epass = $password;
            
        
            //Mail::to($eemail)->send(new verifyEmail($epass));
            $profiles->save();

        /*

        Mail::send(['text'=>'Admin/mail'],['name'=>'IIUI-Student Information System'],function($message) use ($eemail,$ename){
                        $message->to($eemail,$ename)->subject('Password');
                        $message->from('waqar.musa777@gmail.com','IIUI');
                        $message->with('epass',$epass);
        });
        */

            
            
            $this->allotCourse($profiles->id);
            $cs = new CourseStatus;
            $cs->stud_id = $profiles->id;
            $cs->c_status = 0;
            $cs->save();

        return redirect('admin/home')->with('info','Profiles record save successfully and password is sended to students email!');
    }

    public function update($id){
        $profiles = Profiles::find($id);
        return view('admin.update', ['profiles' => $profiles]);
    }
 
    public function edit(Request $request, $id){
        $this->validate($request,[
            'image' => 'required',
            'name' => 'required|max:120',
            'father_name' => 'required|max:120',
            'email' => "required|email|unique:profiles,email,$id",
            'dob' => 'required|before:"2000-01-01"',
            'gender' => 'required',
            'nationality' => 'required',
            'cnic' => "required|digits:13|numeric|unique:profiles,cnic,$id",
            'domicile' => 'required',
            'reg' => "required|unique:profiles,reg,$id",
            'faculity' => 'required',
            'department' => 'required',
            'program' => 'required',
            'batch' => 'required',
            'semester' => 'required',
            'address' => 'required',
            'city' => 'required',
            'phone' => "required|unique:profiles,phone,$id"
        ]);

        if ($request->hasFile('image')) {

            $profiles = Profiles::find($id);
            $filenam = public_path().'/storage/upload/'.$profiles->image;
            File::delete($filenam);
        
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString()); 
            $filename= $timestamp. '-' .$request->image->getClientOriginalName();
            $location=public_path('public/upload',$filename);
            $request->image->storeAs('public/upload',$filename);
            
            
        }
         
        $data = array(
                                
                'image' => $filename,
                'name' => $request->input('name'),
                'father_name' => $request->input('father_name'),
                'email' => $request->input('email'),
                'dob' => $request->input('dob'),
                'gender' => $request->input('gender'),
                'nationality' => $request->input('nationality'),
                'cnic' => $request->input('cnic'),
                'domicile' => $request->input('domicile'),
                'reg'=> $request->input('reg'),
                'faculity'=> $request->input('faculity'),
                'department'=> $request->input('department'), 
                'program'=> $request->input('program'),
                'batch'=> $request->input('batch'),
                'semester' => $request->input('semester'),
                'address' => $request->input('address'),
                'city' => $request->input('city'),
                'phone' => $request->input('phone')
                
            );
            CourseReg::where('stud_id',$id)->delete();
            $temp_pro = $data['program'];
            $temp_sem = $data['semester'];
            $temp_id = $id;
            
            $se1 = Session::all();
            foreach($se1->all() as $se){
                $tempse = $se->session_name;
            }
            $temp_sesss = $tempse;

            $courses = Courses::whereRaw('session_name=? and semester_id=? and program=?')->setBindings([$temp_sesss,$temp_sem,$temp_pro])->get();

                foreach($courses->all() as $course){
                    $insert[] = [
                        'course_title' => $course['course_title'],
                        'code' => $course['code'],
                        'cr_hrs' => $course['cr_hrs'],
                        'session_name' => $course['session_name'],
                        'stud_id' => $temp_id
                    ];
                
                    /*$cr->course_title = $courses->course_title;
                    $cr->code = $courses->code;
                    $cr->cr_hrs = $courses->cr_hrs;
                    $cr->stud_id = $profiles->id;
                    $cr->save();*/
            }
            CourseReg::insert($insert);

            
            Profiles::where('id',$id)->update($data);
            
        return redirect('admin/home')->with('info','Profiles record updated successfully!');
    }

    public function read($id){
        $profiles = Profiles::find($id);
        return view('admin.read', ['profiles' => $profiles]);
    }

    public function delete($id){
        $profiles = Profiles::find($id);
        $filename = public_path().'/storage/upload/'.$profiles->image;
        File::delete($filename);
        CourseReg::where('stud_id',$id)->delete();
        $profiles->delete();
        //Profiles::where('id',$id)->delete();
        return redirect('admin/home')->with('info','Profiles record deleted successfully!');
    }

    public function create(){
        return view('admin.create');
    }
    public function cards(){
        $profiles = Profiles::all();
        return view('admin.cards', ['profiles' => $profiles]);
    }

    public function managesessions(){
        $sessions = Session::all();
        return view('admin.managesessions', ['sessions' => $sessions]);
    }    

    public function deletesession($id){
        $sessions = Session::find($id);
        $sessions->delete();
        return redirect('admin/managesessions')->with('info','Session deleted successfully!');
    }  
    
    public function addsession(){
        return view('admin.addsession');
    }

    public function addedsession(Request $request){

        $this->validate($request,[
            'session_name' => 'required',
            'course_duedate' => 'required',
            'fee_duedate' => 'required',
            'instal_duedate' => 'required',
            'exam_date' => 'required'
        ]);
        
        $temp_sess = $request->input('session_name');
        $sess = Session::whereRaw('session_name=?')->setBindings([$temp_sess])->get();
        if(count($sess) > 0){
            foreach($sess->all() as $ses){
                if($ses->session_name == $request->input('session_name')){
                    return redirect('admin/addsession')->with('info','This session is already added!');
                }
            }
        }else{
            $sessions = new Session;
            $sessions->session_name = $request->input('session_name');
            $sessions->course_duedate = $request->input('course_duedate');
            $sessions->fee_duedate = $request->input('fee_duedate');
            $sessions->instal_duedate = $request->input('instal_duedate');
            $sessions->exam_date = $request->input('exam_date');
            $sessions->save();

            return redirect('admin/managesessions')->with('info','Session is successfully added!');
        }

        
    }

    public function sessioncourse($sname){
        $courses = Courses::whereRaw('session_name = ?')->setBindings([$sname])->get();
        return view('admin.sessioncourse', ['courses' => $courses]);
    }


    public function managecourse(){
        $courses = Courses::all();
        return view('admin.managecourse', ['courses' => $courses]);
    }


    public function deletecourse($id){
        
        Courses::where('course_id',$id)->delete();
        return redirect('admin/managecourse')->with('info','Course droped successfully!');
    }   

    public function addcourse(){
        $sessions = Session::all();
        return view('admin.addcourse', ['sessions' => $sessions]);
    }

    public function addedcourse(Request $request){

        $this->validate($request,[
            'code' => 'required',
            'course_title' => 'required',
            'cr_hrs' => 'required',
            'program' => 'required',
            'session_name' => 'required',
            'semester_id' => 'required'
        ]);

        $temp_code = $request->input('code');
        $temp_program = $request->input('program');
        $temp_session = $request->input('session_name');
        $cours = Courses::whereRaw('code=? and session_name=?')->setBindings([$temp_code,$temp_session])->get();
        foreach($cours as $cour){
            if($cour->code == $temp_code && $cour->session_name == $temp_session && $cour->program == $temp_program){
                return redirect('admin/addcourse')->with('info','This course is with this session name is already added!');
            }
        }
        

        $courses = new Courses;
        $courses->code = $request->input('code');
        $courses->course_title = $request->input('course_title');
        $courses->cr_hrs = $request->input('cr_hrs');
        $courses->program = $request->input('program');
        $courses->session_name = $request->input('session_name');
        $courses->semester_id = $request->input('semester_id');
        $courses->save();

        return redirect('admin/managecourse')->with('info','New Course is successfully added!');
    }

    public function editcourse($id){
        
        $courses = Courses::where('course_id',$id)->get()->first();
        $sessions = Session::all();
        return view('admin.editcourse', ['courses' => $courses], ['sessions' => $sessions]);
    }

    public function edittedcourse(Request $request, $id){
        $this->validate($request,[
            'code' => 'required',
            'course_title' => 'required',
            'cr_hrs' => 'required',
            'program' => 'required',
            'session_name' => 'required',
            'semester_id' => 'required'
        ]);

        $data = array(
            'code' => $request->input('code'),
            'course_title' => $request->input('course_title'),
            'cr_hrs' => $request->input('cr_hrs'),
            'program' => $request->input('program'),
            'session_name' => $request->input('session_name'),
            'semester_id' => $request->input('semester_id')
        );

        Courses::where('course_id',$id)->update($data);
        return redirect('admin/managecourse')->with('info','Course updated successfully!');
    }



    public function feedetails(){

        $fees = Fee::all();
        return view('admin.feedetails', ['fees' => $fees]);
    }

    public function addfee(){
        $sessions = Session::all();
        return view('admin.addfee', ['sessions' => $sessions]);
    }


    public function addedfee(Request $request){
        $this->validate($request,[
            'fch' => 'required',
            'rf' => 'required',
            'oth' => 'required',
            'session_name' => 'required',
            'program' => 'required'
        ]);

        $getfees = Fee::all();
        if(count($getfees) > 0){
            foreach($getfees->all() as $getfee){
    
                if($getfee->session_name == $request->input('session_name') && $getfee->program == $request->input('program') ){
                    return redirect('admin/addfee')->with('info','This session have already assigned fees schema for this program!');
                }
            }
        }

        $fees = new Fee;
        $fees->ch_fee = $request->input('fch');
        $fees->reg_fee = $request->input('rf');
        $fees->others = $request->input('oth');
        $fees->session_name = $request->input('session_name');
        $fees->program = $request->input('program');
        $fees->save();

        return redirect('admin/feedetails')->with('info','New Fee Schema for session is successfully added!');
    }

    public function editfee($id){
        $fees = Fee::where('id',$id)->get()->first();;
        $sessions = Session::all();
        return view('admin.editfee', ['fees' => $fees], ['sessions' => $sessions]);
    }

    public function edittedfee(Request $request,$id){
        $this->validate($request,[
            'fch' => 'required',
            'rf' => 'required',
            'oth' => 'required',
            'session_name' => 'required',
            'program' => 'required'
        ]);

        $data = array(
            'ch_fee' => $request->input('fch'),
            'reg_fee' => $request->input('rf'),
            'others' => $request->input('oth'),
            'session_name' => $request->input('session_name'),
            'program' => $request->input('program')
        );

        Fee::where('id',$id)->update($data);

        return redirect('admin/feedetails')->with('info','Fee Schema is successfully updated!');
    }


    public function deletefee($id){
        Fee::where('id',$id)->delete();
        return redirect('admin/feedetails')->with('info','Fee Schema is successfully deleted!');
    }

    public function generatecard($id){
        $profiles = Profiles::find($id);
        return view('admin.generatecard', ['profiles' => $profiles]);
    }
    public function passGen(){
        $uc = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $lc = "abcdefghijklmnopqrstuvwxyz";
        $num = "0123456789";
        $spec = "#@$&%";

        $gen_uc = substr(str_shuffle($uc),0,2);
        $gen_lc = substr(str_shuffle($lc),0,2);
        $gen_num = substr(str_shuffle($num),0,2);
        $gen_spec = substr(str_shuffle($spec),0,2);

        $mixed = "$gen_uc$gen_lc$gen_num$gen_spec";
        $gen_mixed = substr(str_shuffle($mixed),0,8);
        $password = $gen_mixed;
        
        return $password;
    }

    public function studentfee(){

        $sf = StudentFee::all();
        return view('admin.studentfee', ['sf' => $sf]);
    }


    
    public function addstudentfee(){
        
        return view('admin.addstudentfee');
    }


    public function addedstudentfee(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'reg' => 'required',
            'total_fee' => 'required',
            'paid' => 'required'
        ]);
        
        $temp_name = $request->input('name');
        $temp_reg = $request->input('reg');
        $profiles = Profiles::where('reg',[$temp_reg])->where('name',[$temp_name])->get();
        $sf = StudentFee::where('reg',[$temp_reg])->where('name',[$temp_name])->get();
        $dt = Carbon::now()->toDateString();
        foreach($sf as $s){
            if($s->name == $temp_name && $s->reg == $temp_reg){
                return redirect('admin/addstudentfee')->with('info','This student fee details are already added!');
            }
        }


        if(count($profiles) > 0){

            foreach($profiles as $p){
                    $temp_id = $p->id;
                    $temp_tot = $request->input('total_fee');
                    $temp_paid = $request->input('paid');
                    $remaining = $temp_tot - $temp_paid;

                    $asf = new StudentFee;
                    $asf->id = $temp_id;
                    $asf->name = $request->input('name');
                    $asf->reg = $request->input('reg');
                    $asf->doj = $dt;
                    $asf->total_fee = $request->input('total_fee');
                    $asf->paid = $request->input('paid');
                    $asf->remain = $remaining;
                    $asf->save();
                    return redirect('admin/studentfee')->with('info','New Student Payment Details is successfully added!');
                }
        }else{
            return redirect('admin/addstudentfee')->with('info','No Student found in our records with this name and registation number!');
        }
    }

    public function deletestudentfee($id){

        StudentFee::where('id',$id)->delete();
        return redirect('admin/studentfee')->with('info','Student Fees is successfully deleted!');
    }

    public function secondinstallment($id){
        $sf = StudentFee::where('id',[$id])->get();

        foreach($sf as $s){
            if($s->remain == 0){
                return redirect('admin/studentfee')->with('info','Student Fees is already cleared!');
            }else{

                return view('admin.secondinstallment',['sf' => $sf] );
            }
        }

    }

    public function secondinstallmentpaid(Request $request,$id){
        $this->validate($request,[
            'remain' => 'required'
        ]);

        $sf = StudentFee::where('id',[$id])->get();
        foreach($sf as $s){
            $temp_tot = $s->total_fee;
            $temp_remain = 0;
            if( $request->input('remain') == $s->remain){
                
                
                $data = array(
                    'paid' => $temp_tot,
                    'remain' => $temp_remain
                );
                StudentFee::where('id',$id)->update($data);
                return redirect('admin/studentfee')->with('info','Student fees clear successfully!');
            }else{
                return redirect('admin/studentfee')->with('info2','Please enter valid remaining fees!');
            }
        }
        
    }

    public function attendance(){
        $attend=Attendance::all();
        return view('admin.attendance',['attend' => $attend]);
    }

    public function addattendance(){
        return view('admin.addattendance');
    }

    public function addedattendance(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'reg' => 'required',
            'attend_perc' => 'required'
        ]);

        $temp_name = $request->input('name');
        $temp_reg = $request->input('reg');
        $profiles = Profiles::where('reg',[$temp_reg])->where('name',[$temp_name])->get();
        $at = Attendance::where('reg',[$temp_reg])->where('name',[$temp_name])->get();
        $stuf = StudentFee::where('reg',[$temp_reg])->where('name',[$temp_name])->get();

        foreach($stuf as $stu){
            if($stu->remain != 0){
                return redirect('admin/addattendance')->with('info','This student has dues remain!');
            }
        }


        foreach($at as $s){
            if($s->name == $temp_name && $s->reg == $temp_reg){
                return redirect('admin/addattendance')->with('info','This student attendance is already added!');
            }
        }

        if(count($profiles) > 0){

            foreach($profiles as $p){
                    $temp_id = $p->id;

                    $att = new Attendance;
                    $att->id = $temp_id;
                    $att->name = $request->input('name');
                    $att->reg = $request->input('reg');
                    $att->attend_perc = $request->input('attend_perc');
                    $att->save();
                    return redirect('admin/attendance')->with('info','New Student Attendance is successfully added!');
                }
        }else{
            return redirect('admin/addattendance')->with('info','No Student found in our records with this name and registation number!');
        }


    }

    public function deleteattendance($id){
        Attendance::where('id',$id)->delete();
        return redirect('admin/attendance')->with('info','Student Attendance is successfully deleted!');
    }


    public function results(){
        $attend = "clear";
        $at = Attendance::whereRaw('attend_perc = ?')->setBindings([$attend])->get();
        return view('admin.results',['at' => $at]);
    }

    public function addresults($id){

        $res = Result::whereRaw('stud_id=?')->setBindings([$id])->get();
        $course_regs = CourseReg::whereRaw('stud_id = ?')->setBindings([$id])->get();

        if(count($course_regs) > 0){
            foreach($course_regs as $crs){
                $tmp_ss = $crs->session_name;
            }

            foreach($res as $re){
                $temp_id = $re->stud_id;
                $temp_sessss = $re->session_name;
                if($id == $temp_id && $tmp_ss == $temp_sessss){
                    return redirect('admin/results')->with('info','Student Results already added!');
                }
            }
            return view('admin.addresults',['course_regs' => $course_regs]);
        }else{
            return redirect('admin/results')->with('info','This student is not registered!');
        }
       
    }

    public function addedresults(Request $request){
        
        $temp_id = $request->stud_id;

        $temp_code = $request->code;
        $temp_course = $request->course_title;
        $temp_crhrs = $request->cr_hrs;
        $temp_marks = $request->marks;
        $temp_session = $request->session_name;
        $temp_nocha = 0;
        $stud_marks = 0;
        $total_weighted_score = 0;
        $ch_pass = 0;


        
        
        $checker = count($temp_marks);
            for($i=0; $i<$checker; $i++){
                if($temp_marks[$i] >= 80){
                    $temp_grade = "A";
                }else if($temp_marks[$i] >= 75 && $temp_marks[$i] < 80){
                    $temp_grade = "B+";
                }else if($temp_marks[$i] >= 70 && $temp_marks[$i] < 75){
                    $temp_grade = "B";
                }else if($temp_marks[$i] >= 65 && $temp_marks[$i] < 70){
                    $temp_grade = "C+";
                }else if($temp_marks[$i] >= 60 && $temp_marks[$i] < 65){
                    $temp_grade = "C";
                }else if($temp_marks[$i] >= 55 && $temp_marks[$i] < 60){
                    $temp_grade = "D+";
                }else if($temp_marks[$i] >= 50 && $temp_marks[$i] < 55){
                    $temp_grade = "D";
                }else{
                    $temp_grade = "F";
                }

                
                $data = array('code' => $temp_code[$i] , 'course_name'=> $temp_course[$i], 'cr_hrs' => $temp_crhrs[$i] ,'marks' => $temp_marks[$i],'stud_id' => $temp_id[$i], 'session_name'=> $temp_session[$i],'grade' => $temp_grade );
                Result::insert($data);

                if($temp_grade == "A"){
                    $x = 4 * $temp_crhrs[$i];
                    $total_weighted_score += $x;
                 }else if($temp_grade == "B+"){
                    $x = 3.5 * $temp_crhrs[$i];
                    $total_weighted_score += $x;
                 }else if($temp_grade == "B"){
                    $x = 3 * $temp_crhrs[$i];
                    $total_weighted_score += $x;
                 }else if($temp_grade == "C+"){
                    $x = 2.5 * $temp_crhrs[$i];
                    $total_weighted_score += $x;
                 }if($temp_grade == "C"){
                    $x = 2 * $temp_crhrs[$i];
                    $total_weighted_score += $x;
                 }else if($temp_grade == "D+"){
                    $x = 1.5 * $temp_crhrs[$i];
                    $total_weighted_score += $x;
                 }if($temp_grade == "D"){
                    $x = 1 * $temp_crhrs[$i];
                    $total_weighted_score += $x;
                 }else{
                    $x = 0 * $temp_crhrs[$i];
                    $total_weighted_score += $x;
                 }
                 $temp_nocha += $temp_crhrs[$i];
                 $stud_marks+= $temp_marks[$i];

                  
                
            }

            

            $res = Result::whereRaw('stud_id=? and marks >= 60')->setBindings([$temp_id])->get();

            foreach($res as $r){
                $ch_pass+=$r->cr_hrs;
            }
            foreach($temp_id as $sid){
                $tsid = $sid;
            }
        
            $tot_marks = $checker * 100;
            $marks_perc = ($stud_marks/$tot_marks)*100;
            $cgpa = $total_weighted_score/$temp_nocha;
            $stat= "Degree in Progress";

            $weight_result = new WeightResult;
            $weight_result->marks_perc = round($marks_perc,2);
            $weight_result->nocha = $temp_nocha;
            $weight_result->ch_pass = $ch_pass;
            $weight_result->cgpa = round($cgpa,2);
            $weight_result->status = $stat;
            $weight_result->stud_id = $tsid;
            $weight_result->save();

            $this->semCourse($sid);
        

        
      return redirect('admin/results')->with('info','Student Result is successfully create!');

    }

    public function semCourse($id){
        CourseReg::where('stud_id',$id)->delete();
        
        
            $profiles=Profiles::where('id',$id)->get();
            foreach($profiles as $prof){
                $temp_semester = $prof->semester;
                $temp_pro = $prof->program;    
            }
            $se1 = Session::all();
            foreach($se1->all() as $se){
                $tempse = $se->session_name;
            }
            $temp_sem = $temp_semester + 1;
            $temp_id = $id;
            $temp_sesss = $tempse;

            $courses = Courses::whereRaw('semester_id=? and program=? and session_name=?')->setBindings([$temp_sem,$temp_pro,$temp_sesss])->get();
                if(count($courses) > 0){
                    foreach($courses->all() as $course){
                        $insert[] = [
                            'course_title' => $course['course_title'],
                            'code' => $course['code'],
                            'cr_hrs' => $course['cr_hrs'],
                            'session_name' => $course['session_name'],
                            'stud_id' => $temp_id
                        ];
                    
                    }
                CourseReg::insert($insert);
                $data = array(
                    'c_status' => 0
                );
                $data2 = array(
                    'semester' => $temp_sem
                );
                Profiles::where('id',$id)->update($data2);
                CourseStatus::where('stud_id',$id)->update($data);
                //Attendance::where('id',$id)->delete();
                StudentFee::where('id',$id)->delete();
                }else{
                    return 'No Courses found';
                }
                
            
            

            
            //Profiles::where('id',$id)->update($data);

    }

    public function viewresults($id){
        $results = Result::whereRaw('stud_id=?')->setBindings([$id])->get();
        $w_results = WeightResult::whereRaw('stud_id=?')->setBindings([$id])->get();
        return view('admin.viewresults', ['results' => $results],['w_results' => $w_results]);
    }

    public function allotCourse($id){

        $profiles = Profiles::find($id);
        $temp_pro = $profiles['program'];
        $temp_sem = $profiles['semester'];
        $temp_id = $profiles['id'];
        $se1 = Session::all();
        foreach($se1->all() as $se){
            $tempses = $se->session_name;
        }
        $temp_sesss = $tempses;
        $cr = new CourseReg;
        $courses = Courses::whereRaw('semester_id=? and program=? and session_name=?')->setBindings([$temp_sem,$temp_pro,$temp_sesss])->get();

            foreach($courses->all() as $course){
                    $insert[] = [
                        'course_title' => $course['course_title'],
                        'code' => $course['code'],
                        'cr_hrs' => $course['cr_hrs'],
                        'session_name' => $course['session_name'],
                        'stud_id' => $temp_id
                    ];
                
                    /*$cr->course_title = $courses->course_title;
                    $cr->code = $courses->code;
                    $cr->cr_hrs = $courses->cr_hrs;
                    $cr->stud_id = $profiles->id;
                    $cr->save();*/
            }
            CourseReg::insert($insert);

            /* if(count($courses) > 0){
            foreach($courses->all() as $course){
                $this->total_crhrs+=$course->cr_hrs;
            }
            }
            $tot = count($courses);

            for($i=1; $i<=$tot; $i++){
                $cr['course_'.$i] = $courses[$i-1]->course_title;
            }

        $cr->total_crhrs = $this->total_crhrs; 
        $cr->stud_id = $profiles->id;*/
        

            
    }

}
