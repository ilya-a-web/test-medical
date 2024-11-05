<?php

use App\Http\Controllers\Api\GeoController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\WorkSpaceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['api']], function ($router) {
    Route::post('/users/select2',[UsersController::class, 'select2']);
    Route::post('/patient/select2',[PatientController::class, 'select2']);
    Route::post('/workspace/select2',[WorkSpaceController::class, 'select2']);
    Route::post('/geo/select2',[GeoController::class, 'select2']);
});
