<?php

namespace Database\Seeders;

use App\Models\Instituicao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstituicaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Instituicao::create([
            'nome' => 'Casa da Acacia',
            'cnpj' => '20.031.219/0002-46',
            'email' => 'casadaacacia@gmail.com',
            'celular' => '82999654909',
            'endereco' => 'Rua das aroeiras 243'
        ]);

        Instituicao::create([
            'nome' => 'Casa do Jambeiro',
            'cnpj' => '20.031.221/0002-46',
            'email' => 'jamboebom@gmail.com',
            'celular' => '82999644909',
            'endereco' => 'Rua das macaxeiras 12'
        ]);
    }
}
