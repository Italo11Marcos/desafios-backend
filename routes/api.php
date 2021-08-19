<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::prefix('v1')->middleware('jwt.auth')->group(function () {
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::apiResource('categoria', 'App\Http\Controllers\CategoriaController');
    Route::apiResource('composicao', 'App\Http\Controllers\ComposicaoController');
    Route::apiResource('produto', 'App\Http\Controllers\ProdutoController');
});

Route::post('login', 'App\Http\Controllers\AuthController@login');