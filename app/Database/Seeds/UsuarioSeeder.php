<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    public function run(){
        
        $usuarioModel = new \App\Models\UsuarioModel; 

        $usuario = [
            'nome' => 'Antonio Daleo',
            'email' => 'admin@admin.com', 
            'cpf' => '618.263.273-98',
            'telefone' => '85988602193',
        ];

        $usuarioModel->protect(false)->insert($usuario); 

       

        //Debug dd
        dd($usuarioModel->error());

    }
}
