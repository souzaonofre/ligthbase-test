<?php

use App\Http\Controllers\ClienteController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(ClienteController::class)->group(function () {
    Route::post('/cliente', 'novoCliente')
        ->name('cliente.novoCliente');

    Route::put('/cliente/{id}', 'editarCliente')
        ->name('cliente.editarCliente');

    Route::delete('/cliente/{id}', 'removerCliente')
        ->name('cliente.removerCliente');

    Route::get('/cliente/{id}', 'consultarCliente')
        ->name('cliente.consultarCliente');

    Route::get('/cliente/final-placa/{numero}', 'consultarPlaca')
        ->name('cliente.consultarPlaca');
});
