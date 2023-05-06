<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/validate-token', [AuthController::class, 'validateToken']);
    
    // Minhas rotas
    Route::get('/usuario', [AuthController::class, 'index']);
    Route::apiResource('categoria', CategoriaController::class);
    Route::get('/posts/{post}/commentario', [PostController::class, 'showWithCommentario'])->name('posts.showWithCommentario');
    Route::apiResource('produto', ProdutoController::class);
    Route::apiResource('commentario', CommentarioController::class);
});
