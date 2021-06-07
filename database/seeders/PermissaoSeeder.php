<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Permissao;

class PermissaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->permissoesUsuarios();
        $this->permissoesPapeis();
        $this->permissoesPaginas();
        $this->permissoesSlides();
        $this->permissoesCategorias();
        $this->permissoesMunicipios();
        $this->permissoesAnuncios();
        $this->permissoesImagens();
    }

    private function permissoesUsuarios() {
        if (Permissao::where('nome', '=', 'listar-usuarios')->count()) {
            $permissao = Permissao::where('nome', '=', 'listar-usuarios')->first();
            $permissao->update(['descricao'=>'Listar Usuários',]);
        } else {
            Permissao::create([
                'nome'=>'listar-usuarios',
                'descricao'=>'Listar Usuários',
            ]);
        }
        if (Permissao::where('nome', '=', 'cadastrar-usuarios')->count()) {
            $permissao = Permissao::where('nome', '=', 'cadastrar-usuarios')->first();
            $permissao->update(['descricao'=>'Cadastrar Usuários',]);
        } else {
            Permissao::create([
                'nome'=>'cadastrar-usuarios',
                'descricao'=>'Cadastrar Usuários',
            ]);
        }
        if (Permissao::where('nome', '=', 'atualizar-usuarios')->count()) {
            $permissao = Permissao::where('nome', '=', 'atualizar-usuarios')->first();
            $permissao->update(['descricao'=>'Atualizar Usuários',]);
        } else {
            Permissao::create([
                'nome'=>'atualizar-usuarios',
                'descricao'=>'Atualizar Usuários',
            ]);
        }
        if (Permissao::where('nome', '=', 'remover-usuarios')->count()) {
            $permissao = Permissao::where('nome', '=', 'remover-usuarios')->first();
            $permissao->update(['descricao'=>'Remover Usuários',]);
        } else {
            Permissao::create([
                'nome'=>'remover-usuarios',
                'descricao'=>'Remover Usuários',
            ]);
        }
        if (Permissao::where('nome', '=', 'listar-papeis-usuarios')->count()) {
            $permissao = Permissao::where('nome', '=', 'listar-papeis-usuarios')->first();
            $permissao->update(['descricao'=>'Listar Papéis de Usuários',]);
        } else {
            Permissao::create([
                'nome'=>'listar-papeis-usuarios',
                'descricao'=>'Listar Papéis de Usuários',
            ]);
        }
        if (Permissao::where('nome', '=', 'cadastrar-papeis-usuarios')->count()) {
            $permissao = Permissao::where('nome', '=', 'cadastrar-papeis-usuarios')->first();
            $permissao->update(['descricao'=>'Cadastrar Papéis de Usuários',]);
        } else {
            Permissao::create([
                'nome'=>'cadastrar-papeis-usuarios',
                'descricao'=>'Cadastrar Papéis de Usuários',
            ]);
        }
        if (Permissao::where('nome', '=', 'remover-papeis-usuarios')->count()) {
            $permissao = Permissao::where('nome', '=', 'remover-papeis-usuarios')->first();
            $permissao->update(['descricao'=>'Remover Papéis de Usuários',]);
        } else {
            Permissao::create([
                'nome'=>'remover-papeis-usuarios',
                'descricao'=>'Remover Papéis de Usuários',
            ]);
        }
    }

    private function permissoesPapeis() {
        if (Permissao::where('nome', '=', 'listar-papeis')->count()) {
            $permissao = Permissao::where('nome', '=', 'listar-papeis')->first();
            $permissao->update(['descricao'=>'Listar Papéis',]);
        } else {
            Permissao::create([
                'nome'=>'listar-papeis',
                'descricao'=>'Listar Papéis',
            ]);
        }
        if (Permissao::where('nome', '=', 'cadastrar-papeis')->count()) {
            $permissao = Permissao::where('nome', '=', 'cadastrar-papeis')->first();
            $permissao->update(['descricao'=>'Cadastrar Papéis',]);
        } else {
            Permissao::create([
                'nome'=>'cadastrar-papeis',
                'descricao'=>'Cadastrar Papéis',
            ]);
        }
        if (Permissao::where('nome', '=', 'atualizar-papeis')->count()) {
            $permissao = Permissao::where('nome', '=', 'atualizar-papeis')->first();
            $permissao->update(['descricao'=>'Atualizar Papéis',]);
        } else {
            Permissao::create([
                'nome'=>'atualizar-papeis',
                'descricao'=>'Atualizar Papéis',
            ]);
        }
        if (Permissao::where('nome', '=', 'remover-papeis')->count()) {
            $permissao = Permissao::where('nome', '=', 'remover-papeis')->first();
            $permissao->update(['descricao'=>'Remover Papéis',]);
        } else {
            Permissao::create([
                'nome'=>'remover-papeis',
                'descricao'=>'Remover Papéis',
            ]);
        }
        if (Permissao::where('nome', '=', 'listar-permissoes-papeis')->count()) {
            $permissao = Permissao::where('nome', '=', 'listar-permissoes-papeis')->first();
            $permissao->update(['descricao'=>'Listar Permissões de Papéis',]);
        } else {
            Permissao::create([
                'nome'=>'listar-permissoes-papeis',
                'descricao'=>'Listar Permissões de Papéis',
            ]);
        }
        if (Permissao::where('nome', '=', 'cadastrar-permissoes-papeis')->count()) {
            $permissao = Permissao::where('nome', '=', 'cadastrar-permissoes-papeis')->first();
            $permissao->update(['descricao'=>'Cadastrar Permissões de Papéis',]);
        } else {
            Permissao::create([
                'nome'=>'cadastrar-permissoes-papeis',
                'descricao'=>'Cadastrar Permissões de Papéis',
            ]);
        }
        if (Permissao::where('nome', '=', 'remover-permissoes-papeis')->count()) {
            $permissao = Permissao::where('nome', '=', 'remover-permissoes-papeis')->first();
            $permissao->update(['descricao'=>'Remover Permissões de Papéis',]);
        } else {
            Permissao::create([
                'nome'=>'remover-permissoes-papeis',
                'descricao'=>'Remover Permissões de Papéis',
            ]);
        }
    }

    private function permissoesPaginas() {
        if (Permissao::where('nome', '=', 'listar-paginas')->count()) {
            $permissao = Permissao::where('nome', '=', 'listar-paginas')->first();
            $permissao->update(['descricao'=>'Listar Páginas',]);
        } else {
            Permissao::create([
                'nome'=>'listar-paginas',
                'descricao'=>'Listar Páginas',
            ]);
        }
        if (Permissao::where('nome', '=', 'atualizar-paginas')->count()) {
            $permissao = Permissao::where('nome', '=', 'atualizar-paginas')->first();
            $permissao->update(['descricao'=>'Atualizar Páginas',]);
        } else {
            Permissao::create([
                'nome'=>'atualizar-paginas',
                'descricao'=>'Atualizar Páginas',
            ]);
        }
    }

    private function permissoesSlides() {
        if (Permissao::where('nome', '=', 'listar-slides')->count()) {
            $permissao = Permissao::where('nome', '=', 'listar-slides')->first();
            $permissao->update(['descricao'=>'Listar Slides',]);
        } else {
            Permissao::create([
                'nome'=>'listar-slides',
                'descricao'=>'Listar Slides',
            ]);
        }
        if (Permissao::where('nome', '=', 'cadastrar-slides')->count()) {
            $permissao = Permissao::where('nome', '=', 'cadastrar-slides')->first();
            $permissao->update(['descricao'=>'Cadastrar Slides',]);
        } else {
            Permissao::create([
                'nome'=>'cadastrar-slides',
                'descricao'=>'Cadastrar Slides',
            ]);
        }
        if (Permissao::where('nome', '=', 'atualizar-slides')->count()) {
            $permissao = Permissao::where('nome', '=', 'atualizar-slides')->first();
            $permissao->update(['descricao'=>'Atualizar Slides',]);
        } else {
            Permissao::create([
                'nome'=>'atualizar-slides',
                'descricao'=>'Atualizar Slides',
            ]);
        }
        if (Permissao::where('nome', '=', 'remover-slides')->count()) {
            $permissao = Permissao::where('nome', '=', 'remover-slides')->first();
            $permissao->update(['descricao'=>'Remover Slides',]);
        } else {
            Permissao::create([
                'nome'=>'remover-slides',
                'descricao'=>'Remover Slides',
            ]);
        }
    }

    private function permissoesCategorias(){
        if (Permissao::where('nome', '=', 'listar-categorias')->count()) {
            $permissao = Permissao::where('nome', '=', 'listar-categorias')->first();
            $permissao->update(['descricao'=>'Listar Categorias',]);
        } else {
            Permissao::create([
                'nome'=>'listar-categorias',
                'descricao'=>'Listar Categorias',
            ]);
        }
        if (Permissao::where('nome', '=', 'cadastrar-categorias')->count()) {
            $permissao = Permissao::where('nome', '=', 'cadastrar-categorias')->first();
            $permissao->update(['descricao'=>'Cadastrar Categorias',]);
        } else {
            Permissao::create([
                'nome'=>'cadastrar-categorias',
                'descricao'=>'Cadastrar Categorias',
            ]);
        }
        if (Permissao::where('nome', '=', 'atualizar-categorias')->count()) {
            $permissao = Permissao::where('nome', '=', 'atualizar-categorias')->first();
            $permissao->update(['descricao'=>'Atualizar Categorias',]);
        } else {
            Permissao::create([
                'nome'=>'atualizar-categorias',
                'descricao'=>'Atualizar Categorias',
            ]);
        }
        if (Permissao::where('nome', '=', 'remover-categorias')->count()) {
            $permissao = Permissao::where('nome', '=', 'remover-categorias')->first();
            $permissao->update(['descricao'=>'Remover Categorias',]);
        } else {
            Permissao::create([
                'nome'=>'remover-categorias',
                'descricao'=>'Remover Categorias',
            ]);
        }
    }

    private function permissoesMunicipios() {
        if (Permissao::where('nome', '=', 'listar-municipios')->count()) {
            $permissao = Permissao::where('nome', '=', 'listar-municipios')->first();
            $permissao->update(['descricao'=>'Listar Municípios',]);
        } else {
            Permissao::create([
                'nome'=>'listar-municipios',
                'descricao'=>'Listar Municípios',
            ]);
        }
        if (Permissao::where('nome', '=', 'cadastrar-municipios')->count()) {
            $permissao = Permissao::where('nome', '=', 'cadastrar-municipios')->first();
            $permissao->update(['descricao'=>'Cadastrar Municípios',]);
        } else {
            Permissao::create([
                'nome'=>'cadastrar-municipios',
                'descricao'=>'Cadastrar Municípios',
            ]);
        }
        if (Permissao::where('nome', '=', 'atualizar-municipios')->count()) {
            $permissao = Permissao::where('nome', '=', 'atualizar-municipios')->first();
            $permissao->update(['descricao'=>'Atualizar Municípios',]);
        } else {
            Permissao::create([
                'nome'=>'atualizar-municipios',
                'descricao'=>'Atualizar Municípios',
            ]);
        }
        if (Permissao::where('nome', '=', 'remover-municipios')->count()) {
            $permissao = Permissao::where('nome', '=', 'remover-municipios')->first();
            $permissao->update(['descricao'=>'Remover Municípios',]);
        } else {
            Permissao::create([
                'nome'=>'remover-municipios',
                'descricao'=>'Remover Municípios',
            ]);
        }
    }

    private function permissoesAnuncios() {
        if (Permissao::where('nome', '=', 'listar-anuncios')->count()) {
            $permissao = Permissao::where('nome', '=', 'listar-anuncios')->first();
            $permissao->update(['descricao'=>'Listar Anúncios',]);
        } else {
            Permissao::create([
                'nome'=>'listar-anuncios',
                'descricao'=>'Listar Anúncios',
            ]);
        }
        if (Permissao::where('nome', '=', 'cadastrar-anuncios')->count()) {
            $permissao = Permissao::where('nome', '=', 'cadastrar-anuncios')->first();
            $permissao->update(['descricao'=>'Cadastrar Anúncios',]);
        } else {
            Permissao::create([
                'nome'=>'cadastrar-anuncios',
                'descricao'=>'Cadastrar Anúncios',
            ]);
        }
        if (Permissao::where('nome', '=', 'atualizar-anuncios')->count()) {
            $permissao = Permissao::where('nome', '=', 'atualizar-anuncios')->first();
            $permissao->update(['descricao'=>'Atualizar Anúncios',]);
        } else {
            Permissao::create([
                'nome'=>'atualizar-anuncios',
                'descricao'=>'Atualizar Anúncios',
            ]);
        }
        if (Permissao::where('nome', '=', 'remover-anuncios')->count()) {
            $permissao = Permissao::where('nome', '=', 'remover-anuncios')->first();
            $permissao->update(['descricao'=>'Remover Anúncios',]);
        } else {
            Permissao::create([
                'nome'=>'remover-anuncios',
                'descricao'=>'Remover Anúncios',
            ]);
        }
    }

    private function permissoesImagens() {
        if (Permissao::where('nome', '=', 'listar-imagens')->count()) {
            $permissao = Permissao::where('nome', '=', 'listar-imagens')->first();
            $permissao->update(['descricao'=>'Listar Imagens',]);
        } else {
            Permissao::create([
                'nome'=>'listar-imagens',
                'descricao'=>'Listar Imagens',
            ]);
        }
        if (Permissao::where('nome', '=', 'cadastrar-imagens')->count()) {
            $permissao = Permissao::where('nome', '=', 'cadastrar-imagens')->first();
            $permissao->update(['descricao'=>'Cadastrar Imagens',]);
        } else {
            Permissao::create([
                'nome'=>'cadastrar-imagens',
                'descricao'=>'Cadastrar Imagens',
            ]);
        }
        if (Permissao::where('nome', '=', 'atualizar-imagens')->count()) {
            $permissao = Permissao::where('nome', '=', 'atualizar-imagens')->first();
            $permissao->update(['descricao'=>'Atualizar Imagens',]);
        } else {
            Permissao::create([
                'nome'=>'atualizar-imagens',
                'descricao'=>'Atualizar Imagens',
            ]);
        }
        if (Permissao::where('nome', '=', 'remover-imagens')->count()) {
            $permissao = Permissao::where('nome', '=', 'remover-imagens')->first();
            $permissao->update(['descricao'=>'Remover Imagens',]);
        } else {
            Permissao::create([
                'nome'=>'remover-imagens',
                'descricao'=>'Remover Imagens',
            ]);
        }
    }
}
