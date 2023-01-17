<?php

namespace App\Http\Controllers\school;

use App\Http\Controllers\Controller;
use App\Mail\MyMail;
use App\Models\SchoolUser;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    // ====================send email ===================================
    public function send_mail_opt($email, $otp,$url)
    {
        if(!empty($url)){
            $details = [
                'title' => 'Dear Customer',
                'body' => "Welcome, We thank you for your registration at MySchool Online school system  Your One Time Password is : " . $otp." OTP verification url :".$url,
                'subject' => 'Your email id Verification activation OTP code',
                'send_by'=>'Test'
            ];
            return Mail::to($email)->send(new MyMail($details));
        }else{
            $details = [
                'title' => 'Dear Customer',
                'body' => "Welcome, We thank you for your registration at MySchool Online school system  Your One Time Password is : " . $otp,
                'subject' => 'Your email id Verification activation OTP code',
                'send_by'=>'Test'
            ];
            return Mail::to($email)->send(new MyMail($details));
        }

    }

    // =============================register account============================
    public function register(Request $request)
    {
        if(auth()->user()){
            return redirect()->route('school.dashboard');
        }
        if ($request->isMethod('post')) {
            $otp = sprintf("%06d", mt_rand(000001, 999999));
            $emailfind=SchoolUser::where('email',$request->email)->get()->count();
            if($emailfind<=0){
                $data = SchoolUser::create([
                    "name" => $request->name,
                    "email" => $request->email,
                    "password" => Hash::make($request->password),
                    "mobile_no" => "",
                    "role" => "S",
                    "otp" => $otp,
                    "active_status" => "0",
                    "pay_id" => "",
                    "admin_active" => "1",
                    "payment_status" => "0",
                    "payment_active_status" => "0",
                    "payment_date" => null,
                    "create_by" => null
                ]);


                if (!empty($data)) {
                    $encemail=Crypt::encryptString($request->email);
                    $this->send_mail_opt($request->email, $otp,route('emailvaladition', [$data->school_user_id,$encemail]));
                    Toastr::warning('checked your email');
                    return redirect()->route('emailvaladition', [$data->school_user_id,$encemail]);

                } else {
                    Toastr::error('Success Message');
                }
            }else{
                Toastr::warning('Email already exists');
                return redirect()->route('orgregister');
            }
        } else {
            return view('school.auth.register');
        }
    }
    //================================ resend otp ===========================

    public function resend_otp(Request $request){
        if(auth()->user()){
            return redirect()->route('school.dashboard');
        }
        $email =Crypt::decryptString($request->xyz);
        $otp = sprintf("%06d", mt_rand(000001, 999999));
        SchoolUser::where('school_user_id', $request->id)->where('email', $email)->update(['active_status' => '0','otp'=>$otp]);
        $this->send_mail_opt($email, $otp,null);
        return Toastr::success('checked your email');
                                // return ['success' => 'checked your email'];
    }

    // =============================== otp valadition==========================
    public function otp_valadition($id,$email,Request $request){
        if(auth()->user()){
            return redirect()->route('school.dashboard');
        }
        $data=SchoolUser::where('school_user_id', $id)->where('email', Crypt::decryptString($email))->where('active_status', '1')->count();
        if($data<=0){
            if ($request->isMethod('post')) {
                // dd($request->otp);
                if($request->otp==="000000"||$request->otp===''||$request->otp===null||$request->otp===000000){

                    Toastr::error("don't try this othar than your account is temporarily disabled");
                    return redirect()->route('emailvaladition', [$id,$email]);

                }else{

                    $data = SchoolUser::where('school_user_id', $id)
                                    ->where('email', Crypt::decryptString($email))
                                    ->where('otp', $request->otp)
                                    ->update(['active_status' => '1','otp'=>'000000']);
                    if (!empty($data)) {
                        // $user=SchoolUser::where('school_user_id', $id)->where('email', Crypt::decryptString($email))->where('active_status', '1')->first();
                        // dd($user);
                        // Auth::login($user);
                        // dd(Auth::guard('orgSadmin')->login($user));
                        // dd(Auth::guard('orgSadmin')->login($user));
                        // dd(Auth::guard('orgSadmin')->attempt(['email' => Crypt::decryptString($email),'active_status' => "1"]));
                        // if(){
                        //     return Auth::guard('orgSadmin')->user();
                        // // return auth()->guard('admin')->user();
                        // }
                        Toastr::success('Successfully login');
                        return redirect()->route('orglogin');

                    } else {
                        Toastr::error('Wrong Otp Message');
                        return redirect()->route('emailvaladition', [$id,$email]);
                    }
                }
            }else{
                $dataarray=[
                    'id'=> $id,
                    'email'=>$email
                ];
                return view('school.auth.otp_verification')->with($dataarray);
            }
        }else{
            Toastr::error("your account has been verified. don't try this othar than your account is temporarily disabled");
            return redirect()->route('orglogin');
        }
    }

    // ===============================login==========================
    public function login(Request $request){
        // if(auth()->user()){
        //     return redirect()->route('school.dashboard');
        // }

        if($request->isMethod('post')){
            // dd(Auth::guard('orgSadmin')->attempt(['email' => $request->email, 'password' => $request->password]));
            if(Auth::guard('orgSadmin')->attempt(['email' => $request->email, 'password' => $request->password],$request->get('remember'))){
            // if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                // return Auth::guard('orgSadmin')->user();
                // return auth()->guard('orgSadmin')->user();
                Toastr::success('Successfully Log in :)','Success');
                return redirect()->route('school.dashboard');
            }else{
                Toastr::error('Wrong Username And Password :)','error');
                // Toastr::error
                return redirect()->route('orglogin');
            }
        }else{
            return view('school.auth.login');
        }
    }


    // ===========================test send email========================
    public function sendmaiTest()
    {
        print_r(auth()->user());
        // print_r(Auth::guard('orgSadmin')->user());
        // print_r(Auth::user());
        exit();
        $details = [
            'title' => 'Mail from amit ',
            'body' => 'This is for testing email using smtp',
            'subject' => 'hello'
        ];
        Mail::to('mamit7025@gmail.com')->send(new MyMail($details));

        dd("Email is Sent.");
    }
}
