<?php

namespace App\Http\Controllers\wrongcode;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardWc extends Controller
{
    public function dashboard(){

    }
    public function dashboard_m(){


        return view('wrongcode_admin.dashboard.dashboard_M');
    }
}
