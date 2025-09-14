<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Cria um usuário padrão inicial
        $usuarioPadrao = User::create([
            'name' => 'Usuário Padrão',
            'email' => 'emailteste@email.com',
            'password' => Hash::make("@Senha123!"),
        ]);

        // Array de informações para popular a tabela de perfis
        $arrDadosPerfisIniciais = [
            [
                'name' => 'Usuário',
                'description' => "Perfil padrão para usuários"
            ],
            [
                'name' => 'Administrador',
                'description' => "Perfil para administradores do sistema"
            ]
        ];

        // para cada iten no array, cadastra um novo perfil e um relacionamento entre o perfil
        // e o usuário padrão
        foreach ($arrDadosPerfisIniciais as $arrNovoPerfil) {
            $novoPerfil = Role::create($arrNovoPerfil);

            RoleUser::create([
                "user_id" => $usuarioPadrao->id,
                "role_id" => $novoPerfil->id
            ]);
        }
    }
}
