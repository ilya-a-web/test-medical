<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'birthday',
        'years',
        'gender',
        'code',
        'contacts_patient',
        'contacts_relatives',
        'region_id',
        'city_id',
        'address',
        'phones',
        'emails',
    ];
}
