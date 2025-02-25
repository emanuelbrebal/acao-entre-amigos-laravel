<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRaffleRequest extends FormRequest
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
            'id_rifa' => 'required|integer',
            'id_instituicao' => 'required|integer',
            'titulo_rifa' => 'nullable|string|max:20',
            'preco_numeros' => 'nullable|integer',
            'premiacao' => 'nullable|string|max:30',
            'data_sorteio' => 'nullable|date|after_or_equal:today',
            'horario_sorteio' => 'nullable|date_format:H:i'
        ];
    }
    public function messages(): array
    {
        return [
            'id_rifa.required' => 'O campo ID da rifa é obrigatório.',
            'id_rifa.integer' => 'O campo ID da rifa deve ser um número inteiro.',

            'id_instituicao.required' => 'O campo ID da instituição é obrigatório.',
            'id_instituicao.integer' => 'O campo ID da instituição deve ser um número inteiro.',

            'titulo_rifa.string' => 'O campo título da rifa deve ser um texto.',
            'titulo_rifa.max' => 'O campo título da rifa deve ter no máximo 30 caracteres.',

            'preco_numeros.integer' => 'O campo preço dos números deve ser um número.',

            'premiacao.string' => 'O campo premiação deve ser um texto.',
            'premiacao.max' => 'O campo premiação deve ter no máximo 30 caracteres.',

            'data_sorteio.date' => 'O campo data do sorteio deve ser uma data válida.',
            'data_sorteio.after_or_equal' => 'O campo data precisa ser uma data maior ou igual a hoje.',

            'horario_sorteio.date_format' => 'O campo horário do sorteio deve estar no formato HH:MM (ex: 14:30).',
        ];
    }
}
