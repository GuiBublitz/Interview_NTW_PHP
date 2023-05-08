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
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;

Route::resource('categorias', CategoriaController::class)->only([
    'index', 'store', 'show', 'update', 'destroy'
]);

Route::resource('produtos', ProdutoController::class)->only([
    'index', 'store', 'show', 'update', 'destroy'
]);