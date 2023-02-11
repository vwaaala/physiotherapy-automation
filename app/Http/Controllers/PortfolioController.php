<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\AppSetting;
use App\Models\ContactUs;
use App\Models\User;
use App\Models\Appointment as AppointmentModel;

class PortfolioController extends Controller
{
    //
    public function index(){
        $company_profile = AppSetting::where('id', 1)->first();
        $doctor = User::where('role', 'doctor')->get();
        return view('portfolio.index', compact('company_profile', 'doctor'));
    }

    public function contact_us(Request $request){
        $validator = Validator::make($request->all(), [
            'name'=> 'required|string',
            'email'=> 'required|string|email',
            'phone_number'=> 'required|string',
            'subject'=> 'required|string',
            'message' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 419,
                'message' => $validator->errors(),
            ]);
        }else{
            $contact = ContactUs::create([
                'name'=> $request->name,
                'email'=> $request->email,
                'phone_number'=> $request->phone_number,
                'subject'=> $request->subject,
                'message' => $request->message,
            ]);
            if($contact){
                return response()->json([
                    'status' => 200,
                    'message' => 'OK',
                ]);
            }else{
                return response()->json([
                    'status'=> 500,
                    'message'=> 'Internal server error'
                ]);
            }
        }
    }

    public function appointment(Request $request){
        $validator = Validator::make($request->all(), [
            'name'=> 'required|string',
            'email'=> 'required|string|email',
            'phone_number'=> 'required|string',
            'appointment_date'=> 'required|string',
            'doctor'=> 'required|string|email',
            'message' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 419,
                'message' => $validator->errors(),
            ]);
        }
        else{
            $appontment = AppointmentModel::create([
                'name'=> $request->name,
                'email'=> $request->email,
                'phone_number'=> $request->phone_number,
                'date'=> $request->appointment_date,
                'doctor'=> $request->doctor,
                'message' => $request->message,
            ]);
            if($appontment){
                return response()->json([
                    'status' => 200,
                    'message' => 'OK',
                ]);
            }else{
                return response()->json([
                    'status'=> 500,
                    'message'=> 'Internal server error'
                ]);
            }
        }
    }
}
