<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRaffleRequest extends FormRequest
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
            'titulo_rifa' => 'required|string',
            'qtd_num' => 'required|numeric|min:1',
            'preco_numeros' => 'required|numeric|max:1000000',
            'premiacao' => 'required|string',
            'data_sorteio' => 'required|date|after:today',
            'hora_sorteio' => 'required|date_format:H:i',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_instituicao' => 'required|numeric|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'titulo_rifa.required' => 'O título da rifa é obrigatório.',
            'titulo_rifa.string' => 'O título da rifa deve ser um texto.',

            'qtd_num.required' => 'A quantidade de cotas é obrigatória.',
            'qtd_num.numeric' => 'A quantidade de cotas deve ser numérica.',
            'qtd_num.min' => 'A quantidade de cotas deve ser no mínimo 10.',

            'preco_numeros.required' => 'O preço dos números é obrigatório.',
            'preco_numeros.numeric' => 'O preço dos números deve ser numérico.',
            'preco_numeros.min' => 'O preço dos números deve ser no mínimo 1.',
            'preco_numeros.max' => 'O preço dos números deve ser no máximo 1.000.000.',

            'premiacao.required' => 'A premiação é obrigatória.',
            'premiacao.string' => 'A premiação deve ser um texto.',

            'data_sorteio.required' => 'A data do sorteio é obrigatória.',
            'data_sorteio.date' => 'A data do sorteio deve ser uma data válida.',
            'data_sorteio.after' => 'A data do sorteio deve ser após o dia de hoje.',

            'hora_sorteio.required' => 'O campo "Hora do Sorteio" é obrigatório.',
            'hora_sorteio.date_format' => 'O campo "Hora do Sorteio" deve ser uma hora válida no formato HH:mm (exemplo: 14:30).',

            'imagem.required' => 'A imagem é obrigatória.',
            'imagem.image' => 'A imagem deve ser um arquivo de imagem.',
            'imagem.mimes' => 'A imagem deve ser dos tipos jpeg, png, jpg ou gif.',
            'imagem.max' => 'A imagem não pode ter mais de 2MB.',

            'id_instituicao.required' => 'O ID da instituição é obrigatório.',
            'id_instituicao.numeric' => 'O ID da instituição deve ser numérico.',
            'id_instituicao.min' => 'O ID da instituição deve ser no mínimo 1.',
        ];
    }
}
