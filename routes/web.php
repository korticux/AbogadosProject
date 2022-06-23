<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadosController;
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
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(EstadosController::class)->group(function() {
    Route::get('estados/index', 'index')->name('estados.index');
    Route::get('estados/post', 'post')->name('estados.post');
    Route::post('estados/store', 'store')->name('estados.store');
});

require __DIR__.'/auth.php';
