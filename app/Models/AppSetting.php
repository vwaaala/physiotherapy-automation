<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'contact_person',
        'address',
        'city',
        'police_station',
        'postal_code',
        'email',
        'primary_phone',
        'secondary_phone',
        'facebook_url',
    ];
}
