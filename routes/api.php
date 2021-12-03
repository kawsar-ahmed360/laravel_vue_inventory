<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\EmployeManageController;
use App\Http\Controllers\Api\SupliarManageController;
use App\Http\Controllers\Api\CategoryManageController;
use App\Http\Controllers\Api\ProductManageController;


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

Route::group([

    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class,'login']);
    Route::post('signup', [AuthController::class,'signup']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);
    Route::post('payload', [AuthController::class,'Payload']);

});

Route::get('/employe-index',[EmployeManageController::class,'index']);
Route::post('/employe-store',[EmployeManageController::class,'storeEmploye']);
Route::get('/employe-delete/{id}',[EmployeManageController::class,'DeleteEmploye']);
Route::get('/employe-edit/{id}',[EmployeManageController::class,'EditeEmploye']);
Route::post('/employe-update/{id}',[EmployeManageController::class,'UpdatedEmploye']);


Route::get('/supliar-index',[SupliarManageController::class,'index']);
Route::post('/supliar-store',[SupliarManageController::class,'storeEmploye']);
Route::get('/supliar-delete/{id}',[SupliarManageController::class,'DeleteEmploye']);
Route::get('/supliar-edit/{id}',[SupliarManageController::class,'EditeEmploye']);
Route::post('/supliar-update/{id}',[SupliarManageController::class,'UpdatedEmploye']);


Route::get('/category-index',[CategoryManageController::class,'index']);
Route::post('/category-store',[CategoryManageController::class,'storeCategory']);
Route::get('/category-delete/{id}',[CategoryManageController::class,'DeleteCategory']);
Route::get('/category-edit/{id}',[CategoryManageController::class,'EditeCategory']);
Route::post('/category-update/{id}',[CategoryManageController::class,'UpdatedCategory']);


Route::get('/Product-index',[ProductManageController::class,'index']);
Route::post('/Product-store',[ProductManageController::class,'storeProduct']);
Route::get('/Product-delete/{id}',[ProductManageController::class,'DeleteProduct']);
Route::get('/Product-edit/{id}',[ProductManageController::class,'EditeProduct']);
Route::post('/Product-update/{id}',[ProductManageController::class,'UpdatedProduct']);
Route::get('/category-view',[ProductManageController::class,'CategoryView']);
Route::get('/supliar-view',[ProductManageController::class,'SupliarView']);

