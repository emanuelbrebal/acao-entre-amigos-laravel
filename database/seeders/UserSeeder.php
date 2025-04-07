<?php

namespace Database\Seeders;

use App\Models\Usuarios;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuarios::create([
            'nome' => 'Lara Veloso',
            'cpf' => '12193661456',
            'email' => 'laraveloso@gmail.com',
            'password' => bcrypt('123'),
            'celular' => '82999654909',
            'endereco' => 'Rua das laranjeiras 123',
        ]);
    }
}
