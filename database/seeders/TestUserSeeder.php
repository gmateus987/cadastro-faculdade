<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class TestUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'id' => 1,
            'name' => 'Usuário Desligado',
            'email' => 'usuariodesligado@gmail.com',
            'password' => Hash::make('defaultuser'), // Certifique-se de usar o Hash::make para criptografar a senha
            'is_admin' => true
        ]);

        User::create([
            'id' => 2,
            'name' => 'Mateus Gomes',
            'email' => 'gmateus987@gmail.com',
            'password' => Hash::make('mateus12'), // Certifique-se de usar o Hash::make para criptografar a senha
            'is_admin' => true
        ]);


    }
}
