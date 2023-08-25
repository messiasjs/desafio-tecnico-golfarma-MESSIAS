<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PedidoController;
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

/*Route::get('/', function(){
    return "ok";
});
Route::post('/pedidos', [PedidoController::class, 'store']);
Route::get('/pedidos', [PedidoController::class, 'index']);
Route::get('/pedidos/{pedido}', [PedidoController::class, 'show']);
Route::put('/pedidos/{pedido}', [PedidoController::class, 'update']);
Route::delete('/pedidos/{pedido}', [PedidoController::class, 'destroy']);*/
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::group(['middleware' => ['auth:sanctum']], function() {
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    Route::post('/pedidos', [PedidoController::class, 'store']);
    Route::get('/pedidos', [PedidoController::class, 'index']);
    Route::get('/pedidos/{pedido}', [PedidoController::class, 'show']);
    Route::put('/pedidos/{pedido}', [PedidoController::class, 'update']);
    Route::delete('/pedidos/{pedido}', [PedidoController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'login']);
});

