<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocalController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::post('registro', [AuthController::class,'registro']);
    Route::post('login', [AuthController::class, 'login']);
    Route::get('registro/ativar/{id}/{token}',[AuthController::class, 'ativarregistro']);

    Route::middleware('auth:api')->group(function (){
        Route::get('registro/listar',[AuthController::class,'index']);
        Route::patch('registro/editar/{id}',[AuthController::class, 'update']);
        Route::delete('registro/delete/{id}',[AuthController::class,'destroy']);

        Route::get('permissao/usuario/{id}/consulta',[AuthController::class, 'getPermission']);
        Route::patch('permissao/usuario/{id}/atualizar',[AuthController::class, 'setPermission']);

        Route::get('local/index/',[LocalController::class, 'index']);
        Route::post('local/store/',[LocalController::class,'store']);
        Route::patch('local/update/{id}',[LocalController::class,'update']);
        Route::delete('local/delete/{id}',[LocalController::class,'destroy']);

        Route::post('logout',[AuthController::class, 'logout']);

    });
});
