<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Appointment;
use App\Models\User;
use Auth;
use Session;

class AppointmentController extends Controller
{
    //
    public function all_appointment(Appointment $appointment){
        $appointments = $appointment::latest()->get();
        $doctors = User::where(['role' => 'doctor'])->get();
        return view('admin.appointment.index', compact('appointments', 'doctors'));
    }
    
    public function create()
    {
        $doctors = User::where(['role' => 'doctor'])->get();
        return view('admin.appointment.add', compact('doctors'));
    }
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'appointment_date' => 'required|string',
            'name' => 'required|string',
            'doctor' => 'required|email',
            'phone_number' => 'required|numeric',
            'appointment_status' => 'required|string'
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 419,
                'message' => $validator->errors(),
            ]);
        }else
        {
            $email = $request->email ? $request->email : "";
            $message = $request->message ? $request->message : "";
            $notes = $request->notes ? $request->notes : "";

            $appointment = Appointment::create([
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
                    'message' => 'Created new appointment!',
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

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'appointment_id' => 'required|numeric',
            'appointment_date' => 'required|string',
            'name' => 'required|string',
            'doctor' => 'required|email',
            'phone_number' => 'required|numeric',
            'appointment_status' => 'required|string'
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status' => 419,
                'message' => $validator->errors(),
            ]);
        }else
        {   
            $email = $request->email ? $request->email : "";
            $message = $request->message ? $request->message : "";
            $notes = $request->notes ? $request->notes : "";

            $appointment = Appointment::where(['id' => $request->appointment_id])->update([
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
                    'message' => 'Appointment updated!',
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

    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 419,
                'message' => $validator->errors(),
            ]);
        }else
        {
            Appointment::where(['id' => $request->id])->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Deleted appointment',
            ]);
        }
    }

    public function change_status(Request $request)
    {
        
        $validator = Validator::make($request->all(),[
            'new_status' => 'required|string',
            'id' => 'required|numeric'
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status' => 419,
                'message' => $validator->errors(),
            ]);
        }else
        {
            $appointment = Appointment::where(['id' => $request->id])->update(['status' => $request->new_status]);
            return response()->json([
                'status' => 200,
                'message' => 'Appointment status updated',
            ]);
        }
    }
}
