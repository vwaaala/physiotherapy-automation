<?php

namespace App\Motives;
use Illuminate\Support\Facades\App;
use Session;
use App\Executes\ActivityExecutions;

class ActivityMotives 
{
    public function footprint($email, $description)
    {
        $user = Session::get('user');
        
        $activityLog = [
            // if email param is empty then catch user email from session
            'email'=> (empty($email) ? $user->email : $email),
            'description' => $description,
        ];
        $action = App::make(ActivityExecutions::class)->create($activityLog);
        if($action)
        {
            return ['status' => true, 'message' => 'Success'];
        }else
        {
            return ['status' => false, 'message' => 'Failed'];
        }
    }
}