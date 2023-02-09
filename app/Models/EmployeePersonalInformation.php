<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeePersonalInformation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'passport_no',
        'passport_expdate',
        'national_id',
        'nationality',
        'religion',
        'maritual_status',
        'spose_employment',
        'no_of_children',
    ];
}
