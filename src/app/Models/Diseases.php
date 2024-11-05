<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diseases extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'date_init',
        'name'
    ];

    public function patient()
    {
        return $this->hasOne(Patient::class,'id','patient_id');
    }
}
