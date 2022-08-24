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
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PagosCobranzaController;
use App\Http\Controllers\PaisesController;
use App\Http\Controllers\PeticionesController;
use App\Http\Controllers\ProcesosController;
use App\Http\Controllers\RegionesController;
use App\Http\Controllers\RespaldoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SituacionesController;
use App\Http\Controllers\TramitesController;
use App\Http\Controllers\UserController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('login');
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard')->middleware(['auth']);

Route::controller(DashboardController::class)->group(function(){
    Route::get('/', 'EstadosTotal')->middleware(['auth']);
    Route::get('/', 'ActoresTotal')->middleware(['auth']);
    Route::get('/', 'CuentasTotal')->middleware(['auth']);
    Route::get('/', 'DependenciasTotal')->middleware(['auth']);
    Route::get('/', 'EstatusesTotal')->middleware(['auth']);
    Route::get('/', 'ExpedientesTotal')->middleware(['auth']);
    Route::get('/', 'FestivosTotal')->middleware(['auth']);
    Route::get('/', 'MunicipiosTotal')->middleware(['auth']);
    Route::get('/', 'NotificacionesTotal')->middleware(['auth']);

});

Route::controller(EstadosController::class)->group(function() {
    Route::get('/estados/index', 'index')->name('estados.index')->middleware(['auth']);
    Route::get('/estados/export', 'export')->name('estados.export')->middleware(['auth']);
    Route::get('/estados/post', 'post')->name('estados.post')->middleware(['auth']);
    Route::get('/estados/edit/{id}', 'edit')->name('estados.edit')->middleware(['auth']);
    Route::post('/estados/update/{id}', 'update')->name('estados.update')->middleware(['auth']);
    Route::get('/estados/delete/{Id}', 'delete')->name('estados.delete')->middleware(['auth']);
    Route::post('/estados/store', 'store')->name('estados.store')->middleware(['auth']);
    Route::get('/estados/createPDF', 'createPDF')->name('estados.createPDF')->middleware(['auth']);
});

Route::controller(ActoresController::class)->group(function() {
    Route::get('/actores/index', 'index')->name('actores.index')->middleware(['auth']);
    Route::get('/actores/post', 'post')->name('actores.post')->middleware(['auth']);
    Route::get('/actores/downloadPdf', 'downloadPdf')->name('actores.downloadPdf')->middleware(['auth']);
    Route::post('/actores/store', 'store')->name('actores.store')->middleware(['auth']);
    Route::get('/actores/edit/{id}', 'edit')->name('actores.edit')->middleware(['auth']);
    Route::post('/actores/update/{id}', 'update')->name('actores.update')->middleware(['auth']);
    Route::get('/actores/delete/{Id}', 'delete')->name('actores.delete')->middleware(['auth']);
    Route::get('/actores/export/', 'export')->name('actores.export')->middleware(['auth']);
    Route::get('/actores/createPDF', 'createPDF')->name('actores.createPDF')->middleware(['auth']);
    Route::get('/archivosactores/delete/{id}/{ActoresId}', 'deleteActores')->name('archivosactores.delete')->middleware(['auth']);
});

Route::controller(CuentasController::class)->group(function() {
    Route::get('/cuentas/index', 'index')->name('cuentas.index')->middleware(['auth']);
    Route::get('/cuentas/post', 'post')->name('cuentas.post')->middleware(['auth']);
    Route::post('/cuentas/store', 'store')->name('cuentas.store')->middleware(['auth']);
    Route::get('/cuentas/export', 'export')->name('cuentas.export')->middleware(['auth']);
    Route::get('/cuentas/edit/{id}', 'edit')->name('cuentas.edit')->middleware(['auth']);
    Route::post('/cuentas/update/{id}', 'update')->name('cuentas.update')->middleware(['auth']);
    Route::get('/cuentas/delete/{Id}', 'delete')->name('cuentas.delete')->middleware(['auth']);
    Route::get('/cuentas/createPDF', 'createPDF')->name('cuentas.createPDF')->middleware(['auth']);
});

Route::controller(DependenciasController::class)->group(function() {
    Route::get('/dependencias/index', 'index')->name('dependencias.index')->middleware(['auth']);
    Route::get('/dependencias/export', 'export')->name('dependencias.export')->middleware(['auth']);
    Route::get('/dependencias/post', 'post')->name('dependencias.post')->middleware(['auth']);
    Route::get('/dependencias/edit/{id}', 'edit')->name('dependencias.edit')->middleware(['auth']);
    Route::post('/dependencias/update/{id}', 'update')->name('dependencias.update')->middleware(['auth']);
    Route::get('/dependencias/delete/{Id}', 'delete')->name('dependencias.delete')->middleware(['auth']);
    Route::post('/dependencias/store', 'store')->name('dependencias.store')->middleware(['auth']);
    Route::get('/dependencias/createPDF', 'createPDF')->name('dependencias.createPDF')->middleware(['auth']);
});

