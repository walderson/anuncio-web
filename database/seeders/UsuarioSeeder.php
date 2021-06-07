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
        if (User::where('email', '=', 'admin@dominio.com.br')->count()) {
            $usuario = User::where('email', '=', 'admin@dominio.com.br')->first();
        } else {
            $usuario = new User();
            $usuario->email = "admin@dominio.com.br";
        }

        $usuario->name = "Walderson Shimokawa";
        $usuario->password = Hash::make("123456");
        $usuario->save();
    }
}
