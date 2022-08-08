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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');

Route::controller(DashboardController::class)->group(function(){
    Route::get('/', 'EstadosTotal');
    Route::get('/', 'ActoresTotal');
    Route::get('/', 'CuentasTotal');
    Route::get('/', 'DependenciasTotal');
    Route::get('/', 'EstatusesTotal');
    Route::get('/', 'ExpedientesTotal');
    Route::get('/', 'FestivosTotal');
    Route::get('/', 'MunicipiosTotal');
    Route::get('/', 'NotificacionesTotal');

});

Route::controller(EstadosController::class)->group(function() {
    Route::get('/estados/index', 'index')->name('estados.index');
    Route::get('/estados/export', 'export')->name('estados.export');
    Route::get('/estados/post', 'post')->name('estados.post');
    Route::get('/estados/edit/{id}', 'edit')->name('estados.edit');
    Route::post('/estados/update/{id}', 'update')->name('estados.update');
    Route::get('/estados/delete/{Id}', 'delete')->name('estados.delete');
    Route::post('/estados/store', 'store')->name('estados.store');
    Route::get('/estados/createPDF', 'createPDF')->name('estados.createPDF');
});

Route::controller(ActoresController::class)->group(function() {
    Route::get('/actores/index', 'index')->name('actores.index');
    Route::get('/actores/post', 'post')->name('actores.post');
    Route::get('/actores/downloadPdf', 'downloadPdf')->name('actores.downloadPdf');
    Route::post('/actores/store', 'store')->name('actores.store');
    Route::get('/actores/edit/{id}', 'edit')->name('actores.edit');
    Route::post('/actores/update/{id}', 'update')->name('actores.update');
    Route::get('/actores/delete/{Id}', 'delete')->name('actores.delete');
    Route::get('/actores/export/', 'export')->name('actores.export');
    Route::get('/actores/createPDF', 'createPDF')->name('actores.createPDF');
    Route::get('/archivosactores/delete/{id}/{ActoresId}', 'deleteActores')->name('archivosactores.delete');
});

Route::controller(CuentasController::class)->group(function() {
    Route::get('/cuentas/index', 'index')->name('cuentas.index');
    Route::get('/cuentas/post', 'post')->name('cuentas.post');
    Route::post('/cuentas/store', 'store')->name('cuentas.store');
    Route::get('/cuentas/export', 'export')->name('cuentas.export');
    Route::get('/cuentas/edit/{id}', 'edit')->name('cuentas.edit');
    Route::post('/cuentas/update/{id}', 'update')->name('cuentas.update');
    Route::get('/cuentas/delete/{Id}', 'delete')->name('cuentas.delete');
    Route::get('/cuentas/createPDF', 'createPDF')->name('cuentas.createPDF');
});

Route::controller(DependenciasController::class)->group(function() {
    Route::get('/dependencias/index', 'index')->name('dependencias.index');
    Route::get('/dependencias/export', 'export')->name('dependencias.export');
    Route::get('/dependencias/post', 'post')->name('dependencias.post');
    Route::get('/dependencias/edit/{id}', 'edit')->name('dependencias.edit');
    Route::post('/dependencias/update/{id}', 'update')->name('dependencias.update');
    Route::get('/dependencias/delete/{Id}', 'delete')->name('dependencias.delete');
    Route::post('/dependencias/store', 'store')->name('dependencias.store');
    Route::get('/dependencias/createPDF', 'createPDF')->name('dependencias.createPDF');
});

Route::controller(EstatusController::class)->group(function() {
    Route::get('/estatus/index', 'index')->name('estatus.index');
    Route::get('/estatus/export', 'export')->name('estatus.export');
    Route::get('/estatus/post', 'post')->name('estatus.post');
    Route::get('/estatus/edit/{id}', 'edit')->name('estatus.edit');
    Route::post('/estatus/update/{id}', 'update')->name('estatus.update');
    Route::get('/estatus/delete/{Id}', 'delete')->name('estatus.delete');
    Route::post('/estatus/store', 'store')->name('estatus.store');
    Route::get('/estatus/createPDF', 'createPDF')->name('estatus.createPDF');
});

