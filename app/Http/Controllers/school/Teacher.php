<?php

namespace App\Http\Controllers\school;

use App\Http\Controllers\Controller;
use App\Http\Controllers\school\Assets;
use App\Models\Country;
use App\Models\Schoolinfo;
use App\Models\Teachermodel;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Teacher extends Controller
{
    public function addteacher(Request $r){
        if ($r->isMethod('post')) {

            $name = ucfirst(preg_replace('/\s+/', '', $r->name));
            $datestr=preg_replace('/\s+/', '',  date('dmY',strtotime($r->dob)));
            $pass=$name.'@'.$datestr;

            $data = Teachermodel::create([
                "name"=>$r->name,
                "mobile_no"=>$r->mobileno,
                "password"=>Hash::make($pass),
                "dateofbirth"=>$r->dob,
                "country_id"=>$r->country_id,
                "state_id"=>$r->state_id,
                "city_id"=>$r->city_id,
                "school_id"=>$r->school_id,
                "class_id"=>$r->class_id,
                "role"=>'T',
                "active"=>"1",
                "created_by" => Auth::guard('orgSadmin')->user()->school_user_id,
            ]);

            Toastr::success('Messages in here', 'Title', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('school.all_teacher');
        } else {
            $ipdata= Assets::ip_to_get_data($r->ip);
            $data = [
                'title' => "Add Teacher",
                'country'=>Country::where('name', $ipdata->country)->orderBy('name', 'ASC')->get(),
                'school'=>Schoolinfo::where('created_by', Auth::guard('orgSadmin')->user()->school_user_id)->select('schoolname','schoolid')->orderBy('schoolname', 'ASC')->get()

            ];
            return view("school.teacher.addTeacher")->with($data);
        }
    }

    public function all_teacher(){
        $data = [
            'title' => "My Teacher",
            'schooldata'=>Teachermodel::where('teacher.created_by', Auth::guard('orgSadmin')->user()->school_user_id)
                                    ->where('schoolinfo.created_by', Auth::guard('orgSadmin')->user()->school_user_id)
                                    ->where('classroom.created_by', Auth::guard('orgSadmin')->user()->school_user_id)
                                    // ->where('classroom.school_id', "schoolinfo.schoolid")
                                    ->join('schoolinfo', 'schoolinfo.schoolid', '=', 'teacher.school_id')
                                    ->join('classroom', 'classroom.classroom_id', '=', 'teacher.class_id')
                                    ->select('teacher.name','teacher.teacher_id','teacher.dateofbirth','teacher.active','schoolinfo.schoolname','schoolinfo.schoolRegistrationId','classroom.class_name')
                                    ->orderBy('schoolinfo.schoolname', 'ASC')->get()
        ];
        return view("school.teacher.allTeacher")->with($data);
    }
}
