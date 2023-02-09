<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    public function getPassword($token)
    {
        return view('auth.passwords.reset', ['token' => $token]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $investigation = DB::table('password_resets')->where(
            ['email'=>$request->email, 'token'=> $request->token]
        )->first();

        if(!$investigation)
        {
            Toastr::error('Invalid token! :)','Error');
            return back();
        }
        else
        {
            $user = User::where('email', $request->email)->update(
                ['password'=> Hash::make($request->password),]
            );
            DB::table('password_resets')->where([
                'email'=> $request->email,
            ])->delete();
            Toastr::success('Your password has been changed! :)','Success');
            return redirect('/login');
        }
    }
}
