<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
    protected function prepareForValidation()
    {
        $this->merge([
            'cpf' => isset($this->cpf) ? preg_replace('/\D/', '', $this->cpf) : null,
            'celular' => isset($this->celular) ? preg_replace('/\D/', '', $this->celular) : null,
        ]);
    }

    public function rules(): array
    {
        return [
            'nome' => 'nullable|string|min:3|max:255|regex:/^[\pL\s]+$/u',
            'cpf' => [
            'nullable',
            'string',
            'digits:11',
            Rule::unique('usuarios', 'cpf')->ignore($this->id),
        ],
            'email' => 'nullable|email|max:255|unique:usuarios,email,',
            'celular' => 'nullable|string|regex:/^\d{11}$/',
            'endereco' => 'nullable|string|max:255',
         
        ];
    }


    public function messages(): array
    {
        return [
            'nome.min' => 'O nome deve ter pelo menos 3 caracteres.',
            'nome.regex' => 'O nome deve conter apenas letras e espaços.',
            'nome.max' => 'O nome não pode ter mais de 255 caracteres.',

            'cpf.digits' => 'O CPF deve conter exatamente 14 números.',
            'cpf.unique' => 'Este CPF já está cadastrado.',

            'email.email' => 'Por favor, insira um e-mail válido.',
            'email.max' => 'O e-mail não pode ter mais de 255 caracteres.',
            'email.unique' => 'Este e-mail já está em uso.',

            'celular.regex' => 'O celular deve estar no formato (XX) XXXXX-XXXX ou (XX) XXXX-XXXX.',

            'endereco.max' => 'O endereço não pode ter mais de 255 caracteres.',
        ];
    }
}
