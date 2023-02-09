<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\User;
use App\Models\Patient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class PatientController extends Controller
{
    public function all()
    {
        return view('admin.patient.table');
    }

    public function create()
    {return view('admin.patient.create');}

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Commit patient record to database
        DB::beginTransaction();
        try{
            $new_user = new User();
            $new_user->name = $request->name;
            $new_user->email = $request->email;
            $new_user->password = $request->password;
            $new_user->stage = 'patient';
            $new_user->save();

            $patient = new Patient();
            $patient->user_id = $new_user->id;
            $patient->save();
            Toastr::success('Added patient successfully :)','Success');
            DB::commit();
            return redirect()->route('admin.patient.all');
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Add patient fail :)','Error');
            return redirect()->back();
        }

    }
}
