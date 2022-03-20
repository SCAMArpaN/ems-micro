<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/create', [HomeController::class,'Create'])->name('create');
    Route::get('/employee-form', [HomeController::class,'Form'])->name('employee-form');
    Route::post('email-validate', [HomeController::class, 'checkEmail'])->name('checkEmail');
    Route::post('delete', [HomeController::class, 'deleteEmployee'])->name('delete-employee');
});
