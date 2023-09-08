<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\GrupoController;
use App\Http\Controllers\Api\GerenteController;

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

Route::get('/grupoTest', [GrupoController::class, 'index']);
Route::resource('/grupoTest', GrupoController::class);

Route::post('/sanctum/token', [UserController::class, 'authenticate']);
Route::post('/user', [UserController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user/me', [UserController::class, 'me']);
    Route::patch('/user/change-email',  [UserController::class, 'updateEmail']);
    Route::delete('/user/logout',  [UserController::class, 'logout']);


    Route::get('/cliente', [ClienteController::class, 'index']);
    Route::resource('/cliente', ClienteController::class);

    Route::get('/grupo', [GrupoController::class, 'index']);
    Route::resource('/grupo', GrupoController::class);

    Route::get('/gerente', [GerenteController::class, 'index']);
    Route::resource('/gerente', GerenteController::class);
});
