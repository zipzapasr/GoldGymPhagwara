<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('expire_date',[CustomerController::class,'ExpireDate'])->name('expire_date');

Route::get('/dashboard',[CustomerController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');;



///costmer index
Route::get('view/coustomer/{id?}', [CustomerController::class, 'ShowForm'])->name('customer_form');
    
//     return view('customerForm')->name('form');
// });
Route::post('insert/record',[CustomerController::class, 'SaveCustomer'])->name('send_data');
Route::get('category/status/{statusId}/{id}', [CustomerController::class, 'UpdateStatus']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
