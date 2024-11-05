<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Geo\GeoCity;
use Illuminate\Http\Request;

class GeoController extends Controller
{
    public function select2(Request $request) {
        $result = GeoCity::select("*")->where('city_name_ru','LIKE','%'.$request->get('request').'%')->get();
        if( $result ) {
            foreach ($result as $key => $val) {
                $result[$key]['name'] = $val->city_full;
            }
        }
        return response()->json($result);
    }
}
