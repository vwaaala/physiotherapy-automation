<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivityLogs extends Model
{
    use HasFactory;
    protected $table = 'user_activity_logs';
    protected $fillable = [
        'email',
        'status',
        'role',
        'action',
        'reference',
    ];
}
