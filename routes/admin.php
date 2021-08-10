<?php

use App\Http\Controllers\Admin\DivisionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\NegocioController;
use App\Http\Controllers\Admin\RegionController;
use App\Http\Controllers\Admin\UserController;


Route::get('',[HomeController::class,'index'])->name('admin.home');
Route::resource('users', UserController::class)->only('index','edit','update','create')->names('admin.users');
Route::resource('regions', RegionController::class)->only('index','edit','update','create','store')->names('admin.regions');
Route::resource('divisions', DivisionController::class)->only('index','edit','update','create','store')->names('admin.divisions');
Route::resource('negocios', NegocioController::class)->only('index','edit','update','create','store')->names('admin.negocios');

