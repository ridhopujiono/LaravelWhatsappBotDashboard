<?php

use App\Http\Controllers\HouseFloorController;
use App\Http\Controllers\HouseTypeController;
use App\Http\Controllers\LocationPointController;
use App\Http\Controllers\MasterController;
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

Route::get('/locations', [LocationPointController::class, 'getLocations']);
Route::get('/floors/{id}', [HouseFloorController::class, 'getFloors']);
Route::get('/house_types/{id}', [HouseTypeController::class, 'getHouseTypesById']);
Route::get('/schemas_and_descriptions/{id}', [MasterController::class, 'getSchemasAndDescriptions']);
