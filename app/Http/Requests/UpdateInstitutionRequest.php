<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInstitutionRequest extends FormRequest
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
            'cnpj' => isset($this->cnpj) ? preg_replace('/\D/', '', $this->cnpj) : null,
            'celular' => isset($this->celular) ? preg_replace('/\D/', '', $this->celular) : null,
        ]);
    }
    public function rules(): array
    {
        return [
            'nome' => 'nullable|string|max:255',
            'cnpj' => [
            'nullable',
            'string',
            'digits:14',
            Rule::unique('instituicao', 'cnpj')->ignore($this->id),
        ],
            'email' => 'nullable|email|max:255',
            'celular' => 'nullable|string|digits:11',
            'endereco' => 'nullable|string|max:255',

        ];
    }

    public function messages(): array {
        return [
            'nome.string' => 'O nome da instituição deve ser um texto.',
            'nome.max' => 'O nome da instituição não pode ter mais de 255 caracteres.',

            'cnpj.digits' => 'O CNPJ deve ter exatamente 14 dígitos.',
            'cnpj.unique' => 'Este CNPJ já está cadastrado.',

            'email.email' => 'Por favor, insira um e-mail válido.',
            'email.max' => 'O e-mail da instituição não pode ter mais de 255 caracteres.',
            'email.unique' => 'Este e-mail já está em uso.',

            'celular.regex' => 'O celular deve estar no formato (XX) XXXXX-XXXX ou XX XXXXX-XXXX.',

            'endereco.max' => 'O endereço da instituição não pode ter mais de 255 caracteres.',
        ];
    }
}
