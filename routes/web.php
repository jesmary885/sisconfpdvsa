<?php

use App\Http\Controllers\AsignacionController;
use App\Http\Controllers\UserPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AvanceController;
use App\Http\Livewire\GestionAsignacion;
use App\Http\Livewire\GestionAvance;
use App\Http\Livewire\AsignacionConsultaUsuarios;

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

Route::get('/home', GestionAvance::class)->name('home.avances');



//Route::resource('avances', AvanceController::class)->only('index','edit','update')->names('avances');

Route::get('/home', GestionAsignacion::class)->name('home.asignacion');
Route::get('/home', GestionAvance::class)->name('home.avance');

Route::resource('asignacion', AsignacionController::class)->only('edit','update')->names('asignacions');

Route::get('user/update/password', [App\Http\Controllers\UserPasswordController::class, 'showForm'])->name('user.updatepass');
Route::post('user/update/password', [App\Http\Controllers\UserPasswordController::class, 'update']);

Route::get('consultas', [App\Http\Controllers\AsignacionConsultaController::class, 'index'])->name('consultas');
Route::post('consultas', [App\Http\Controllers\AsignacionConsultaController::class, 'buscar'])->name('consultas.buscar');

Route::get('consultas/usuarios', AsignacionConsultaUsuarios::class)->name('consultas.usuarios');
