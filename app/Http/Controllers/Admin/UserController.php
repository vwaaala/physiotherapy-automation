<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Brian2694\Toastr\Facades\Toastr;
use Auth;
use DB;
use Hash;
use Session;
use App\Models\User;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index()
    {
        $users = DB::table('users')->get();
        $roles = DB::table('roles')->get();
        $user_status = DB::table('user_status_type')->get();
        return view('admin.user.index', compact('users', 'roles', 'user_status', ));
    }

    // 
    public function activityLog()
    {
        $activity_logs = DB::table('activity_logs')->get();
        return view('admin.user.activity_logs', compact('activity_logs'));
    }

    // 
    public function addUser(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
            'gender'=> 'required|string',
            'blood_group'=> 'required|string',
            'phone_number'=> 'required|string',
            'role'=> 'required|string',
            'user_status'=> 'required|string',
            'dobday' => 'required|string',
            'dobmonth' => 'required|string',
            'dobyear' => 'required|string',
            'image'     => 'required|image',
        ]);
        $birth_date = array($request->dobyear, $request->dobmonth, $request->dobday);

        $image = time().'.'.$request->image->extension();
        $request->image->move(public_path('admin/assets/images/avatar/'), $image);

        $user_data = [
            'name' => $request->name,
            'email' => $request->email,
            'birth_date' => join("-",$birth_date),
            'phone_number' => $request->phone,
            'role' => $request->role,
            'gender' => $request->gender,
            'blood_group' => $request->blood_group,
            'status' => $request->user_status,
            // TODO status_notes handle this field f.ex: activated by admin manually
            'avatar' => $image,
            'password' => Hash::make($request->password),
        ];
        // Motive
        DB::beginTransaction();
        try{
            App::make(UserMotives::class)->create($user_data);
            DB::commit();
            Toastr::success('Create new account successfully :)','Success');
            return redirect()->route('admin.users.index');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('User add new account fail :)','Error');
            return redirect()->back();
        }
    }

    // Update user
    public function updateUser(Request $request)
    {
        $user = Auth::User();
        Session::put('user', $user);
        $user = Session::get('user');
        $image_name = $request->hidden_image;
        
        // Motive
        DB::beginTransaction();
        try{
            // get form data 
            if($request->hasFile('image')){
                $image = $request->file('image');
                if($image_name == 'photo_defaults.jpg'){
                    $image_name = rand() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('/admin/assets/images/avatar/'), $image_name);
                }else{
                    // remove previous avatar first
                    unlink('admin/assets/images/avatar/'.$image_name);
                    $image_name = rand() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('/admin/assets/images/avatar/'), $image_name);
                }
            }

            $update = [
                'name' => $request->name,
                'email' => $request->email,
                'birth_date' => $request->birth_date,
                'phone_number' => $request->phone_number,
                'role' => $request->role,
                'gender' => $request->gender,
                'blood_group' => $request->blood_group,
                'status' => $request->user_status,
                'avatar' => $image_name,
            ];
            $user_activity_log = [
                'email' => $user->email,
                'status' => $user->status,
                'role' => $user->role,
                'action' => 'Modified user',
                'reference' => $request->email,
            ];
            DB::table('user_activity_logs')->insert($user_activity_log);
            User::where('id',$request->id)->update($update);
            DB::commit();
            Toastr::success('User updated successfully :)','Success');
            return redirect()->route('admin.users.index');
        }catch(Exception $e)
        {
            DB::rollback();
            Toastr::error('User update fail :)','Error');
            return redirect()->back();
        }
    }

    // Delete user
    public function deleteUser(Request $request)
    {
        $user = Auth::User();
        Session::put('user', $user);
        $user= Session::get('user');
        // Motives
        DB::beginTransaction();
        try{
            $user_activity_log = [
                'email' => $user->email,
                'status' => $user->status,
                'role' => $user->role,
                'action' => 'Modified user',
                'reference' => $request->id,
            ];
            if($request->avatar =='photo_defaults.jpg'){
                User::destroy($request->id);
            }else{
                User::destroy($request->id);
                unlink('assets/images/avatar/'.$request->avatar);
            }
            DB::table('user_activity_logs')->insert($user_activity_log);
            DB::commit();
            Toastr::success('User deleted successfully :)','Success');
            return redirect()->route('admin.users.index');
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('User deleted fail :)','Error');
            return redirect()->back();
        }
    }

    // User activity logs
    public function userActivityLog()
    {
        $user_activity_logs = DB::table('user_activity_logs')->get();
        return view('admin.user.user_activity_logs', compact('user_activity_logs'));
    }
}
