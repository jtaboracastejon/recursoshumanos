<?php

use App\Http\Livewire\asignarCapacitacionesController;
use App\Http\Livewire\BrandsController;
use App\Http\Livewire\CapacitacionesController;
use App\Http\Livewire\CapacitacionesPendientes;
use App\Http\Livewire\ParametrosEvaluacionController;
use App\Http\Livewire\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;;
use App\Http\Controllers\PDFController;

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
Route::get('/generate-pdf', [PDFController::class, 'generatePDF']);

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/marcas', BrandsController::class)->name('brands.index');
    Route::get('/capacitaciones', CapacitacionesController::class)->name('capacitaciones.index');
    Route::get('/usuarios', UsersController::class)->name('users.index');
    Route::get('/asignarcapacitaciones', asignarCapacitacionesController::class)->name('asignarcapacitaciones.partials.index');

    Route::get('/capacitacionespendientes', CapacitacionesPendientes::class);
    Route::get('/evaluacion', ParametrosEvaluacionController::class)->name('parametrosEvaluacion.index');
    Route::get('/mail', function () {
        return view('mails.asignadas');
    });

});

