<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Papel;
use App\Models\Permissao;

class PapelPermissaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->gerente();
        $this->vendedor();
    }

    private function gerente() {
        $papel = Papel::where('nome', '=', 'Gerente')->first();
        $gerente = [
            'listar-paginas', 'atualizar-paginas',
            'listar-slides', 'cadastrar-slides', 'atualizar-slides', 'remover-slides',
            'listar-categorias', 'cadastrar-categorias', 'atualizar-categorias', 'remover-categorias',
            'listar-municipios', 'cadastrar-municipios', 'atualizar-municipios', 'remover-municipios',
        ];
        $permissoes = Permissao::whereIn('nome', $gerente)->get();
        foreach ($permissoes as $permissao) {
            if (!$papel->possuiPermissao($permissao->nome)) {
                $papel->adicionarPermissao($permissao);
            }
        }
    }

    private function vendedor() {
        $papel = Papel::where('nome', '=', 'Vendedor')->first();
        $vendedor = [
            'listar-anuncios', 'cadastrar-anuncios', 'atualizar-anuncios', 'remover-anuncios',
            'listar-imagens', 'cadastrar-imagens', 'atualizar-imagens', 'remover-imagens',
        ];
        $permissoes = Permissao::whereIn('nome', $vendedor)->get();
        foreach ($permissoes as $permissao) {
            if (!$papel->possuiPermissao($permissao->nome)) {
                $papel->adicionarPermissao($permissao);
            }
        }
    }
}
