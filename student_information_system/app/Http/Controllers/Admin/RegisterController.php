<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Admin;
use App\TempAdmin;
use App\role_admin;
use Mail;
use View;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\verifyEmail2;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'admin/home';
 
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    } 

    public function a_register(){
        return view('admin.admin_auth.a_register');
    }

    public function a_registered(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $ch_email = $request->input('email');
        $ad = TempAdmin::whereRaw('email=?')->setBindings([$ch_email])->get();
            if(count($ad) > 0){
                TempAdmin::where('email',$ch_email)->delete();
            }
            $ename = $request->input('name');
            $eemail = $request->input('email');
            $epass = $request->input('password');
            $number = mt_rand(100000, 999999);
            Mail::to($eemail)->send(new verifyEmail2($number));

            $admin = array(
                'name' => $ename,
                'email' => $eemail,
                'password' => bcrypt($epass),
            );

            $data = array(
                'email' => $eemail,
                'code' => $number
            );
            TempAdmin::insert($data);
            View::share ( 'admin', $admin);
            return view('admin.admin_auth.email_confirmation');


    }

    public function confirmadmin(){
        return view('admin.admin_auth.email_confirmation');
    }

    public function confirmedadmin(Request $request){
        $this->validate($request,[
            'r_number' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $temp_rnum = $request->input('r_number');
        $temp_name = $request->input('name');
        $temp_email = $request->input('email');
        $temp_password = $request->input('password');
        
        $ad = TempAdmin::whereRaw('code=? and email=?')->setBindings([$temp_rnum,$temp_email])->get();
        if(count($ad) > 0){
            $insert_admin = array(
                'name' => $temp_name,
                'email' => $temp_email,
                'password' => $temp_password
                
            );

            

            Admin::insert($insert_admin);
            $select_id = Admin::whereRaw('email=?')->setBindings([$temp_email])->get();

            foreach($select_id as $select){
                $temp_id = $select->id;
            }
            $inser_role = array(
                'role_id' => 1,
                'admin_id' => $temp_id
            );
            role_admin::insert($inser_role);
            TempAdmin::where('email',$temp_email)->delete();
            return redirect('/admin')->with('info','Your account is successfully verified!');
        }
        else{
            $admin = array(
                'name' => $temp_name,
                'email' => $temp_email,
                'password' => $temp_password
            );
            View::share ('admin', $admin);
            Session::flash('message', 'Sorry, Invalid Code!');
            return view('admin.admin_auth.email_confirmation');
            //return redirect('admin/admin_auth/confirmadmin')->with('info','Code didnot match!');
        }
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
