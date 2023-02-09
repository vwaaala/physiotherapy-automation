<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;


class PatientController extends Controller
{
    // Permission level
    private $permitted = 'patient';
    //
    public function dashboard(){
        if(Session::get('role') == $this->permitted ){
            return view('patient.dashboard');
        }else{
            return view('error.401');
        }
    }

    public function therapy(){
        return view('patient.therapy');
    }

    public function prescriptions(){
        if(Session::get('role') == $this->permitted){
            return view('patient.prescriptions');
        }else{
            return view('error.401');
        }
    }

    public function appointments(){
        if(Session::get('role') == $this->permitted){
            return view('patient.appointments');
        }else{
            return view('error.401');
        }
    }

    public function invoices(){
        if(Session::get('role') == $this->permitted){
            return view('patient.invoices');
        }else{
            return view('error.401');
        }
    }

    public function transactions(){
        if(Session::get('role') == $this->permitted){
            return view('patient.transactions');
        }else{
            return view('error.401');
        }
    }
}
