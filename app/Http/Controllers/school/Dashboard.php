<?php

namespace App\Http\Controllers\school;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(){
        $data=[
            'title'=>"Dashboard"
        ];
        return view("school.dashboard.index")->with($data);
    }
}
