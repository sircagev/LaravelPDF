<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

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

Route::get('/', function () {return view('home');})->name('home');

Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');

Route::get('/usuarios/registrar', [UserController::class, 'indexStore'])->name('registrar');
Route::post('/usuarios/registrar', [UserController::class, 'store']);

Route::delete('/usuarios/eliminar/{id}', [UserController::class, 'destroy'])->name('eliminar');

Route::get('/usuarios/{id}/editar', [UserController::class, 'indexUpdate'])->name('usuarios.editar');
Route::put('/usuarios/{id}/actualizar', [UserController::class, 'update'])->name('usuarios.actualizar');

Route::get('/usuarios/{id}/profile', [UserController::class, 'show'])->name('usuarios.profile');

Route::get('/usuarios/{id}/profile/exportar', [UserController::class, 'exportarPDF'])->name('exportarpdf');