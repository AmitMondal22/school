<?php

namespace App\Http\Controllers\wrongcode;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Wc_assets extends Controller
{
    public function public_contact(){
        // return auth()->guard('wc_admin')->user()->dp;
        // return auth()->getDefaultDriver();
        return view('wrongcode_admin.contac.contac');
    }
}
