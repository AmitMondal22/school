<?php

namespace App\Http\Controllers\school;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\ClassRoom;
use App\Models\Schoolinfo;
use App\Models\State;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Http;

class Assets extends Controller
{
    public function schoolName(){
        Toastr::success('Messages in here', 'Title', ["positionClass" => "toast-bottom-right"]);
        $data=[
            'title'=>"test"
        ];
        return view("school.assets.addSchool")->with($data);
    }

    public function ip_to_get_data($ip){
        // $response = Http::get('http://ip-api.com/php/103.77.136.81', [
        //     'apiKey' => '395a3e9c0419f45b2fc02da902e75322',
        //     'limit' => 10,
    //     // ]);
    //     http://api.ipapi.com/api/161.185.160.93
    // ? access_key = "395a3e9c0419f45b2fc02da902e75322"
        $response = Http::get('http://ip-api.com/json/'.$ip);
        return json_decode($response);
    }



    public function state($id){
        $state=State::where('country_id', $id)->orderBy('name', 'ASC')->get();
        // return $state;
        $output="";
        foreach ($state as $key) {
            $output.=' <option value="'.$key->id.'">'.$key->name.'</option>';
        }
        echo $output;
    }

    public function city($id){
        $state=City::where('state_id', $id)->orderBy('name', 'ASC')->get();
        // return $state;
        $output="";
        foreach ($state as $key) {
            $output.=' <option value="'.$key->id.'">'.$key->name.'</option>';
        }
        echo $output;
    }

    public function all_classs($id){
        $state=ClassRoom::where('school_id', $id)->orderBy('class_name', 'ASC')->get();
        // return $state;
        $output="";
        foreach ($state as $key) {
            $output.=' <option value="'.$key->classroom_id.'">'.$key->class_name.'</option>';
        }
        echo $output;
    }

    public function get_ip(Request $r){
        return Assets::ip_to_get_data($r->ip);
    }

    public function get_school($id){
        $data= Schoolinfo::where('created_by', $id)->orderBy('schoolname', 'ASC')->get();
        $output="";
        foreach ($data as $key) {
            $output.='<a class="dropdown-item schoolname" href="javascript: void(0);" onclick="school_id('.$key->schoolid.')" school_id="'.$key->schoolid.'">'.$key->schoolname.'</a>';
        }
        echo $output;
    }

    public function get_class_html($school_id){
        $data= ClassRoom::where('school_id', $school_id)->orderBy('class_name', 'ASC')->get();
        $output="";
        foreach ($data as $key) {
            $output.='


            <div class="form-check mb-3">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input class_all" value="'.$key->classroom_id.'" class_id="'.$key->classroom_id.'"> '.$key->class_name.'</label>
        </div>';
        }
        echo $output;
    }
}
