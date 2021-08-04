<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;


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
Route::get('/',[EmployeeController::class,'show'])->name('employees');

//Employee Crud Routes
Route::get('employees',[EmployeeController::class,'show'])->name('employees');
Route::post('employees/store',[EmployeeController::class,'store'])->name('employee.store');
Route::get('edit/{id}',[EmployeeController::class,'editemployee'])->name('edit.employee');
Route::get('delete/{id}',[EmployeeController::class,'destroyemployee'])->name('delete.employee');
Route::post('employee/update',[EmployeeController::class,'updateemployee'])->name('update.employee');

