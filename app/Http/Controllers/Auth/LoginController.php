<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Auth;
use DB;
use App\Models\User;
use Carbon\Carbon;
use Session;
use App\Motives\ActivityMotives;
use Brian2694\Toastr\Facades\Toastr;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'locked', 'unlock']);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);
        $email = $request->email;
        $password = $request->password;
        
        /* in attempt
        * pass
        * params @ 'status'=>'Active'
        *
        */
        if (Auth::attempt(['email'=> $email,'password'=> $password,])) {
            /** set session **/
            $user = Auth::User();
            $role = $user->role;
            $email = $user->email;
            Session::put('user', $user);
            Session::put('role', $role);
            Session::put('email', $email);
            $footprint = App::make(ActivityMotives::class)->footprint('','Sign in');
            Toastr::success('Login successfully :)','Success');
            if($role == 'admin'){
                return redirect()->route('admin.dashboard');
            }elseif($role == 'patient'){
                return redirect()->route('patient.dashboard');
            }elseif($role == 'doctor'){
                return redirect()->route('doctor.dashboard');
            }
            
        } else {
            Toastr::error('fail, WRONG USERNAME OR PASSWORD :)','Error');
            return redirect('login');
        }
    }

    public function logout()
    {
        $user = Auth::User();
        Session::put('user', $user);
        // insert signout log
        $footprint = App::make(ActivityMotives::class)->footprint('','Sign out');
        // clean
        Session::put('user', '');
        Session::put('email', '');
        Auth::logout();

        Toastr::success('Logout successfully :)','Success');
        return redirect('login');
    }

}
