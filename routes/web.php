<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\SubCityController;
use App\Http\Controllers\CounteryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CatogeryController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreMstrController;
use App\Http\Controllers\StoreDtlController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\InvoiceParchaseEntityController;
use App\Http\Controllers\PurchaseInvoiceController;
use App\Http\Controllers\POScontroller;
use App\Http\Controllers\CartController;
use App\Http\Controllers\salesController;
use App\Http\Controllers\QrController;
use App\Models\store_dtl;

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
  Route::get('/cart',[CartController::class,'show'])->name('cart');
  Route::get('/cart/{id}',[CartController::class,'addTocart'])->name('add_cart');
  Route::get('/g_catg/{id}',[StoreDtlController::class,'get_by_catogery'])->name('entity_catgery');
  Route::get('/invoice',function(){
    return dd(session('cart'));
  });
    //  Route::get('/{page}', [AdminController::class, 'index']);
    route::resource('/sales',salesController::class);
     Route::get('/qr',[QrController::class,'index'])->name('qr');
     Route::POST('/qr',[QrController::class,'generate'])->name('qr');
// 
Route::resource('/user',UserController::class);
Route::resource('/POS',POScontroller::class);
Route::resource('/catogrey',CatogeryController::class);
Route::resource('/unit',UnitController::class);
Route::resource('/product',ProductController::class);
Route::resource('/countery',CounteryController::class);
Route::resource('/city',CityController::class);
Route::resource('/subcity',SubCityController::class);
Route::resource('/store',StoreMstrController::class);
Route::resource('/option',OptionController::class);
Route::resource('/entity',StoreDtlController::class);

Route::resource('/supplier',SupplierController::class);
Route::resource('/purchase',PurchaseInvoiceController::class);
// Route::resource('/pur_entity',InvoiceParchaseEntityController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pur_entity/{id}', [InvoiceParchaseEntityController::class, 'index'])->name('pur_entity');
Route::get('file-import-export', [UserController::class, 'fileImportExport']);

Route::post('file-import', [UserController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [UserController::class, 'fileExport'])->name('file-export');
Route::post('file-import', [UserController::class, 'fileImport'])->name('file-import');
Route::post('file-import-countery', [counteryController::class, 'fileImport'])->name('file-import-countery');
// ajax routes
Route::get('file-import-export', [UserController::class, 'fileImportExport']);