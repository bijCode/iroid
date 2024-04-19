<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/companies', [App\Http\Controllers\HomeController::class, 'companies'])->name('companies');
Route::get('admin/companies/add', [App\Http\Controllers\HomeController::class, 'addCompany'])->name('companiesAdd');
Route::post('admin/companies/add', [App\Http\Controllers\HomeController::class, 'storeCompany'])->name('storeCompany');
Route::get('admin/companies/{company}/edit', [App\Http\Controllers\HomeController::class, 'editCompany'])->name('editCompany');
Route::put('admin/companies/{company}', [App\Http\Controllers\HomeController::class, 'updateCompany'])->name('updateCompany');
Route::get('admin/employees', [App\Http\Controllers\HomeController::class, 'employees'])->name('employees');
Route::get('admin/employee/add', [App\Http\Controllers\HomeController::class, 'addEmployee'])->name('employeeAdd');
Route::post('admin/employee/add', [App\Http\Controllers\HomeController::class, 'storeEmployee'])->name('employeeStore');
Route::get('admin/employee/{employee}/edit', [App\Http\Controllers\HomeController::class, 'editEmployee'])->name('editEmployee');
Route::put('admin/employee/{employee}', [App\Http\Controllers\HomeController::class, 'updateEmployee'])->name('updateEmployee');
