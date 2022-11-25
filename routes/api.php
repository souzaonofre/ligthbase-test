<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;

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

Route::controller(ClienteController::class)->group(function ($router) {

    $router->post('/cliente', 'novoCliente')
        ->name('cliente.novoCliente');

    $router->put('/cliente/{id}', 'editarCliente')
        ->name('cliente.editarCliente');

    $router->delete('/cliente/{id}', 'removerCliente')
        ->name('cliente.removerCliente');

    $router->get('/cliente/{id}', 'consultarCliente')
        ->name('cliente.consultarCliente');

    $router->get('/cliente/final-placa/{numero}', 'consultarPlaca')
        ->name('cliente.consultarPlaca');

});
