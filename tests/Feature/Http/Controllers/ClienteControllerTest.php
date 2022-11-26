<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\Cliente;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClienteControllerTest extends TestCase
{
    use RefreshDatabase;


    /**
     * Teste Cadastrar um Cliente
     *
     * @return void
     */
    public function test_criar_cliente()
    {
        $clienteFake = Cliente::factory(1);
        $clienteFakeData = $clienteFake->raw()[0];

        $response = $this->postJson('/api/cliente', $clienteFakeData);

        $response->assertStatus(201);

        $response->assertJson(function(AssertableJson $json) use ($clienteFakeData) {
            $json->where('nome', $clienteFakeData['nome'])
                ->where('telefone', $clienteFakeData['telefone'])
                ->where('cpf', $clienteFakeData['cpf'])
                ->where('placa_carro', $clienteFakeData['placa_carro'])
                ->etc();
        });

        $response->dump();
    }

    /**
     * Teste Editar um Cliente
     *
     * @return void
     */
    public function test_editar_cliente()
    {
        $clienteFake = Cliente::factory()->createOne();
        $clienteFakeData = ($clienteFake->get(['nome', 'telefone', 'cpf', 'placa_carro'])[0])->toArray();

        $novoNome = 'Fulano de Tal';
        $clienteFakeData['nome'] = $novoNome;

        $novaPlaca = 'BRA 3223';
        $clienteFakeData['placa_carro'] = $novaPlaca;

        $id = $clienteFake->get()[0]->id;
        $uri = sprintf('/api/cliente/%s', $id);

        $response = $this->putJson($uri, $clienteFakeData);

        $response->assertStatus(200);

        $response->assertJson(function(AssertableJson $json) use ($clienteFakeData) {
            $json->where('nome', $clienteFakeData['nome'])
                ->where('placa_carro', $clienteFakeData['placa_carro'])
                ->etc();
        });

        $response->dump();
    }

    /**
     * Teste Consultar Cliente.
     *
     * @return void
     */
    public function test_consultar_cliente()
    {
        $response = $this->getJson('/api/cliente/1');

        $response->assertStatus(200);

        $response->assertJson(function(AssertableJson $json) {
            $json->hasAll(['nome', 'telefone', 'cpf', 'placa_carro']);
        });

    }


}
