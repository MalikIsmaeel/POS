<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CatogeryController;

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
    return view('index');
});

Auth::routes();
//  Route::get('/{page}', [AdminController::class, 'index']);
Route::get('/will', function () {
    return view('catogery.edit');
});
Route::resource('/user',UserController::class);
Route::resource('/catogrey',CatogeryController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
