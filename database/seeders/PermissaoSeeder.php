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
    }
}
