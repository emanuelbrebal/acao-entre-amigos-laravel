<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'cpf' => isset($this->cpf) ? preg_replace('/\D/', '', $this->cpf) : null,
            'cnpj' => isset($this->cnpj) ? preg_replace('/\D/', '', $this->cnpj) : null,
        ]);
    }

    public function rules()
    {
        $rules = [
            'password' => 'required|string',
            'tipo_usuario' => 'required|in:cpf,cnpj'
        ];

        if ($this->tipo_usuario == 'cpf') {
            $rules['cpf'] = 'required|string|digits:11';
        } elseif ($this->tipo_usuario == 'cnpj') {
            $rules['cnpj'] = 'required|string|digits:14';
        }

        return $rules;
    }
}
