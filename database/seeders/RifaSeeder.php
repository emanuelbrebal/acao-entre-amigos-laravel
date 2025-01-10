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
        Rifa::factory()->create([
            'titulo_rifa' => 'carro 0km',
            'preco_numeros' => '10',
            'premiacao' => 'peugeot 208 0km',
            'data_sorteio' => '10/01/2025',
            'qtd_num' => '1000',
            'id_instituicao' => '1',
        ]);
    }
}
