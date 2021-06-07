<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Anuncio;
use App\Models\Municipio;

class MunicipioController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::user()->can('listar-municipios')) {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Sem acesso à funcionalidade!', 'class'=>'red white-text']);
            return redirect()->route('admin.home');
        }

        $municipios = Municipio::all()->sortBy('nome');
        return view('admin.municipios.index', compact('municipios'));
    }

    public function cadastrar(Request $request)
    {
        if (!Auth::user()->can('cadastrar-municipios')) {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Sem acesso à funcionalidade!', 'class'=>'red white-text']);
            return redirect()->route('admin.home');
        }

        return view('admin.municipios.cadastrar');
    }

    public function salvar(Request $request)
    {
        if (!Auth::user()->can('cadastrar-municipios')) {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Sem acesso à funcionalidade!', 'class'=>'red white-text']);
            return redirect()->route('admin.home');
        }

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

    public function alterar(Request $request, $id)
    {
        if (!Auth::user()->can('atualizar-municipios')) {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Sem acesso à funcionalidade!', 'class'=>'red white-text']);
            return redirect()->route('admin.home');
        }

        $municipio = Municipio::find($id);
        return view('admin.municipios.alterar', compact('municipio'));
    }

    public function atualizar(Request $request, $id)
    {
        if (!Auth::user()->can('atualizar-municipios')) {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Sem acesso à funcionalidade!', 'class'=>'red white-text']);
            return redirect()->route('admin.home');
        }

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
        if (!Auth::user()->can('remover-municipios')) {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Sem acesso à funcionalidade!', 'class'=>'red white-text']);
            return redirect()->route('admin.home');
        }

        if (Anuncio::where('municipio_id', '=', $id)->count() > 0) {
            $msg = "Não é possível remover um município que possua anúncios vinculados:";
            $anuncios = Anuncio::where('municipio_id', '=', $id)->get();
            foreach ($anuncios as $anuncio) {
                $msg .= " id:" . $anuncio->id;
            }
            $request->session()->flash('mensagem',
                ['msg'=>$msg, 'class'=>'red white-text']);
            return redirect()->route('admin.municipios');
        }

        Municipio::find($id)->delete();

        $request->session()->flash('mensagem',
            ['msg'=>'Município removido com sucesso!', 'class'=>'green white-text']);
        return redirect()->route('admin.municipios');
    }
}
