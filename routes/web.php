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

Route::get('get_products_by_id', [ProductController::class, 'get_products_by_id'])->name('get_products_by_id');

Route::post('/facturas-buscar-cliente', [App\Http\Controllers\SaleController::class, 'buscarCliente'])->name('buscarCliente');





Route::resource('clients', ClientController::class)->names('clients');

// Route::resource('cotizaciones', ClientController::class);





