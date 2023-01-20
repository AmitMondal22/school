<?php

namespace App\Http\Controllers\wrongcode;

use App\Http\Controllers\Controller;
use App\Models\Wc_user;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    public function update_employ(Request $request, $id){



        if($request->isMethod('post')){

            $rules=[
                'name'=>'max:255',
                'email'=>'email|max:255',
                'dateofbirth'=>'date',
                'mobile'=>'max:11',
                'gender'=>'in:Male,Female,Others',
                'userrole'=>'in:S,M,AC,AD,SA',
                'image'=>'image|mimes:jpg,png,jpeg|max:2048',
                // 'password'=>'string|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
            ];
            $valaditor=Validator::make($request->all(),$rules);
            if($valaditor->fails()){
                // return response()->json($valaditor->errors(),401); //400 envalies responce
                Toastr::success($valaditor->errors(), 'Title', ["positionClass" => "toast-bottom-right"]);
                return redirect()->route('wc_register');
            }

            if($request->hasFile('image')) {
            $imageName = rand(0001,9999).time().$request->file('image')->getClientOriginalName();
            $path=$request->image->move(public_path('wc_dp'), $imageName);

            $oldImage = public_path('wc_dp').'/'.$request->old_image;
            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }



            $name =  ucfirst(strtolower(ucfirst(preg_replace('/\s+/', '', $request->name))));
            $datestr = preg_replace('/\s+/', '',  date('dmY', strtotime($request->dateofbirth)));
            $password = $name . '@' . $datestr;


            $data=Wc_user::where('wc_user_id', $id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($password),
                'd_o_b'=>$request->dateofbirth,
                'mobile_no'=>$request->mobile,
                'gender'=>$request->gender,
                'adress'=>$request->adress,
                'dp'=>$imageName,
                'dp_path'=>$path,
                'user_role'=>$request->userrole,
                'update_by'=>auth()->guard('wc_admin')->user()->wc_user_id

            ]);
        }else{
            $name =  ucfirst(strtolower(ucfirst(preg_replace('/\s+/', '', $request->name))));
            $datestr = preg_replace('/\s+/', '',  date('dmY', strtotime($request->dateofbirth)));
            $password = $name . '@' . $datestr;
            $data=Wc_user::where('wc_user_id', $id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($password),
                'd_o_b'=>$request->dateofbirth,
                'mobile_no'=>$request->mobile,
                'gender'=>$request->gender,
                'adress'=>$request->adress,
                'user_role'=>$request->userrole,
                'update_by'=>auth()->guard('wc_admin')->user()->wc_user_id
            ]);
        }
            Toastr::success('Messages in here', 'Title', ["positionClass" => "toast-bottom-right"]);
            return redirect()->route('myemployee_user', ['id' => $id]);

        }else{
        $data=Wc_user::where('wc_user_id',$id)->first();
        $dataa=[
            'data'=>$data
        ];
        return view('wrongcode_admin.auth.updateregister')->with($dataa);
    }
    }
}
