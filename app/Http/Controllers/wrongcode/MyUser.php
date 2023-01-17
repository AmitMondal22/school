<?php

namespace App\Http\Controllers\wrongcode;

use App\Http\Controllers\Controller;
use App\Models\Wc_user;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class MyUser extends Controller
{
    public function my_employ(){
        $data=Wc_user::paginate(30);
        $dataa=[
            'data'=>$data
        ];
        // return $data;

        return view('wrongcode_admin.auth.user')->with($dataa);
    }
}
