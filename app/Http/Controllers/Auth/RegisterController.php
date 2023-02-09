<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Brian2694\Toastr\Facades\Toastr;
use Hash;
use DB;
use Carbon\Carbon;
use App\Motives\UserMotives;

class RegisterController extends Controller
{
    public function register()
    {
        // we cal also pass roles from user_roles_type table
        $role = DB::table('roles')->get();
        return view('auth.register', compact('role'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user_data = [
            'name'      => $request->name,
            'avatar'    => $request->image,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'role'      => 'patient',
            'avatar'    => 'photo_defaults.jpg'
        ];
        DB::beginTransaction();
        try{
            App::make(UserMotives::class)->create($user_data);
            DB::commit();
            Toastr::success('Create new patient account successfully :)', 'Success');
            return redirect('login');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Something went wront! :(', 'Error');
            return redirect()->back();
        }
    }
}
