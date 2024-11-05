<?php

namespace App\Models\Geo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeoCity extends Model
{
    use HasFactory;

    protected $table = 'geo_city';

    protected $fillable = [
        'id', 'id_region', 'id_country', 'oid', 'city_name_ru', 'city_name_en',
    ];

    public function getCityFullAttribute() {
        $city[] = $this->city_name_ru;
        $city[] = '( '.$this->region->region_name_ru.' )';
        $city[] = '( '.$this->country->country_name_ru.' )';
        return implode(' ', $city);
    }

    public function country() {
        return $this->hasOne(GeoCountry::class,'id','id_country');
    }

    public function region() {
        return $this->hasOne(GeoRegion::class,'id','id_region');
    }
}
