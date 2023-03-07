<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TherapyPackage;
use App\Models\User;
class Therapy extends Model
{
    use HasFactory;
    protected $table = 'therapies';
    protected $fillable = [
        'package_id',
        'assistant_id',
        'notes',
        'created_by',
    ];

    public function package()
    {
        return $this->belongsTo(TherapyPackage::class);
    }

    public function assistant($id)
    {
        $assistant = User::where(['id' => $id])->first();
        return $assistant->name;
    }
}
