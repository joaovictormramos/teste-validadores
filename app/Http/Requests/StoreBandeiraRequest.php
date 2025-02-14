<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBandeiraRequest extends FormRequest
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
        return [
            'band_name' => 'required|unique:bandeiras',
            'cnpj' => 'required|cnpj|unique:bandeiras',
            'grupo_economico_id' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'band_name.required' => 'O campo é obrigatório!',
            'band_name.unique' => 'Este nome já está cadastrado.',
            'grupo_economico_id' => 'Selecione o Grupo Econômico!',
            'cnpj.unique' => 'CNPJ já cadastrado!'
        ];
    }
}
