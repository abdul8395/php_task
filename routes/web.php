<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\taskController;

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

Route::get('/user' , [taskController::class,'user'])->name('user');
Route::get('/admin' , [taskController::class,'admin'])->name('admin');
Route::get('/super' , [taskController::class,'super'])->name('super');

Route::match(['get','post'], '/store_address', [taskController::class, 'store_address'])->name('store_address');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
