<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function select2(Request $request) {
        $result = User::select("*")->where('name','LIKE','%'.$request->get('request').'%')->get();
        return response()->json($result);
    }
}
