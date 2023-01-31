<?php

use App\Http\Controllers\CompraController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\FacturaController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('producto', [ProductoController::class, 'index']);
    Route::get('producto/crear', [ProductoController::class, 'create']);
    Route::post('producto/guardar', [ProductoController::class, 'store']);
    Route::get('producto/{id}/modificar', [ProductoController::class, 'edit']);
    Route::put('producto/{id}/actualizar', [ProductoController::class, 'update']);
    Route::get('producto/{id}/eliminar', [ProductoController::class, 'destroy']);

    Route::get('compra', [CompraController::class, 'index']);
    Route::post('compra/guardar', [CompraController::class, 'store']);
    Route::get('compra/{id}/detalle', [CompraController::class, 'detalle']);


    Route::get('factura', [FacturaController::class, 'index']);
    Route::get('factura/pendiente', [FacturaController::class, 'facturasPendientes']);
    Route::get('factura/{id}/generar', [FacturaController::class, 'generar']);
    Route::get('factura/listado', [FacturaController::class, 'listado']);
});



