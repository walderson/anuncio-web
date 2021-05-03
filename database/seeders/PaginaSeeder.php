<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Pagina;

class PaginaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $existeSobre = Pagina::where('tipo', '=', 'Sobre')->count();
        if ($existeSobre) {
            $paginaSobre = Pagina::where('tipo', '=', 'Sobre')->first();
            echo "Atualizando página Sobre...\n";
        } else {
            $paginaSobre = new Pagina();
            $paginaSobre->tipo = 'Sobre';
            echo "Cadastrando página Sobre...\n";
        }

        $paginaSobre->titulo = 'A Empresa';
        $paginaSobre->descricao = 'Breve apresentação da empresa.';
        $paginaSobre->texto = 'Texto de apresentação detalhada da empresa.';
        $paginaSobre->imagem = '/img/megafone.jpg';
        $paginaSobre->save();
        echo "Página Sobre inicializada com sucesso.\n";
    }
}
