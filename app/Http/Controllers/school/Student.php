<?php

namespace App\Http\Controllers\school;

use App\Http\Controllers\Controller;
use App\Http\Controllers\school\Assets;
use App\Models\ClassRoom;
use App\Models\Country;
use App\Models\School_student;
use App\Models\Schoolinfo;
use App\Models\Student_model;
use App\Models\Student_school_class;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class Student extends Controller
{
    public function student_admision(Request $r)
    {
        if ($r->isMethod('post')) {

            $name = ucfirst(preg_replace('/\s+/', '', $r->f_name));
            $datestr = preg_replace('/\s+/', '',  date('dmY', strtotime($r->dob)));
            $pass = $name . '@' . $datestr;


            $data = Student_model::create([
                'first_name' => $r->f_name,
                'middle_name' => $r->m_name,
                'last_name' => $r->l_name,
                'father_name' => $r->father_name,
                'mother_name' => $r->mother_name,
                'parent_Guardian_Name' => $r->parent_Guardian_Name,
                'gender' => $r->gender,
                'date_of_birtg' => $r->dob,
                // 'admission_date'=>$r->admission_date,
                'aadhar_no' => $r->aadharno,
                'mobileno' => $r->mobileno,
                'email' => $r->email,
                'password' => Hash::make($pass),
                'adress' => $r->adress,
                'country_id' => $r->country_id,
                'state_id' => $r->state_id,
                'city_id' => $r->city_id,
                'pin_no' => $r->pin,
                "created_by" => Auth::guard('orgSadmin')->user()->school_user_id,
                'update_by' => Auth::guard('orgSadmin')->user()->school_user_id
            ]);


            $screglastid = School_student::where('created_by', Auth::guard('orgSadmin')->user()->school_user_id)
                ->where('school_id', $r->school_id)
                ->orderByRaw('ISNULL(school_reg_id), school_reg_id ASC')
                ->first();


            $school_registrasionId = empty($screglastid) ? 1 : $screglastid->school_reg_id + 1;

            $student_id = $data->student_id;
            $data2 = School_student::create([
                'school_reg_id' => $school_registrasionId,
                'student_id' => $student_id,
                'school_id' => $r->school_id,
                'school_active' => 'PO',
                'status' => 'A',
                "created_by" => Auth::guard('orgSadmin')->user()->school_user_id,
                'update_by' => Auth::guard('orgSadmin')->user()->school_user_id
            ]);


            $school_student_id = $data2->school_reg_id;

            // $st_id=Student_school_class::orderByRaw('ISNULL(student_school_class_id), student_school_class_id ASC')
            // ->first();
            // $student_school_class_id=empty($st_id) ? 1 : $st_id->student_school_class_id+1;

            $roll_id = Student_school_class::where('school_id', $r->school_id)
                ->where('class_id', $r->class_id)
                ->orderByRaw('ISNULL(student_school_class_id), student_school_class_id ASC')
                ->first();
            $rollno = empty($roll_id) ? 1 : $roll_id->roll_no + 1;
            $data3 = Student_school_class::create([
                // 'student_school_class_id'=>$student_school_class_id,
                'student_id' => $student_id,
                'school_id' => $r->school_id,
                'class_id' => $r->class_id,
                'school_student_id' => $school_student_id,
                'roll_no' => $rollno,
                'session_id' => $r->session_id,
                'year' => date('Y', strtotime($r->admission_date)),
                'class_active_status' => 'A',
                'admission_date' => $r->admission_date,
                "created_by" => Auth::guard('orgSadmin')->user()->school_user_id,
                'update_by' => Auth::guard('orgSadmin')->user()->school_user_id
            ]);

            Toastr::success('Messages in here', 'Title', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('school.my_student');
        } else {
            $ipdata = (new Assets)->ip_to_get_data($r->ip);
            $data = [
                'title' => "Student Admision",
                'country' => Country::where('name', $ipdata->country)->orderBy('name', 'ASC')->get(),
                'school' => Schoolinfo::where('created_by', Auth::guard('orgSadmin')->user()->school_user_id)->select('schoolname', 'schoolid')->orderBy('schoolname', 'ASC')->get()

            ];
            return view("school.student.admision_student")->with($data);
        }
    }

    public function my_student(Request $r)
    {
        $myschool_id = Schoolinfo::select('schoolid')
            ->where('created_by', Auth::guard('orgSadmin')->user()->school_user_id)
            ->get()->toArray();
        $scid = [];
        foreach ($myschool_id as $key => $value) {
            array_push($scid, $value['schoolid']);
        }
        $mystd = School_student::whereIn('school_student.school_id', $scid)
            ->join('student', 'student.student_id', '=', 'school_student.student_id')
            ->join('student_school_class', 'student_school_class.school_student_id', '=', 'school_student.school_student_id')
            // ->join('student_school_class', 'student_school_class.school_student_id', '=', 'school_student.school_student_id')
            ->join('schoolinfo', 'schoolinfo.schoolid', '=', 'school_student.school_id')
            ->select('student.*', 'schoolinfo.schoolname', 'schoolinfo.schoolRegistrationId', 'student_school_class.roll_no', 'student_school_class.year', 'student_school_class.admission_date as adate')
            ->get();
        if ($r->ajax()) {
            $data = $mystd;
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    if ($row->status) {
                        return '<span class="badge badge-primary">Active</span>';
                    } else {
                        return '<span class="badge badge-danger">Deactive</span>';
                    }
                })
                ->filter(function ($instance) use ($r) {
                    // if ($r->get('status') == '0' || $r->get('status') == '1') {
                    //     $instance->where('status', $r->get('status'));
                    // }
                    if (!empty($r->get('search'))) {
                        $instance->where(function ($w) use ($r) {
                            $search = $r->get('search');
                            $w->orWhere('student.first_name', 'LIKE', "%$search%")
                                ->orWhere('student_school_class.roll_no', 'LIKE', "%$search%")
                                ->orWhere('schoolinfo.schoolname', 'LIKE', "%$search%")
                                ->orWhere('schoolinfo.schoolRegistrationId', 'LIKE', "%$search%")
                                ->orWhere('student_school_class.year', 'LIKE', "%$search%")
                                ->orWhere('student_school_class.adate', 'LIKE', "%$search%")
                                ->orWhere('student.father_name', 'LIKE', "%$search%")
                                ->orWhere('student.gender', 'LIKE', "%$search%")
                                ->orWhere('student.date_of_birtg', 'LIKE', "%$search%")
                                ->orWhere('student.mobileno', 'LIKE', "%$search%");
                        });
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-rowid="' . $row->student_id . '" class="edit btn btn-info btn-sm" >View</a>
                    <a href="javascript:void(0)" data-rowid="' . $row->student_id . '" class="edit btn btn-primary btn-sm" >Edit</a>
                    <a href="javascript:void(0)" data-rowid="' . $row->student_id . '" class="edit btn btn-danger btn-sm" >Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $rtdata = [
            'title' => "my Student",
            // "schooldata"=>$mystd
        ];
        return view("school.student.my_student")->with($rtdata);
    }

    public function class_level_up(Request $r)
    {
        foreach ($r->checked as $value) {
            $data = Student_school_class::where('student_school_class_id', $value)->first()->toArray();
            $data2 = ClassRoom::where('classroom_id', $data['class_id'])->first()->toArray();
            $clsid = $data2['class_sl_no'] + 1;
            $data3 = ClassRoom::where('school_id', $data2['school_id'])->where('class_sl_no', $clsid)->first()->toArray();
            // return $data3;
            if (!empty($data3)) {
                $Student_school_class = Student_school_class::where('student_school_class_id', $value)->first()->toArray();
                $myscid = Student_school_class::where('student_school_class_id', $value)->update(['class_active_status' => 'PO']);
                // return $myscid;
                if (!empty($myscid)) {
                    $data3 = Student_school_class::create([
                        'student_id' => $Student_school_class['student_id'],
                        'school_id' => $data3['school_id'],
                        'class_id' => $data3['classroom_id'],
                        'school_student_id' => $Student_school_class['school_student_id'],
                        'roll_no' => $Student_school_class['roll_no'],
                        'session_id' => 0,
                        'year' => date('Y', strtotime(($Student_school_class['year'] + 1))),
                        'admission_date' => date("Y-m-d"),
                        'class_active_status' => 'A',
                        "created_by" => Auth::guard('orgSadmin')->user()->school_user_id,
                        'update_by' => Auth::guard('orgSadmin')->user()->school_user_id
                    ]);
                    $rtval = 1;
                } else {
                    $rtval = 2;
                }
            } else {
                $rtval = 3;
            }
        }
        return $rtval;
    }

    // =======================all student filter ========================================

    public function my_student_filter(Request $r)
    {
        $class_id = $r->get('class_id');
        $myschool_id = Schoolinfo::select('schoolid')
            ->where('created_by', Auth::guard('orgSadmin')->user()->school_user_id)
            ->get()->toArray();
        $scid = [];
        foreach ($myschool_id as $key => $value) {
            array_push($scid, $value['schoolid']);
        }

        $mystd = Student_school_class::whereIn('student_school_class.school_id', $scid)

            // ->where('classroom.classroom_id', $class_id)

            ->join('schoolinfo', 'schoolinfo.schoolid', '=', 'student_school_class.school_id')

            ->join('student', 'student.student_id', '=', 'student_school_class.student_id')
            ->join('classroom', 'classroom.classroom_id', '=', 'student_school_class.class_id');


            if ($r->get('status') == 'A' || $r->get('status') == 'PO') {
                $mystd=$mystd->where('student_school_class.class_active_status', $r->get('status'));
            }

            if ($r->get('class_id') != '' || $r->get('class_id') != null) {
                $mystd=$mystd->whereIn('student_school_class.class_id', $r->get('class_id'));
            }
            // ->where('student_school_class.class_active_status', 'A')

            $mystd=$mystd->select('student.*', 'classroom.class_name', 'schoolinfo.schoolname', 'schoolinfo.schoolname', 'schoolinfo.schoolRegistrationId', 'student_school_class.student_school_class_id', 'student_school_class.year', 'student_school_class.admission_date as adate', 'student_school_class.roll_no')
            ->orderBy('student_school_class.roll_no', 'ASC')
            ->get();
        // return  $mystd;



        if ($r->ajax()) {
            $data = $mystd;
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    if ($row->status) {
                        return '<span class="badge badge-primary">Active</span>';
                    } else {
                        return '<span class="badge badge-danger">Deactive</span>';
                    }
                })
                ->filter(function ($instance) use ($r) {
                    // if ($r->get('status') == 'A' || $r->get('status') == 'PO') {
                    //     $instance->where('status', $r->get('status'));
                    // }

                    // if ($r->get('class_id') != '' || $r->get('class_id') != null) {
                    //     $instance->orWhereIn('student_school_class.class_id', $r->get('class_id'));
                    // }
                    if (!empty($r->get('search'))) {
                        $instance->where(function ($w) use ($r) {
                            $search = $r->get('search');
                            $w->orWhere('student.first_name', 'LIKE', "%$search%")
                                ->orWhere('student_school_class.roll_no', 'LIKE', "%$search%")

                                ->orWhere('schoolinfo.schoolname', 'LIKE', "%$search%")
                                ->orWhere('schoolinfo.schoolRegistrationId', 'LIKE', "%$search%")


                                ->orWhere('student_school_class.year', 'LIKE', "%$search%")
                                ->orWhere('student_school_class.adate', 'LIKE', "%$search%")
                                ->orWhere('classroom.class_name', 'LIKE', "%$search%")


                                ->orWhere('student.father_name', 'LIKE', "%$search%")
                                ->orWhere('student.gender', 'LIKE', "%$search%")
                                ->orWhere('student.date_of_birtg', 'LIKE', "%$search%")
                                ->orWhere('student.mobileno', 'LIKE', "%$search%");
                        });
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-rowid="' . $row->student_id . '" class="edit btn btn-info btn-sm" >View</a>
                    <a href="javascript:void(0)" data-rowid="' . $row->student_id . '" class="edit btn btn-primary btn-sm" >Edit</a>
                    <a href="javascript:void(0)" data-rowid="' . $row->student_id . '" class="edit btn btn-danger btn-sm" >Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $rtdata = [
            'title' => "All Student",
            // "schooldata"=>$mystd
        ];
        return view("school.student.all_student")->with($rtdata);
    }
}
