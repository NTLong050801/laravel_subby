<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('company')->group(function (){
        Route::get('/',[CompanyController::class,'index'])->name('company.index');
        Route::get('/create',[CompanyController::class,'create'])->name('company.create');
        Route::post('store',[CompanyController::class,'store'])->name('company.store');
        Route::get('/{id}/edit',[CompanyController::class,'edit'])->name('company.edit');
        Route::post('/{id}/update',[CompanyController::class,'update'])->name('company.update');
        Route::get('/delete/{id}',[CompanyController::class,'destroy'])->name('company.destroy');
    });
});

require __DIR__.'/auth.php';
