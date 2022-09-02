<?php

use App\Http\Controllers\ExpenseSubtypeController;
use App\Http\Controllers\ExpenseTypeController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::redirect('/', '/home');

Route::group(['middleware' => 'auth'], function (){
    Route::resource('/expense-type', ExpenseTypeController::class);
    Route::resource('/expense-subtype', ExpenseSubtypeController::class);
});
