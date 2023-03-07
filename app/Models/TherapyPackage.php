<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Therapy;

class TherapyPackage extends Model
{
    use HasFactory;

    protected $table = 'therapy_packages';

    protected $fillable = [
        'patient_phonenumber',
        'prescription_id',
        'price',
        'daily_times',
        'num_days',
        'discount',
        'follow_up',
        'notify_followup', // boolean value, default is false
        'note',
        'status', // boolean, default is false
        'creator_id',
    ];

    protected $casts = [
        'status' => 'boolean',
        'notify_followup' => 'boolean'
    ];

    public function therapies()
    {
        return $this->hasMany(Therapy::class, 'foreign_key');
    }
}
