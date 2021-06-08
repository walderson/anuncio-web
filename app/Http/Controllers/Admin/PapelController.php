<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Papel;
use App\Models\Permissao;

class PapelController extends Controller
{
    public function index(Request $request) {
        if (!Auth::user()->can('listar-papeis')) {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Sem acesso à funcionalidade!', 'class'=>'red white-text']);
            return redirect()->route('admin.home');
        }

        $papeis = Papel::orderBy('nome')->get();
        return view('admin.papeis.index', compact('papeis'));
    }

    public function cadastrar(Request $request) {
        if (!Auth::user()->can('cadastrar-papeis')) {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Sem acesso à funcionalidade!', 'class'=>'red white-text']);
            return redirect()->route('admin.home');
        }

        return view('admin.papeis.cadastrar');
    }

    public function salvar(Request $request) {
        if (!Auth::user()->can('cadastrar-papeis')) {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Sem acesso à funcionalidade!', 'class'=>'red white-text']);
            return redirect()->route('admin.home');
        }

        $dados = $request->all();
        if ($dados['nome'] == 'Admin') {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Admin não pode ser cadastrado!', 'class'=>'red white-text']);
            return redirect()->route('admin.papeis');
        }

        Papel::create($dados);

        $request->session()->flash('mensagem',
            ['msg'=>'Papel cadastrado com sucesso!', 'class'=>'green white-text']);
        return redirect()->route('admin.papeis');
    }

    public function alterar(Request $request, $id) {
        if (!Auth::user()->can('atualizar-papeis')) {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Sem acesso à funcionalidade!', 'class'=>'red white-text']);
            return redirect()->route('admin.home');
        }

        $papel = Papel::find($id);
        if ($papel->nome == 'Admin') {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Admin não pode ser atualizado!', 'class'=>'red white-text']);
            return redirect()->route('admin.papeis');
        }

        return view('admin.papeis.alterar', compact('papel'));
    }

    public function atualizar(Request $request, $id) {
        if (!Auth::user()->can('atualizar-papeis')) {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Sem acesso à funcionalidade!', 'class'=>'red white-text']);
            return redirect()->route('admin.home');
        }

        $papel = Papel::find($id);
        if ($papel->nome == 'Admin') {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Admin não pode ser atualizado!', 'class'=>'red white-text']);
            return redirect()->route('admin.papeis');
        }

        $dados = $request->all();
        $papel->update($dados);

        $request->session()->flash('mensagem',
            ['msg'=>'Papel atualizado com sucesso!', 'class'=>'green white-text']);
        return redirect()->route('admin.papeis');
    }

    public function remover(Request $request, $id) {
        if (!Auth::user()->can('remover-papeis')) {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Sem acesso à funcionalidade!', 'class'=>'red white-text']);
            return redirect()->route('admin.home');
        }

        $papel = Papel::find($id);
        if ($papel->nome == 'Admin') {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Admin não pode ser removido!', 'class'=>'red white-text']);
            return redirect()->route('admin.papeis');
        }

        $papel->delete();

        $request->session()->flash('mensagem',
            ['msg'=>'Papel removido com sucesso!', 'class'=>'green white-text']);
        return redirect()->route('admin.papeis');
    }

    public function permissoes(Request $request, $id) {
        if (!Auth::user()->can('listar-permissoes-papeis')) {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Sem acesso à funcionalidade!', 'class'=>'red white-text']);
            return redirect()->route('admin.home');
        }

        $papel = Papel::find($id);
        $permissoes = Permissao::all();
        return view('admin.papeis.permissoes', compact('papel', 'permissoes'));
    }

    public function salvarPermissao(Request $request, $id) {
        if (!Auth::user()->can('cadastrar-permissoes-papeis')) {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Sem acesso à funcionalidade!', 'class'=>'red white-text']);
            return redirect()->route('admin.home');
        }

        $dados = $request->all();
        $papel = Papel::find($id);
        $permissao = Permissao::find($dados['permissao_id']);
        if (!$papel->possuiPermissao($permissao->nome)) {
            $papel->adicionarPermissao($permissao);
        }
        return redirect()->back();
    }

    public function removerPermissao(Request $request, $id, $idPermissao) {
        if (!Auth::user()->can('remover-permissoes-papeis')) {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Sem acesso à funcionalidade!', 'class'=>'red white-text']);
            return redirect()->route('admin.home');
        }

        $papel = Papel::find($id);
        $permissao = Permissao::find($idPermissao);
        $papel->removerPermissao($permissao);
        return redirect()->back();
    }
}
