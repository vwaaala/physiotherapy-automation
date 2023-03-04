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
use App\Executes\UserExecutions;
use App\Executes\UserActivityExecutions;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index(Request $request)
    {
        $users = User::paginate(1);
        $roles = DB::table('roles')->get();
        $user_status = DB::table('user_status_type')->get();

        // filter
        $searchRole = $request->get('filter_role');
        if(!empty($searchName))
        {
            
        }
        return view('admin.user.index', compact('users', 'roles', 'user_status', ));
    }
     public function create()
     {
        $roles = DB::table('roles')->get();
        $user_status = DB::table('user_status_type')->get();
        return view('admin.user.create', compact('roles', 'user_status',));
     }
    // 
    public function activityLog()
    {
        $activity_logs = DB::table('activity_logs')->get();
        return view('admin.user.activity_logs', compact('activity_logs'));
    }

    // 
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:8|confirmed',
            'phone_number'=> 'required|string',
            'role'=> 'required|string',
            'user_status'=> 'required|string',
            'gender'=> 'required|string',
            'address' => 'required|string',
        ]);

        $image = $request->image ? time().'.'.$request->image->extension() : "photo_defaults.jpg";
        
        $user_data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'birth_date' => $request->birth_date ? $request->birth_date : "" ,
            'role' => $request->role,
            'status' => $request->user_status,
            'blood_group' => $request->blood_group ? $request->blood_group : "",
            'address' => $request->address,
            'avatar' => $image,
            'status' => $request->user_status,
            // TODO status_notes handle this field f.ex: activated by admin manually
        ];

        // Motive
        DB::beginTransaction();
        try{
            $motive = App::make(UserExecutions::class)->create($user_data);
            if($motive){
                if($request->image)
                {
                    $request->image->move(public_path('admin/assets/images/avatar/'), $image);
                }
                App::make(UserActivityExecutions::class)->create('Created new user', $request->phone_number);
            }
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
    public function update(Request $request)
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
                'gender' => $request->gender,
                'birth_date' => $request->birth_date,
                'blood_group' => $request->blood_group,
                'address' => $request->address,
                'avatar' => $image_name,
                'phone_number' => $request->phone_number,
                'status' => $request->user_status,
                'role' => $request->role,
                // TODO status_notes handle this field f.ex: activated by admin manually
            ];

            $user_activity_log = [
                'email' => $user->email,
                'status' => $user->status,
                'role' => $user->role,
                'action' => 'Modified user',
                'reference' => $request->email,
            ];
            $motive = App::make(UserExecutions::class)->update($request->user_id, $update);
            App::make(UserActivityExecutions::class)->create('Modified user', $request->email);
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
    public function delete(Request $request)
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
                unlink('admin/assets/images/avatar/'.$request->avatar);
                User::where('id',$request->id)->delete();
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

    public function all()
    {
        $roles = User::distinct()->get(['role']);
        return view('admin.user.all', compact('roles'));
    }

    // filter user
    public function filterUser(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get('start');
        $rowPerPage = $request->get('length');

        // table sorting
        $collumnIndex_arr = $request->get('order');
        $collumnName_arr = $request->get('columns');
        $search_arr = $request->get('search');
        $order_arr = $request->get('order');

        $columnIndex = $collumnIndex_arr[0]['column'];
        $columnName = $collumnName_arr[$columnIndex]['data'];
        $columnSortOrder = $order_arr[0]['dir'];
        $searchValue = $search_arr['value'];

        // filter requestes
        $searchRole = $request->get('filter_role');
        $searchName = $request->get('searchName');

        // total users
        $records = User::select('count(*) as allcount');
        // filter conditions
        if(!empty($searchRole))
        {
            $records->where('role', $searchRole);
        }
        if(!empty($searchName)){
            $records->where('name','like','%'.$searchName.'%');
        }

        $totalRecords = $records->count();
        
         // Total records with filter
        $records = User::select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%');
        if(!empty($searchRole))
        {
            $records->where('role', $searchRole);
        }
        if(!empty($searchName)){
            $records->where('name','like','%'.$searchName.'%');
        }
        $totalRecordswithFilter = $records->count();
        $records = User::orderBy($columnName,$columnSortOrder)
            ->select('users.*')
            ->where('users.name', 'like', '%' .$searchValue . '%');
        if(!empty($searchRole))
        {
            $records->where('role', $searchRole);
        }
        if(!empty($searchName)){
            $records->where('name','like','%'.$searchName.'%');
        }
        $all_users = $records
            ->skip($start)
            ->take($rowPerPage)
            ->get();

        $data_arr = array();
        foreach($all_users as $user )
        {
            $name = $user->name;
            $email = $user->email;
            $role = $user->role;
            $gender = $user->gender;
            $data_arr[] = array(
                "name" => $name,
                "email" => $email,
                "role" => $role,
                "gender" => $gender,
            );             
        }
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );
        return response()->json($response);

    }
}
