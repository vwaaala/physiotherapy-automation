<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
class DoctorController extends Controller
{
    private $permitted = 'doctor';
    public function dashboard(){
        // $role = Session::get('role');
        if(Session::get('role') == $this->permitted){
            return view('doctor.dashboard');
        }else{
            return view('error.401');
        }
    }
    
    public function patients(){
        if(Session::get('role') == $this->permitted){
            return view('doctor.patients');
        }else{
            return view('error.401');
        }
    }
    
    public function appointments(){
        if(Session::get('role') == $this->permitted){
            return view('doctor.appointments');
        }else{
            return view('error.401');
        }
    }

    public function prescriptions(){
        if(Session::get('role') == $this->permitted){
            return view('doctor.prescriptions');
        }else{
            return view('error.401');
        }
    }
    public function honorium(){
        if(Session::get('role') == $this->permitted){
            return view('doctor.honorium');
        }else{
            return view('error.401');
        }
    }
    public function cashout(){
        if(Session::get('role') == 'Doctor'){
            return view('doctor.cashout');
        }else{
            return view('error.401');
        }
    }
}