Route::controller(EstatusController::class)->group(function() {
    Route::get('/estatus/index', 'index')->name('estatus.index')->middleware(['auth']);
    Route::get('/estatus/export', 'export')->name('estatus.export')->middleware(['auth']);
    Route::get('/estatus/post', 'post')->name('estatus.post')->middleware(['auth']);
    Route::get('/estatus/edit/{id}', 'edit')->name('estatus.edit')->middleware(['auth']);
    Route::post('/estatus/update/{id}', 'update')->name('estatus.update')->middleware(['auth']);
    Route::get('/estatus/delete/{Id}', 'delete')->name('estatus.delete')->middleware(['auth']);
    Route::post('/estatus/store', 'store')->name('estatus.store')->middleware(['auth']);
    Route::get('/estatus/createPDF', 'createPDF')->name('estatus.createPDF')->middleware(['auth']);
});

Route::controller(ExpedientesController::class)->group(function() {
    Route::get('/expedientes/index', 'index')->name('expedientes.index')->middleware(['auth']);
    Route::get('/expedientes/pdf', 'createPDF')->name('expendientes.createPDF')->middleware(['auth']);
    Route::get('/expedientes/post', 'post')->name('expedientes.post')->middleware(['auth']);
    Route::get('/expedientes/edit/{id}', 'edit')->name('expedientes.edit')->middleware(['auth']);
    Route::post('/expedientes/update/{id}', 'update')->name('expedientes.update')->middleware(['auth']);
    Route::get('/expedientes/delete/{Id}', 'delete')->name('expedientes.delete')->middleware(['auth']);
    Route::post('/expedientes/store', 'store')->name('expedientes.store')->middleware(['auth']);
    Route::get('/expedientes/createPDF', 'createPDF')->name('expedientes.createPDF')->middleware(['auth']);
    Route::get('/expedientes/export', 'export')->name('expedientes.export')->middleware(['auth']);
    Route::get('/archivosexpedientes/delete/{Id}/{ExpedienteId}', 'deleteExpedientes')->name('archivosexpedientes.delete')->middleware(['auth']);

});

Route::controller(FestivoController::class)->group(function() {
    Route::get('/festivos/index', 'index')->name('festivos.index')->middleware(['auth']);
    Route::get('/festivos/export', 'export')->name('festivos.export')->middleware(['auth']);
    Route::get('/festivos/post', 'post')->name('festivos.post')->middleware(['auth']);
    Route::get('/festivos/edit/{id}', 'edit')->name('festivos.edit')->middleware(['auth']);
    Route::post('/festivos/update/{id}', 'update')->name('festivos.update')->middleware(['auth']);
    Route::get('/festivos/delete/{Id}', 'delete')->name('festivos.delete')->middleware(['auth']);
    Route::post('/festivos/store', 'store')->name('festivos.store')->middleware(['auth']);
    Route::get('/festivos/createPDF', 'createPDF')->name('festivos.createPDF')->middleware(['auth']);
});

Route::controller(MunicipiosController::class)->group(function() {
    Route::get('/municipios/index', 'index')->name('municipios.index')->middleware(['auth']);
    Route::get('/municipios/export', 'export')->name('municipios.export')->middleware(['auth']);
    Route::get('/municipios/post', 'post')->name('municipios.post')->middleware(['auth']);
    Route::get('/municipios/edit/{id}', 'edit')->name('municipios.edit')->middleware(['auth']);
    Route::post('/municipios/update/{id}', 'update')->name('municipios.update')->middleware(['auth']);
    Route::get('/municipios/delete/{Id}', 'delete')->name('municipios.delete')->middleware(['auth']);
    Route::post('/municipios/store', 'store')->name('municipios.store')->middleware(['auth']);
    Route::get('/municipios/createPDF', 'createPDF')->name('municipios.createPDF')->middleware(['auth']);
});

