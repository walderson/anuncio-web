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
        $this->usuarioAdmin();
        $this->usuarioGerente();
        $this->usuarioVendedor();
    }

    private function usuarioAdmin() {
        if (User::where('email', '=', 'admin@dominio.com.br')->count()) {
            $usuario = User::where('email', '=', 'admin@dominio.com.br')->first();
        } else {
            $usuario = new User();
            $usuario->email = "admin@dominio.com.br";
        }

        $usuario->name = "Administrador da Empresa";
        $usuario->password = Hash::make("123456");
        $usuario->save();
    }


    private function usuarioGerente() {
        if (User::where('email', '=', 'gerente@dominio.com.br')->count()) {
            $usuario = User::where('email', '=', 'gerente@dominio.com.br')->first();
        } else {
            $usuario = new User();
            $usuario->email = "gerente@dominio.com.br";
        }

        $usuario->name = "Gerente de Vendas";
        $usuario->password = Hash::make("123456");
        $usuario->save();
    }

    private function usuarioVendedor() {
        if (User::where('email', '=', 'vendedor@dominio.com.br')->count()) {
            $usuario = User::where('email', '=', 'vendedor@dominio.com.br')->first();
        } else {
            $usuario = new User();
            $usuario->email = "vendedor@dominio.com.br";
        }

        $usuario->name = "Vendedor de Produtos";
        $usuario->password = Hash::make("123456");
        $usuario->save();
    }
}
