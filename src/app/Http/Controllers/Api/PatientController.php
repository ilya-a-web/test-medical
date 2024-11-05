<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function select2(Request $request) {
        $result = Patient::select("*")->where('last_name','LIKE','%'.$request->get('request').'%')->get();
        return response()->json($result);
    }
}
