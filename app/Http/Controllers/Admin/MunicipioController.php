<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Municipio;

class MunicipioController extends Controller
{
    public function index()
    {
        $municipios = Municipio::all()->sortBy('nome');
        return view('admin.municipios.index', compact('municipios'));
    }

    public function cadastrar()
    {
        return view('admin.municipios.cadastrar');
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();

        $municipio = new Municipio();
        $municipio->nome = $dados['nome'];
        $municipio->uf = $dados['uf'];
        $municipio->sigla_uf = $dados['sigla_uf'];
        $municipio->save();

        $request->session()->flash('mensagem',
            ['msg'=>'Município cadastrado com sucesso!', 'class'=>'green white-text']);
        return redirect()->route('admin.municipios');
    }

    public function alterar($id)
    {
        $municipio = Municipio::find($id);
        return view('admin.municipios.alterar', compact('municipio'));
    }

    public function atualizar(Request $request, $id)
    {
        $dados = $request->all();

        $municipio = Municipio::find($id);
        $municipio->nome = $dados['nome'];
        $municipio->uf = $dados['uf'];
        $municipio->sigla_uf = $dados['sigla_uf'];
        $municipio->update();

        $request->session()->flash('mensagem',
            ['msg'=>'Município atualizado com sucesso!', 'class'=>'green white-text']);
        return redirect()->route('admin.municipios');
    }

    public function remover(Request $request, $id)
    {
        Municipio::find($id)->delete();

        $request->session()->flash('mensagem',
            ['msg'=>'Município removido com sucesso!', 'class'=>'green white-text']);
        return redirect()->route('admin.municipios');
    }
}
