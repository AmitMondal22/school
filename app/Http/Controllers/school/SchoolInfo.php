<?php

namespace App\Http\Controllers\school;

use App\Http\Controllers\Controller;
use App\Http\Controllers\school\Assets;
use App\Models\Country;
use App\Models\Schoolinfo as ModelsSchoolinfo;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SchoolInfo extends Controller
{

    public function school_add(Request $r){

        if ($r->isMethod('post')) {
            $data = ModelsSchoolinfo::create([
                "schoolname"=>$r->schoolname,
                "schoolRegistrationId"=>$r->reg_id,
                "adress"=>$r->adress,
                "schoolMobileNo"=>$r->mobile_no,
                "pin"=>$r->pin,
                "city"=>$r->city_id,
                "state"=>$r->state_id,
                "country"=>$r->country_id,
                "created_by"=>Auth::guard('orgSadmin')->user()->school_user_id,
            ]);

            Toastr::success('Messages in here', 'Title', ["positionClass" => "toast-bottom-right"]);
        }else{

            $ipdata= (new Assets)->ip_to_get_data($r->ip);
            $data=[
                'title'=>"test",
                'country'=>Country::where('name', $ipdata->country)->orderBy('name', 'ASC')->get(),
            ];
            return view("school.assets.addSchool")->with($data);
        }
    }

    public function school(){
        $data=[
            'title'=>"my School",
            "schooldata"=>ModelsSchoolinfo::where('created_by', Auth::guard('orgSadmin')->user()->school_user_id)->orderBy('schoolname', 'ASC')->get()
        ];
        return view("school.assets.school")->with($data);
    }
}
