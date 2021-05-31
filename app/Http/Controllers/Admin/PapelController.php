<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Papel;

class PapelController extends Controller
{
    public function index() {
        $papeis = Papel::orderBy('nome')->get();
        return view('admin.papeis.index', compact('papeis'));
    }

    public function cadastrar() {
        return view('admin.papeis.cadastrar');
    }

    public function salvar(Request $request) {
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
        $papel = Papel::find($id);
        if ($papel->nome == 'Admin') {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Admin não pode ser atualizado!', 'class'=>'red white-text']);
            return redirect()->route('admin.papeis');
        }

        return view('admin.papeis.alterar', compact('papel'));
    }

    public function atualizar(Request $request, $id) {
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
}
