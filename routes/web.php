<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productosController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\UsuariosController;

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


Auth::routes();




Route::resource('/productos', productosController::class)->names('productos');
Route::resource('/categorias',CategoriaController::class)->names('categorias');
Route::resource('/subcategorias',SubcategoriaController::class)->names('subcategorias');
Route::resource('/usuarios',UsuariosController::class)->names('usuarios');



