<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\MedicalDepartment;
use Session;
use DB;
use App\Models\AppSetting;

class AppSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        //
        $role = Session::get('role');
        if($role === 'admin'){
            $company_profile = AppSetting::where('id', 1)->first();
            return view('admin.appsetting.profile', compact('company_profile')); 
        }
    }

    public function create(Request $request)
    {

        
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => ['required', 'string'],
            'contact_person' => 'required|string',
            'address' => 'required|string|max:255',
            'city' => 'required|string',
            'police_station' => 'required',
            'postal_code'=> 'required|string',
            'email'=> 'required|string|email',
            'primary_phone'=> 'required|string',
            'secondary_phone'=> 'required|string',
            'facebook_url' => 'required|string',
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedicalDepartment  $medicalDepartment
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    public function edit(Request $request)
    {
        if($request->session()->get('role') === 'admin'){
            
            $validator = Validator::make($request->all(), [
                'company_name' => ['required', 'string'],
                'contact_person' => 'required|string',
                'address' => 'required|string|max:255',
                'city' => 'required|string',
                'police_station' => 'required',
                'postal_code'=> 'required|string',
                'email'=> 'required|string|email',
                'primary_phone'=> 'required|string',
                'secondary_phone'=> 'required|string',
                'facebook_url' => 'required|string',
            ]);
            if($validator->fails()){
                return response()->json([
                    'status' => 419,
                    'message' => $validator->errors(),
                ]);
            }else{
                return response()->json([
                    'status' => 200,
                    'message' => 'validated',
                ]);
            }
        }else{
            return response()->json([
                'status' => 419,
                'role' => 'you are '.$request->session()->get('role'.' and not authorized'),
            ]);
        }
        
    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }
}
