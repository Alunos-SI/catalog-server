<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController; 
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']); 




Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/validate-token', [AuthController::class, 'validateToken']);
    
    // Minhas rotas
    Route::get('/users', [AuthController::class, 'index']);
    Route::apiResource('categorias', CategoriaController::class); 
    Route::get('/produto/{produto}/comentario', [ProdutoController::class, 'showWithComentario'])->name('produto.showWithComentario');
    Route::apiResource('produto', ProdutoController::class);
    Route::apiResource('comentario', ComentarioController::class);
  
});
