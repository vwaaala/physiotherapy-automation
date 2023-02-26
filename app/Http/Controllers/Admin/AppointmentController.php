<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Appointment;
use Auth;
use Session;

class AppointmentController extends Controller
{
    //
    public function all_appointment(Appointment $appointment){
        $appointments = $appointment::all();
        return view('admin.appointment.index', compact('appointments'));
    }

    public function create_appointment(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'phone_number'=> 'required|numeric',
            'appointment_date' => 'required|string',
            'doctor' => 'required|email',
            'appointment_status' => 'required|string'
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 419,
                'message' => $validator->errors(),
            ]);
        }else{
            $email = $request->email ? $request->email : '';
            $message = $request->message ? $request->message : '';
            $notes = $request->notes ? $request->note : '';

            $appontment = Appointment::create([
                'name' => $request->name,
                'email' => $email,
                'phone_number' => $request->phone_number,
                'date' => $request->appointment_date,
                'doctor' => $request->doctor,
                'message' => $message,
                'status' => $request->appointment_status,
                'notes' => $notes,
                'created_by' => Auth::User()->email,
            ]);
            if($appointment){
                return response()->json([
                    'status' => 200,
                    'message' => 'ok',
                ]);
            }else{
                log($request->all());
                return response()->json([
                    'status' => 500,
                    'message' => 'Please try again',
                ]);
            }
        }
    }
}
