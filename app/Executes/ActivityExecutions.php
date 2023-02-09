<?php

namespace App\Executes;
use Illuminate\Support\Facades\App;
use App\Models\ActivityLogs;

class ActivityExecutions 
{
    public function create($activityLog)
    {        
        return ActivityLogs::create($activityLog);
    }
}