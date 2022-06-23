<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\ActoresController;
use App\Http\Controllers\CuentasController;
use App\Http\Controllers\DependenciasController;
use App\Http\Controllers\EstatusController;
use App\Http\Controllers\ExpedientesController;

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

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');

Route::controller(EstadosController::class)->group(function() {
    Route::get('estados/index', 'index')->name('estados.index');
    Route::get('estados/post', 'post')->name('estados.post');
    Route::post('estados/store', 'store')->name('estados.store');
});

Route::controller(ActoresController::class)->group(function() {
    Route::get('actores/index', 'index')->name('actores.index');
});

Route::controller(CuentasController::class)->group(function() {
    Route::get('cuentas/index', 'index')->name('cuentas.index');
});

Route::controller(DependenciasController::class)->group(function() {
    Route::get('dependencias/index', 'index')->name('dependencias.index');
});

Route::controller(EstatusController::class)->group(function() {
    Route::get('estatus/index', 'index')->name('estatus.index');
});

Route::controller(ExpedientesController::class)->group(function() {
    Route::get('expedientes/index', 'index')->name('expedientes.index');
});


require __DIR__.'/auth.php';
