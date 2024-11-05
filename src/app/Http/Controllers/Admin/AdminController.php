<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Analyses;
use App\Models\Diseases;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use function Termwind\render;

class AdminController extends Controller
{
    public function index()
    {
        /*$result = [];
        $result['patients']['total'] = Patient::all()->count();
        $result['analyses']['total'] = Analyses::all()->count();
        $result['diseases']['total'] = Diseases::all()->count();

        $result['diseases']['usersCount'] = DB::select("
        SELECT name, COUNT(patient_id) AS count FROM diseases GROUP BY name ORDER BY COUNT(patient_id) DESC
        ");

        $result['diseases']['region'] = DB::select("
SELECT gr.region_name_ru AS region_name, COUNT(a.id) AS count
FROM analyses a
INNER JOIN patients AS p ON p.id = a.patient_id
INNER JOIN geo_city AS gc ON gc.id = p.city_id
INNER JOIN geo_region AS gr ON gr.id = gc.id_region
GROUP BY gc.id_region
        ");*/


        return view('admin.index');
    }
}
