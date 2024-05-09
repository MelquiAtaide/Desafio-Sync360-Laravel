<?php

use App\Http\Controllers\UsuarioController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [UsuarioController::class, 'perfil'])->name('usuario.perfil');
Route::put('/editar-usuario/{id}', [UsuarioController::class, 'editarUsuario'])->name('usuario.editar');
Route::put('/editar-imagem-usuario/{id}', [UsuarioController::class, 'editarImagemUsuario'])->name('usuario.editar.imagem');