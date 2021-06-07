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
}
