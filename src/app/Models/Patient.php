<?php

namespace App\Models;

use App\Models\Geo\GeoCity;
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
        'years_old',
        'gender',
        'patient_code',
        'city_id',
        'address',
        'phones',
        'email',
        'contacts_relatives'
    ];

    public function genderList()
    {
        return [
            'male' => 'Мужской',
            'female' => 'Женский',
        ];
    }

    protected $casts = [
        'phones' => 'array',
        'contacts_relatives' => 'array',
    ];

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->last_name . " " . $this->first_name . " " . $this->middle_name;
    }

    public function getDayWithYearAttribute()
    {
        return date('d.m.Y', $this->birthday) . " ( " . $this->years_old . " )";
    }

    public function getGenderValuesAttribute()
    {
        return $this->genderList()[$this->gender];
    }

    public function city()
    {
        return $this->hasOne(GeoCity::class,'id','city_id');
    }
}
