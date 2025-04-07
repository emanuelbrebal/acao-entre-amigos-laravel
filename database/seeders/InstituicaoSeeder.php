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
            'cnpj' => '12312312312318',
            'email' => 'casadaacacia@gmail.com',
            'celular' => '82999654909',
            'endereco' => 'Rua das aroeiras 243',
            'password' => bcrypt('123')
        ]);

        Instituicao::create([
            'nome' => 'Casa do Jambeiro',
            'cnpj' => '12312312312319',
            'email' => 'jamboebom@gmail.com',
            'celular' => '82999644909',
            'endereco' => 'Rua das macaxeiras 12',
            'password' => bcrypt('123')
        ]);
    }
}