Route::controller(ExpedientesController::class)->group(function() {
    Route::get('/expedientes/index', 'index')->name('expedientes.index');
    Route::get('/expedientes/pdf', 'createPDF')->name('expendientes.createPDF');
    Route::get('/expedientes/post', 'post')->name('expedientes.post');
    Route::get('/expedientes/edit/{id}', 'edit')->name('expedientes.edit');
    Route::post('/expedientes/update/{id}', 'update')->name('expedientes.update');
    Route::get('/expedientes/delete/{Id}', 'delete')->name('expedientes.delete');
    Route::post('/expedientes/store', 'store')->name('expedientes.store');
    Route::get('/expedientes/createPDF', 'createPDF')->name('expedientes.createPDF');
    Route::get('/expedientes/export', 'export')->name('expedientes.export');
    Route::get('/archivosexpedientes/delete/{Id}/{ExpedienteId}', 'deleteExpedientes')->name('archivosexpedientes.delete');

});

Route::controller(FestivoController::class)->group(function() {
    Route::get('/festivos/index', 'index')->name('festivos.index');
    Route::get('/festivos/export', 'export')->name('festivos.export');
    Route::get('/festivos/post', 'post')->name('festivos.post');
    Route::get('/festivos/edit/{id}', 'edit')->name('festivos.edit');
    Route::post('/festivos/update/{id}', 'update')->name('festivos.update');
    Route::get('/festivos/delete/{Id}', 'delete')->name('festivos.delete');
    Route::post('/festivos/store', 'store')->name('festivos.store');
    Route::get('/festivos/createPDF', 'createPDF')->name('festivos.createPDF');
});

Route::controller(MunicipiosController::class)->group(function() {
    Route::get('/municipios/index', 'index')->name('municipios.index');
    Route::get('/municipios/export', 'export')->name('municipios.export');
    Route::get('/municipios/post', 'post')->name('municipios.post');
    Route::get('/municipios/edit/{id}', 'edit')->name('municipios.edit');
    Route::post('/municipios/update/{id}', 'update')->name('municipios.update');
    Route::get('/municipios/delete/{Id}', 'delete')->name('municipios.delete');
    Route::post('/municipios/store', 'store')->name('municipios.store');
    Route::get('/municipios/createPDF', 'createPDF')->name('municipios.createPDF');
});

Route::controller(NotificacionesController::class)->group(function() {
    Route::get('/notificaciones/index', 'index')->name('notificaciones.index');
    Route::get('/notificaciones/export', 'export')->name('notificaciones.export');
    Route::get('/notificaciones/post', 'post')->name('notificaciones.post');
    Route::get('/notificaciones/edit/{id}', 'edit')->name('notificaciones.edit');
    Route::post('/notificaciones/update/{id}', 'update')->name('notificaciones.update');
    Route::get('/notificaciones/delete/{Id}', 'delete')->name('notificaciones.delete');
    Route::post('/notificaciones/store', 'store')->name('notificaciones.store');
    Route::get('/notificaciones/createPDF', 'createPDF')->name('notificaciones.createPDF');
});

Route::controller(CobranzaController::class)->group(function() {
    Route::get('/cobranza/index', 'index')->name('cobranza.index');
    Route::get('/cobranza/post', 'post')->name('cobranza.post');
    Route::post('/cobranza/store', 'store')->name('cobranza.store');
    Route::get('/cobranza/edit/{id}', 'edit')->name('cobranza.edit');
    Route::post('/cobranza/update/{id}', 'update')->name('cobranza.update');
    Route::get('/cobranza/delete/{Id}', 'delete')->name('cobranza.delete');
    Route::get('/cobranza/export/', 'export')->name('cobranza.export');
    Route::get('/cobranza/createPDF', 'createPDF')->name('cobranza.createPDF');
});

