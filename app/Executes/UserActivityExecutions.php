<?php

namespace App\Executes;
use Illuminate\Support\Facades\App;
use DB;
use Session;
class UserActivityExecutions 
{
    public function insert($action, $reference)
    {
        $user = Session::get('user');

        $user_activity_log = [
            'email' => $user->email,
            'status' => $user->status,
            'role' => $user->role,
            'action' => $action,
            'reference' => $reference,
        ];
        DB::table('user_activity_logs')->insert($user_activity_log);
    }
}