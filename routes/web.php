<?php

use App\Http\Controllers\FontendController;
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


Route::get('/',[FontendController::class,'mainIndex'])->name('mainIndex');

Route::get('/{vue_capture?}',[FontendController::class,'mainIndex'])->where('vue_capture','[\/\w\.-]*');