Route::controller(PaisesController::class)->group(function() {
    Route::get('/paises/index', 'index')->name('paises.index');
    Route::get('/paises/export', 'export')->name('paises.export');
    Route::get('/paises/post', 'post')->name('paises.post');
    Route::post('/paises/store', 'store')->name('paises.store');
    Route::get('/paises/edit/{id}', 'edit')->name('paises.edit');
    Route::post('/paises/update/{id}', 'update')->name('paises.update');
    Route::get('/paises/delete/{Id}', 'delete')->name('paises.delete');
    Route::get('/paises/createPDF', 'createPDF')->name('paises.createPDF');
});

Route::controller(PeticionesController::class)->group(function() {
    Route::get('/peticiones/index', 'index')->name('peticiones.index');
    Route::get('/peticiones/export', 'export')->name('peticiones.export');
    Route::get('/peticiones/post', 'post')->name('peticiones.post');
    Route::post('/peticiones/store', 'store')->name('peticiones.store');
    Route::get('/peticiones/edit/{id}', 'edit')->name('peticiones.edit');
    Route::post('/peticiones/update/{id}', 'update')->name('peticiones.update');
    Route::get('/peticiones/delete/{Id}', 'delete')->name('peticiones.delete');
    Route::get('/peticiones/createPDF', 'createPDF')->name('peticiones.createPDF');
});

Route::controller(ProcesosController::class)->group(function() {
    Route::get('/proceso/index', 'index')->name('proceso.index');
    Route::get('/proceso/export', 'export')->name('proceso.export');
    Route::get('/proceso/post', 'post')->name('proceso.post');
    Route::post('/proceso/store', 'store')->name('proceso.store');
    Route::get('/proceso/edit/{id}', 'edit')->name('proceso.edit');
    Route::post('/proceso/update/{id}', 'update')->name('proceso.update');
    Route::get('/proceso/delete/{Id}', 'delete')->name('proceso.delete');
    Route::get('/proceso/createPDF', 'createPDF')->name('proceso.createPDF');
});

Route::controller(RegionesController::class)->group(function() {
    Route::get('/regiones/index', 'index')->name('regiones.index');
    Route::get('/regiones/export', 'export')->name('regiones.export');
    Route::get('/regiones/post', 'post')->name('regiones.post');
    Route::post('/regiones/store', 'store')->name('regiones.store');
    Route::get('/regiones/edit/{id}', 'edit')->name('regiones.edit');
    Route::post('/regiones/update/{id}', 'update')->name('regiones.update');
    Route::get('/regiones/delete/{Id}', 'delete')->name('regiones.delete');
    Route::get('/regiones/createPDF', 'createPDF')->name('regiones.createPDF');
});

Route::controller(RespaldoController::class)->group(function() {
    Route::get('/respaldo/index', 'index')->name('respaldo.index');
});

Route::controller(SituacionesController::class)->group(function() {
    Route::get('/situaciones/index', 'index')->name('situaciones.index');
    Route::get('/situaciones/export', 'export')->name('situaciones.export');
    Route::get('/situaciones/post', 'post')->name('situaciones.post');
    Route::post('/situaciones/store', 'store')->name('situaciones.store');
    Route::get('/situaciones/edit/{id}', 'edit')->name('situaciones.edit');
    Route::post('/situaciones/update/{id}', 'update')->name('situaciones.update');
    Route::get('/situaciones/delete/{Id}', 'delete')->name('situaciones.delete');
    Route::get('/situaciones/createPDF', 'createPDF')->name('situaciones.createPDF');
});

Route::controller(TramitesController::class)->group(function() {
    Route::get('/tramites/index', 'index')->name('tramites.index');
    Route::get('/tramites/post', 'post')->name('tramites.post');
    Route::get('/tramites/edit/{id}', 'edit')->name('tramites.edit');
    Route::post('/tramites/update/{id}', 'update')->name('tramites.update');
    Route::get('/tramites/delete/{Id}', 'delete')->name('tramites.delete');
    Route::post('/tramites/store', 'store')->name('tramites.store');
    Route::get('/tramites/export', 'export')->name('tramites.export');
    Route::get('/tramites/createPDF', 'createPDF')->name('tramites.createPDF');
});

Route::group(['middleware' => ['auth']], function(){
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});


require __DIR__.'/auth.php';
