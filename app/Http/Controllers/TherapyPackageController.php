<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TherapyPackage;
use App\Models\Prescription;
use Brian2694\Toastr\Facades\Toastr;
use Auth;
class TherapyPackageController extends Controller
{
    //
    public function index()
    {
        $packages = TherapyPackage::all();
        return view('admin.therapy-packages.index', compact('packages'));
    }

    public function create($prescription_id)
    {
        $prescription_id = (int)$prescription_id;
        $package = TherapyPackage::where(['prescription_id' => $prescription_id])->first();
        if(!$package)
        {
            return view('admin.therapy-packages.create', compact('prescription_id'));
        }else
        {
            Toastr::error('A package already exists with this prescription!\r\n Task aborted  :)','Error');
            return redirect()->back();
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'prescription_id' => 'required|numeric',
            'num_days' => 'required|numeric',
            'price' => 'required|numeric',
            'daily_times' => 'required|numeric',
            'follow_up' => 'required|string',
            'notify_followup' => 'required|boolean',
        ]);
        $prescription = Prescription::where(['id' => $request->prescription_id])->first();
        $package = TherapyPackage::create([
            'prescription_id' => $prescription->id,
            'patient_phonenumber' => $prescription->phone_number,
            'price' => $request->price,
            'daily_times' => $request->daily_times,
            'num_days' => $request->num_days,
            'discount' => $request->discount ? $request->discount : 0,
            'follow_up' => $request->follow_up,
            'notify_followup' => $request->notify_followup,
            'note' => $request->note ? $request->note : '',
            'status' => 1,
            'creator_id' => Auth::user()->id,
        ]);
        if($package)
        {
            Toastr::success('Package assigned to the prescription :)','Success');
            return redirect()->route('admin.therapy-packages.index');
        }else
        {
            Toastr::error('A package already exists with this prescription!\r\n Task aborted  :)','Error');
            return redirect()->back();
        }
    }
    public function edit()
    {

    }
}
