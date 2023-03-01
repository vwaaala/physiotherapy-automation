<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prescription;
use App\Models\PrescriptionItem;
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
        dd($prescription->id);
        return view('admin.prescriptions.index');
        
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
}
