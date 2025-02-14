<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGrupoEconomicoRequest extends FormRequest
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
            'group_name' => 'required',
            'cnpj' => 'required|cnpj|unique:grupo_economicos',
        ];
    }

    public function messages(): array
    {
        return [
            'group_name' => 'required',
            'cnpj' => 'required|cnpj|unique:grupo_economicos'
        ];
    }
}
