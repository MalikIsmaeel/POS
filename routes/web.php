<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CounteryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CatogeryController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;
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
  Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
  Auth::routes();

  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

  //  Route::get('/{page}', [AdminController::class, 'index']);

Route::resource('/user',UserController::class);
Route::resource('/catogrey',CatogeryController::class);
Route::resource('/unit',UnitController::class);
Route::resource('/product',ProductController::class);
Route::resource('/countery',CounteryController::class);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


