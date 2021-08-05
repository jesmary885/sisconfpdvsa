<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AvanceController;
use App\Http\Livewire\GestionAsignacion;
use App\Http\Livewire\GestionAvance;

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

Route::resource('avances', AvanceController::class)->only('index','edit','update')->names('avances');

Route::get('/home', GestionAsignacion::class)->name('home.asignacion');
Route::get('/home', GestionAvance::class)->name('home.avance');
