<?php

namespace App\Executes;
use Illuminate\Support\Facades\App;
use Session;
use App\Models\UserActivityLogs;

class UserActivityExecutions 
{
    public function create($action, $reference)
    {
        $user = Session::get('user');

        $user_activity_log = [
            'email' => $user->email,
            'status' => $user->status,
            'role' => $user->role,
            'action' => $action,
            'reference' => $reference,
        ];
        return UserActivityLogs::create($user_activity_log);
    }


}