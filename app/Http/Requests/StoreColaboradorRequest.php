<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreColaboradorRequest extends FormRequest
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
            'colab_name' => 'required|regex:/^[\pL\s]+$/u',
            'email' => 'required|email|unique:colaboradors',
            'cpf' => 'required|cpf|unique:colaboradors',
            'unidade_id' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'colab_name.regex' => 'Insira um nome válido',
            'email.unique' => 'Email já cadastrado',
            'cpf.unique' => 'CPF já cadastrado',
        ];
    }
}
