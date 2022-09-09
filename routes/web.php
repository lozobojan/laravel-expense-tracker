<?php

use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ExpenseSubtypeController;
use App\Http\Controllers\ExpenseTypeController;
use App\Models\ExpenseType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::redirect('/', '/home');

Route::group(['middleware' => 'auth'], function (){
    Route::resource('/expense-type', ExpenseTypeController::class);
    Route::resource('/expense-subtype', ExpenseSubtypeController::class);
    Route::resource('/expense', ExpenseController::class);
    Route::get('/expense-subtype/get-by-type/{expense_type}', [ ExpenseSubtypeController::class, 'getByTypeId' ])->name('get-subtypes-by-type');
    Route::get('/expense/{expense}/attachments', [ ExpenseController::class, 'showAttachments' ])->name('show-attachments');

    Route::view('/settings', 'settings', [
        'types' => ExpenseType::query()->orderBy('name')->get()
    ])->name('settings');

    Route::post('/attach-detach/{expense_type}', [ExpenseTypeController::class, 'attachTypeToUser'])->name('expense-type.attach-detach');
});
