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

        $paginaSobre->titulo = 'Título da Empresa';
        $paginaSobre->descricao = 'Breve apresentação da empresa.';
        $paginaSobre->texto = 'Texto de apresentação detalhada da empresa.';
        $paginaSobre->imagem = '/img/megafone.jpg';
        $paginaSobre->mapa = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15371.345554253456!2d-56.03614755!3d-15.600387999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x939db1f487dc5967%3A0x5fdbe3599d488738!2sCervejaria%20LaCerva!5e0!3m2!1spt-BR!2sbr!4v1620056728060!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>';
        $paginaSobre->save();
        echo "Página Sobre inicializada com sucesso.\n";
    }
}