Route::controller(NotificacionesController::class)->group(function() {
    Route::get('/notificaciones/index', 'index')->name('notificaciones.index')->middleware(['auth']);
    Route::get('/notificaciones/export', 'export')->name('notificaciones.export')->middleware(['auth']);
    Route::get('/notificaciones/post', 'post')->name('notificaciones.post')->middleware(['auth']);
    Route::get('/notificaciones/edit/{id}', 'edit')->name('notificaciones.edit')->middleware(['auth']);
    Route::post('/notificaciones/update/{id}', 'update')->name('notificaciones.update')->middleware(['auth']);
    Route::get('/notificaciones/delete/{Id}', 'delete')->name('notificaciones.delete')->middleware(['auth']);
    Route::post('/notificaciones/store', 'store')->name('notificaciones.store')->middleware(['auth']);
    Route::get('/notificaciones/createPDF', 'createPDF')->name('notificaciones.createPDF')->middleware(['auth']);
});

Route::controller(CobranzaController::class)->group(function() {
    Route::get('/cobranza/index', 'index')->name('cobranza.index')->middleware(['auth']);
    Route::get('/cobranza/post', 'post')->name('cobranza.post')->middleware(['auth']);
    Route::post('/cobranza/store', 'store')->name('cobranza.store')->middleware(['auth']);
    Route::get('/cobranza/edit/{id}', 'edit')->name('cobranza.edit')->middleware(['auth']);
    Route::post('/cobranza/update/{id}', 'update')->name('cobranza.update')->middleware(['auth']);
    Route::get('/cobranza/delete/{Id}', 'delete')->name('cobranza.delete')->middleware(['auth']);
    Route::get('/cobranza/export/', 'export')->name('cobranza.export')->middleware(['auth']);
    Route::get('/cobranza/createPDF', 'createPDF')->name('cobranza.createPDF')->middleware(['auth']);
    Route::get('/archivoscobranza/delete/{id}/{CobranzasId}', 'deleteCobranzas')->name('archivoscobranza.delete')->middleware(['auth']);
    Route::get('cobranza/post/{actor_id}', 'gethonorario')->name('cobranza.gethonorario')->middleware(['auth']);
});

Route::controller(PaisesController::class)->group(function() {
    Route::get('/paises/index', 'index')->name('paises.index')->middleware(['auth']);
    Route::get('/paises/export', 'export')->name('paises.export')->middleware(['auth']);
    Route::get('/paises/post', 'post')->name('paises.post')->middleware(['auth']);
    Route::post('/paises/store', 'store')->name('paises.store')->middleware(['auth']);
    Route::get('/paises/edit/{id}', 'edit')->name('paises.edit')->middleware(['auth']);
    Route::post('/paises/update/{id}', 'update')->name('paises.update')->middleware(['auth']);
    Route::get('/paises/delete/{Id}', 'delete')->name('paises.delete')->middleware(['auth']);
    Route::get('/paises/createPDF', 'createPDF')->name('paises.createPDF')->middleware(['auth']);
});

Route::controller(PeticionesController::class)->group(function() {
    Route::get('/peticiones/index', 'index')->name('peticiones.index')->middleware(['auth']);
    Route::get('/peticiones/export', 'export')->name('peticiones.export')->middleware(['auth']);
    Route::get('/peticiones/post', 'post')->name('peticiones.post')->middleware(['auth']);
    Route::post('/peticiones/store', 'store')->name('peticiones.store')->middleware(['auth']);
    Route::get('/peticiones/edit/{id}', 'edit')->name('peticiones.edit')->middleware(['auth']);
    Route::post('/peticiones/update/{id}', 'update')->name('peticiones.update')->middleware(['auth']);
    Route::get('/peticiones/delete/{Id}', 'delete')->name('peticiones.delete')->middleware(['auth']);
    Route::get('/peticiones/createPDF', 'createPDF')->name('peticiones.createPDF')->middleware(['auth']);
});

Route::controller(ProcesosController::class)->group(function() {
    Route::get('/proceso/index', 'index')->name('proceso.index')->middleware(['auth']);
    Route::get('/proceso/export', 'export')->name('proceso.export')->middleware(['auth']);
    Route::get('/proceso/post', 'post')->name('proceso.post')->middleware(['auth']);
    Route::post('/proceso/store', 'store')->name('proceso.store')->middleware(['auth']);
    Route::get('/proceso/edit/{id}', 'edit')->name('proceso.edit')->middleware(['auth']);
    Route::post('/proceso/update/{id}', 'update')->name('proceso.update')->middleware(['auth']);
    Route::get('/proceso/delete/{Id}', 'delete')->name('proceso.delete')->middleware(['auth']);
    Route::get('/proceso/createPDF', 'createPDF')->name('proceso.createPDF')->middleware(['auth']);
});

