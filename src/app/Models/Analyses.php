<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analyses extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'date_result_create',
        'date_result_done',
        'result',
        'laboratory',
    ];

    public function patient()
    {
        return $this->hasOne(Patient::class,'id','patient_id');
    }
}
