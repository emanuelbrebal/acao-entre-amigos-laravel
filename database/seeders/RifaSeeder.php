<?php

namespace Database\Seeders;

use App\Models\Rifa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RifaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rifa::create([
            'titulo_rifa' => 'carro 0km',
            'preco_numeros' => '10',
            'premiacao' => 'peugeot 208 0km',
            'data_sorteio' => '10/01/2025',
            'qtd_num' => '1000',
            'id_instituicao' => '1',
        ]);
        Rifa::create([
            'titulo_rifa' => 'moto 0km',
            'preco_numeros' => '12',
            'premiacao' => 'royal enfield hunter 350cc 0km',
            'data_sorteio' => '16/01/2025',
            'qtd_num' => '25',
            'id_instituicao' => '1',
        ]);
        Rifa::create([
            'titulo_rifa' => 'pintura a óleo',
            'preco_numeros' => '100',
            'premiacao' => 'pintura a óleo feito pelo artista: Askdsao',
            'data_sorteio' => '27/01/2025',
            'qtd_num' => '10000',
            'id_instituicao' => '1',
        ]);
        Rifa::create([
            'titulo_rifa' => 'Kit cozinha',
            'preco_numeros' => '5',
            'premiacao' => 'Jogo de panela e utensilios',
            'data_sorteio' => '22/01/2025',
            'qtd_num' => '0',
            'id_instituicao' => '2',
        ]);
    }
}
