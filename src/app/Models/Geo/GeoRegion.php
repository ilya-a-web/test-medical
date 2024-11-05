<?php

namespace App\Models\Geo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeoRegion extends Model
{
    use HasFactory;

    protected $table = 'geo_region';

    protected $fillable = [
        'id', 'id_country', 'oid', 'region_name_ru', 'region_name_en'
    ];
}
