<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Anuncio;

class ImagemController extends Controller
{
    public function index($id)
    {
        $anuncio = Anuncio::find($id);
        $imagens = $anuncio->imagens()->orderBy('ordem')->get();
        return view('admin.imagens.index', compact('anuncio', 'imagens'));
    }

    public function cadastrar()
    {
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
        $dados = $request->all();

        $anuncio = new Anuncio();
        $this->preencher($request, $anuncio, $dados);
        $anuncio->save();

        $request->session()->flash('mensagem',
            ['msg'=>'Anúncio cadastrado com sucesso!', 'class'=>'green white-text']);
        return redirect()->route('admin.anuncios');
    }

    public function alterar($id)
    {
        $anuncio = Anuncio::find($id);
        $categorias = Categoria::all()->sortBy('titulo');
        $municipios = Municipio::all()->sortBy('nome');
        return view('admin.anuncios.alterar', compact('anuncio', 'categorias', 'municipios'));
    }

    public function atualizar(Request $request, $id)
    {
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
        Anuncio::find($id)->delete();

        $request->session()->flash('mensagem',
            ['msg'=>'Anúncio removido com sucesso!', 'class'=>'green white-text']);
        return redirect()->route('admin.anuncios');
    }
}
