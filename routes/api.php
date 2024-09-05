<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\DptoController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/cargos/datos', [CargoController::class, 'getData']);
// Route::post('/cargos/save', [CargoController::class, 'save']);
// Route::put('/cargos/update', [CargoController::class, 'update']);
// Route::delete('/cargos/delete', [CargoController::class, 'delete']);

// Route::get('/dptos/datos', [DptoController::class, 'getData']);
// Route::post('/dptos/save', [DptoController::class, 'save']);
// Route::put('/dptos/update', [DptoController::class, 'update']);
// Route::delete('/dptos/delete', [DptoControler::class, 'delete']);


Route::controller(CargoController::class)->group(function () {
    Route::get('/cargos/datos','getData');
    Route::post('/cargos/save','save');
    Route::put('/cargos/update','update');
    Route::delete('/cargos/delete','delete');
});

Route::controller(DptoController::class)->group(function () {
    Route::get('/dptos/datos','getData');
    Route::post('/dptos/save','save');
    Route::put('/dptos/update','update');
    Route::delete('/dptos/delete','delete');
});

// Route::controller(AuthController::class)->group(function () {
//     Route::post('login', 'login');
//     Route::post('register', 'register');
//     Route::post('logout', 'logout');
//     Route::post('refresh', 'refresh');
//     Route::get('me', 'me');

// });
