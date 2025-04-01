<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'tipo_usuario' => 'required|in:cpf,cnpj',
            'cpf' => 'required_if:tipo_usuario,cpf|string|regex:/^\d{3}\.\d{3}\.\d{3}-\d{2}$/|unique:usuarios,cpf',
            'cnpj' => 'required_if:tipo_usuario,cnpj|string|regex:/^\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2}$/|unique:instituicao,cnpj',

            'nome' => 'required|string|min:3',
            'email' => 'required|string|email|unique:usuarios,email|unique:instituicao,email',
            'celular' => 'required|string|regex:/^\(?\d{2}\)?[\s-]?\d{4,5}-?\d{4}$/',
            'endereco' => 'required|string',
            'password' => 'required|string|min:3|confirmed',

        ];
    }

    public function messages(): array
    {
        return [
            'cpf.required_if' => 'O campo "CPF" é obrigatório.',
            'cpf.string' => 'O CPF deve ser um texto.',
            'cpf.regex' => 'O CPF deve estar no formato XXX.XXX.XXX-XX.',
            'cpf.unique' => 'O CPF informado já está cadastrado.',

            'cnpj.required_if' => 'O campo "CNPJ" é obrigatório.',
            'cnpj.string' => 'O CNPJ deve ser um texto.',
            'cnpj.regex' => 'O CNPJ deve estar no formato XX.XXX.XXX/XXXX-XX.',
            'cnpj.unique' => 'O CNPJ informado já está cadastrado.',

            'nome.required' => 'O campo "nome" é obrigatório',
            'nome.string' => 'O campo "nome" deve ser um texto',
            'nome.min' => 'O nome deve ter pelo menos 3 caracteres.',

            'email.required' => 'O campo "e-mail" é obrigatório.',
            'email.string' => 'O campo "e-mail" deve ser um texto.',
            'email.email' => 'Por favor, insira um e-mail válido.',
            'email.unique:usuarios' => 'O e-mail informado já está cadastrado para um usuário.',
            'email.unique:instituicao' => 'O e-mail informado já está cadastrado para uma instituição.',

            'celular.required' => 'O campo "celular" é obrigatório.',
            'celular.string' => 'O campo "celular" deve ser um texto.',
            'celular.regex' => 'O celular deve estar no formato (XX) XXXXX-XXXX.',

            'endereco.required' => 'O campo "endereço" é obrigatório.',
            'endereco.string' => 'O campo "endereço" deve ser um texto.',

            'password.required' => 'O campo "senha" é obrigatório',
            'password.string' => 'O campo "senha" deve ser um texto',
            'password.min' => 'Sua senha deve ter pelo menos 3 caracteres.',
            'password.confirmed' => 'As senhas não coincidem.',

            'tipo_usuario.required' => 'O tipo de usuário é obrigatório.',
            'tipo_usuario.in' => 'O tipo de usuário deve ser CPF ou CNPJ.',
        ];
    }
}
