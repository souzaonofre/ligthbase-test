<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     //
    // }

    /**
     * Cadastro novo Cliente.
     *
     * @param  \App\Http\Requests\StoreClienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function novoCliente(StoreClienteRequest $request)
    {
        //
    }

    /**
     * Consulta dados de um Cliente
     *
     * @param  \\Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function consultarCliente(Request $request, int $id)
    {
        //
    }

    /**
     * Edicao de um Cliente existente.
     *
     * @param  \App\Http\Requests\UpdateClienteRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UpdateClienteRequest $request, int $id)
    {
        //
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \App\Http\Requests\UpdateClienteRequest  $request
    //  * @param  \App\Models\Cliente  $cliente
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(UpdateClienteRequest $request, Cliente $cliente)
    // {
    //     //
    // }

    /**
     * Remocao de um Cliente existente.
     *
     * @param  \\Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function removerCliente(Request $request, int $numero)
    {
        //
    }

    /**
     * Consulta dados de Clientes onde ultimo numero placa seja igual informado.
     *
     * @param  \\Illuminate\Http\Request $request
     * @param string $numero
     * @return \Illuminate\Http\Response
     */
    public function consultarPlaca(Request $request, string $numero)
    {
        //
    }

}
