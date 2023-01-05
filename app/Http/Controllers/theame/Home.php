<?php

namespace App\Http\Controllers\theame;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mews\Captcha\Facades\Captcha;

class Home extends Controller
{
    public function index(){
        return view('theame.home');
    }

    public function contact_request(Request $r){
        $rules=[
            'name' => 'required',
            'email' => 'required|email',
            'phone_number'=>'required|numeric|digits:10',
            'message' => 'required',
            'captcha' => 'required|captcha'
        ];
        $valaditor=Validator::make($r->all(),$rules);
        if($valaditor->fails()){
            Toastr::error($valaditor->errors(), 'Error', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('home');
        }

        ContactMessage::create([
            "name"=>$r->name,
            "email"=>$r->email,
            "mobile"=>$r->phone_number,
            "message"=>$r->message,
            "status"=>"A"
        ]);

        Toastr::success("Successfully send checked email", 'Send Message', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('home');
    }

    public function reloadCaptcha(){
        return response()->json(['captcha'=> Captcha::img()]);
    }
}
