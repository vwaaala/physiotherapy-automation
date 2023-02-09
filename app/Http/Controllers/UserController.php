<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Brian2694\Toastr\Facades\Toastr;
use App\Motives\UserMotives;
use Auth;
use DB;
use Session;
class UserController extends Controller
{
    // profile
    public function profile(){
        $user = Auth::User();
        if($user){
            return view('user.profile');
        }else{
            return redirect()->route('login');
        }
    }

    public function update_personal_info(Request $request){
        $user = Auth::User();
        $request->validate([
            'passport_no' => 'required|string',
            'passport_expdate' => 'required|string',
            'national_id' => 'required|string',
            'nationality' => 'required|string',
            'religion' => 'required|string',
            'maritual_status' => 'required|string',
            'spouse_employment' => 'required|string',
            'no_of_children' => 'required|string',
        ]);
        $data = [
            'passport_no' => $request->passport_no,
            'passport_expdate' => $request->passport_expdate,
            'national_id' => $request->national_id,
            'nationality' => $request->nationality,
            'religion' => $request->religion,
            'maritual_status' => $request->maritual_status,
            'spouse_employment' => $request->spouse_employment,
            'no_of_children' => $request->no_of_children,
        ];
        DB::beginTransaction();
        try{
            $action = App::make(UserMotives::class)->update_personal_information($user->id, $data);
            DB::commit();
            Toastr::success('Personal information updated successfully :)','Success');
            return redirect()->route('user.profile');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Failed to update personal information :)','Error');
            return redirect()->back();
        }
    }

    public function create_education_information(Request $request){
        $request->validate([
            'addmore.*.name' => 'required',
            'addmore.*.qty' => 'required',
            'addmore.*.price' => 'required',
        ]);
    
        foreach ($request->addmore as $key => $value) {
            ProductStock::create($value);
        }
    }
}
