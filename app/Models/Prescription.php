<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Prescription extends Model
{
    use HasFactory;

    protected $table = 'prescriptions';

    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'age',
        'weight',
        'gender',
        'observation',
        'investigation',
        'creator_id',
    ];

    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'creator_id');
    }
}
