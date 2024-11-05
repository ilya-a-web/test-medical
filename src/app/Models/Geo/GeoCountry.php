<?php

namespace App\Models\Geo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeoCountry extends Model
{
    use HasFactory;

    protected $table = 'geo_country';

    protected $fillable = [
        'id', 'oid', 'country_name_ru', 'country_name_en'
    ];
}
