<?php

use App\Http\Controllers\AsignacionController;
use App\Http\Controllers\UserPasswordController;
use App\Http\Controllers\Reportes\RegionsController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\GestionAsignacion;
use App\Http\Livewire\GestionAvance;
use App\Http\Livewire\Reportes\UsuarioReporte;
use App\Http\Livewire\Reportes\RegionsReporte;
use App\Http\Livewire\Reportes\DivisionsReporte;
use App\Http\Livewire\Reportes\NegociosReporte;
use App\Http\Livewire\Reportes\ObjoperacionalsReporte;
use App\Http\Livewire\Reportes\ObjestrategicosReporte;
use App\Http\Livewire\Reportes\ObjtacticosReporte;
use App\Http\Livewire\Users\ChangePass;




Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', GestionAvance::class)->name('home.avances');


Route::get('/home', GestionAsignacion::class)->name('home.asignacion');
Route::get('/home', GestionAvance::class)->name('home.avance');

Route::resource('asignacion', AsignacionController::class)->only('edit','update')->names('asignacions');

//Route::get('cambiar_contrasena', ChangePass::class)->name('user.updatepass');
Route::get('cambiar_contrasena', [App\Http\Controllers\UserPasswordController::class, 'showForm'])->name('user.updateform');
Route::post('cambiar_contrasena', [App\Http\Controllers\UserPasswordController::class, 'update'])->name('user.updatepass');

Route::get('consultas', [App\Http\Controllers\AsignacionConsultaController::class, 'index'])->name('consultas');
Route::post('consultas', [App\Http\Controllers\AsignacionConsultaController::class, 'buscar'])->name('consultas.buscar');

Route::get('consultas_usuarios/{user}', UsuarioReporte::class)->name('reporte.usuario');
//Route::get('consultas_regiones/{region}/{anoreporte}', RegionsReporte::class)->name('reporte.region');
Route::get('consultas_regiones/{region}/{anoreporte}', [App\Http\Controllers\Reportes\RegionsController::class, 'index'])->name('reporte.region');
Route::get('consultas_divisiones/{division}', DivisionsReporte::class)->name('reporte.division');
Route::get('consultas_negocios/{negocio}', NegociosReporte::class)->name('reporte.negocio');
Route::get('consultas_objop/{objoperacional}', ObjoperacionalsReporte::class)->name('reporte.objoperacional');
Route::get('consultas_objest/{objestrategico}', ObjestrategicosReporte::class)->name('reporte.objestrategico');
Route::get('consultas_objtact/{objtactico}', ObjtacticosReporte::class)->name('reporte.objtactico');

Route::get('consultas/{tiporeporte}', [App\Http\Controllers\Reportes\TipoReporteController::class,'index'])->name('reporte.tipo');
Route::get('consultas_regiones/export-excel', [App\Http\Controllers\Reportes\RegionsController::class, 'exportExcel']);

