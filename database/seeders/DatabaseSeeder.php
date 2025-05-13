<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // 1. Cria o usuário admin principal
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@mercado.com',
            'password' => Hash::make('Admin@1234'), // Senha mais segura
            'role' => 'admin',
            'cpf' => '123.456.789-00',
            'telefone' => '(11) 99999-9999',
            'email_verified_at' => now() // Marca como verificado
        ]);

        // 2. Cria usuários de teste (opcional)
        User::factory()->create([
            'name' => 'Gerente',
            'email' => 'gerente@mercado.com',
            'role' => 'gerente',
            'cpf' => '987.654.321-00'
        ]);

        User::factory()->create([
            'name' => 'Cliente Teste',
            'email' => 'cliente@mercado.com',
            'role' => 'user',
            'cpf' => '111.222.333-44'
        ]);

        // 3. Cria dados fictícios (se tiver factories)
        // \App\Models\Produto::factory(20)->create();
        // \App\Models\Categoria::factory(5)->create();
    }
}