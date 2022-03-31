<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VoucherController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cliente/{id}', [ClienteController::class, 'buscar']);
Route::post('/cliente/registrar', [ClienteController::class, 'registrar']);
Route::put('/cliente/{id}', [ClienteController::class, 'editar']);
Route::delete('/cliente/{id}', [ClienteController::class, 'eliminar']);
Route::get('/voucher/{id}', [VoucherController::class, 'buscar']);
Route::get('/vouchers/{id}', [VoucherController::class, 'obtenerVouchers']);
Route::post('/voucher/crear', [VoucherController::class, 'crear']);