<?php

use App\Http\Controllers\ThreeSixtyController;
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
});
Route::get('/three-sixty',[ThreeSixtyController::class,'index']);
Route::post('/three-sixty/store',[ThreeSixtyController::class,'store']);
Route::get('/three-sixty/{id}/{url}',[ThreeSixtyController::class,'look']);
Route::get('/three-sixty/delete/{id}',[ThreeSixtyController::class,'delete']);