Route::controller(RegionesController::class)->group(function() {
    Route::get('/regiones/index', 'index')->name('regiones.index')->middleware(['auth']);
    Route::get('/regiones/export', 'export')->name('regiones.export')->middleware(['auth']);
    Route::get('/regiones/post', 'post')->name('regiones.post')->middleware(['auth']);
    Route::post('/regiones/store', 'store')->name('regiones.store')->middleware(['auth']);
    Route::get('/regiones/edit/{id}', 'edit')->name('regiones.edit')->middleware(['auth']);
    Route::post('/regiones/update/{id}', 'update')->name('regiones.update')->middleware(['auth']);
    Route::get('/regiones/delete/{Id}', 'delete')->name('regiones.delete')->middleware(['auth']);
    Route::get('/regiones/createPDF', 'createPDF')->name('regiones.createPDF')->middleware(['auth']);
});

Route::controller(RespaldoController::class)->group(function() {
    Route::get('/respaldo/index', 'index')->name('respaldo.index')->middleware(['auth']);
});

Route::controller(SituacionesController::class)->group(function() {
    Route::get('/situaciones/index', 'index')->name('situaciones.index')->middleware(['auth']);
    Route::get('/situaciones/export', 'export')->name('situaciones.export')->middleware(['auth']);
    Route::get('/situaciones/post', 'post')->name('situaciones.post')->middleware(['auth']);
    Route::post('/situaciones/store', 'store')->name('situaciones.store')->middleware(['auth']);
    Route::get('/situaciones/edit/{id}', 'edit')->name('situaciones.edit')->middleware(['auth']);
    Route::post('/situaciones/update/{id}', 'update')->name('situaciones.update')->middleware(['auth']);
    Route::get('/situaciones/delete/{Id}', 'delete')->name('situaciones.delete')->middleware(['auth']);
    Route::get('/situaciones/createPDF', 'createPDF')->name('situaciones.createPDF')->middleware(['auth']);
});

Route::controller(TramitesController::class)->group(function() {
    Route::get('/tramites/index', 'index')->name('tramites.index')->middleware(['auth']);
    Route::get('/tramites/post', 'post')->name('tramites.post')->middleware(['auth']);
    Route::get('/tramites/edit/{id}', 'edit')->name('tramites.edit')->middleware(['auth']);
    Route::post('/tramites/update/{id}', 'update')->name('tramites.update')->middleware(['auth']);
    Route::get('/tramites/delete/{Id}', 'delete')->name('tramites.delete')->middleware(['auth']);
    Route::post('/tramites/store', 'store')->name('tramites.store')->middleware(['auth']);
    Route::get('/tramites/export', 'export')->name('tramites.export')->middleware(['auth']);
    Route::get('/tramites/createPDF', 'createPDF')->name('tramites.createPDF')->middleware(['auth']);
});

Route::controller(UserController::class)->group(function() {
    Route::get('/users/index', 'index')->name('users.index')->middleware(['auth']);
    Route::get('/users/post', 'post')->name('users.post')->middleware(['auth']);
    Route::get('/users/edit/{id}', 'edit')->name('users.edit')->middleware(['auth']);
    Route::post('/users/update/{id}', 'update')->name('users.update')->middleware(['auth']);
    Route::get('/users/delete/{Id}', 'delete')->name('users.delete')->middleware(['auth']);
    Route::post('/users/store', 'store')->name('users.store')->middleware(['auth']);
    Route::get('/users/export', 'export')->name('users.export')->middleware(['auth']);
    Route::get('/users/createPDF', 'createPDF')->name('users.createPDF')->middleware(['auth']);
});

Route::controller(PagosCobranzaController::class)->group(function() {
    Route::get('/pagoscobranza/index', 'index')->name('pagoscobranza.index')->middleware(['auth']);
    Route::get('/pagoscobranza/post', 'post')->name('pagoscobranza.post')->middleware(['auth']);
    Route::post('/pagoscobranza/store', 'store')->name('pagoscobranza.store')->middleware(['auth']);
    Route::get('/pagoscobranza/edit/{id}', 'edit')->name('pagoscobranza.edit')->middleware(['auth']);
    Route::post('/pagoscobranza/update/{id}', 'update')->name('pagoscobranza.update')->middleware(['auth']);
    Route::get('/pagoscobranza/delete/{Id}', 'delete')->name('pagoscobranza.delete')->middleware(['auth']);
    Route::get('/pagoscobranza/export/', 'export')->name('pagoscobranza.export')->middleware(['auth']);
    Route::get('/pagoscobranza/createPDF', 'createPDF')->name('pagoscobranza.createPDF')->middleware(['auth']);
});

Route::group(['middleware' => ['auth']], function(){
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});


require __DIR__.'/auth.php';
