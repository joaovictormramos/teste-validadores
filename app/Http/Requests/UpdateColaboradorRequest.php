<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateColaboradorRequest extends FormRequest
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
        $colaboradorId = $this->route('colaborador')->id;

        return [
            'colab_name' => 'required|regex:/^[\pL\s]+$/u',
            'email' => 'required|email|unique:colaboradors,email,' . $colaboradorId,
            'cpf' => 'required|cpf|unique:colaboradors,cpf,' . $colaboradorId,
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
