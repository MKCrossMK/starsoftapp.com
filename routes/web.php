<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/listaproductos', [App\Http\Controllers\ProductController::class, 'index'])->name('indexproducto');

Route::get('/detallesproductos/{product}', [App\Http\Controllers\ProductController::class, 'show'])->name('showproducto');

Route::get('/creandoproductos', [App\Http\Controllers\ProductController::class, 'create'])->name('createproducto');

Route::post('/creandoproductos', [App\Http\Controllers\ProductController::class, 'store'])->name('storeproducto');

Route::get('/editarproductos/{product}', [App\Http\Controllers\ProductController::class, 'edit'])->name('editproducto');

Route::patch('/actualizarproductos/{product}', [ProductController::class, 'update'])->name('updateproducto');


// Clientes-Rutas
Route::get('/listaclientes', [App\Http\Controllers\ClientController::class, 'index'])->name('indexcliente');

Route::get('/detallesclientes/{client}', [App\Http\Controllers\ClientController::class, 'show'])->name('showcliente');

Route::get('/creandoclientes', [App\Http\Controllers\ClientController::class, 'create'])->name('createcliente');

Route::post('/creandoclientes', [App\Http\Controllers\ClientController::class, 'store'])->name('storecliente');

Route::get('/editarclientes/{client}', [App\Http\Controllers\ClientController::class, 'edit'])->name('editcliente');

Route::patch('/actualizarclientes/{client}', [ClientController::class, 'update'])->name('updatecliente');


//Sales o ventas rutas

Route::get('/listaventas', [App\Http\Controllers\SaleController::class, 'index'])->name('indexsale');

Route::get('/detallesventas/{sale}', [App\Http\Controllers\SaleController::class, 'show'])->name('showsale');

Route::get('/creandoventa', [App\Http\Controllers\SaleController::class, 'create'])->name('createsale');

Route::post('/creandoventa', [App\Http\Controllers\SaleController::class, 'store'])->name('storesale');

Route::get('/editarventa/{sale}', [App\Http\Controllers\SaleController::class, 'edit'])->name('editsale');

Route::patch('/actualizarclientes/{sale}', [App\Http\Controllers\SaleController::class, 'update'])->name('updatesale');

Route::get('/sale/findclient', [App\Http\Controllers\SaleController::class, 'findclient']);

Route::get('/sale/findproduct', [App\Http\Controllers\SaleController::class, 'findproduct']);



//Cotizacion rutas

Route::get('/listacotizacion', [App\Http\Controllers\QuotationController::class, 'index'])->name('indexquote');

Route::get('/detallescotizacion/{quotation}', [App\Http\Controllers\QuotationController::class, 'show'])->name('showquote');

Route::get('/creandocotizacion', [App\Http\Controllers\QuotationController::class, 'create'])->name('createquote');

Route::post('/creandocotizacion', [App\Http\Controllers\QuotationController::class, 'store'])->name('storequote');

Route::get('/editarcotizacion/{quotation}', [App\Http\Controllers\QuotationController::class, 'edit'])->name('editquote');

Route::patch('/actualizarcotizacion/{quotation}', [App\Http\Controllers\QuotationController::class, 'update'])->name('updatequote');

Route::get('/cotizacion/findclient', [App\Http\Controllers\QuotationController::class, 'findclient']);

Route::get('/cotizacion/findproduct', [App\Http\Controllers\QuotationController::class, 'findproduct']);





Route::resource('clients', ClientController::class)->names('clients');

// Route::resource('cotizaciones', ClientController::class);





