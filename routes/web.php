<?php

use App\Http\Controllers\AsignacionController;
use App\Http\Controllers\UserPasswordController;
use App\Http\Controllers\Reportes\RegionsController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\GestionAsignacion;
use App\Http\Livewire\GestionAvance;
use App\Http\Livewire\Reportes\DivisionsReporte;
use App\Http\Livewire\Reportes\NegociosReporte;
use App\Http\Livewire\Reportes\ObjoperacionalsReporte;
use App\Http\Livewire\Reportes\ObjestrategicosReporte;
use App\Http\Livewire\Reportes\ObjtacticosReporte;
use App\Http\Livewire\UserIndex;
use App\Http\Livewire\Users\ChangePass;


Route::get('/', function () {
    return view('auth.login');
})->name('login');

Auth::routes();

Route::middleware(['auth'])->group(function()
{

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/crear_asignacion', GestionAsignacion::class)->name('home.asignacion');
    Route::get('/registrar_avance', GestionAvance::class)->name('home.avance');

    Route::get('consultas', [App\Http\Controllers\AsignacionConsultaController::class, 'index'])->name('consultas');
    Route::post('consultas', [App\Http\Controllers\AsignacionConsultaController::class, 'buscar'])->name('consultas.buscar');

    //Reportes
    Route::get('consultas_usuarios/{usuario}/{anoreporte}', [App\Http\Controllers\Reportes\UsuariosController::class, 'index'])->name('reporte.usuario');
    Route::get('listado_usuario', [App\Http\Controllers\Reportes\UsuariosController::class, 'show'])->name('listado.usuario');
    Route::get('consultas_regiones/{region}/{anoreporte}', [App\Http\Controllers\Reportes\RegionsController::class, 'index'])->name('reporte.region');
    Route::get('listado_region', [App\Http\Controllers\Reportes\RegionsController::class, 'show'])->name('listado.region');
    Route::get('consultas_divisiones/{division}/{anoreporte}', [App\Http\Controllers\Reportes\DivisionsController::class, 'index'])->name('reporte.division');
    Route::get('listado_division', [App\Http\Controllers\Reportes\DivisionsController::class, 'show'])->name('listado.division');
    Route::get('consultas_negocios/{negocio}/{anoreporte}', [App\Http\Controllers\Reportes\NegociosController::class, 'index'])->name('reporte.negocio');
    Route::get('listado_negocio', [App\Http\Controllers\Reportes\NegociosController::class, 'show'])->name('listado.negocio');
    Route::get('consultas_objoperacional/{objoperacional}/{anoreporte}', [App\Http\Controllers\Reportes\ObjOperacionalsController::class, 'index'])->name('reporte.objoperacional');
    Route::get('listado_objoperacional', [App\Http\Controllers\Reportes\ObjOperacionalsController::class, 'show'])->name('listado.objoperacional');
    Route::get('consultas_objestrategico/{objestrategico}/{anoreporte}', [App\Http\Controllers\Reportes\ObjEstrategicosController::class, 'index'])->name('reporte.objestrategico');
    Route::get('listado_objestrategico', [App\Http\Controllers\Reportes\ObjEstrategicosController::class, 'show'])->name('listado.objestrategico');
    Route::get('consultas_objtactico/{objtactico}/{anoreporte}', [App\Http\Controllers\Reportes\ObjTacticosController::class, 'index'])->name('reporte.objtactico');
    Route::get('listado_objtactico', [App\Http\Controllers\Reportes\ObjTacticosController::class, 'show'])->name('listado.objtactico');

    Route::get('consultas/{tiporeporte}', [App\Http\Controllers\Reportes\TipoReporteController::class,'index'])->name('reporte.tipo');

    //Export Excel
    Route::get('consultas_regiones/export-excel', [App\Http\Controllers\Reportes\RegionsController::class, 'exportExcel']);
    Route::get('consultas_usuarios/export-excel', [App\Http\Controllers\Reportes\UsuariosController::class, 'exportExcel']);
    Route::get('consultas_divisiones/export-excel', [App\Http\Controllers\Reportes\DivisionsController::class, 'exportExcel']);
    Route::get('consultas_negocios/export-excel', [App\Http\Controllers\Reportes\NegociosController::class, 'exportExcel']);
    Route::get('consultas_objestrategicos/export-excel', [App\Http\Controllers\Reportes\ObjEstrategicosController::class, 'exportExcel']);
    Route::get('consultas_objtacticos/export-excel', [App\Http\Controllers\Reportes\ObjTacticosController::class, 'exportExcel']);
    Route::get('consultas_objoperacionals/export-excel', [App\Http\Controllers\Reportes\ObjOperacionalsController::class, 'exportExcel']);

});

