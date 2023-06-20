<?php

use App\Http\Controllers\HouseFloorController;
use App\Http\Controllers\HouseTypeController;
use App\Http\Controllers\LocationPointController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\NextProjectController;
use App\Http\Controllers\UrgentProjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('location', LocationPointController::class);
Route::resource('house_floor', HouseFloorController::class);
Route::resource('house_type', HouseTypeController::class);
Route::resource('master', MasterController::class);
Route::resource('interest', UrgentProjectController::class);
Route::resource('request_project', NextProjectController::class);
