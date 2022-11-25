<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Resources\ClienteResource;
use App\Resources\ClienteCollection;
use App\Models\Cliente;


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
        $clienteData = $request->validated();
        $clienteModel = $clienteData ? Produto::create($clienteData) : null;

        if ($clienteModel && $clienteModel->save()) {
            return new ClienteResource($clienteModel);
        } else {
            return response()->json([
                'message' => 'Erro de sistema, favor contactar suporte.'
            ], 500);
        }./
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
        $cliente = Cliente::find($id);

        if ($cliente) {
            return new ClienteResource($cliente);
        } else {
            return response()->json([
                'message' => 'Cliente não encontrado.'
            ], 404);
        }    
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
        $clienteData = $request->validated();
    
        $clienteModel = Cliente::where('id', $id)->update($clienteData);

        if ($clienteModel && $clienteModel->save()) {
            return new ClienteResource($clienteModel);
            
        } else {
            return response()->json([
                'message' => 'Erro de sistema, favor contactar suporte.'
            ], 500);
        }
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
    public function removerCliente(Request $request, int $id)
    {
        $cliente = Cliente::delete($id);

        if ($cliente) {
            return response()->json([
                'message' => 'Cliente removido com sucesso.'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Falha de sistema.'
            ], 500);
        }    
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
        $clientes = DB::table((new Cliente())->getTable())
            ->whereRaw('placa_carro LIKE %?%', [$numero])
            ->get();

        if ($clientes) {
            return new ClienteCollection($clientes);
        } else {
            return response()->json([
                'message' => 'Falha de sistema.'
            ], 500);
        }    
    }

}
