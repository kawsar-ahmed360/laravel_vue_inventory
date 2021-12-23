<?php

use App\Http\Controllers\Api\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\EmployeManageController;
use App\Http\Controllers\Api\SupliarManageController;
use App\Http\Controllers\Api\CategoryManageController;
use App\Http\Controllers\Api\CustomerManageController;
use App\Http\Controllers\Api\ProductManageController;
use App\Http\Controllers\Api\ExpenceController;
use App\Http\Controllers\Api\OrderManageController;
use App\Http\Controllers\Api\PosManageController;
use App\Http\Controllers\Api\SalaryController;
use App\Http\Controllers\Api\StockManageController;

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



Route::get('/Expence-index',[ExpenceController::class,'index']);
Route::post('/Expence-store',[ExpenceController::class,'storeExpence']);
Route::get('/Expence-delete/{id}',[ExpenceController::class,'DeleteExpence']);
Route::get('/Expence-edit/{id}',[ExpenceController::class,'EditeExpence']);
Route::post('/Expence-update/{id}',[ExpenceController::class,'UpdatedExpence']);


Route::get('/all-employe-show',[SalaryController::class,'AllEmployeShow']);
Route::get('/single-employe/{id}',[SalaryController::class,'SingleEmploye']);
Route::post('/sallary-update/{id}',[SalaryController::class,'SalaryUpdate']);
Route::get('/all_salary',[SalaryController::class,'AllSalary']);
Route::get('/monthly_salary_details/{month}',[SalaryController::class,'MonthlySalaryDetails']);
Route::get('/single_salary_edite/{id}',[SalaryController::class,'SingleSalaryEdite']);
Route::post('/single_salary_update/{id}',[SalaryController::class,'SingleSalaryUpdate']);

Route::get('/all_product_show',[StockManageController::class,'AllProductShow']);
Route::get('/single_product_qty/{id}',[StockManageController::class,'SingleProductQty']);
Route::post('/single_product_qty_update/{id}',[StockManageController::class,'SingleProductQtyUpdate']);


Route::get('/Customer-index',[CustomerManageController::class,'index']);
Route::post('/Customer-store',[CustomerManageController::class,'storeCustomer']);
Route::get('/Customer-delete/{id}',[CustomerManageController::class,'DeleteCustomer']);
Route::get('/Customer-edit/{id}',[CustomerManageController::class,'EditeCustomer']);
Route::post('/Customer-update/{id}',[CustomerManageController::class,'UpdatedCustomer']);

Route::get('/pos-index',[PosManageController::class,'index']);
Route::get('/pos-view_all_category',[PosManageController::class,'AllCategory']);
Route::get('/pos-view_all_customer',[PosManageController::class,'AllCustomer']);
Route::get('/pos-cat_wise_product/{id}',[PosManageController::class,'CatWiseProduct']);

Route::get('/add-to-Cart/{id}',[CartController::class,'addToCart']);
Route::get('/view-cart',[CartController::class,'ViewCart']);
Route::get('/remove-cart/{id}',[CartController::class,'RemoveCart']);
Route::get('/decrement-cart/{id}',[CartController::class,'DecrementCart']);
Route::get('/increment-cart/{id}',[CartController::class,'IncrementCart']);


Route::post('/orderdone',[OrderManageController::class,'OrderDone']);
Route::get('/order_view',[OrderManageController::class,'OrderView']);
Route::get('/order_delete/{id}',[OrderManageController::class,'OrderDelete']);
Route::get('/single_order_view/{id}',[OrderManageController::class,'SingleOrderView']);
Route::post('/date_search',[OrderManageController::class,'DateSearch']);
Route::post('/month_search',[OrderManageController::class,'MonthSearch']);
Route::get('/today_total_report',[OrderManageController::class,'TotayTotalReport']);





