<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\AppSetting;
use App\Models\ContactUs;

class PortfolioController extends Controller
{
    //
    public function index(){
        $company_profile = AppSetting::where('id', 1)->first();
        return view('portfolio.index', compact('company_profile'));
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
                    'status': 500,
                    'message': 'Internal server error'
                ])
            }
        }
    }

    function create(){
        $contact = ContactUs::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'phone_number'=> $request->phone_number,
            'subject'=> $request->subject,
            'message' => $request->message,
        ]);
    }
}
