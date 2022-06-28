<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\ActoresController;
use App\Http\Controllers\CuentasController;
use App\Http\Controllers\DependenciasController;
use App\Http\Controllers\EstatusController;
use App\Http\Controllers\ExpedientesController;
use App\Http\Controllers\FestivoController;
use App\Http\Controllers\MunicipiosController;
use App\Http\Controllers\NotificacionesController;
use App\Http\Controllers\CobranzaController;
use App\Http\Controllers\PaisesController;
use App\Http\Controllers\PeticionesController;
use App\Http\Controllers\ProcesosController;
use App\Http\Controllers\RegionesController;
use App\Http\Controllers\RespaldoController;
use App\Http\Controllers\SituacionesController;
use App\Http\Controllers\TramitesController;




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
    Route::get('/estados/index', 'index')->name('estados.index');
    Route::get('/estados/post', 'post')->name('estados.post');
    Route::get('/estados/edit/{id}', 'edit')->name('estados.edit');
    Route::post('/estados/update/{id}', 'update')->name('estados.update');
    Route::get('/estados/delete/{Id}', 'delete')->name('estados.delete');
    Route::post('/estados/store', 'store')->name('estados.store');
});

Route::controller(ActoresController::class)->group(function() {
    Route::get('/actores/index', 'index')->name('actores.index');
    Route::get('/actores/post', 'post')->name('actores.post');
    Route::post('/actores/store', 'store')->name('actores.store');
});

Route::controller(CuentasController::class)->group(function() {
    Route::get('/cuentas/index', 'index')->name('cuentas.index');
});

Route::controller(DependenciasController::class)->group(function() {
    Route::get('/dependencias/index', 'index')->name('dependencias.index');
});

Route::controller(EstatusController::class)->group(function() {
    Route::get('/estatus/index', 'index')->name('estatus.index');
});

Route::controller(ExpedientesController::class)->group(function() {
    Route::get('/expedientes/index', 'index')->name('expedientes.index');
});

Route::controller(FestivoController::class)->group(function() {
    Route::get('/festivos/index', 'index')->name('festivos.index');
});

Route::controller(MunicipiosController::class)->group(function() {
    Route::get('/municipios/index', 'index')->name('municipios.index');
});

Route::controller(NotificacionesController::class)->group(function() {
    Route::get('/notificaciones/index', 'index')->name('notificaciones.index');
});

Route::controller(CobranzaController::class)->group(function() {
    Route::get('/cobranza/index', 'index')->name('cobranza.index');
});

Route::controller(PaisesController::class)->group(function() {
    Route::get('/paises/index', 'index')->name('paises.index');
});

Route::controller(PeticionesController::class)->group(function() {
    Route::get('/peticiones/index', 'index')->name('peticiones.index');
});

Route::controller(ProcesosController::class)->group(function() {
    Route::get('/proceso/index', 'index')->name('proceso.index');
});

Route::controller(RegionesController::class)->group(function() {
    Route::get('/regiones/index', 'index')->name('regiones.index');
});

Route::controller(RespaldoController::class)->group(function() {
    Route::get('/respaldo/index', 'index')->name('respaldo.index');
});

Route::controller(SituacionesController::class)->group(function() {
    Route::get('/situaciones/index', 'index')->name('situaciones.index');
});

Route::controller(TramitesController::class)->group(function() {
    Route::get('/tramites/index', 'index')->name('tramites.index');
});


require __DIR__.'/auth.php';
