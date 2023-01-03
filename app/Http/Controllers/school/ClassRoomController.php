<?php

namespace App\Http\Controllers\school;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use App\Models\Schoolinfo;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassRoomController extends Controller
{
    public function addclass(Request $r)
    {
        if ($r->isMethod('post')) {
            $data = ClassRoom::create([
                "class_name" => $r->class_name,
                "class_sl_no"=>$r->class_position,
                "school_id" => $r->schoolid,
                "created_by" => Auth::guard('orgSadmin')->user()->school_user_id,
            ]);

            Toastr::success('Successfull Add Class', 'Title', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('school.all_class');
        } else {
            $data = [
                'title' => "Add Class",
                "schooldata" => Schoolinfo::where('created_by', Auth::guard('orgSadmin')->user()->school_user_id)->select('schoolname', 'schoolid')->orderBy('schoolname', 'ASC')->get(),
                "schooldataone" => "",
            ];
            return view("school.school_class.addClass")->with($data);
        }
    }

    public function addclass_schoolid($school_id){
        $ddd = Schoolinfo::where('created_by', Auth::guard('orgSadmin')->user()->school_user_id)->where('schoolid', $school_id)->count();

        if ($ddd > 0) {
            $data = [
                'title' => "Add Class",
                "schooldata" => Schoolinfo::where('created_by', Auth::guard('orgSadmin')->user()->school_user_id)
                    ->select('schoolname', 'schoolid')
                    ->orderBy('schoolname', 'ASC')->get(),
                "schooldataone" => $school_id,
            ];
            return view("school.school_class.addClass")->with($data);
        } else {
            Toastr::error('Messages in here', 'Title', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('school.dashboard');
        }
    }

    public function all_class()
    {
        $cldata=ClassRoom::where('classroom.created_by', Auth::guard('orgSadmin')->user()->school_user_id)
        ->where('schoolinfo.created_by', Auth::guard('orgSadmin')->user()->school_user_id)
        ->join('schoolinfo', 'schoolinfo.schoolid', '=', 'classroom.school_id')
        ->select('classroom.*','schoolinfo.schoolname','schoolinfo.schoolRegistrationId')
        ->orderBy('schoolinfo.schoolname', 'ASC')->orderBy('classroom.class_sl_no', 'ASC')->get();
        $data = [
            'title' => "My Class",
            'schooldata'=>$cldata,
        ];
        return view("school.school_class.allClass")->with($data);
    }

    public function class_info($class_id Request $r){
        $cldata=ClassRoom::where('classroom.created_by', Auth::guard('orgSadmin')->user()->school_user_id)
        ->where('classroom.classroom_id', $class_id)
        ->join('schoolinfo', 'schoolinfo.schoolid', '=', 'classroom.school_id')
        ->where('schoolinfo.created_by', Auth::guard('orgSadmin')->user()->school_user_id)
        ->join('student_school_class', 'student_school_class.class_id', '=', 'classroom.classroom_id')
        ->join('student', 'student.student_id', '=', 'student_school_class.student_id')
        ->where('student_school_class.class_active_status', 'A')
        ->select('student.*','classroom.*','schoolinfo.schoolname','schoolinfo.schoolname','schoolinfo.schoolRegistrationId','student_school_class.student_school_class_id')
        ->orderBy('student_school_class.roll_no', 'ASC')
        ->get();
        // return $cldata;
        $data = [
            'title' => "My Student",
            'schooldata'=>$cldata,
        ];
        return view("school.school_class.class_student")->with($data);
    }
}
