<?php

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
