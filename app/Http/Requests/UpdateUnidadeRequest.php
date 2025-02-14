<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUnidadeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $unidadeId = $this->route('unidade')->id;
        return [
            'nome_fantasia' => 'required|unique:unidades,nome_fantasia' . $unidadeId,
            'razao_social' => 'required|unique:unidades,razao_social' . $unidadeId,
            'cnpj' => 'required|cnpj|unique:unidades,cnpj' . $unidadeId,
            'bandeira_id' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'nome_fantasia.required' => 'O campo é obrigatório!',
            'nome_fantasia.unique' => 'Este nome já está cadastrado.',
            'bandeira_id' => 'Selecione o Grupo Econômico!',
            'cnpj.unique' => 'CNPJ já cadastrado!'
        ];
    }
}
