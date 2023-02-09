<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeEducationInformation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "employee_education_information";
    protected $fillable = [
        'user_id',
        'institution_name',
        'degree',
        'roll_number',
        'campus',
        'grade',
        'start_date',
        'end_date',
    ];
}
