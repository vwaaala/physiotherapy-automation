<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointments';
    protected $fillable = [
        'name',
        'email', 
        'phone_number',
        'date',
        'doctor', // email
        'message',
        'status', // processing, success, spam
        'notes', // nullable
        'created_by', // email
    ];
}
