<?php

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
Route::resource('categorias', App\Http\Controllers\CategoriaController::class);
Route::resource('clientes', App\Http\Controllers\ClienteController::class);
Route::resource('compras', App\Http\Controllers\CompraController::class);
Route::resource('facturas', App\Http\Controllers\FacturaController::class);
Route::resource('inventarios', App\Http\Controllers\InventarioController::class);
Route::resource('metodopagos', App\Http\Controllers\MetodopagoController::class);
Route::resource('pedidos', App\Http\Controllers\PedidoController::class);
Route::resource('productos', App\Http\Controllers\ProductoController::class);
Route::resource('promociones', App\Http\Controllers\PromocioneController::class);
Route::resource('proveedores', App\Http\Controllers\ProveedoreController::class);
Route::resource('tipoclientes', App\Http\Controllers\TipoclienteController::class);
Route::resource('tipocompras', App\Http\Controllers\TipocompraController::class);
Route::resource('tipovendedores', App\Http\Controllers\TipovendedoreController::class);
Route::resource('vendedores', App\Http\Controllers\VendedoreController::class);
Route::resource('ventas', App\Http\Controllers\VentaController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
