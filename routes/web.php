<?php

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

#get all employees /employees
Route::get("/employees","App\Http\Controllers\EmployeesController@index");
#POST GET PATCH, PUT ,DELETE
#get /employees/create
Route::get("/employees/create","App\Http\Controllers\EmployeesController@create");
#submit employee post /employees
Route::post("/employees","App\Http\Controllers\EmployeesController@store");
#show employee  get /employees/emp_id/show
Route::get("/employees/{employee}","App\Http\Controllers\EmployeesController@show");
#edit employee  get /employees/emp_id/edit
Route::get("/employees/{employee}/edit","App\Http\Controllers\EmployeesController@edit");
#update employee  put /employees/emp_id
Route::put("/employees/{employee}/update","App\Http\Controllers\EmployeesController@update");
#delete  employee  delete /employees/emp_id/delete
Route::delete("/employees/{employee}/delete","App\Http\Controllers\EmployeesController@destroy");
