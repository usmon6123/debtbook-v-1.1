<?php

use App\Http\Controllers\DebtListController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


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
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [MainController::class, 'main'])->name('main');
    Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');
    Route::get('/search', [MainController::class, 'search'])->name('search');
    Route::get('/debt-list/{id}',[DebtListController::class,'getId'])->name('debt-list.getId');
    Route::post('/debt-list',[DebtListController::class,'createForm'])->name('debt-list.create-form');
    Route::resource('/debtbook',DebtListController::class);
});

require __DIR__ . '/auth.php';
