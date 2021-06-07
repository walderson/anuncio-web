<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Papel;
use App\Models\User;

class UsuarioPapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->administrador();
        $this->gerente();
        $this->vendedor();
    }

    private function administrador() {
        $usuario = User::where('email', '=', 'admin@dominio.com.br')->first();
        $papel = Papel::where('nome', '=', 'Admin')->first();
        if (!$usuario->possuiPapel($papel->nome)) {
            $usuario->adicionarPapel($papel);
        }
    }

    private function gerente() {
        $usuario = User::where('email', '=', 'gerente@dominio.com.br')->first();
        $papel = Papel::where('nome', '=', 'Gerente')->first();
        if (!$usuario->possuiPapel($papel->nome)) {
            $usuario->adicionarPapel($papel);
        }
    }

    private function vendedor() {
        $usuario = User::where('email', '=', 'vendedor@dominio.com.br')->first();
        $papel = Papel::where('nome', '=', 'Vendedor')->first();
        if (!$usuario->possuiPapel($papel->nome)) {
            $usuario->adicionarPapel($papel);
        }
    }
}
