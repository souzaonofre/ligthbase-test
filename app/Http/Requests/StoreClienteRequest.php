<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome' => 'required|string|unique:clientes',
            'telefone' => 'required|string|max:25',
            'cpf' => 'required|string|max:15',
            'placa_carro' => 'required|string|max:10',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nome.required' => '[nome] do cliente é requerido',
            'nome.unique' => '[nome] do cliente não pode ser repetido',
            'telefone.required' => '[telefone] do cliente é requerido',
            'cpf.required' => '[cpf] do cliente é necessária',
            'placa_carro.required' => '[placa_carro] é necessária',
        ];
    }
}
