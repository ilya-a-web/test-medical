<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WorkSpace;
use Illuminate\Http\Request;

class WorkSpaceController extends Controller
{
    public function select2(Request $request) {
        $result = WorkSpace::select("*")->where('name','LIKE','%'.$request->get('request').'%')->get();
        return response()->json($result);
    }
}
