<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productosController;
use App\Http\Controllers\CategoriaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//Route::get('/administrativo',[App\Http\Controllers\FrontController::class,'index'])->name('administrativo');

//Route::resource('producto', FrontController::class)->names('productos');
Route::resource('/productos', productosController::class)->names('productos');
Route::resource('/categorias',CategoriaController::class)->names('categorias');
