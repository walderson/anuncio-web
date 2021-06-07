<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\Anuncio;
use App\Models\Categoria;
use App\Models\Municipio;

class AnuncioController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::user()->can('listar-anuncios')) {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Sem acesso à funcionalidade!', 'class'=>'red white-text']);
            return redirect()->route('admin.home');
        }

        $anuncios = Anuncio::all();
        return view('admin.anuncios.index', compact('anuncios'));
    }

    public function cadastrar(Request $request)
    {
        if (!Auth::user()->can('cadastrar-anuncios')) {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Sem acesso à funcionalidade!', 'class'=>'red white-text']);
            return redirect()->route('admin.home');
        }

        $categorias = Categoria::all()->sortBy('titulo');
        $municipios = Municipio::all()->sortBy('nome');
        return view('admin.anuncios.cadastrar', compact(['categorias', 'municipios']));
    }

    private function preencher(Request $request, $anuncio, $dados) {
        $anuncio->titulo = $dados['titulo'];
        $anuncio->descricao = $dados['descricao'];
        $anuncio->finalidade = $dados['finalidade'];
        $anuncio->endereco = $dados['endereco'];
        $anuncio->cep = $dados['cep'];
        $anuncio->valor = $dados['valor'];
        $anuncio->detalhes = $dados['detalhes'];
        $anuncio->status = $dados['status'];
        if (isset($dados['mapa']) && trim($dados['mapa']) != '') {
            $anuncio->mapa = trim($dados['mapa']);
        } else {
            $anuncio->mapa = null;
        }

        $anuncio->categoria_id = $dados['categoria_id'];
        $anuncio->municipio_id = $dados['municipio_id'];

        $arquivo = $request->file('imagem');
        if ($arquivo) {
            $rand = rand(10000, 99999);
            $dir = 'img/anuncios/' . Str::slug($dados['titulo'], '_') . '/';
            $ext = $arquivo->guessClientExtension();
            $nomeArquivo = '_img_' . $rand . '.' . $ext;
            $arquivo->move($dir, $nomeArquivo);
            $anuncio->imagem = $dir . $nomeArquivo;
        }
    }

    public function salvar(Request $request)
    {
        if (!Auth::user()->can('cadastrar-anuncios')) {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Sem acesso à funcionalidade!', 'class'=>'red white-text']);
            return redirect()->route('admin.home');
        }

        $dados = $request->all();

        $anuncio = new Anuncio();
        $this->preencher($request, $anuncio, $dados);
        $anuncio->save();

        $request->session()->flash('mensagem',
            ['msg'=>'Anúncio cadastrado com sucesso!', 'class'=>'green white-text']);
        return redirect()->route('admin.anuncios');
    }

    public function alterar(Request $request, $id)
    {
        if (!Auth::user()->can('atualizar-anuncios')) {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Sem acesso à funcionalidade!', 'class'=>'red white-text']);
            return redirect()->route('admin.home');
        }

        $anuncio = Anuncio::find($id);
        $categorias = Categoria::all()->sortBy('titulo');
        $municipios = Municipio::all()->sortBy('nome');
        return view('admin.anuncios.alterar', compact('anuncio', 'categorias', 'municipios'));
    }

    public function atualizar(Request $request, $id)
    {
        if (!Auth::user()->can('atualizar-anuncios')) {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Sem acesso à funcionalidade!', 'class'=>'red white-text']);
            return redirect()->route('admin.home');
        }

        $dados = $request->all();

        $anuncio = Anuncio::find($id);
        $this->preencher($request, $anuncio, $dados);
        $anuncio->update();

        $request->session()->flash('mensagem',
            ['msg'=>'Anúncio atualizado com sucesso!', 'class'=>'green white-text']);
        return redirect()->route('admin.anuncios');
    }

    public function remover(Request $request, $id)
    {
        if (!Auth::user()->can('remover-anuncios')) {
            $request->session()->flash('mensagem',
                ['msg'=>'Erro: Sem acesso à funcionalidade!', 'class'=>'red white-text']);
            return redirect()->route('admin.home');
        }

        $anuncio = Anuncio::find($id);
        $anuncio->imagens()->delete();
        $anuncio->delete();

        $request->session()->flash('mensagem',
            ['msg'=>'Anúncio removido com sucesso!', 'class'=>'green white-text']);
        return redirect()->route('admin.anuncios');
    }
}
