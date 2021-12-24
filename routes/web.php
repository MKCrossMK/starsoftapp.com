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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth']);

Route::get('/listaproductos', [App\Http\Controllers\ProductController::class, 'index'])->name('indexproducto')->middleware(['auth']);

Route::get('/detallesproductos/{product}', [App\Http\Controllers\ProductController::class, 'show'])->name('showproducto')->middleware(['auth']);

Route::get('/creandoproductos', [App\Http\Controllers\ProductController::class, 'create'])->name('createproducto')->middleware(['auth']);

Route::post('/creandoproductos', [App\Http\Controllers\ProductController::class, 'store'])->name('storeproducto')->middleware(['auth']);

Route::get('/editarproductos/{product}', [App\Http\Controllers\ProductController::class, 'edit'])->name('editproducto')->middleware(['auth']);

Route::patch('/actualizarproductos/{product}', [ProductController::class, 'update'])->name('updateproducto')->middleware(['auth']);


// Clientes-Rutas
Route::get('/listaclientes', [App\Http\Controllers\ClientController::class, 'index'])->name('indexcliente')->middleware(['auth']);

Route::get('/detallesclientes/{client}', [App\Http\Controllers\ClientController::class, 'show'])->name('showcliente')->middleware(['auth']);

Route::get('/creandoclientes', [App\Http\Controllers\ClientController::class, 'create'])->name('createcliente')->middleware(['auth']);

Route::post('/creandoclientes', [App\Http\Controllers\ClientController::class, 'store'])->name('storecliente')->middleware(['auth']);

Route::get('/editarclientes/{client}', [App\Http\Controllers\ClientController::class, 'edit'])->name('editcliente')->middleware(['auth']);

Route::patch('/actualizarclientes/{client}', [ClientController::class, 'update'])->name('updatecliente')->middleware(['auth']);


//Sales o ventas rutas

Route::get('/listaventas', [App\Http\Controllers\SaleController::class, 'index'])->name('indexsale')->middleware(['auth']);

Route::get('/listarecibos', [App\Http\Controllers\SaleController::class, 'indexpayment'])->name('indexpaysale')->middleware(['auth']);

Route::get('/detallesventas/{sale}', [App\Http\Controllers\SaleController::class, 'show'])->name('showsale')->middleware(['auth']);

Route::get('/pdf/{sale}', [App\Http\Controllers\SaleController::class, 'pdf'])->name('pdfsale')->middleware(['auth']);

Route::get('/creandoventa', [App\Http\Controllers\SaleController::class, 'create'])->name('createsale')->middleware(['auth']);

Route::post('/creandoventa', [App\Http\Controllers\SaleController::class, 'store'])->name('storesale')->middleware(['auth']);

Route::get('/editarventa/{sale}', [App\Http\Controllers\SaleController::class, 'edit'])->name('editsale')->middleware(['auth']);

Route::patch('/recibo/{sale}', [App\Http\Controllers\SaleController::class, 'updatePay'])->name('updatepaysale')->middleware(['auth']);

Route::get('/sale/findclient', [App\Http\Controllers\SaleController::class, 'findclient'])->middleware(['auth']);

Route::get('/sale/findproduct', [App\Http\Controllers\SaleController::class, 'findproduct'])->middleware(['auth']);



//Cotizacion rutas

Route::get('/listacotizacion', [App\Http\Controllers\QuotationController::class, 'index'])->name('indexquote')->middleware(['auth']);

Route::get('/detallescotizacion/{quotation}', [App\Http\Controllers\QuotationController::class, 'show'])->name('showquote')->middleware(['auth']);

Route::get('/pdf/cotizacion/{quotation}', [App\Http\Controllers\QuotationController::class, 'pdf'])->name('pdfquote')->middleware(['auth']);

Route::get('/creandocotizacion', [App\Http\Controllers\QuotationController::class, 'create'])->name('createquote')->middleware(['auth']);

Route::post('/creandocotizacion', [App\Http\Controllers\QuotationController::class, 'store'])->name('storequote')->middleware(['auth']);

Route::get('/editarcotizacion/{quotation}', [App\Http\Controllers\QuotationController::class, 'edit'])->name('editquote')->middleware(['auth']);

Route::patch('/actualizarcotizacion/{quotation}', [App\Http\Controllers\QuotationController::class, 'update'])->name('updatequote')->middleware(['auth']);

Route::get('/cotizacion/findclient', [App\Http\Controllers\QuotationController::class, 'findclient'])->middleware(['auth']);

Route::get('/cotizacion/findproduct', [App\Http\Controllers\QuotationController::class, 'findproduct'])->middleware(['auth']);





Route::resource('clients', ClientController::class)->names('clients')->middleware(['auth']);

// Route::resource('cotizaciones', ClientController::class);





