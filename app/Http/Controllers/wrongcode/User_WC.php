<?php

namespace App\Http\Controllers\wrongcode;

use App\Http\Controllers\Controller;
use App\Models\Wc_user;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Nette\Utils\Random;

class User_WC extends Controller
{
    public function login(Request $request){
        // if(auth()->user()){
        //     return redirect()->route('school.dashboard');
        // }
        if($request->isMethod('post')){
            $rules=[
                'email'=>'required|email|max:255',
                'password'=>'required|string|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/'
            ];
            $valaditor=Validator::make($request->all(),$rules);
            if($valaditor->fails()){
                Toastr::success($valaditor->errors(), 'Title', ["positionClass" => "toast-bottom-right"]);
                return redirect()->route('wc_login');
            }

            $role=Wc_user::select('user_role')->where('email', $request->email)->first()->user_role;


            if($role=='S'){

            }elseif($role=='M'){
                if(Auth::guard('wc_admin_me')->attempt(['email' => $request->email, 'password' => $request->password,'status' => 'A','user_role'=>'M'])){
                    // if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                        // return Auth::guard('orgSadmin')->user();
                        // return auth()->guard('wc_admin')->user();
                    Toastr::success('Successfully Log in :)','Success');
                    return redirect()->route('wc_Dashboard');
                }else{
                    Toastr::error('Wrong Username And Password :)','error');
                        // Toastr::error
                    return redirect()->route('wc_login');
                }
            }elseif($role=='AC'){

            }elseif($role=='AD'){

            }elseif($role=='SA'){
                if(Auth::guard('wc_admin')->attempt(['email' => $request->email, 'password' => $request->password,'status' => 'A','user_role'=>'SA'])){
                    // if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                        // return Auth::guard('orgSadmin')->user();
                        // return auth()->guard('wc_admin')->user();
                    Toastr::success('Successfully Log in :)','Success');
                    return redirect()->route('wc_Dashboard');
                }else{
                    Toastr::error('Wrong Username And Password :)','error');
                        // Toastr::error
                    return redirect()->route('wc_login');
                }
            }






        }else{
            return view('wrongcode_admin.auth.login');
        }

    }

    public function register(Request $request){
        if($request->isMethod('post')){

            $rules=[
                'name'=>'required|max:255',
                'email'=>'required|email|max:255',
                'dateofbirth'=>'required|date',
                'mobile'=>'required|max:11',
                'gender'=>'required|in:Male,Female,Others',
                'userrole'=>'required|in:S,M,AC,AD,SA',
                'image'=>'required|image|mimes:jpg,png,jpeg|max:2048',

            ];
            $valaditor=Validator::make($request->all(),$rules);
            if($valaditor->fails()){
                // return response()->json($valaditor->errors(),401); //400 envalies responce
                Toastr::success($valaditor->errors(), 'Title', ["positionClass" => "toast-bottom-right"]);
                return redirect()->route('wc_register');
            }


            $imageName = rand(0001,9999).time().$request->file('image')->getClientOriginalName();

        $path=$request->image->move(public_path('wc_dp'), $imageName);


            $name = ucfirst(preg_replace('/\s+/', '', $request->name));
            $datestr = preg_replace('/\s+/', '',  date('dmY', strtotime($request->dateofbirth)));
            $password = $name . '@' . $datestr;
            $data=Wc_user::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($password),
                'd_o_b'=>$request->dateofbirth,
                'mobile_no'=>$request->mobile,
                'gender'=>$request->gender,
                'adress'=>$request->adress,
                'dp'=>$imageName,
                'dp_path'=>$path,
                'user_role'=>$request->userrole,
                'status'=>'A',
                'created_by'=>auth()->guard('wc_admin')->user()->wc_user_id,
            ]);
            Toastr::success('Messages in here', 'Title', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('wc_register');
        }else{
            return view('wrongcode_admin.auth.register');
        }

    }
}
