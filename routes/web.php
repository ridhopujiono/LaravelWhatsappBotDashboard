<?php

use App\Http\Controllers\HouseFloorController;
use App\Http\Controllers\HouseTypeController;
use App\Http\Controllers\LocationPointController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\NextProjectController;
use App\Http\Controllers\UrgentProjectController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
})->name('login');
Route::get('/logout', [UserController::class, 'logout'],);
Route::post('/auth', [UserController::class, 'authenticate'],);
Route::resource('location', LocationPointController::class)->middleware('auth');
Route::resource('house_floor', HouseFloorController::class)->middleware('auth');
Route::resource('house_type', HouseTypeController::class)->middleware('auth');
Route::resource('master', MasterController::class)->middleware('auth');
Route::resource('interest', UrgentProjectController::class)->middleware('auth');
Route::resource('request_project', NextProjectController::class)->middleware('auth');
