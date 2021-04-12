<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = new User();
        $usuario->name = "Walderson Shimokawa";
        $usuario->email = "admin@dominio.com.br";
        $usuario->password = Hash::make("123456");
        $usuario->save();
    }
}
