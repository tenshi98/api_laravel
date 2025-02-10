<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProductoController;

use App\Http\Controllers\Admin\AdministratorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InvoiceController;

/*Route::get('/' , function(){
  return  view('nuevavista');
});*/

/*Route::prefix('productos')->group(function(){
  Route::get('/',[ProductoController::class,'index']);
  Route::get('/{id}',[ProductoController::class,'show']);
  Route::post('/',[ProductoController::class,'store']);
  Route::put('/{id}', [ProductoController::class, 'update']);
  Route::delete('/{id}', [ProductoController::class, 'destroy']);

});*/

Route::prefix('productos')->group(function () {
  Route::get('/', [ProductoController::class, 'index']);
  Route::get('/{id}', [ProductoController::class, 'show']);
  Route::post('/', [ProductoController::class, 'store']);
  Route::put('/{id}', [ProductoController::class, 'update']);
  Route::delete('/{id}', [ProductoController::class, 'destroy']);
});

Route::post('/register', [UserController::class, 'registro']);

Route::middleware(['auth'])->group(function(){
  Route::get('/libros' ,[CarController::class, 'index']);
});

Route::middleware(['admin'])->group(function(){
  Route::get('/autos' ,[CarController::class, 'index']);
});


Route::get('/saludo/{nombre}' , function($nombre){
  return  "hola,  $nombre";
});

Route::get('/usuarios' ,[UserController::class, 'index2']);
Route::get('/libros' ,[BookController::class, 'index']);


Route::get('/inicio', [UserController::class, 'index']);

Route::get('/nombre/{name}', [UserController::class, 'showname']);

Route::get('/suma/{num?}', [UserController::class, 'suma']);

Route::namespace('Admin')->middleware('grupodemiddleware')->group(function(){
  Route::get('/admin', [AdministratorController::class, 'index']);
  Route::get('/dashboard', [DashboardController::class, 'index']);
  Route::get('/invoice', [InvoiceController::class, 'index']);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');