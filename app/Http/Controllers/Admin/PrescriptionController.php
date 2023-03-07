<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prescription;
use App\Models\PrescriptionItem;
use App\Models\TherapyPackage;
use App\Models\Therapy;
use Brian2694\Toastr\Facades\Toastr;
use Auth;
class PrescriptionController extends Controller
{
    public function all()
    {
        $prescriptions = Prescription::latest()->get();
        return view('admin.prescription.index', compact('prescriptions'));
    }
    
    public function create()
    {
        return view('admin.prescription.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone_number' => 'required|numeric',
            'weight' => 'required|numeric',
            'age' => 'required|numeric',
            'gender' => 'required|string',
            'observation' => 'required|string',
            'item.*.name' => 'required',
            'item.*.dose' => 'required',
        ]);
        $prescription = Prescription::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email ? $request->email : '',
            'age' => $request->age,
            'weight' => $request->weight,
            'gender' => $request->gender,
            'observation' => $request->observation,
            'investigation' => $request->investigation ? $request->investigation : '',
            'creator_id' => Auth::User()->id,
        ]);
        if($prescription)
        {
            foreach ($request->item as $key => $value) {
                PrescriptionItem::create([
                    'prescription_id' => $prescription->id,
                    'name' => $value['name'],
                    'dose' => $value['dose'],
                ]);
            }
        }
        Toastr::success('Created new prescription :)','Success');
        return redirect()->route('admin.prescriptions.all');
        
    }
    
    // API
    public function show(Prescription $prescription, PrescriptionItem $prescriptionItem, $prescription_id)
    {
        $prescription = $prescription->where(['id'=> $prescription_id])->get();
        $prescriptionItems = $prescriptionItem->where(['prescription_id' => $prescription_id ])->get();
        if( $prescription and $prescriptionItems)
        {
            $package_status = TherapyPackage::where('prescription_id', 1)->first();

            return response()->json([
                'status' => 200,
                'prescription_items' => $prescriptionItems,
                'package' => $package_status
            ]);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'No data found'
            ]);
        }
    }

    public function edit()
    {

    }

    public function update(Request $request)
    {
        
    }

    public function delete(Request $request)
    {
        
    }

    public function detail(Prescription $prescription, PrescriptionItem $prescriptionItem, $prescription_id)
    {
        $prescription = $prescription->where(['id'=> $prescription_id])->first();
        $prescriptionItems = $prescriptionItem->where(['prescription_id' => $prescription_id ])->get();
        if( $prescription and $prescriptionItems)
        {
            $package = TherapyPackage::where('prescription_id', $prescription->id)->first();
            $therapy_attendances = Therapy::where(['package_id' => $package->id])->get();
            $target_attendance = $package->daily_times * $package->num_days;
            $package_progress = ($therapy_attendances->count() / $target_attendance) * 100;
            return view(
                'admin.prescription.detail',
                compact('prescription', 'prescriptionItems', 'package', 'package_progress', 'therapy_attendances')
            );
        }
        else{
            return view('admin.prescription.detail');
        }        
    }
}
