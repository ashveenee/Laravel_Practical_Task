<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::get('/home', [HomeController::class, 'index'])->name('home');


//------------------------Admin start-------------------------------------
Route::resource('admin', AdminController::class);
//------------------------Admin end-------------------------------------

//------------------------User start-------------------------------------
Route::resource('calculation', UserController::class);
Route::post('deleteRecord', [UserController::class, 'deleteRecord'])->name('calculation.deleteRecord');

//------------------------User end-------------------------------------