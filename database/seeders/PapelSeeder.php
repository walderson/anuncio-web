<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Papel;

class PapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Papel::where('nome', '=', 'Admin')->count()) {
            Papel::create([
                'nome' => 'Admin',
                'descricao' => 'Administrador do Sistema',
            ]);
        }
        if (!Papel::where('nome', '=', 'Gerente')->count()) {
            Papel::create([
                'nome' => 'Gerente',
                'descricao' => 'Gerente do Sistema',
            ]);
        }
        if (!Papel::where('nome', '=', 'Vendedor')->count()) {
            Papel::create([
                'nome' => 'Vendedor',
                'descricao' => 'Equipe de Vendas',
            ]);
        }
    }
}
