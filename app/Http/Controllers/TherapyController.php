<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\TherapyPackage;
use App\Models\User;
use App\Models\Therapy;
use Auth;

class TherapyController extends Controller
{
    public function index()
    {
        $therapies = Therapy::all();
        return view('admin.therapy.index', compact('therapies'));
    }
    public function create(TherapyPackage $therapyPackage)
    {
        $packages = $therapyPackage::where(['status' => 1])
            ->get(['id', 'patient_phonenumber']);
        $soldiers = User::where(['role' => 'assistant'])->get();
        return view('admin.therapy.create', compact('packages', 'soldiers'));
    }

    public function show($session_id)
    {

    }

    public function store(Request $request)
    {
        $request->validate([
            'package_id' => 'required|numeric',
            'assistant_id' => 'required|numeric',
        ]);
        Log::info("Trying to create therapy session");
        $therapy = Therapy::create([
            'package_id' => $request->package_id,
            'assistant_id' => $request->assistant_id,
            'notes' => $request->notes ? $request->notes : '',
            'created_by' => Auth::user()->id,
        ]);
        if($therapy)
        {
            Toastr::success('Created new prescription :)','Success');
            return redirect()->route('admin.therapy-sessions.index');
        }else
        {
            Toastr::error('Failed to add new therapy session :)','Error');
            return redirect()->back();
        }
    }
}
