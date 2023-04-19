<?php


use App\Http\Livewire\BrandsController;
use App\Http\Livewire\CapacitacionesController;
use App\Http\Livewire\UsersController;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/marcas', BrandsController::class)->name('brands.index');
Route::get('/capacitaciones', CapacitacionesController::class)->name('capacitaciones.index');
Route::get('/usuarios', UsersController::class)->name('users.index');
