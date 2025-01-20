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
            'cpf' => '12345678910',
            'email' => 'laraveloso@gmail.com',
            'password' => bcrypt('12345678912'),
            'celular' => '1415253256',
            'endereco' => 'Rua das laranjeiras 123',
        ]);
    }
}
