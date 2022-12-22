<?php

namespace App\Http\Controllers\school;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\ClassRoom;
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
        //     'apiKey' => 'YOUR_API_KEY_HERE',
        //     'limit' => 10,
        // ]);
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
}
