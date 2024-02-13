<?php

use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;

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
Route::get('categorias',[CategoriaController::class,"index"])->name("categoria.index");
Route::get('categoria/activar/{categoria}',[CategoriaController::class,"activar"])->name("categoria.activar");
Route::get('categorias/listar',[CategoriaController::class,"listar"])->name("categoria.listar");
Route::get('categorias/create',[CategoriaController::class,"create"])->name("categoria.create");
Route::get('categorias/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categoria.edit');
Route::put('categorias/{categoria}/update', [CategoriaController::class, 'update'])->name('categoria.update');
Route::post('categoria/store', [CategoriaController::class, 'store'])->name('categoria.store');
Route::delete('categoria/{categoria}', [CategoriaController::class, 'eliminar'])->name('categoria.destroy');
